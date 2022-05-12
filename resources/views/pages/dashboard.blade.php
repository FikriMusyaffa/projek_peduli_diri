@extends('layouts.master')

@section('title', 'Dashboard')

@section('section-header-name', 'Dashboard')

@section('content')

@if (session('login-berhasil'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('login-berhasil') }}
        </div>
    </div>
@endif

<div class="row">
    {{-- Hero Card --}}
    <div class="col-12 mb-4">
        <div class="hero text-white bg-success">
            <div class="hero-inner">
                <h2>Selamat Datang, 
                    @if (!empty(auth()->user()->name))
                        {{ auth()->user()->name }}
                    @else
                        User
                    @endif !</h2>
                <p class="lead">Website <span style="font-weight: bold">Peduli Diri</span> ini dapat digunakan untuk menyimpan data perjalanan anda. Di dalam data perjalanan ini berisi 
                    tanggal perjalanan, waktu mengunjungi lokasi, lokasi yang dikunjungi, serta suhu tubuh saat mengunjungi lokasi.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-around">
    {{-- Article Component --}}
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article shadow">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/form.svg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a class="text-decoration-none">Input Data Perjalanan</a></h2>
                        </div>
                        <p>Isi form untuk menyimpan data perjalanan anda.</p>
                        <div class="article-cta">
                            <a href="/input-data-perjalanan" class="btn btn-primary">Input Data</a>
                        </div>
                    </div>
            </article>
        </div>

    {{-- Article Component --}}
        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
            <article class="article shadow">
                    <div class="article-header">
                        <div class="article-image" data-background="../assets/img/table.svg">
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a class="text-decoration-none">Tabel Data Perjalanan</a></h2>
                        </div>
                        <p>Lihat semua data perjalanan yang telah disimpan.</p>
                        <div class="article-cta">
                            <a href="/tabel-data-perjalanan" class="btn btn-primary">Lihat Data</a>
                        </div>
                    </div>
            </article>
        </div>
    </div>
@endsection
