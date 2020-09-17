@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <a href="{{ route('add.category')}}" class="btn btn-success">Add category</a>
    <a href="{{ route('all_category')}}" class="btn btn-info">All category</a>
    <a href="{{ route('all.post')}}" class="btn btn-info">All Post</a>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
       <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
       @csrf   
       <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <select class="form-control" name="category_id">
                  <option disable>Select category</option>
                  @foreach($category as $row)
                  <option value="{{ $row->id }}">{{ $row->name }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details"></textarea>
              
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
@endsection()