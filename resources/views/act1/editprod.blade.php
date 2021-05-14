@extends('layouts.designav')
@section('title', 'Products / Edit Product')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(count($errors) > 0)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Edit {{ $product->name }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update' , $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input id="name" type="text" placeholder="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  
                          aria-describedby="basic-addon2" autocomplete="name" required autofocus >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Description:</label>
                            <input id="description" type="text" placeholder="{{ $product->description }}" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  
                            aria-describedby="basic-addon2" autocomplete="description" required autofocus >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="price" class="mt-4"><strong>Price:</strong></label>
                        <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}"  
                        aria-describedby="basic-addon2" autocomplete="price" required autofocus >
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection