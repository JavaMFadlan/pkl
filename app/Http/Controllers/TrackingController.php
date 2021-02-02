<?php

namespace App\Http\Controllers;

use App\tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tracking = tracking::with('rw')->get();
        return view('admin.tracking.index',compact('tracking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tracking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];  
        $this->validate($request, [
                    'id_rw' => 'required',
                    'sembuh' => "required",
                    'positif' => "required",
                    'meninggal' => "required"
        ], $messages
        );
        $tracking = new tracking();
        $tracking->id_rw = $request->id_rw;
        $tracking->sembuh = $request->sembuh;
        $tracking->positif = $request->positif;
        $tracking->meninggal = $request->meninggal;
        $tracking->tanggal = date('Y-m-d');
        $tracking->save();
        return redirect()->route('tracking.index')->with(['message' => 'Berhasil']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tracking = tracking::findorFail($id);
        return view('admin.tracking.show',compact('tracking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tracking = tracking::findorFail($id);
        return view('admin.tracking.edit',compact('tracking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
        ];  
        $this->validate($request, [
                    'id_rw' => 'required',
                    'sembuh' => "required",
                    'positif' => "required",
                    'meninggal' => "required"
        ], $messages
        );
        $tracking = tracking::findorFail($id);
        $tracking->id_rw = $request->id_rw;
        $tracking->sembuh = $request->sembuh;
        $tracking->positif = $request->positif;
        $tracking->meninggal = $request->meninggal;
        $tracking->update();
        return redirect()->route('tracking.index')->with(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tracking  $tracking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracking = tracking::findorfail($id)->delete();
        return redirect()->route('tracking.index')->with(['message1' => 'Data Berhasil Dihapus']);
    }
}
