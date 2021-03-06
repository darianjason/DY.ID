@extends('templates.master')

@section('title', 'Products')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/management.css') }}">
@endsection

@section('content')
    <h2>Manage Products</h2>

    <table>
        <thead>
            <th>No.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
            <th>Product Category</th>
            <th>Action</th>
        </thead>
        
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <img src="{{ Storage::url($product->detail->image) }}" alt="{{ $product->name }}">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail->description }}</td>
                    <td>{{ $product->detail->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="button-group">
                            <a href="/products/edit/{{ $product->id }}"> 
                                <button id="button-update">Update</button>
                            </a>
    
                            <form action="/products/{{ $product->id }}" enctype="multipart/form-data" method="POST">
                                @method('DELETE')
                                @csrf
    
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
