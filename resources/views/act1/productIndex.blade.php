@extends('layouts.dashboard')

@section('content')
@include('notif.notif')
<h1 class="mt-4">laravel 8 CRUD Example</h1>
            <a href="{{ route('product.create') }}" class="btn btn-success">
                <span class="hidden-xs hidden-sm"><em>Add Product</em></span>
            </a>
            <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"><small><strong>No</strong></small></th>
                                <th scope="col"><small><strong>Name</strong></small></th>
                                <th scope="col"><small><strong>description</strong></small></th>
                                <th scope="col"><small><strong>Price</strong></small></th>
                                <th scope="col"><small><strong>Date Created</strong></small></th>
                                <th scope="col"><small><strong>Action</strong></small></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                                <td><small>{{ $product->id }}</small></td>
                                <td><small>{{ $product->name }}</small></td>
                                <td><small>{{ $product->description }}</small></td> 
                                <td><small>{{ $product->price }}</small></td>          
                                <td><small>{{ $product->updated_at }}</small></td>
                                
                                <td class="d-inline-flex"> 
                                    <a href="{{ route('product.show', $product) }}"><button type="button" class="btn btn-sm btn-primary ml-2"><i class="fa fa-eye pr-1" aria-hidden="true"></i>View</button></a>
                                    <a href="{{ route('product.edit', $product) }}"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-pencil-alt pr-1"></i> Edit</button></a>
                                    <form action="{{ route('product.destroy',  $product) }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="fas fa-pencil-alt pr-1"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

@endsection