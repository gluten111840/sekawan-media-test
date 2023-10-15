<style>
    .modal-lg {
        max-width: 80%;
    }
</style>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Driver Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="judul"
                               class="col-md-4 col-form-label text-md-right">{{ ('Nomor Pesanan') }}</label>
                        <div class="col-md-6">
                            <input id="no_pesanan" type="text" class="form-control" name="no_pesanan" readonly
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')" value="{{ $no_pesanan }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="judul"
                               class="col-md-4 col-form-label text-md-right">{{ ('Nama Pesanan') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Tanggal Pesan') }}</label>
                        <div class="col-md-6">
                        <input id="start_date" type="date" class="form-control" name="start_date" required
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')">
                        <div id="start_date_message"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Kedaluwarsa Pesanan') }}</label>
                        <div class="col-md-6">
                        <input id="end_date" type="date" class="form-control" name="end_date" required
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')">
                        <div id="end_date_message"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Driver') }}</label>
                        <div class="col-md-6">
                        <select name="driver" id="driver" class="form-control" required>
                            <option value="" disabled selected>Pilih Driver</option>
                        @foreach($driver as $drivers)
                            <option value="{{ $drivers->id }}">{{ $drivers->name }}</option>
                        @endforeach
                        </select>
                        <div id="driver_availability"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Kendaraan') }}</label>
                        <div class="col-md-6">
                        <select name="vehicle" id="vehicle" class="form-control" required>
                            <option value="" disabled selected>Pilih Kendaraan</option>
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                        @endforeach
                        </select>
                        <div id="vehicle_availability"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Deskripsi Pesanan') }}</label>
                        <div class="col-md-6">
                        <textarea id="description" type="form-control" class="form-control" name="description"
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Persetujuan Oleh') }}</label>
                        <div class="col-md-6">
                        <select name="user" id="user" class="form-control" required>
                            <option value="" disabled selected>Pilih User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                        </div>
                    </div>
                        <select name="order_status_id" id="order_status_id" class="form-control" hidden>
                        @foreach($order_status as $order_status_id)
                            <option value="{{ $order_status_id->id }}" {{ $order_status_id->id == 1 ? 'selected' : '' }}>{{ $order_status_id->name }}</option>
                        @endforeach
                        </select>
                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="submit" type="submit" class="btn btn-primary">Save!</button>
                </div>
            </form>
        </div>
    </div>
</div>
