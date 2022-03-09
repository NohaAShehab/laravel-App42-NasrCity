@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <h1> Hi this my Home page </h1>

                    @can('isadmin')
                        <div>
                            <a class="btn btn-danger"> I am the admin</a>
                        </div>
                    @elsecan("ismanger")
                        <div>
                            <a class="btn btn-info"> I am the manger</a>
                        </div>
                    @else
                        <div>
                            <a class="btn btn-success"> I am the user</a>
                        </div>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
