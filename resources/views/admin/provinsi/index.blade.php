@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="mt-4"></div>
                            @if (session('message1'))
                                <div class="alert alert-dismissible fade show alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session('message1')}}
                                </div>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-dismissible fade show alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {{session('message')}}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-dismissible fade show alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="{{ route('provinsi.create')}}" class="float-right btn btn-primary">
                                <i class="fas fa-plus"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Provinsi</th>
                                                <th>Nama Provinsi</th>
                                                <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($provinsi as $data)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$data->kode_prov}}</td>
                                                <td>{{$data->nama_prov}}</td>
                                                <td> 
                                                    <form action="{{ route('provinsi.destroy',$data->id)}}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <a href="{{route('provinsi.show',$data->id)}}" role="button" class="btn btn-success"> <i class="fas fa-eye"></i> </a>
                                                        <a href="{{route('provinsi.edit',$data->id)}}" role="button" class="btn btn-warning"> <i class="fas fa-edit"></i> </a>
                                                        <button class="btn btn-danger" type="submit" value=""><i class="fas fa-trash"></i>
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