@extends('templates.master')

@section('title', 'DY.ID')

@section('content')
    <h2>Products Details</h2>

    <div>
        <h3> {{$productFind->name}} </h3>
        <h4>Category:</h4>
        {{$productFind->category->name}}
        <h4>Price:</h4>
        {{$productFind->detail->price}}
        <h4>Description:</h4>
        {{$productFind->detail->description}}

    </div>


@endsection
