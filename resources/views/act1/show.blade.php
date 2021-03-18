@extends('layouts.dashboard')

@section('content')
@include('notif.notif')
<div class="row justify-content-center mt-5">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header ">
                <a href="{{ route('product.index') }}" class="btn btn-primary btn-sm float-right">
                        <i class="fa fa-reply" aria-hidden="true"></i> Back to Products
                    </a>
                    <h5 class="text-center">{{ $product->name }}</h5>
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                                <p>No:</p>
                                <p>Name:</p>
                                <p>Description:</p>
                                <p>Price:</p>
                                <p>Date:</p>
                        </div>
                        <div class="col-md-6">
                                <p>{{ $product->id }}</p>
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->description }}</p>
                                <p>{{ $product->price }}</p>
                                <p>{{ $product->created_at }}</p>
                        </div>
                    </div>
                    
                </div>
               <div class="card-footer">
                    <div class="d-inline-flex">
                        <form action="{{ route('product.destroy',  $product) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger  mx-5 px-5"> Delete Product</button>
                        </form>
                        <a href="{{ route('product.edit', $product) }}" ><button type="button" class="btn btn-sm btn-info mx-5 px-5 "> Edit Product</button></a>
                               
                    </div>
                </div>
                                 
            </div>
        </div>
    </div>
@endsection