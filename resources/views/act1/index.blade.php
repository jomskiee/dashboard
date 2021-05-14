@extends('layouts.designav')
@section('title', 'Products') 
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon card-header-warning">
                        <div class="card-icon">
                            <i class="material-icons">local_mall</i>      
                        </div>
                        <a href="{{ route('product.create') }}" class="btn btn-success mt-4">
                            <span class="hidden-xs hidden-sm"><em>+Add Product</em></span>
                        </a>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header card-header-warning">
                    <h4 class="card-title mt-0"> Product Table Lists</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="">
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td class="d-inline-flex"> 
                                            <a href="{{ route('product.show', $product) }}"><button type="button" class="btn btn-sm btn-primary ml-2"><i class="material-icons">visibility</i>View</button></a>
                                            <a href="{{ route('product.edit', $product) }}"><button type="button" class="btn btn-sm btn-success ml-2"><i class="material-icons">edit</i> Edit</button></a>
                                            <form action="{{ route('product.destroy',  $product) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="material-icons">delete</i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection