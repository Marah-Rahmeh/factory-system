@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Project') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Add New Project') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('add-project') }}" method="POST" >
        @csrf
        <!--add-->
        <div class="container bootstrap snippets bootdeys">
            <form class="form-horizontal">
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Project information</h4>
        </div>
        <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Contract Id:</strong>
                    <input type="text" name="contract_id" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Manager:</strong>
                    <input type="number" name="personal_id" class="form-control" placeholder="Put your Personal ID">
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Put your Personal ID">
                </div>
            </div>
    </div>

        </div>
        </div>
        <hr class="her">

          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-default">Cancel</button>
            </div>
          </div>
        </div>
        </div>
            </form>
        </div>
        <hr class="her">
        <!--end add-->

@endsection
