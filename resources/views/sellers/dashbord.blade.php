<x-seller_home_layout>
    <!-- Orders table -->
    <section class="m-2">
        <h5 class="">Orders</h5>
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Time</th>
                        <th scope="col">Food title</th>
                        <th scope="col">status</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>192</td>
                        <td>23:40:43</td>
                        <td>Pizza</td>
                        <td>
                            Checking
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</button>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>193</td>
                        <td>23:40:43</td>
                        <td>goh</td>
                        <td>
                            Checking
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</button>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>194</td>
                        <td>23:40:43</td>
                        <td>burger</td>
                        <td>
                            Checking
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">edit</button>

                        </td>
                        <td>50,000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


    <!-- Edit order status Modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">edit order status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="$">
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected>Checking</option>
                            <option value="1">Preparing</option>
                            <option value="2">send</option>
                            <option value="3">resived</option>
                        </select>
                        <button class="btn btn-primary" type="submit">submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-seller_home_layout>