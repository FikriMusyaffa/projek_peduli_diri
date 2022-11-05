@extends('layouts.master')

@section('title', 'Data Perjalanan')

@section('section-header-name', 'Data Perjalanan')

@section('card-title', 'Berikut data perjalanan yang tersimpan')

@section('card-content')

    @if (session('alert-success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('alert-success') }}
            </div>
        </div>
    @endif

    @if (session('alert-danger'))
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('alert-danger') }}
            </div>
        </div>
    @endif

    @if (session('alert-info'))
        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ session('alert-info') }}
            </div>
        </div>
    @endif


    {{-- Kondisi jika data yang dicari tidak ditemukan --}}
    @if (count($data) < 1)
        <div class="text-center">
            <img alt="no result!" src="{{ asset('') }}assets/img/no-result.svg" width="150px">
            <h3>Data tidak ditemukan!</h3>
        </div>

        {{-- Kondisi jika data yang dicari ada --}}
    @else

        <body>
            <table class="table table-hover outline-dark">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">Tanggal</div>
                                <form action="/sortby" method="GET">
                                    @csrf
                                    <div class="d-flex flex-column">
                                        <button class="button" name="tanggalDesc" value="Desc" href="/sortby"
                                            title="Terbaru">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <button class=" button" name="tanggalAsc" value="Asc" href="/sortby"
                                            title="Terlama">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">Jam</div>
                                <form action="/sortby" method="GET">
                                    @csrf
                                    <div class="d-flex flex-column">
                                        <button class=" button" name="jamDesc" value="Desc" href="/sortby"
                                            title="PM-AM">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <button class=" button" name="jamAsc" value="Asc" href="/sortby"
                                            title="AM-PM">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </th>
                        <th scope="col">Lokasi
                        </th>
                        <th scope="col">
                            <div class="d-flex justify-content-between">
                                <div class="align-self-center">Suhu</div>
                                <form action="/sortby" method="GET">
                                    @csrf
                                    <div class="d-flex flex-column">
                                        <button class=" button" name="suhuDesc" value="Desc" href="/sortby"
                                            title="Tertinggi">
                                            <i class="fas fa-angle-up"></i>
                                        </button>
                                        <button class=" button" name="suhuAsc" value="Asc" href="/sortby"
                                            title="Terendah">
                                            <i class="fas fa-angle-down"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </th>
                        <th scope="col">
                            <div class="align-self-center">Aksi</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $peduli_diri)
                        <tr>
                            <th style="width: 25px" scope="row">
                                {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}</th>
                            <td>{{ $peduli_diri->tanggal }}</td>
                            <td>{{ $peduli_diri->jam }}</td>
                            <td style="width: 40%">{{ $peduli_diri->lokasi }}</td>
                            <td>{{ $peduli_diri->suhu }} ℃</td>

                            <td>
                                <div class="row">
                                    {{-- Edit Data --}}
                                    <form method="POST" action="/editData">
                                        @csrf
                                        <input id="id" type="hidden" class="form-control" name="id"
                                            value="{{ $peduli_diri->id }}" required>
                                        {{-- Button Edit Data --}}
                                        <button type="submit" class="btn btn-warning btn-icon icon-right mr-2"
                                            tabindex="3">Edit
                                            <i class="fas fa-edit"></i></button>
                                    </form>

                                    {{-- Button Delete --}}
                                    <button type="button" class="btn btn-danger" data-backdrop="false" data-toggle="modal"
                                        data-target="#delete-modal-{{ $peduli_diri->id }}">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>

                            {{-- Modal --}}
                            <div class="modal fade mt-5" id="delete-modal-{{ $peduli_diri->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                                            <button type="button" class="btn btn-close" data-dismiss="modal"
                                                aria-label="Close">x</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="POST" action="/hapusData">
                                                @csrf
                                                <input id="id" type="hidden" class="form-control" name="id"
                                                    value="{{ $peduli_diri->id }}" required>
                                                <button type="submit" name="delete" id="delete"
                                                    class="btn btn-danger btn-icon icon-right" tabindex="4">Hapus </button>
                                            </form>
                                            <button class="btn btn-primary" type="button" data-dismiss="modal">
                                                Batal
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @endif

    <div class="card-footer">
        <div class="row justify-content-between">
            <div class="col">
                <a href="/input-data-perjalanan" class="btn btn-primary">Isi data baru</a>
            </div>
            <div class="col ">
                <div class="pagination justify-content-end">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    </body>
    <style>
        .button {
            background-color: transparent;
            transition-duration: 0.3s;
            border: none;
            color: #666666;
        }

        .button:hover {
            background-color: #6777EF;
            /* background-color: #29D0F2; */
            color: white;
        }

        .button:focus {
            border: none;
            outline: none;
        }

    </style>
@endsection
