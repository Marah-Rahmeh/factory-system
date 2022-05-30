@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-9">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Add New Employee') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('employees')}}>{{ __('Employees') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Add New Employee') }}</li>
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
    <form action="{{ route('add-employee') }}" method="POST" >
        @csrf
        <!--add-->
        <div class="row">
        <div class="container bootstrap snippets bootdeys col-md-9">
            <form class="form-horizontal">
<div class="row">
        <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">User info</h4>
        </div>
        <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <strong>First Name:</strong>
                    <input type="text" name="first_name" class="form-control" >
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Last Name:</strong>
                    <input type="text" name="last_name" class="form-control" >
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Personal ID:</strong>
                    <input type="number" name="personal_id" class="form-control" >
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Position:</strong>
                    <select name="position_id" class="form-control">
                        @foreach ($positions as $position)
                        <option value={{$position->id}}>{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="email" class="form-control" >
                </div>
            </div>

            <div class=" col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>
                    <input type="password" name="password" class="form-control" >
                </div>
            </div>


    </div>

        </div>
        </div>
        <hr class="her">




      <!--form2-->
      <div class="panel panel-default">
        <div class="panel-heading">
        <h4 class="panel-title">Contact info</h4>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Mobile Number:</strong>
                        <input type="number" name="mobile_number" class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Addresse:</strong>
                        <input type="text" name="addresse" class="form-control" >
                    </div>
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
