@extends('layouts/admin_template')

@section('title')
<title>Nickelity | Update Driver - {{ $driver->name }}</title>
@endsection

@section('active_order')
active
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="../" class="btn btn-danger float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <h5 class="card-title">Update Driver - {{ $driver->name }}</h5>
                </div>
                <style>
                    .w-10p {
                        width: 10% !important;
                    }

                    #mapid2 {
                        width: 650px;
                        height: 360px;
                        margin: auto;
                        padding: 10px;
                    }

                    .display-image {
                        justify-content: center;
                    }


                </style>
            <form action="{{ route('driver.update', $driver->id) }}" method="POST">
            {{ csrf_field() }}
                <div class="card-body">
                    <div class="">

                        <div class="form-group row">
                            <label style="font-weight:bold;" for="name"
                                   class="col-md-4 text-md-right">{{ ('Nama Driver') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required
                                    oninvalid="this.setCustomValidity('Data belum terisi')"
                                    oninput="setCustomValidity('')" value="{{ $driver->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="age"
                                   class="col-md-4 text-md-right">{{ ('Usia Driver') }}</label>
                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control" name="age" required
                                    oninvalid="this.setCustomValidity('Data belum terisi')"
                                    oninput="setCustomValidity('')" value="{{ $driver->age }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Kirim</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
@endsection