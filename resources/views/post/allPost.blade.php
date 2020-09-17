@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
    <a href="{{ route('writePost')}}" class="btn btn-success">Write post</a>
    <a href="{{ route('all_category')}}" class="btn btn-info">All category</a>
    <hr>
    <table class="table table-responsive">
        <tr>
            <th>SL</th>
            <th>Category</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach($post as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ $row->category_id }}</td>
            <td><img src="{{ $row->image }}" alt=""></td>
            <td>
                <a href="{{URL::to('edit/category/'.$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{URL::to('delete/category/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                <a href="{{URL::to('view/category/'.$row->id) }}" class="btn btn-sm btn-success">View</a>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
</div>
@endsection()