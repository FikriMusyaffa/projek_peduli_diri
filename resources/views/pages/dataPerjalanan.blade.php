@extends('layouts.master')

@section('section-header-name', "Tables")

@section('card-title', "Member")

@section('card-content')

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Lokasi</th>
        <th scope="col">Suhu</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dataPerjalanan as $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->tanggal }}</td>
        <td>{{ $item->lokasi }}</td>
        <td>{{ $item->suhu }}</td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
  
@endsection