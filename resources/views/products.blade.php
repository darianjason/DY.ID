@extends('templates.master')

@section('title', 'View Products')

@section('content')
    <h2>View Products</h2>

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
                    <td>{{ $product->detail->image }}</td> {{-- temporary --}}
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail->description }}</td>
                    <td>{{ $product->detail->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="/products/edit/{{ $product->id }}"> 
                            <button id="button-update">Update</button>
                        </a>

                        <form action="/products/{{ $product->id }}" method="POST">
                            @method("DELETE")
                            @csrf

                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
