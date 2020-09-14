@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <a href="{{ route('add.category')}}" class="btn btn-success">Add category</a>
    <a href="" class="btn btn-info">All category</a>

       <form action="#" method="post">
       @csrf   
       <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" id="name" required>
              
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">
                  <option value="">Op1</option>
                  <option value="">Op2</option>
                  <option value="">Op3</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" required>
              
            </div>
          </div>
          <!-- <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Details</label>
              <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
              
            </div>
          </div> -->
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" required></textarea>
              
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
@endsection()