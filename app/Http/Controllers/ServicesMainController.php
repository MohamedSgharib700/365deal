<?php

namespace App\Http\Controllers;

use App\ServicesMain;
use Illuminate\Http\Request;

class ServicesMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ServicesMain=ServicesMain::all()
       // $servicesMain->name()->where('id_lang','=',session()->get('langid'))->pluck('name')->first()
      // $servicesMain->classname()->where('weborapi','=',2)->pluck('className')->first()
      //$servicesMain->color()->pluck('color')->first()
      return view('',compact('ServicesMain'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicesMain  $servicesMain
     * @return \Illuminate\Http\Response
     */
    public function show(ServicesMain $servicesMain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServicesMain  $servicesMain
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicesMain $servicesMain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicesMain  $servicesMain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicesMain $servicesMain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicesMain  $servicesMain
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicesMain $servicesMain)
    {
        //
    }
}
