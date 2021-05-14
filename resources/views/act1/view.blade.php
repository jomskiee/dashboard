@extends('layouts.designav')
@section('title', 'Products / Details')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card justify-content-center">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{ $product->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row px-4">
                    <div class="col-md-4">
                        <p>No:</p>
                        <p>Name:</p>
                        <p>Description:</p>
                        <p>Price:</p>
                        <p>Date:</p>
                    </div>
                    <div class="col-md-4">
                        <p>{{ $product->id }}</p>
                        <p>{{ $product->name }}</p>
                        <p>{{ $product->description }}</p>
                        <p>{{ $product->price }}</p>
                        <p>{{ $product->created_at }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{ route('product.destroy',  $product) }}" method="POST">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-round btn-danger  mx-5 px-5"><i class="material-icons">delete</i> Delete Product</button>
                </form>
                <a href="{{ route('product.edit', $product) }}" class="btn btn-success btn-round mx-5 px-5"><i class="material-icons">edit</i> Edit Product</a>
            </div>
        </div>
    </div>
</div>
@endsection