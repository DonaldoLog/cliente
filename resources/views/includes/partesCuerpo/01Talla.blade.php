<div class="modal" tabindex="-1" role="dialog" id="talla" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-left: 25%;">Datos físicos</h5>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
        </div>
        <!-- Contenido del formulario-->        
          <div class="col">
              {!! Form::label ('desaparecidoEstatura','Estatura (cm):') !!}
              {!! Form::text ('esta',
                              old('esta'),
                              ['class' => 'form-control sinEnter soloNumeros',
                                      'placeholder' => 'CENTÍMETROS',
                                      'id' => 'esta', 'max' => '250', 'min' => '40', 'data-validation' => 'required',
                              ] )!!}
          </div>
          <div class="col">
              {!! Form::label ('desaparecidoPeso','Peso (kg):') !!}
              {!! Form::text ('bulto',
                                  old('bulto'),
                                  ['class' => 'form-control sinEnter soloNumeros',
                                      'placeholder' => 'KILOGRAMOS',
                                      'id' => 'bulto', 'maxlength' => 3
                                  ] )!!}
          </div>
        
        
          <div class="col">
              {!! Form::label ('comple','Complexión:') !!}
              {!! Form::select ('comple',
                              $complexiones,
                              '',
                              ['class' => 'form-control', 'id' => 'comple'] )!!}                      
          </div>
          <div class="col">
              {!! Form::label ('cPiel','Color de piel:') !!}
              {!! Form::select ('cPiel',
                                  $coloresPiel,
                                  '',
                                  ['class' => 'form-control',
                                      'id' => 'cPiel',
                                  ] )!!}                      
          </div>
        
        <!-- Fin del Contenido del formulario-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="guardarTalla" >GUARDAR</button>
        <!--<button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>-->
      </div>
    </div>
  </div>
</div>