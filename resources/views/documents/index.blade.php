@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row align-items-center my-4">
                <div class="col">
                    <h2 class="h3 mb-0 page-title">{{ __('Documents') }}</h2>
                </div>
                {{-- <div class="col-auto">
                        <a href= {{route('employees/create')}} class="btn btn-success" style="color:white">
                            <span style="color:white"></span> {{ __('New') }}
                        </a>
                </div> --}}
            </div>

            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item"><a href="{{route('home')}}" class="black-text active-2">{{ __('Dashboard') }}</a>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                  </svg>
                                </li>
                                <li class="breadcrumb-item"><a class="black-text active-2" href="#">{{ __('Documents') }}</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    <div class="col-md-12 col-sm-12">
    <table class="table table-bordered table-responsive-lg first-1 shadow-lg">
        <tr>
            <th>id</th>
            <th>Client</th>
            <th>Name</th>
            <th>Type</th>
            <th>Creation Date</th>
            <th>Actions</th>

        </tr>
        @foreach ($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                @foreach($clients as $client)
                <?php if($document->client_id == $client->id ) { ?>
                    <td>{{$client->first_name}}</td>
                <?php } ?>
                @endforeach
                <td>{{ $position->type}}</td>
                <td>{{ $employee->created_at }}</td>
                <td>
                    <form action="" method="POST" >
                            <a class="show" href={{ route('<document><id>show',$document->id) }}>
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                  </svg>
                            </a>
                </td>

            </tr>
        @endforeach
    </table>

</div>

@endsection
