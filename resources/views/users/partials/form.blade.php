<div class="form-group">
	<div class="row">
		<div class="col-6">
			{{ Form::label('dni', 'DNI')}}
			{{ Form::text('dni', null, ['class' => 'form-control', 'id' => 'dni']) }}
		</div>
		<div class="col-6">
			{{ Form::label('name', 'Nombre')}}
			{{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-12">
			{{ Form::label('email', 'Correo Electronico')}}
			{{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-6">
				{{ Form::label('password', 'Contraseña')}}
				{{ Form::password('password', ['class' => 'form-control', 'id' => 'password']) }}
			</div>
		<div class="col-6">
			{{ Form::label('password_confirmation', 'Confirmar contraseña') }}
			{{ Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation']) }}
		</div>
	</div>
</div>

<div class="form-group">
	<div class="row">
		<div class="col-md-6">
			{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>
</div>