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
                            <div class="col-md-5 mr-auto">
                                <div class="form-group">
                                    <label for="">kode Provinsi</label>
                                    <input type="number" name="kode" class="form-control" value="{{$provinsi->kode_prov}}" disabled>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">nama provinsi</label>
                                    <input type="text" name="nama" class="form-control" value="{{$provinsi->nama_prov}}" disabled>
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