@extends('templates.master')

@section('title', 'Categories')

@section('content')
    <h2>Manage Categories</h2>

    <table>
        <thead>
            <th>No.</th>
            <th>Category Name</th>
            <th>Action</th>
        </thead>
        
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/categories/edit/{{ $category->id }}"> 
                            <button id="button-update">Update</button>
                        </a>

                        <form action="/categories/{{ $category->id }}" enctype="multipart/form-data" method="POST">
                            @method('DELETE')
                            @csrf

                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
