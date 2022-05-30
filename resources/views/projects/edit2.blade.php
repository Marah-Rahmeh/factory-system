@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Project') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('projects')}}>{{ __('Projects') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Edit Project') }}</li>
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
    <form action="{{ route('<project><id>update',$project->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <!--add-->

        <div class="row">

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Project Name:</strong>
                <input type="text" name="name" value="{{ $project->name }}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Manager: {{ $project->manager_id }}</strong>
                <select  name="manager_id"  id="manager_id" value="{{ $project->manager_id }}"  class="form-control" >
                    @foreach ($managers as $manager)
                    <option value={{$manager->id}}>{{$manager->first_name}} {{$manager->last_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Plane Delivery Date: </strong>
                <input type="date" name="plane_delivery_date" value="{{ $project->plane_delivery_date}}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Delivery Date:</strong>
                <input type="date" name="delivery_date" value="{{ $project->delivery_date }}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>Start Date:</strong>
                <input type="date" name="start_date" value=" {{ date('y-m-d'),strtotime($project->start_date) }}" class="form-control" >
            </div>
        </div>

        <div class=" col-md-6">
            <div class="form-group">
                <strong>End Date:</strong>
                <input type="date" name="end_date" value=" {{ $project->end_date }}" class="form-control" >
            </div>
        </div>
        </div>


        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" id="btn-save" value="edit">Save changes
            </button>
          </div>

      </form>
      @endsection
