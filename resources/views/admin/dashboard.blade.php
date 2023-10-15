@extends('layouts.admin_template')

@section('title')
<title>Nickelity | Dashboard</title>
@endsection

@section('styles')
<!-- fullCalendar -->
<link rel="stylesheet" href="{{ asset("bower_components/admin-lte/plugins/fullcalendar/main.css") }}">
@endsection

@section('content_header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Data Kendaraan</h3>
              </div>
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
              <a href="/vehicles" class="small-box-footer">
                Info selengkapnya <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Pemesanan</h3>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="/order" class="small-box-footer">
                Info selengkapnya <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Data Pengemudi</h3>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="/driver" class="small-box-footer">
                Info selengkapnya <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
</section>
@endsection

@section('scripts')
<script src="{{ asset("bower_components/admin-lte/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("bower_components/admin-lte/plugins/fullcalendar/main.js") }}"></script>
<script>
  $(function () {
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');
    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
    });
    calendar.render();
  })
</script>
@endsection