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

                <div class="card-body">
                	<p><strong>{{ __('Id') }}:</strong>   {{ $user->id }}</p>
                    <p><strong>{{ __('DNI') }}:</strong>   {{ $user->dni }}</p>
                    <p><strong>{{ __('Name') }}:</strong>   {{ $user->name }}</p>
                    <p><strong>{{ __('E-Mail Address') }}:</strong>   {{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection