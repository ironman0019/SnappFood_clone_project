<!-- flash message -->
@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show= false,3000)" x-show="show" class="alert alert-success" role="alert">
    {{session('message')}}
</div>
 @endif