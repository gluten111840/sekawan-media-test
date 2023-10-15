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
                <h5 class="modal-title" id="exampleModalLabel">Kendaraan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group row">
                        <label for="judul"
                               class="col-md-4 col-form-label text-md-right">{{ ('Nama') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" required
                                   oninvalid="this.setCustomValidity('Data belum terisi')"
                                   oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="konten" class="col-md-4 col-form-label text-md-right">{{ ('Tipe Kendaraan') }}</label>
                        <div class="col-md-6">
                            <select name="type_id" id="type_id" class="form-control" required>
                                <option value="" disabled selected>Pilih tipe kendaraan</option>
                                <option value="1">Milik Perusahaan - Orang</option>
                                <option value="2">Milik Perusahaan - Barang</option>
                                <option value="3">Sewa - Orang</option>
                                <option value="4">Sewa - Barang</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tag"
                               class="col-md-4 col-form-label text-md-right">{{ ('Tanggal Terakhir Service') }}</label>
                        <div class="col-md-6">
                            <input id="service_date" type="date" class="form-control" name="service_date" required
                                   oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save!</button>
                </div>
            </form>
        </div>
    </div>
</div>
