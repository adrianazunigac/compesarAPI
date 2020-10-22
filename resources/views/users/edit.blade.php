@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Usuario
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-dark float-right">{{ __('Back') }}</a>
                </div>
                @include('alerts.errors')
                @include('alerts.info')
                <div class="card-body">                    
                    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}

                        @include('users.partials.form')
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection