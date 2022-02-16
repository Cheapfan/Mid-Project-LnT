@extends('layout.master')
@section('title','index')
@section('content')

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="Title_Book" class="form-label">Title</label>
    <input type="text" class="form-control" name="Title">
  </div>
  <div class="mb-3">
    <label for="Author_Book" class="form-label">Author</label>
    <input type="text" class="form-control" name="Author">
  </div>
  <div class="mb-3">
    <label for="Publisher_Book" class="form-label">Publisher</label>
    <input type="text" class="form-control" name="Publisher">
  </div>
  <div class="mb-3">
    <label for="Year_Book" class="form-label">Year</label>
    <input type="text" class="form-control" name="Year">
  </div>
  <div class="mb-3">
    <label for="Page_Book" class="form-label">Page</label>
    <input type="text" class="form-control" name="Page">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection