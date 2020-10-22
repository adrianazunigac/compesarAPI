@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    <a href="{{ route('users.create') }}" 
                    class="btn btn-sm btn-primary float-right">
                        {{ __('Create') }}
                    </a>
                </div>

                <div class="card-body">
                    @include('alerts.info')
                    <table class="table table-striped table-hover table-sm">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10px">#</th>
                                <th>{{ __('DNI') }}</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('E-Mail Address') }}</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->dni }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td width="10px">
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn btn-primary">
                                        {{ __('Show') }}
                                    </a>
                                </td>
                                <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn btn-success">
                                        {{ __('Edit') }}
                                    </a>
                                </td>
                                <td width="10px">
                                    {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn btn-danger">
                                            {{ __('Delete') }}
                                        </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection