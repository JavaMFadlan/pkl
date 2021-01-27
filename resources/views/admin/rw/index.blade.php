@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="mt-4"></div>
                            @if (session('message1'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('message1')}}
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{session('message')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('rw.create')}}" class="float-right btn btn-primary">
                                Tambah Data
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode rw</th>
                                                <th>Nama rw</th>
                                                <th>Kelurahan</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($rw as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->kode_rw}}</td>
                                                <td>{{$data->nama_rw}}</td>
                                                <td>{{$data->kelurahan->nama_kel}}</td>
                                                <td> 
                                                    <form action="{{ route('rw.destroy',$data->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{route('rw.show',$data->id)}}" role="button" class="btn btn-success"> Lihat </a>
                                                        <a href="{{route('rw.edit',$data->id)}}" role="button" class="btn btn-warning"> Edit </a>
                                                        <input class="btn btn-danger" type="submit" value="Hapus">
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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