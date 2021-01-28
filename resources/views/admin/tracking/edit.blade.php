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
                        <h3>Data tracking</h3>
                    </div>
                    <form action="{{ route('tracking.update',$tracking->id)}}" method="post"> @method('PUT') @csrf
                        <div class="card-body">
                            <div class="row">
                                    <div class="col">
                                        @livewire('kasus', ['idt' => $tracking->id, 'idrw' => $tracking->id_rw])
                                    </div>
                                    <div class="col">
                                        <div class=" mr-auto">
                                            <div class="form-group">
                                                <label for="">positif</label>
                                                <input type="number" max="9999" name="positif" class="form-control" required value="{{$tracking->positif}}">
                                            </div>
                                        </div>
                                        <div class=" mr-auto">
                                            <div class="form-group">
                                                <label for="">sembuh</label>
                                                <input type="number" max="9999" name="sembuh" class="form-control" required value="{{$tracking->sembuh}}">
                                            </div>
                                        </div>
                                        <div class=" mr-auto">
                                            <div class="form-group">
                                                <label for="">meninggal</label>
                                                <input type="number" max="9999" name="meninggal" class="form-control" required value="{{$tracking->meninggal}}">
                                            </div>
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