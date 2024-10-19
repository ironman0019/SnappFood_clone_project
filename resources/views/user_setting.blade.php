<x-home_layout>

    <!-- flash message -->
    <x-flash-message />

    <div class="container">
        <form action="/user_setting/update" method="POST" class="w-50 mx-auto my-5">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <h1>User setting</h1>
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" id="" name="name" value="{{$user->name}}">
                @error('name')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Address</label>
                <input type="text" class="form-control" id="" name="address" value="{{$user->address}}">
                @error('address')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">City</label>
                <input type="text" class="form-control" id="" name="city" value="{{$user->city}}">
                @error('city')
                <div class="form-text text-danger">{{$message}}</div>
                @enderror
            </div>
            <a href="/home" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>






</x-home_layout>