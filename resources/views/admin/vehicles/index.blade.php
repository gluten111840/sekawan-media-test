@extends('layouts.admin_template')

@section('title')
<title>Nickelity | Kendaraan</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
@endsection

@section('active_vehicle')
active
@endsection

@section('content_header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kendaraan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item">Kendaraan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pusat Kendaraan</h3>
                @include('admin.vehicles.create')
                <button type="button" class="d-inline float-right btn btn-success" data-toggle="modal"
                  data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="vehicle_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center w-13p">No.</th>
                    <th class="text-center w-13p">Nama Kendaraan</th>
                    <th class="text-center w-13p">Jenis Kendaraan</th>
                    <th class="text-center w-13p">Tanggal Service Terakhir</th>
                    <th class="text-center w-13p">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($num=0)
                    @foreach($vehicles as $vehicle)
                        @php($num++)
                    <tr>
                        <td class="text-center w-13p">{{ $num }}</td>
                        <td>{{ $vehicle->name }}</td>
                        <td>{{ $vehicle->type->name }}</td>
                        <td>{{ $vehicle->service_date }}</td>
                        <td class="text-center w-13p">
                            @if(Auth::user()->role->name == 'admin')
                            <form class="d-inline"
                                  action="{{route('vehicles.destroy', $vehicle->id)}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <input type="text" hidden name="id" value="{{$vehicle->id}}">
                                <button type="submit" class="btn btn-danger"
                                        onclick='return confirm("Apakah Anda yakin ingin menghapus data ini?")'>
                                        <i class="fa fa-trash"></i>
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
                    <th class="text-center w-13p">Nama Kendaraan</th>
                    <th class="text-center w-13p">Jenis Kendaraan</th>
                    <th class="text-center w-13p">Tanggal Service Terakhir</th>
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
    $("#vehicle_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#vehicle_table_wrapper .col-md-6:eq(0)');
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
    $('.modal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
    });

    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

</script>
@endsection