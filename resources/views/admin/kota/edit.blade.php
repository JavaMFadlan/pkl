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
                        <h3>Data kota</h3>
                    </div>
                    <form action="{{ route('kota.update',$kota->id)}}" method="post"> @method('PUT') @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5 mr-auto">
                                    <div class="form-group">
                                        <label for="">kode kota</label>
                                        <input type="number" name="kode" class="form-control" value="{{$kota->kode_kota}}" max="9999" required id="">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">nama kota</label>
                                        <input type="text" name="nama" class="form-control" value="{{$kota->nama_kota}}" required  id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <div class="form-group">
                                        <label>nama provinsi</label>
                                        <select class="form-control" name="id_prov" id="">
                                            @foreach ($provinsi as $data)
                                                <option value="{{$data->id}}" <?= ($data->id == $kota->id)? 'selected' : ''?>>{{$data->nama_prov}}</option>
                                            @endforeach
                                        </select>
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