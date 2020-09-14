@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <a href="{{ route('add.category')}}" class="btn btn-success">Add category</a>
    <a href="{{ route('all_category')}}" class="btn btn-info">All category</a>
    <hr>
    <div>
        <ol>
            <li>Category Name: {{$cat->name}}</li>
            <li>Category Slug:  {{$cat->slug}}</li>
            <li>Created At: {{$cat->created_at}}</li>
        </ol>
    </div>
    </div>
</div>
@endsection()