<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Billboard;
use Illuminate\Support\Facades\Input;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Billboard::all();
        return view('home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function billboardList()
    {
        $data=Billboard::all();
        return view ('billboardList',compact('data'));
    }

    public function create()
    {
        return view ('auth/addBillboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Billboard::create($request->all());
        $data=Billboard::all();
        return view('billboardList',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Billboard::findOrFail($id);
        // page1/1000 error 404 not found
        return view('billboardList',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data= Billboard::findOrFail($id);
        return view('auth/updateBillboard',compact('data'));
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
        // where id = $id
        $update=Billboard::findOrFail($id);

        // proses update data ke database
        $update->nama=Input::get('nama');
        $update->lokasi=Input::get('lokasi');
        $update->latitude=Input::get('latitude');
        $update->longitude=Input::get('longitude');
        $update->ukuran=Input::get('ukuran');
        $update->status=Input::get('status');
        $update->view=Input::get('view');
        $update->fasilitas=Input::get('fasilitas');
        // $update->gambar=Input::get('gambar');
        // save hasil input
        $update->save();
        return Redirect('billboardList');
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
