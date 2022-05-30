@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-9">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Contract') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('contracts')}}>{{ __('Contracts') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('New Contract') }}</li>
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


    <form action="{{ route('add-contract') }}" method="POST" >
        @csrf
        <!--add-->
        <div class="row">
        <div class="container bootstrap snippets bootdeys col-md-9">
            <form class="form-horizontal">
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contract info</h4>
        </div>
        <div class="panel-body">
            <div class="row">

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Proposal :</strong>
                    <input type="number" name="proposal_id" class="form-control" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="start_date" class="form-control" >
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Delivery Date:</strong>
                    <input type="date" name="delivery_date" class="form-control" placeholder="Name">
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
        </form>
    </div>
        </div>
        <!--end add-->
@endsection
