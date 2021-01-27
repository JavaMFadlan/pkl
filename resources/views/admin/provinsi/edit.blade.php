@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
<main>
<div class="mt-4">  </div>
<div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-center">
                        <h3>Data provinsi</h3>
                    </div>
                    <form action="{{ route('provinsi.update',$provinsi->id)}}" method="post"> @method('PUT') @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">kode provinsi</label>
                                        <input type="number" name="kode" class="form-control" value="{{$provinsi->kode_prov}}" max="9999" required id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">nama provinsi</label>
                                        <input type="text" name="nama" class="form-control" value="{{$provinsi->nama_prov}}" required  id="">
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-lg btn-warning m-3 float-left" value="Edit">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection