@extends('templates.master')

@section('title', 'Add Category')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('stylesheets/form.css') }}">
@endsection

@section('content')
    <h2>Add New Category</h2>

    <form action="/categories" enctype="multipart/form-data" method="POST" id="add-category-form" class="form">
        @csrf

        <div>
            <label for="category-name">Category Name</label>
            <input type="text" name="name" id="category-name">
        </div>

        <button type="submit">Add</button>
    </form>

    @if ($errors->hasBag('insert'))
        <div class="error-container">
            <label for="error" class="error-label">
                <span class="material-icons-round">
                    warning
                </span>
                {{ $errors->insert->first() }}
            </label>
        </div>
    @endif
@endsection
