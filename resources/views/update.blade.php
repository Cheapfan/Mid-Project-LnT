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

<form action="{{route('update', $book->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PATCH')
  <div class="mb-3">
    <label for="Title" class="form-label">Title</label>
    <input type="text" class="form-control" name="Title" value="{{$book->Title}}">
  </div>
  <div class="mb-3">
    <label for="Author" class="form-label">Author</label>
    <input type="text" class="form-control" name="Author" value="{{$book->Author}}">
  </div>
  <div class="mb-3">
    <label for="Publisher" class="form-label">Publisher</label>
    <input type="text" class="form-control" name="Publisher" value="{{$book->Publisher}}">
  </div>
  <div class="mb-3">
    <label for="Year" class="form-label">Year</label>
    <input type="text" class="form-control" name="Year" value="{{$book->Year}}">
  </div><div class="mb-3">
    <label for="Page" class="form-label">Page</label>
    <input type="text" class="form-control" name="Page" value="{{$book->Page}}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection