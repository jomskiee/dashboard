@extends('layouts.designav')
@section('title', 'Files / Add File') 
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
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add New File</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('file.store' , $file) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="file">Click here to select file:</label>
                            <input type="file" id="file" name="file">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Upload File</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
    </div>
</div>
@endsection