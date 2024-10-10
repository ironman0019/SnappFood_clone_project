<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Food Ordering Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .food-card img {
            width: 100%;
            height: auto;
        }

        .order-summary {
            display: inline-block;
            background-color: #e9ecef;
            padding: 15px;
            border-radius: 10px;
        }

        .food-card {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Order Your Favorite Food</h1>
        <div class="row">
            @foreach($foods as $food)
            <div class="col-md-4">
                <div class="card food-card">
                    <img src="{{$food->picture ? asset('storage/' . $food->picture) : asset('/images/snappFood_logo.png')}}" alt="Food" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{$food->name}}</h5>
                        <p class="card-text">{{$food->material}}</p>
                        <label for="food-quantity-{{$food->id}}">Quantity:</label>
                        <input type="number" name="quantities[{{$food->id}}]" class="form-control mb-2" id="food-quantity-{{$food->id}}" min="1" value="1">
                        <button class="btn btn-primary btn-block" onclick="addToOrder({{$food->id}}, '{{$food->name}}', {{$food->price}}, 'food-quantity-{{$food->id}}', {{intval($resturentId)}})">
                            Add to Order ({{number_format($food->price)}} Toman)
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="order-summary mt-4" id="order-summary">
            <h4>Order Summary</h4>
            <ul id="order-list" class="list-group mb-3"></ul>
            <h5>Total: $<span id="total-price">0.00</span></h5>
            <button id="submit-order" class="btn btn-success btn-block">Submit Order</button>
        </div>
    </div>


    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript for Order Handling -->
    <script>
        let order = [];
        let totalPrice = 0;
        let resturent_id = null;

        function addToOrder(foodId, foodName, price, quantityId, resturentId) {
            const quantityElement = document.getElementById(quantityId);

            if (!quantityElement) {
                console.error("Quantity element not found with ID:", quantityId);
                return;
            }


            const quantity = quantityElement.value;
            const foodTotal = price * quantity;
            resturent_id = resturentId;

            order.push({
                id: foodId, 
                name: foodName,
                price: price,
                quantity: quantity,
                resturentId: resturentId
            });
            totalPrice += foodTotal;

            const orderSummary = document.getElementById('order-summary');
            const orderList = document.getElementById('order-list');
            const totalPriceElement = document.getElementById('total-price');

            orderSummary.style.display = 'block';

            const listItem = document.createElement('li');
            listItem.classList.add('list-group-item');
            listItem.textContent = `${foodName} - ${quantity} x $${price.toLocaleString()} = $${foodTotal.toLocaleString()}`;
            orderList.appendChild(listItem);

            totalPriceElement.textContent = totalPrice.toLocaleString();
        }

        // Function to submit the order via AJAX
        document.getElementById('submit-order').addEventListener('click', function() {
            if (order.length === 0) {
                alert('No items in your order!');
                return;
            }


            // Prepare the data to be sent to the server
            const orderData = {
                order: order,
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // CSRF token
                totalPrice: totalPrice,
                resturentId: resturent_id
            };

            // Send AJAX request to Laravel backend
            fetch('/add_to_cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': orderData._token
                    },
                    body: JSON.stringify(orderData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Order Submitted! Thank you for your purchase.');
                        // Reset the order and UI
                        order = [];
                        totalPrice = 0;
                        document.getElementById('order-list').innerHTML = '';
                        document.getElementById('total-price').textContent = '0.00';
                        document.getElementById('order-summary').style.display = 'none';
                    } else {
                        alert('There was an error submitting your order. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error submitting your order. Please try again.');
                });
        });
    </script>
</body>

</html>