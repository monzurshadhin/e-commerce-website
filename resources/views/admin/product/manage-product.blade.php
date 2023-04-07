@extends('admin.master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            DataTable Example
        </div>
        <div class="card-body">
            <table id="datatablesSimple" style="vertical-align: middle">
                <thead>
                <tr>
                    <th>SL</th>
                    <th>Product Name</th>
                    <th>Category Name</th>
                    <th>Brand Name</th>
                    <th>Price</th>
{{--                    <th>Description</th>--}}
                    <th>image</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @php $i=1 @endphp
                @foreach($products as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->category_name}}</td>
                        <td>{{$product->brand_name}}</td>
                        <td>{{$product->price}}</td>
                        {{--                    <td>{{$product->description}}</td>--}}
                        <td><img src="{{asset($product->image)}}" height="70px" alt=""></td>
                        <td>{{$product->status==1? 'Published':'Unpublished'}}</td>
                        <td>
                            <a href="{{route('edit.product',['id'=>$product->id])}}" class="btn btn-secondary btn-sm">Edit</a>
                            @if($product->status == 1)
                            <a href="{{route('status.product',['id'=>$product->id])}}" class="btn btn-success btn-sm">Unublished</a>
                            @else
                            <a href="{{route('status.product',['id'=>$product->id])}}" class="btn btn-warning btn-sm">Published</a>
                            @endif

                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
