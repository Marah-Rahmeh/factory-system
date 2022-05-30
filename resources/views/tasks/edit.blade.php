@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Tasks') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Edit Tasks') }}</li>
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
    <form action="{{ route('<task><id>update',$task->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <input  type="hidden" name="project_id"  value="{{ $task->project_id }}" class="form-control">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Task Name:</strong>
                {{-- <input  type="text" name="name" value="{{ $task->name }}" class="form-control" > --}}
                <select   class="form-control" name="name" value="{{ $task->name }}">
                    @foreach ($proposal_details as $proposal_detail)
                    <option value={{$proposal_detail->id}}>{{$proposal_detail->item_type}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Sales Id:</strong>
                <select  name="sales_id"  id="sales_id" value="{{ $task->actual_delivery_date }}" class="form-control" >
                    @foreach ($saless as $sales)
                    <option value={{$sales->id}}>{{$sales->first_name}} {{$sales->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Manager:</strong>
                <select  name="manager_id"  id="manager_id"  value="{{ $task->actual_delivery_date }}" class="form-control" >
                    @foreach ($managers as $manager)
                    <option value={{$manager->id}}>{{$manager->first_name}} {{$manager->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Delivery Date:</strong>
                <input type="date" name="delivery_date" value="{{ $task->delivery_date }}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Actual Delivery Date:</strong>
                <input type="date" name="actual_delivery_date" value="{{ $task->actual_delivery_date }}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Image or Video:</strong>
                <input type="file" name="image" class="form-control" >
            </div>
        </div>

        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="btn-save" value="addNewtasks">Submit
            </button>
        </div>

    </form>

@endsection
