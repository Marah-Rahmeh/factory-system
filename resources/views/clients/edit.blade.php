@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Edit Client') }}</h2>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href={{route('clients')}}>{{ __('Clients') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('Edit Client') }}</li>
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
    <form action="{{ route('<clients><id>update',$client->id) }}" method="POST" >
        @method('POST')
        @csrf
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
                            <input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Last Name:</strong>
                            <input type="text" name="last_name" value="{{ $client->last_name }}"  class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Personal ID:</strong>
                            <input type="number" name="personal_id" value="{{ $client->personal_id }}" class="form-control" placeholder="Put your Personal ID">
                        </div>
                    </div>

                    <div class=" col-md-6">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ $user->email }}"  class="form-control" placeholder="Put your Personal ID">
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
                        <strong>Home Number:</strong>
                        <input type="number" name="home_number"value="{{ $client->home_number }}"  class="form-control" placeholder="Home Number">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Office Number:</strong>
                        <input type="number" name="office_number" value="{{ $client->office_number }}" class="form-control"  placeholder="Office Number">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Mobile Number:</strong>
                        <input type="number" name="mobile_number" value="{{ $client->mobile_number }}"  class="form-control" placeholder="Mobile Number">
                    </div>
                </div>

                @foreach ($addresses as $addresse)
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Province:</strong>
                        <input type="text" name="province" value="{{ $addresse->province }}" class="form-control" placeholder="Province">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Neighborhood:</strong>
                        <input type="text" name="neighborhood" value="{{ $addresse->neighborhood }}" class="form-control" placeholder="Neighborhood">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Pobox:</strong>
                        <input type="text" name="pobox" value="{{ $addresse->pobox }}"  class="form-control" placeholder="Pobox">
                    </div>
                </div>

            </div>
        </div>
        </div>
        <hr class="her">
    <!--form3-->
    <div class="panel panel-default">
        {{-- <div class="panel-heading">
        <h4 class="panel-title">Security</h4>
        </div> --}}
        <div class="panel-body">
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Contact Name:</strong>
                        <input type="text" name="contact_name" value="{{ $addresse->contact_name }}"  class="form-control" placeholder="Contact Name">
                    </div>
                </div>

            <div class="col-md-6">
                    <div class="form-group">
                        <strong>Contact Personal Id:</strong>
                        <input type="number" name="contact_personal_id" value="{{ $addresse->contact_personal_id }}" class="form-control" placeholder="Contact Personal Id">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Contact Mobile:</strong>
                        <input type="number" name="contact_mobile"value="{{ $addresse->contact_mobile }}"  class="form-control" placeholder="Contact Mobile">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>

        <hr class="her">
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
                <button type="reset" class="btn btn-default">Cancel</button>
            </div>
            </div>
          </form>
        </div>
    </div>
</div
@endsection
