@extends('layouts.admin_template')

@section('title')
<title>OtoRentCar | Driver</title>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
@endsection

@section('active_driver')
active
@endsection

@section('content_header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
              <li class="breadcrumb-item">Driver</li>
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
                <h3 class="card-title">Data Pusat Driver</h3>
                @include('admin.driver.create')
                <button type="button" class="d-inline float-right btn btn-success" data-toggle="modal"
                  data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="driver_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th class="text-center w-13p">No.</th>
                    <th class="text-center w-13p">Nama Driver</th>
                    <th class="text-center w-13p">Usia Driver</th>
                    <th class="text-center w-13p">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($num=0)
                    @foreach($driver as $drivers)
                        @php($num++)
                    <tr>
                        <td class="text-center w-13p">{{ $num }}</td>
                        <td>{{ $drivers->name }}</td>
                        <td>{{ $drivers->age }}</td>
                        <td class="text-center w-13p">
                            @if(Auth::user()->role->name == 'admin')
                            <a href="/driver/update/{{ $drivers->id }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <form class="d-inline"
                                  action="{{route('driver.destroy', $drivers->id)}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                                <input type="text" hidden name="id" value="{{$drivers->id}}">
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
                    <th class="text-center w-13p">Nama Driver</th>
                    <th class="text-center w-13p">Usia Driver</th>
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
    $("#driver_table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#driver_table_wrapper .col-md-6:eq(0)');
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