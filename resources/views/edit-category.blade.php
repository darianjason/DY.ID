@extends('templates.master')

@section('title', 'Edit Category')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/form.css') }}">
@endsection

@section('content')
    <h2>Edit Category</h2>

    <form action="/categories/{{ $category->id }}" enctype="multipart/form-data" method="POST" id="edit-product-form" class="form">
        @method('PATCH')
        @csrf

        <div>
            <label for="category-name">Category Name</label>
            <input type="text" name="name" id="category-name">
        </div>

        <button type="submit">Save</button>
    </form>

    @if ($errors->hasBag('update'))
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-round">
                    warning
                </span>
                {{ $errors->update->first() }}
            </label>
        </div>
    @endif
@endsection
