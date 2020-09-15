@extends('welcome')
@section('content')
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

    <a href="{{ route('add.category')}}" class="btn btn-success">Add category</a>
    <a href="{{ route('all_category')}}" class="btn btn-info">All category</a>
    <hr>
    <table>
        <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Slug Name</th>
            <th>Action</th>
        </tr>
        @foreach($category as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->slug }}</td>
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