@extends('layouts.admin_template')

@section('title')
<title>OtoRentCar | Pemesanan</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
@endsection

@section('content_header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pemesanan Kendaraan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item">Pemesanan Kendaraan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('active_order')
active
@endsection

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Riwayat Pemesanan Kendaraan</h3>
                @include('admin.order.create')
                @if(Auth::user()->role_id == '1')
                <button type="button" class="d-inline float-right btn btn-success" data-toggle="modal"
                  data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah
                </button>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="order_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center w-13p">No.</th>
                    <th class="text-center w-13p">Nomor Pesanan</th>
                    <th class="text-center w-13p">Driver</th>
                    <th class="text-center w-13p">Kendaraan</th>
                    <th class="text-center w-13p">Status</th>
                    <th class="text-center w-13p">Durasi Pesanan</th>
                    <th class="text-center w-13p">Persetujuan oleh</th>
                    <th class="text-center w-13p">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($num=0)
                    @foreach($order as $orders)
                        @php($num++)
                    <tr>
                        <td class="text-center w-13p">{{ $num }}</td>
                        <td>{{ $orders->no_pesanan }}</td>
                        <td>{{ $orders->driver }}</td>
                        <td>{{ $orders->vehicle }}</td>
                        <td class="text-center w-13p">
                            @if($orders->status == 'created')
                            <span class="badge badge-primary">{{ $orders->status }}</span>
                            @elseif($orders->status == 'accepted')
                            <span class="badge badge-success">{{ $orders->status }}</span>
                            @elseif($orders->status == 'rejected')
                            <span class="badge badge-danger">{{ $orders->status }}</span>
                            @endif
                        </td>
                        <td class="text-center w-13p">{{ $orders->start_date }} - {{ $orders->end_date }}</td>
                        <td class="text-center w-13p">{{ $orders->user }}</td>
                        <td class="text-center w-13p">
                            <a href="/order/detail/{{ $orders->id }}" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a>
                            @if(Auth::user()->role_id != '1')
                            <a href="/order/respon-akseptor/{{ $orders->id }}" class="btn btn-success"><i class="fa fa-pen"></i> Beri Respon</a>
                            @endif
                            @if(Auth::user()->role_id == '1')
                            <form class="d-inline"
                                  action="{{route('order.destroy', $orders->id)}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <input type="text" hidden name="id" value="{{$orders->id}}">
                                <button type="submit" class="btn btn-danger"
                                        onclick='return confirm("Apakah Anda yakin ingin menghapus data ini?")'>
                                        <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th class="text-center w-13p">No.</th>
                    <th class="text-center w-13p">Nama Pesanan</th>
                    <th class="text-center w-13p">Driver</th>
                    <th class="text-center w-13p">Kendaraan</th>
                    <th class="text-center w-13p">Status</th>
                    <th class="text-center w-13p">Durasi Pesanan</th>
                    <th class="text-center w-13p">Persetujuan oleh</th>
                    <th class="text-center w-13p">Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
<script src="{{ asset("bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/jszip/jszip.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/pdfmake/pdfmake.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/pdfmake/vfs_fonts.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>
<script>
  $(function () {
    $("#order_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#order_table_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
    // when the start_date is < than today, give a message
    $(document).ready(function () {
        $('#start_date').on('change', function () {
            let start_date = $(this).val();
            let today = new Date().toISOString().slice(0, 10);

            if (start_date < today) {
                $('#start_date_message').html('<span class="text-danger">Tanggal tidak valid</span>');
                $('#submit').prop('disabled', true);
            } else {
                $('#start_date_message').html('');
                $('#submit').prop('disabled', false);
            }
        });
    });
</script>
<script>
    // when the end_date < start_date, give a message
    $(document).ready(function () {
        $('#end_date').on('change', function () {
            let start_date = $('#start_date').val();
            let end_date = $(this).val();

            if (end_date < start_date) {
                $('#end_date_message').html('<span class="text-danger">Tanggal tidak valid</span>');
                $('#submit').prop('disabled', true);
            } else {
                $('#end_date_message').html('');
                $('#submit').prop('disabled', false);
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#vehicle').on('change', function () {
            let vehicle_id = $(this).val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();

            console.log(vehicle_id);
            console.log(start_date);
            console.log(end_date);

            $.ajax({
                url: "{{ route('order.check-vehicle') }}",
                method: 'PATCH',
                data: {
                    _token: "{{ csrf_token() }}",
                    vehicle_id: vehicle_id,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (response) {
                    console.log(response);
                    if (response['status'] == 'available') {
                        $('#vehicle_availability').html('<span class="text-success">Kendaraan tersedia</span>');
                        $('#submit').prop('disabled', false);
                    } else if (response == 'unavailable') {
                        $('#vehicle_availability').html('<span class="text-danger">Kendaraan tidak tersedia</span>');
                        $('#submit').prop('disabled', true);
                    } else {
                        $('#vehicle_availability').html('<span class="text-danger">Kendaraan tidak tersedia</span>');
                        $('#submit').prop('disabled', true);
                    }
                }
            });
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#driver').on('change', function () {
            let driver_id = $(this).val();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();

            console.log(driver_id);
            console.log(start_date);
            console.log(end_date);

            $.ajax({
                url: "{{ route('order.check-driver') }}",
                method: 'PATCH',
                data: {
                    _token: "{{ csrf_token() }}",
                    driver_id: driver_id,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (response) {
                    console.log(response);
                    if (response['status'] == 'available') {
                        $('#driver_availability').html('<span class="text-success">Driver tersedia</span>');
                        $('#submit').prop('disabled', false);
                    } else if (response == 'unavailable') {
                        $('#driver_availability').html('<span class="text-danger">Driver tidak tersedia</span>');
                        $('#submit').prop('disabled', true);
                    } else {
                        $('#driver_availability').html('<span class="text-danger">Driver tidak tersedia</span>');
                        $('#submit').prop('disabled', true);
                    }
                }
            });
        });
    });

</script>
<script>
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });

    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endsection