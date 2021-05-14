@extends('layouts.designav')
@section('title', 'Dashboard')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon card-header-danger">
                        <div class="card-icon">
                            <i class="material-icons">local_mall</i>      
                        </div>
                        <p class="card-category">Total Products</p>
                        <h3 class="card-title">+ {{ $product }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">folder</i>    
                        </div>
                        <p class="card-category">Total Files</p>
                        <h3 class="card-title">+ {{ $file }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons">update</i> Just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

