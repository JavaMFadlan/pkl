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
                                <a href="{{ route('kota.create')}}" class="float-right btn btn-primary">
                                <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode kota</th>
                                                <th>Nama kota</th>
                                                <th>Provinsi</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($kota as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->kode_kota}}</td>
                                                <td>{{$data->nama_kota}}</td>
                                                <td>{{$data->provinsi->nama_prov}}</td>
                                                <td> 
                                                    <form action="{{ route('kota.destroy',$data->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{route('kota.show',$data->id)}}" role="button" class="btn btn-success"> <i class="fas fa-eye"></i> </a>
                                                        <a href="{{route('kota.edit',$data->id)}}" role="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a>
                                                        <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>
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