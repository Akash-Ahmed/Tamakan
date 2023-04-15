@extends('layouts.master')

@section('main_content')
    @if( Auth::user()->is_admin == 1 )
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        You are Admin.
                    </div>

                    <div class="card-header">Login API</div>
                    <div class="card-body">
                        <a href="http://127.0.0.1:8000/api/login">http://127.0.0.1:8000/api/login</a>
                    </div>

                    <div class="card-header">Registration API</div>
                    <div class="card-body">
                        <a href="http://127.0.0.1:8000/api/login">http://127.0.0.1:8000/api/register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            You are User.
                        </div>

                        <div class="card-header">Login API</div>
                        <div class="card-body">
                            <a href="http://127.0.0.1:8000/api/login">http://127.0.0.1:8000/api/login</a>
                        </div>

                        <div class="card-header">Registration API</div>
                        <div class="card-body">
                            <a href="http://127.0.0.1:8000/api/login">http://127.0.0.1:8000/api/register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
