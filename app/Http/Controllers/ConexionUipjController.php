<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cedula;
use Illuminate\Support\Facades\Auth;


class ConexionUipjController extends Controller
{
    public function resolviendo_peticion(Request $request)
    {
        $idCarpeta=$request->idCarpeta;
        $token=$request->token;

        $user = Auth::user();
        // dd($user);
        $existe = \App\Models\Cedula::where('idCarpeta', $idCarpeta)->get();

        if(count($existe)){
            $existe = $existe[0];
            return redirect()->action(
            
                'CedulaController@show', ['id' => $existe->id,'token'=>$token]
            );
        }

        \DB::beginTransaction();
        try {

            $carpeta = \DB::connection('mysql2')
                                ->select('select c.id, u.nombres, u.apellidos, n.nombre as unidad, c.numCarpeta
                                            from carpeta c
                                            left outer join control_carpeta t on c.id = t.idCarpeta
                                            left outer join users u on t.idFiscal = u.id
                                            left outer join unidad n on t.idUnidad = n.id
                                            where c.id ='.$idCarpeta);


            //dd($carpeta);
            $cedula = \App\Models\Cedula::create([
                'entrevistadorNombres' 			=> $carpeta[0]->nombres,
                'entrevistadorPrimerAp' 		=> $carpeta[0]->apellidos,
                'entrevistadorSegundoAp'		=> '.',
                'entrevistadorCargo'			=> $carpeta[0]->unidad,
                'carpeta'                       => $carpeta[0]->numCarpeta,
                'idCarpeta'                     => $carpeta[0]->id,
                'entrevistadorPrimeraVez'		=> 'SI',
                'idDialecto' 					=> '1'
            ]);

            /*$informante = \DB::connection('mysql2')
                        ->select('select s.nombres, s.primerAp, s.segundoAp, s.fechaNacimiento, s.rfc,
                        s.curp, s.idNacionalidad, s.sexo,
                        v.docIdentificacion, v.numDocIdentificacion, v.edad, v.idEstadoCivil,
                        d.calle, d.numExterno, d.numInterno, d.idMunicipio, d.idLocalidad, d.idColonia, d.idColonia as idCp,
                        v.telefono
                        from variables_persona v
                        left outer join extra_denunciante x on v.id = x.idVariablesPersona
                        left outer join persona s on v.idPersona = s.id
                        left outer join domicilio d on v.idDomicilio = d.id
                        where v.idCarpeta='.$idCarpeta);*/
            $informante = \DB::connection('mysql2')
                        ->table('extra_denunciante')
                        ->leftJoin('variables_persona', 'extra_denunciante.idVariablesPersona', '=', 'variables_persona.id')
                        ->leftJoin('carpeta', 'variables_persona.idCarpeta', '=', 'carpeta.id')
                        ->leftJoin('persona', 'variables_persona.idPersona', '=', 'persona.id')
                        ->leftJoin('cat_nacionalidad', 'persona.idNacionalidad', '=', 'cat_nacionalidad.id')
                        ->leftJoin('cat_etnia', 'persona.idEtnia', '=', 'cat_etnia.id')
                        ->leftJoin('cat_lengua', 'persona.idLengua', '=', 'cat_lengua.id')
                        ->leftJoin('cat_municipio as cat_municipio_origen', 'persona.idMunicipioOrigen', '=', 'cat_municipio_origen.id')
                        ->leftJoin('cat_estado as cat_estado_origen', 'cat_municipio_origen.idEstado', '=', 'cat_estado_origen.id')
                        ->leftJoin('cat_ocupacion', 'variables_persona.idOcupacion', '=', 'cat_ocupacion.id')
                        ->leftJoin('cat_estado_civil', 'variables_persona.idEstadoCivil', '=', 'cat_estado_civil.id')
                        ->leftJoin('cat_escolaridad', 'variables_persona.idEscolaridad', '=', 'cat_escolaridad.id')
                        ->leftJoin('cat_religion', 'variables_persona.idReligion', '=', 'cat_religion.id')
                        ->leftJoin('domicilio', 'variables_persona.idDomicilio', '=', 'domicilio.id')
                        ->leftJoin('cat_municipio as cat_municipio_personal', 'domicilio.idMunicipio', '=', 'cat_municipio_personal.id')
                        ->leftJoin('cat_estado as cat_estado_personal', 'cat_municipio_personal.idEstado', '=', 'cat_estado_personal.id')
                        ->leftJoin('cat_localidad as cat_localidad_personal', 'domicilio.idLocalidad', '=', 'cat_localidad_personal.id')
                        ->leftJoin('cat_colonia as cat_colonia_personal', 'domicilio.idColonia', '=', 'cat_colonia_personal.id')
                        ->leftJoin('interprete', 'variables_persona.idInterprete', '=', 'interprete.id')
                        ->leftJoin('cat_lengua as cat_lengua_interprete', 'interprete.idLengua', '=', 'cat_lengua_interprete.id')
                        ->leftJoin('domicilio as domicilio_trabajo', 'variables_persona.idDomicilioTrabajo', '=', 'domicilio_trabajo.id')
                        ->leftJoin('cat_municipio as cat_municipio_trabajo', 'domicilio_trabajo.idMunicipio', '=', 'cat_municipio_trabajo.id')
                        ->leftJoin('cat_estado as cat_estado_trabajo', 'cat_municipio_trabajo.idEstado', '=', 'cat_estado_trabajo.id')
                        ->leftJoin('cat_localidad as cat_localidad_trabajo', 'domicilio_trabajo.idLocalidad', '=', 'cat_localidad_trabajo.id')
                        ->leftJoin('cat_colonia as cat_colonia_trabajo', 'domicilio_trabajo.idColonia', '=', 'cat_colonia_trabajo.id')
                        ->leftJoin('notificacion', 'extra_denunciante.idNotificacion', '=', 'notificacion.id')
                        ->leftJoin('domicilio as domicilio_notificacion', 'notificacion.idDomicilio', '=', 'domicilio_notificacion.id')
                        ->leftJoin('cat_municipio as cat_municipio_notificacion', 'domicilio_notificacion.idMunicipio', '=', 'cat_municipio_notificacion.id')
                        ->leftJoin('cat_estado as cat_estado_notificacion', 'cat_municipio_notificacion.idEstado', '=', 'cat_estado_notificacion.id')
                        ->leftJoin('cat_localidad as cat_localidad_notificacion', 'domicilio_notificacion.idLocalidad', '=', 'cat_localidad_notificacion.id')
                        ->leftJoin('cat_colonia as cat_colonia_notificacion', 'domicilio_notificacion.idColonia', '=', 'cat_colonia_notificacion.id')
                        ->select('persona.nombres', 'persona.primerAp', 'persona.segundoAp', 'persona.fechaNacimiento', 'persona.sexo')
                        ->addSelect('persona.curp', 'persona.rfc', 'cat_etnia.nombre as etnia', 'cat_lengua.nombre as lengua')
                        ->addSelect('variables_persona.edad', 'cat_nacionalidad.nombre as nacionalidad', 'cat_estado_origen.nombre as estado_origen')
                        ->addSelect('cat_municipio_origen.nombre as municipio_origen', 'variables_persona.telefono', 'variables_persona.motivoEstancia')
                        ->addSelect('interprete.nombre as interpreteNombre', 'interprete.organizacion as interpreteOrganizacion')
                        ->addSelect('cat_ocupacion.nombre as ocupacion', 'cat_estado_civil.nombre as estado_civil', 'cat_religion.nombre as religion')
                        ->addSelect('cat_escolaridad.nombre as escolaridad', 'variables_persona.docIdentificacion', 'variables_persona.numDocIdentificacion')
                        ->addSelect('extra_denunciante.conoceAlDenunciado')
                        ->addSelect('cat_estado_personal.nombre as domicilio_personal_estado', 'cat_municipio_personal.nombre as domicilio_personal_municipio')
                        ->addSelect('cat_localidad_personal.nombre as domicilio_personal_localidad', 'cat_colonia_personal.nombre as domicilio_personal_colonia')
                        ->addSelect('cat_colonia_personal.codigoPostal as domicilio_personal_cp', 'domicilio.calle as domicilio_personal_calle')
                        ->addSelect('domicilio.numExterno as domicilio_personal_numExterno', 'domicilio.numExterno as domicilio_personal_numInterno')
                        ->addSelect('variables_persona.lugarTrabajo as domicilio_trabajo_lugar', 'variables_persona.telefonoTrabajo as domicilio_trabajo_telefono')
                        ->addSelect('cat_estado_trabajo.nombre as domicilio_trabajo_estado', 'cat_municipio_trabajo.nombre as domicilio_trabajo_municipio')
                        ->addSelect('cat_localidad_trabajo.nombre as domicilio_trabajo_localidad', 'cat_colonia_trabajo.nombre as domicilio_trabajo_colonia')
                        ->addSelect('cat_colonia_trabajo.codigoPostal as domicilio_trabajo_cp', 'domicilio.calle as domicilio_trabajo_calle')
                        ->addSelect('domicilio.numExterno as domicilio_trabajo_numExterno', 'domicilio.numExterno as domicilio_trabajo_numInterno')
                        ->addSelect('cat_estado_notificacion.nombre as domicilio_notificacion_estado', 'cat_municipio_notificacion.nombre as domicilio_notificacion_municipio')
                        ->addSelect('cat_localidad_notificacion.nombre as domicilio_notificacion_localidad', 'cat_colonia_notificacion.nombre as domicilio_notificacion_colonia')
                        ->addSelect('cat_colonia_notificacion.codigoPostal as domicilio_notificacion_cp', 'domicilio.calle as domicilio_notificacion_calle')
                        ->addSelect('notificacion.correo as domicilio_notificacion_correo', 'notificacion.telefono as domicilio_notificacion_telefono')
                        ->addSelect('notificacion.fax as domicilio_notificacion_fax')
                        ->addSelect('persona.idNacionalidad', 'cat_estado_personal.id as idestadoPersonal', 'cat_municipio_personal.id as idMunicipioPersonal')
                        ->addSelect('cat_localidad_personal.id as idLocalidadPersonal', 'cat_colonia_personal.id as idColoniaPersonal', 'cat_colonia_personal.id as idCpPersonal')
                        ->where('carpeta.id', $idCarpeta)
                        ->get();
            //dd($informante);

            $informante = $informante[0];
            //dd($informante->segundoAp);
            $persona = \App\Models\Persona::create([
                'nombres'           => $informante->nombres,
                'primerAp'          => $informante->primerAp,
                'segundoAp'         => $informante->segundoAp,
                'fechaNacimiento'   => \Carbon\Carbon::parse($informante->fechaNacimiento)->format('d/m/Y'),
                'sexo'              => $informante->sexo,
                'idNacionalidad'    => $informante->idNacionalidad,
                'curp'              => $informante->curp
            ]);

            $idDocumentoIdentidad = \App\Models\CatDocumento::where('nombre',$informante->docIdentificacion)->get();
            $idDocumentoIdentidad = (count($idDocumentoIdentidad)) ? $idDocumentoIdentidad[0]->id : 1 ;

            $telefonos[] = array('tipoTelefono' => 'CELULAR',
                                    'lada' => '(+52)-',
                                    'telefono' => $informante->telefono,
                                    'ext' => null);

            $desaparecido = \App\Models\Desaparecido::create([
                'idPersona'             => $persona->id,
                'idCedula'              => $cedula->id,
                'idParentesco'          => '1',
                'idDocumentoIdentidad'  => $idDocumentoIdentidad,
                'otroDocIdentidad'      => null,
                'numDocIdentidad'       => $informante->numDocIdentificacion,
                'correoElectronico'     => null,
                'telefonos'          	=> json_encode($telefonos),
                'informante'            => 1,
                'notificaciones'        => 1,
                'tipoPersona'           => 'INFORMANTE',
            ]);

            $domicilio = \App\Models\Domicilio::create([
                'idDesaparecido'    => $desaparecido->id,
                'tipoDireccion'     => 'PERSONAL',
                'calle'             => $informante->domicilio_personal_calle,
                'numExterno'        => $informante->domicilio_personal_numExterno,
                'numInterno'        => $informante->domicilio_personal_numInterno,
                'idestado'          => $informante->idestadoPersonal,
                'idMunicipio'       => $informante->idMunicipioPersonal,
                'idLocalidad'       => $informante->idLocalidadPersonal,
                'idColonia'         => $informante->idColoniaPersonal,
                'idCodigoPostal'    => $informante->idColoniaPersonal,
            ]);

        	\DB::commit();
	        $data['success'] = true;
        } catch (\Exception $e) {
            $data['success'] = false;
            $data['error'] = $e->getMessage();
            \DB::rollback();
            dd($data);
        }
        //dd($data);
        return redirect()->action(
            'CedulaController@show', ['id' => $cedula->id,'token'=>$token]
        );
    }

    public function getDesaparecidosCarpeta($idCarpeta)
    {
        $desaparecidos = \DB::table('desaparecidos_cedula_investigacion AS ce')
                ->leftJoin('desaparecidos_personas AS de', 'ce.id', '=', 'de.idCedula')
                ->leftJoin('persona AS pe', 'pe.id', '=', 'de.idPersona')
                ->where('idCarpeta', $idCarpeta)
                ->where('tipoPersona', 'DESAPARECIDA')
                ->select('pe.nombres', 'pe.primerAp', 'pe.segundoAp', 'de.edadExtravio')
                ->addSelect('de.apodo')
                ->get();

        return response()->json($desaparecidos);

    }
}
