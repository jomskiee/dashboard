@extends('layouts.dashboard')

@section('content')
@include('notif.notif')
<h1 class="mt-4">File Management</h1>
            <a href="{{ route('file.create') }}" class="btn btn-success">
                <span class="hidden-xs hidden-sm"><em>Add File</em></span>
            </a>
<table class="table">
    <thead>
        <tr>
            <th scope="col"><small><strong>File Name</strong></small></th>
            <th scope="col"><small><strong>File Type</strong></small></th>
            <th scope="col"><small><strong>Date Created</strong></small></th>
            <th scope="col"><small><strong>Date Updated</strong></small></th>
            <th scope="col"><small><strong>Action</strong></small></th>
        </tr>
    </thead>
    <tbody>
        @if(count($files) > 0)
            @foreach($files as $file)
                <tr>
                    <td><small>{{ $file->name }}</small></td>
                    <td><small>{{ $file->type }}</small></td>
                    <td><small>{{ $file->created_at }}</small></td>          
                    <td><small>{{ $file->updated_at }}</small></td>
                                
                    <td class="d-inline-flex"> 
                        <a href="{{ route('file.show', $file) }}"><button type="button" class="btn btn-sm btn-primary ml-2"><i class="fa fa-eye pr-1" aria-hidden="true"></i>View</button></a>
                        <a href="{{ route('file.edit', $file) }}"><button type="button" class="btn btn-sm btn-success ml-2"><i class="fas fa-pencil-alt pr-1"></i> Edit</button></a>
                        <form action="{{ route('file.destroy', $file) }}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger ml-2"><i class="fas fa-pencil-alt pr-1"></i> Delete</button>                                    </form>
                    </td>
                </tr>
            @endforeach
        @else
        <tr>
            <td>You have no files uploaded</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection