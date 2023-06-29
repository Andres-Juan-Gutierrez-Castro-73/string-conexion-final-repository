{{ Form::open(['route' => 'aprendices.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('foto_perfil', 'Foto Perfil') }}
            {{ Form::file('foto_perfil', ['class' => 'form-control-file' . ($errors->has('foto_perfil') ? ' is-invalid' : '')]) }}
            {!! $errors->first('foto_perfil', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('habilidades', 'Habilidades') }}
            {{ Form::text('habilidades', $aprendice->habilidades, ['class' => 'form-control' . ($errors->has('habilidades') ? ' is-invalid' : ''), 'placeholder' => 'Habilidades']) }}
            {!! $errors->first('habilidades', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- <div class="form-group">
            {{ Form::label('tipo_documento') }}
            {{ Form::text('tipo_documento', $aprendice->tipo_documento, ['class' => 'form-control' . ($errors->has('tipo_documento') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Documento']) }}
            {!! $errors->first('tipo_documento', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <div class="form-group">
            {{ Form::label('numero_documento', 'Numero Documento') }}
            {{ Form::text('numero_documento', $aprendice->numero_documento, ['class' => 'form-control' . ($errors->has('numero_documento') ? ' is-invalid' : ''), 'placeholder' => 'Numero Documento']) }}
            {!! $errors->first('numero_documento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_telefono', 'Numero Telefono') }}
            {{ Form::text('numero_telefono', $aprendice->numero_telefono, ['class' => 'form-control' . ($errors->has('numero_telefono') ? ' is-invalid' : ''), 'placeholder' => 'Numero Telefono']) }}
            {!! $errors->first('numero_telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!-- <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $aprendice->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div> -->
        <div class="form-group">
            {{ Form::label('cadena_id', 'Cadena') }}
            {{ Form::select('cadena_id', $cadenas, $aprendice->cadena_id, ['class' => 'form-control' . ($errors->has('cadena_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione una cadena']) }}
            {!! $errors->first('cadena_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('programa_id', 'Programa') }}
            {{ Form::select('programa_id', $programas, $aprendice->programa_id, ['class' => 'form-control' . ($errors->has('programa_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un programa']) }}
            {!! $errors->first('programa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('usuario_id', 'Usuario') }}
            {{ Form::select('usuario_id', $usuarios, $aprendice->usuario_id, ['class' => 'form-control' . ($errors->has('usuario_id') ? ' is-invalid' : ''), 'placeholder' => 'Seleccione un usuario']) }}
            {!! $errors->first('usuario_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        {{ Form::submit('¡Hecho!', ['class' => 'btn btn-primary']) }}
    </div>
</div>
{{ Form::close() }}