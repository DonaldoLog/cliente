<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desaparecido;
use App\Models\CedulaPartesCuerpo;
use App\Models\PivotSubPartiCuerpo;
use App\Models\PivotSubModiCuerpo;
class DescripcionFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $desaparecido = Desaparecido::find($request['idExtraviado']);

         $desaparecido->estatura = $request['estatura'];
         $desaparecido->peso = $request['peso'];
         $desaparecido->idComplexion = $request['complexion'];
         $desaparecido->idColorPiel = $request['colorPiel'];

         $desaparecido->save();

         //cedula_partes_cuerpo;
         $parteCuerpo = new CedulaPartesCuerpo();

         $parteCuerpo->idPersonaDesaparecida = $request['idExtraviado'];
         $parteCuerpo->idPartesCuerpo = $request['parteCuerpo'];
         $parteCuerpo->lado = $request['lado'];
         $parteCuerpo->idColoresCuerpo = $request['colorP'];
         $parteCuerpo->otraParticularidad =$request['otraParticularidad'];
         $parteCuerpo->otraModificacion =$request['otraModificacion'];
         $parteCuerpo->otroColor =$request['otroColor'];
         $parteCuerpo->observaciones = $request['observaciones'];

         $parteCuerpo->save();

         //particularidades
         
         $particularidad = $request['particularidad'];

         $longitud = count($particularidad);

         for($i=0; $i<$longitud; $i++){
            /*echo $parteCuerpo->id;
            echo "<br>";
            echo $particularidad[$i];
            echo "<br>";*/
            $particularidades = new PivotSubPartiCuerpo();
            $particularidades->idCedulaPartesCuerpo = $parteCuerpo->id;
            $particularidades->idSubParticularidades = $particularidad[$i];

            $particularidades->save();
         }

         //modificaciones

         $modificacion = $request['modificacion'];

         $longitud = count($modificacion);

         for($i=0; $i<$longitud; $i++){
            $modificaciones = new PivotSubModiCuerpo();
            $modificaciones->idCedulaPartesCuerpo = $parteCuerpo->id;
            $modificaciones->idSubModificaciones = $modificacion[$i];

            $modificaciones->save();
         }         

         

         return response()->json($desaparecido);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idDesaparecido)
    {
        //
        $desaparecido = Desaparecido::find($idDesaparecido);

        $partesCuerpo = \App\Models\CatPartesCuerpo::all()->pluck('nombre','id');
        $complexiones = \App\Models\CatComplexion::all()->pluck('nombre','id');
        $coloresPiel = \App\Models\CatColorPiel::all()->pluck('nombre','id');
        $coloresCuerpo = \App\Models\CatColoresCuerpo::all()->pluck('nombre','id');
        $subParticularidades = \App\Models\CatSubParticularidades::all()->pluck('nombre','id');
        $subModificaciones = \App\Models\CatSubModificaciones::all()->pluck('nombre','id');


        return view('descripcionfisica.form_descripcion_fisica',
            [
                'desaparecido' => $desaparecido,
                'complexiones' => $complexiones,
                'coloresPiel' => $coloresPiel,
                'coloresCuerpo' => $coloresCuerpo,
                'particularidades' => $subParticularidades,
                'modificaciones' => $subModificaciones,
                'partesCuerpo' => $partesCuerpo,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getParticularidades($idParteCuerpo){
         $particularidades = \DB::table('cat_partes_cuerpo as cpartes')
                            ->join('cat_particularidades_cuerpo as cparti','cpartes.id','=','cparti.idPartesCuerpo' )
                            ->join('cat_sub_particularidades as csubp','cparti.id','=','csubp.idParticularidadesCuerpo')
                            ->select('csubp.nombre as nombre','csubp.id as id')
                            ->where('cparti.idPartesCuerpo',$idParteCuerpo)
                            ->get();
            return response()->json($particularidades);
    }

    public function getModificaciones($idParteCuerpo){
         $modificaciones = \DB::table('cat_partes_cuerpo as cpartes')
                            ->join('cat_modificaciones_cuerpo as cmodi','cpartes.id','=','cmodi.idPartesCuerpo' )
                            ->join('cat_sub_modificaciones as csubm','cmodi.id','=','csubm.idModificacionesCuerpo')
                            ->select('csubm.nombre as nombre','csubm.id as id')
                            ->where('cmodi.idPartesCuerpo',$idParteCuerpo)
                            ->get();
            return response()->json($modificaciones);
    }

    public function getColoresCuerpo($idParteCuerpo){
        $coloresCuerpo = \DB::table('cat_partes_cuerpo as cpartes')
                            ->join('cat_colores_cuerpo as ccuerpo','cpartes.id','=','ccuerpo.idPartesCuerpo' )
                            ->select('ccuerpo.nombre as nombre','ccuerpo.id as id')
                            ->where('ccuerpo.idPartesCuerpo',$idParteCuerpo)
                            ->get();

            return response()->json($coloresCuerpo);
    }

    public function getPartesCuerpo($idExtraviado){

        $partes = \DB::table('cedula_partes_cuerpo as cedup')
                    ->join('cat_partes_cuerpo as cpartes','cedup.idPartesCuerpo','=','cpartes.id')
                    ->join('cat_colores_cuerpo as ccuerpo','cedup.idColoresCuerpo','=','ccuerpo.id')
                    ->join('pivot_subparti_cuerpo as pivotparti','cedup.id','=','pivotparti.idCedulaPartesCuerpo')
                    ->join('cat_sub_particularidades as parti','pivotparti.idSubParticularidades','=','parti.id')
                    ->join('pivot_submodi_cuerpo as pivotmodi','cedup.id','=','pivotmodi.idCedulaPartesCuerpo')
                    ->join('cat_sub_modificaciones as modi','pivotmodi.idSubModificaciones','=','modi.id')
                    ->select('cpartes.nombre as nombreParteC','cedup.lado as lado','parti.nombre as particularidad','modi.nombre as modifiacion','cedup.observaciones as observaciones')
                    ->where('cedup.idPersonaDesaparecida',$idExtraviado)
                    ->get();

            return response()->json($partes);
    }
}
