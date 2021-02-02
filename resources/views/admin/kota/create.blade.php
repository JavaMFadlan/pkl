@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <div class="mt-4"></div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Menambah Data kota</h3>
                                    </div>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    <div class="card-body">
                                        <form action="{{route('kota.store')}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-5 mr-auto">
                                                    <div class="form-group">
                                                        <label for="">Nama kota</label>
                                                        <input type="text" name="nama" class="form-control" required id="">
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="">Kode kota</label>
                                                        <input type="number" name="kode" class="form-control" max="9999" required  id="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5 mx-auto">
                                                    <div class="form-group">
                                                        <label>nama Provinsi</label>
                                                        <select class="form-control" name="id_prov" id="">
                                                            @foreach ($provinsi as $data)
                                                                <option value="{{$data->id}}">{{$data->nama_prov}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" id="">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
@endsection