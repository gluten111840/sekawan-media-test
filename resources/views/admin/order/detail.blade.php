@extends('layouts/admin_template')

@section('title')
<title>OtoRentCar | Detail Order - {{ $order->name }}</title>
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
                    <h5 class="card-title">Detail Order - {{ $order->name }}</h5>
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

                <div class="card-body">
                    <div class="">

                        <div class="form-group row">
                            <label style="font-weight:bold;" for="no_pesanan"
                                   class="col-md-4 text-md-right">{{ ('Nomor Pesanan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="no_pesanan"
                                       class="col-md-5 text-md-left">{{ $order->no_pesanan }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="name"
                                   class="col-md-4 text-md-right">{{ ('Nama Pesanan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="name"
                                       class="col-md-5 text-md-left">{{ $order->name }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="start_date"
                                   class="col-md-4 text-md-right">{{ ('Tanggal Pesan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="start_date"
                                       class="col-md-5 text-md-left">{{ $order->start_date }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="end_date"
                                   class="col-md-4 text-md-right">{{ ('Kedaluwarsa Pesanan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="end_date"
                                       class="col-md-5 text-md-left">{{ $order->end_date }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="driver"
                                   class="col-md-4 text-md-right">{{ ('Nama Driver') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="driver"
                                       class="col-md-5 text-md-left">{{ $order->driver }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="vehicle"
                                   class="col-md-4 text-md-right">{{ ('Kendaraan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="vehicle"
                                       class="col-md-5 text-md-left">{{ $order->vehicle }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="deskripsi"
                                   class="col-md-4 text-md-right">{{ ('Deskripsi') }}</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control" name="deskripsi"
                                          readonly>{!! $order->description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="user"
                                   class="col-md-4 text-md-right">{{ ('Persetujuan Oleh') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="user"
                                       class="col-md-5 text-md-left">
                                    {{ $order->user }}
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label style="font-weight:bold;" for="user"
                                   class="col-md-4 text-md-right">{{ ('Status Pemesanan') }}</label>
                            <div class="col-md-6">
                                <label style="font-weight:bold;" for="user"
                                       class="col-md-5 text-md-left">
                                       @if($order->status == 'created')
                                       <h4><span class="badge badge-primary">{{ $order->status }}</span></h4>
                                        @elseif($order->status == 'accepted')
                                        <h4><span class="badge badge-success">{{ $order->status }}</span></h4>
                                        @elseif($order->status == 'rejected')
                                        <h4><span class="badge badge-danger">{{ $order->status }}</span></h4>
                                        @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
