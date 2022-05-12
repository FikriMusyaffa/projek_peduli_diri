@extends('layouts.master')

@section('title', 'Edit Data')
    
@section('section-header-name', 'Edit Data Perjalanan')

@section('card-title', 'Silahkan isi kembali formulir dibawah ini dengan data perjalanan anda')

@section('card-content')
    <form method="POST" action="/simpanEdit" class="needs-validation" novalidate>
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $data->id }}">
        <input type="hidden" name="id_user" value="{{ $data->id_user }}">

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input id="tanggal" type="date" class="form-control" value="{{ $data->tanggal }}" name="tanggal" max="{{ date('Y-m-d') }}" required>
            <div class="invalid-feedback">
              Tolong isi dengan benar tanggal perjalanan anda 
          </div>
        </div>

        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="time" id="jam" value="{{ $data->jam }}" class="form-control" name="jam" required>
            <div class="invalid-feedback">
              Tolong isi dengan benar waktu perjalanan anda 
          </div>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" class="form-control" value="{{ $data ->lokasi }}" name="lokasi" id="lokasi" placeholder="Lokasi yang dikunjungi" required>
            <div class="invalid-feedback">
              Tolong isi dengan benar lokasi perjalanan anda 
          </div>
        </div>

        <div class="form-group">
            <label for="suhu">Suhu</label>
            <div class="input-group has-validation">
                <input type="number" class="form-control" value="{{ $data->suhu }}" id="suhu" name="suhu" onkeypress="if(this.value.length==2) return false;" placeholder="Misal 35℃" min="32" max="39" required>
                <div class="input-group-append">
                    <span class="input-group-text">℃</span>
                </div>
                <div class="invalid-feedback">
                  Tolong isi dengan benar suhu anda 
              </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button class="btn btn-success mr-3" type="submit">Simpan</button>
            <button class="btn btn-danger" type="reset">Reset</button>
        </div>
    </form>

      <script>
        $('#toggle-modal-1').fireModal({
          title: 'Konfirmasi simpan data',
          body: 'Apakah anda yakin data yang telah diisi benar ?',
          buttons: [
            {
              text: 'Iya',
              class: 'btn btn-success',
              handler: function() {

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
      </script>
@endsection
