<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::text('nombre_equipo', $equipo->nombre_equipo, ['class' => 'form-control' . ($errors->has('nombre_equipo') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Equipo']) }}
            {!! $errors->first('nombre_equipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::select('nombre_integrante1', [$usuarioActivo->id => $usuarioActivo->name], null, ['class' => 'form-control' . ($errors->has('nombre_integrante1') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Integrante1']) }}
            {!! $errors->first('nombre_integrante1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::select('nombre_integrante2', $usuariosAprendiz, null, ['class' => 'form-control' . ($errors->has('nombre_integrante2') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Integrante2']) }}
            {!! $errors->first('nombre_integrante2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::select('nombre_integrante3', $usuariosAprendiz, null, ['class' => 'form-control' . ($errors->has('nombre_integrante3') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Integrante3']) }}
            {!! $errors->first('nombre_integrante3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::text('servicios_ofrecidos', $equipo->servicios_ofrecidos, ['class' => 'form-control' . ($errors->has('servicios_ofrecidos') ? ' is-invalid' : ''), 'placeholder' => 'Servicios Ofrecidos']) }}
            {!! $errors->first('servicios_ofrecidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::select('diponibilidad', ['0' => 'No disponible', '1' => 'Disponible'], $equipo->diponibilidad, ['class' => 'form-control' . ($errors->has('diponibilidad') ? ' is-invalid' : ''), 'placeholder' => 'Disponibilidad']) }}
            {!! $errors->first('diponibilidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::select('correo_usuario_creador', [$usuarioActivo->id => $usuarioActivo->email], null, ['class' => 'form-control' . ($errors->has('correo_usuario_creador') ? ' is-invalid' : ''), 'placeholder' => 'Correo de contacto']) }}
            {!! $errors->first('correo_usuario_creador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">¡Hecho!</button>
    </div>
</div>
