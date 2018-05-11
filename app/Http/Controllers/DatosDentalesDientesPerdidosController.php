<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentadura;

class DatosDentalesDientesPerdidosController extends Controller
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
        $idDesaparecido = $request['idDesaparecido'];
        //dd($idDesaparecido);

        $dentadura = Dentadura::where('idDesaparecido',$idDesaparecido)->get();

        //dd($dentadura[0]['id']);

        $dientes = $request->input('idDiente');
        foreach ($request->input('causaPerdida') as $index => $value) {
            if (!empty($value)) {
                $dientesPer[] = array(
                                    'idDiente' => $dientes[$index],
                                    'causaPerdida' => $value,
                                    //'idDentadura' => $request->input('idDentadura')
                                    'idDentadura' => $dentadura[0]['id']
                                );
            }
        }

        //dd($debtadu1);
    
        \DB::table('pivot_diente_perdido')->insert($dientesPer);
        return response()->json('successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
