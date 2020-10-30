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
                    @if(!empty($user->picture_profile))
                        <div class="text-center">
                          <img src="{{ asset( $user->picture_profile ) }}" class="rounded-circle" width="250px" height="250px" />
                        </div>
                        @else
                        <p><i>Sin foto de perfil</i></p>
                    @endif
                	<p><strong>{{ __('Id') }}:</strong>   {{ $user->id }}</p>
                    <p><strong>{{ __('DNI') }}:</strong>   {{ $user->dni }}</p>
                    <p><strong>{{ __('Name') }}:</strong>   {{ $user->name }}</p>
                    <p><strong>{{ __('E-Mail Address') }}:</strong>   {{ $user->email }}</p>
                    <p><strong>{{ __('Talla') }}:</strong>   {{ $user->talla }}</p>
                    <p><strong>{{ __('Fecha_Nacimiento') }}:</strong>   {{ $user->fecha_nacimiento }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection