<div class="form-group">
        {!! Form::label ('identificacion','Identificacion') !!}
        {!! Form::select ('identificacion',$identificacion,'', ['class' => 'form-control'] )!!}
    </div>

    <div class="form-group">
        {!! Form::label ('otroId','Otro') !!}
        {!! Form::text ('otroId',old('Otra identificacion'), ['class' => 'form-control'] )!!}
    </div>

    <div class="form-group">
        {!! Form::label ('noId','No. Identificación') !!}
        {!! Form::text ('noId',old('Numero identificacion'), ['class' => 'form-control'] )!!}
    </div>

    <div class="form-group">
        {!! Form::label ('persona','Persona') !!}
        {!! Form::text ('idPersona',$persona->id, ['class' => 'form-control'] )!!}
    </div>

    <div class="form-group">
        {!! Form::label ('antecedentes','Antecedentes') !!}
        {!! Form::select ('antecedentes',$option,'', ['class' => 'form-control'] )!!}
    </div>
    <div class="form-group">
        {!! Form::label ('mes','Meses') !!}
        {!! Form::select ('mes',$meses,'', ['class' => 'form-control'] )!!}
    </div>
    <div class="form-group">
        {!! Form::label ('anio','Anios') !!}
        {!! Form::select ('anio','', ['class' => 'form-control'] )!!}
    </div>
    <div class="form-group">
        {!! Form::label ('delito','Delito') !!}
        {!! Form::select ('idDelito',$Delitos,'', ['class' => 'form-control'] )!!}
    </div>
    <div class="form-group">
        {!! Form::label ('centro','Centro de reclucion') !!}
        {!! Form::select ('idCcentro',$centro,'', ['class' => 'form-control'] )!!}
    </div>
    <div class="form-group">
        {!! Form::label ('observacion','Observacion') !!}
        {!! Form::select ('observacion',$observacion,'', ['class' => 'form-control'] )!!}
    </div>