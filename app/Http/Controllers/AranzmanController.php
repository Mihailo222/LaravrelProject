<?php

namespace App\Http\Controllers;

use App\Models\Aranzman;
use Illuminate\Http\Request;

use App\Http\Resources\UserResource;
use App\Http\Resources\AranzmanResource;

use App\Http\Resources\AgencijaResource;

use Illuminate\Support\Facades\Validator;
class AranzmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aranzmani=Aranzman::all();
        return AranzmanResource::collection($aranzmani);
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
         $validator=Validator::make($request->all(),[
        'prevoz'=>'required|string|max:100',
        'destinacija'=>'required|string|max:100',
        'cena'=>'required',
        'br_mesta'=>'required',
        'agencija_id'=>'required',
        'datum'=>'required' ]);
      
        if($validator->fails())
              return response()->json($validator->errors());
  
  
            $user = $request->user();
       $aranzman=Aranzman::create([
  
          'prevoz'=>$request->prevoz,
          'destinacija'=>$request->destinacija,
          'cena'=>$request->cena,
          'br_mesta'=>$request->br_mesta,
          'datum'=>$request->datum,
          'agencija_id'=>$request->agencija_id,
           'user_id'=>$user->user_id
  
       ]);

       return response()->json(['Aranzman uspesno kreiran.', new AranzmanResource($aranzman)]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function show(Aranzman $aranzman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function edit(Aranzman $aranzman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aranzman $aranzman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aranzman  $aranzman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aranzman $aranzman)
    {
         return response()->json('Aranzman obrisan uspesno.');
    }
}
