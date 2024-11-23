#!/bin/bash

set -e

# Ensure dependencies are installed
if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction || { echo "Composer install failed!"; exit 1; }
fi

# Ensure .env file exists
if [ ! -f ".env" ]; then
    echo "Creating new .env file for env $APP_ENV"
    cp .env.example .env || { echo "Failed to copy .env.example"; exit 1; }
else
    echo ".env file exists."
fi

# Set container role
role=${CONTAINER_ROLE:-app}
echo "Container role: $role"


# Handle container roles
case "$role" in
    app)
        # Run storage:link if not already linked
        if [ ! -L "public/storage" ]; then
            echo "Creating storage symlink..."
            php artisan storage:link || { echo "Failed to create storage symlink"; exit 1; }
        else
            echo "Storage symlink already exists."
        fi

        # Run php artisan key:generate
        if [ ! -s .env ] || ! grep -q "^APP_KEY=" .env; then
            php artisan key:generate || { echo "Failed to generate APP_KEY"; exit 1; }
        else
            echo "APP_KEY already set."
        fi

        # Run migrations (if enabled)
        if [ "${RUN_MIGRATIONS:-true}" = "true" ]; then
            php artisan migrate --force || { echo "Migration failed!"; exit 1; }
        else
            echo "Skipping migrations."
        fi

        # Start the Laravel development server
        echo "Starting Laravel development server..."
        exec php artisan serve --host=0.0.0.0 --port=8000
        ;;
    
    queue)
        # Start the queue listener
        echo "Starting queue listener..."
        exec php artisan queue:listen
        ;;
    
    *)
        echo "Invalid CONTAINER_ROLE: $role"
        exit 1
        ;;
esac
