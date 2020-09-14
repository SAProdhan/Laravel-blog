@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <a href="{{ route('add.category')}}" class="btn btn-success">Add category</a>
    <a href="{{ route('all_category')}}" class="btn btn-info">All category</a>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
      <form action="{{route('store.category')}}" method="post">
       @csrf  
       <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name" required>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Category Slug" name="slug" required>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection()