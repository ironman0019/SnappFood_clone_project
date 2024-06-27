<x-admin_layout>

<!-- Add baner form -->
<section class="container m-5 bg-secondary-subtle py-5 shadow-lg">
  <form class="w-50 mx-auto">
    <h4>Adding Banner To website</h4>
    <div class="mb-3 mt-3">
      <label for="" class="form-label">Title</label>
      <input type="text" class="form-control" id="">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Body</label>
      <input type="text" class="form-control" id="">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</section>


<!-- CRUD banners -->
<section class="container mt-3 mb-3">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td><i class="fa-solid fa-square-pen text-warning"></i></td>
        <td><i class="fa-solid fa-trash text-danger"></i></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td><i class="fa-solid fa-square-pen text-warning"></i></td>
        <td><i class="fa-solid fa-trash text-danger"></i></td>
      </tr>
    </tbody>
  </table>
</section>

</x-admin_layout>