@extends('layouts.dashboard')

@section('content')
@include('notif.notif')
<h1 class="mt-4 mb-4">Add New File</h1>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('file.store' , $file) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="file" placeholder="Choose file" id="file">

             </div>
        </div>
    
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" id="submit">Upload File</button>
        </div>
    </div>   
</form>
@endsection