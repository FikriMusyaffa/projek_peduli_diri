@extends('layouts.master')

@section('title', 'Input Data')

@section('section-header-name', 'Input Data Perjalanan')

@section('card-title', 'Silahkan isi formulir dibawah ini dengan data perjalanan anda')

@section('card-content')

    <form method="POST" action="/simpanPerjalanan" class="needs-validation">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input id="tanggal" type="date" class="form-control" name="tanggal" max="{{ date('Y-m-d') }}" required>
            <div class="invalid-feedback">
                Tolong isi dengan benar tanggal perjalanan anda
            </div>
        </div>

        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" id="jam" class="form-control" name="jam" required>
            <div class="invalid-feedback">
                Tolong isi dengan benar waktu perjalanan anda
            </div>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi yang dikunjungi"
                required>
            <div class="invalid-feedback">
                Tolong isi dengan benar lokasi perjalanan anda
            </div>
        </div>

        <div class="form-group">
            <label for="suhu">Suhu</label>
            <div class="input-group has-validation">
                <input type="number" class="form-control" id="suhu" name="suhu"
                    onkeypress="if(this.value.length==2) return false;" placeholder="misal 35℃" min="30" max="39" required>
                <div class="input-group-append">
                    <span class="input-group-text">℃</span>
                </div>
                <div class="invalid-feedback">
                    Tolong isi dengan benar suhu anda
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            {{-- <button class="btn btn-success mr-3" type="submit">Simpan</button> --}}
            <button name="submit-btn" class="btn btn-success mr-3" id="toggle-modal-1" type="button">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
    </form>

    <script>
        $('#toggle-modal-1').fireModal({
            title: 'Konfirmasi simpan data',
            body: 'Apakah anda yakin data yang diisi sudah benar ?',
            buttons: [{
                    text: 'Iya',
                    class: 'btn btn-success',
                    handler: () => {
                        $('form').submit();
                    }
                },
                {
                    text: 'Tidak',
                    class: 'btn btn-danger',
                    handler: function(current_modal) {
                        $.destroyModal(current_modal);
                    }
                }
            ]
        });
        // alert('Tolong isi data terlebih dahulu')
    </script>
@endsection
