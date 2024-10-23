<x-admin_layout>

<!-- Add baner form -->
<section class="container m-5 bg-secondary-subtle py-5 shadow-lg">
  <h1 class="text-center">Welcome {{auth()->guard('admin')->user()->username}}</h1>
</section>


</x-admin_layout>