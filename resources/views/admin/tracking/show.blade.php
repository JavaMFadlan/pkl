@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
<main>
<div class="mt-4"></div>
    <div class="container-fluid">
        <div class="row justify-content-center m-auto">
            <div class="col-md-10">
                <div class="card border-danger">
                    <div class="card-body">
                        <div class="row">
                        <div class="col">
                            @livewire('kasus', ['idt' => $tracking->id, 'idrw' => $tracking->id_rw, 'cek' => 1])
                        </div>
                        <div class="col">
                            <div class=" mr-auto">
                                <div class="form-group">
                                    <label for="">positif</label>
                                    <input type="number" name="positif" class="form-control" disabled value="{{$tracking->positif}}">
                                </div>
                            </div>
                            <div class=" mr-auto">
                                <div class="form-group">
                                    <label for="">sembuh</label>
                                    <input type="number" name="sembuh" class="form-control" disabled value="{{$tracking->sembuh}}">
                                </div>
                            </div>
                            <div class=" mr-auto">
                                <div class="form-group">
                                    <label for="">meninggal</label>
                                    <input type="number" name="meninggal" class="form-control" disabled value="{{$tracking->meninggal}}">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <a role="button" class="btn btn-danger" href="{{ url()->previous() }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>
<main>
@endsection