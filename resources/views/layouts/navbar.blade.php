<div class="navbar-bg" style="background-color: #0A62A9"></div>
<nav class="navbar navbar-expand-lg main-navbar" style="background-color: ">

  {{-- Search Bar --}}
    <form class="form-inline mr-auto" method="GET" action="/cari">
      @csrf

      {{-- Sidebar Toggle --}}
      <li class="navbar-nav mr-3">
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
      </li>

      <div class="col-auto">
        {{-- Search Category Selector --}}
        <select onchange="searchSelector(this);" class="form-control form-select text-center rounded" type="search">
          <option value="lokasi">Lokasi</option>
          <option value="tanggal">Tanggal</option>
          <option value="jam">Jam</option>
          <option value="suhu">Suhu</option>
        </select>
      </div>

      <div class="col">
        {{-- Search Textinput Lokasi --}}
        {{-- <div class="search"></div> --}}
        <div class="form-group">
          <input required type="search" name="lokasi" id="lokasi" class="form-control" placeholder="Cari Lokasi..." aria-label="Search" data-width="250">
          <button class="btn btn-outline-info my-2 my-sm-0" id="lokasiBtn" style="margin-left: 5px" type="submit"><i class="fas fa-search"></i></button>
        </div>
        
        {{-- Search Textinput Tanggal --}}
        <div class="form-group">
          <input type="date" style="display: none;" name="tanggal" id="tanggal" class="form-control" aria-label="Search" data-width="250">
          <button class="btn btn-outline-info my-2 my-sm-0" id="tanggalBtn" style="display: none; margin-left: 5px" type="submit"><i class="fas fa-search"></i></button>
        </div>
        
        {{-- Search Textinput Jam --}}
        <div class="form-group">
          <input type="time" style="display: none;" name="jam" id="jam" class="form-control" aria-label="Search" data-width="250">
          <button class="btn btn-outline-info my-2 my-sm-0" id="jamBtn" style="display: none; margin-left: 5px" type="submit"><i class="fas fa-search"></i></button>
        </div>

        {{-- Search Textinput Suhu --}}
        <div class="form-group">
          <input type="number" style="display: none;" name="suhu" id="suhu" class="form-control" placeholder="Cari suhu..." aria-label="Search" data-width="250">
          <button class="btn btn-outline-info my-2 my-sm-0" id="suhuBtn" style="display: none; margin-left: 5px" type="submit"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>

    <ul class="navbar-nav navbar-right">
      
      {{-- Profile Dropdown--}}
      <li class="dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="{{ asset('') }}assets/img/avatar/avatar-1.png" class="rounded-circle mr-1 shadow" style="width: 46px">
          <div class="d-sm-none d-lg-inline-block"> 
            @if (!empty(auth()->user()->name))
            {{ auth()->user()->name }}
            @else
            User
            @endif
          </div>
        </a>

        {{-- Profile Dropdown Menu --}}
        <div class="dropdown-menu dropdown-menu-right">

          {{-- Dropdown item --}}
            {{-- <h5 class="text-center mt-2">{{ auth()->user()->name }}</h5> --}}
            <div class="dropdown-title">{{ auth()->user()->name }}</div>
            <div class="dropdown-title">NIK : {{ auth()->user()->email }}</div>

          {{-- Dropdown Logout --}}
          <div class="dropdown-divider"></div>
          <a href="logout" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>

  {{-- Logic Selector Search option --}}
  <script>
    function searchSelector(that) {
      if (that.value == "tanggal") {
        // Selected
        document.getElementById("tanggal").style.display = "block";
        document.getElementById("tanggal").required = true;
        document.getElementById("tanggalBtn").style.display = "block";
        
        document.getElementById("lokasi").style.display = "none";
        document.getElementById("lokasiBtn").style.display = "none";
        document.getElementById("lokasi").value = "";
        document.getElementById("lokasi").required = false;

        document.getElementById("jam").style.display = "none";
        document.getElementById("jamBtn").style.display = "none";
        document.getElementById("jam").value = "";
        document.getElementById("jam").required = false;

        document.getElementById("suhu").style.display = "none";
        document.getElementById("suhuBtn").style.display = "none";
        document.getElementById("suhu").value = "";
        document.getElementById("suhu").required = false;

      }else if (that.value == "jam") {
        document.getElementById("tanggal").style.display = "none";
        document.getElementById("tanggalBtn").style.display = "none";
        document.getElementById("tanggal").value = "";
        document.getElementById("tanggal").required = false;
        
        document.getElementById("lokasi").style.display = "none";
        document.getElementById("lokasiBtn").style.display = "none";
        document.getElementById("lokasi").value = "";
        document.getElementById("lokasi").required = false;

        // Selected
        document.getElementById("jam").style.display = "block";
        document.getElementById("jamBtn").style.display = "block";
        document.getElementById("jam").required = true;

        document.getElementById("suhu").style.display = "none";
        document.getElementById("suhuBtn").style.display = "none";
        document.getElementById("suhu").value = "";
        document.getElementById("suhu").required = false;

      }else if (that.value == "suhu") {
        document.getElementById("tanggal").style.display = "none";
        document.getElementById("tanggalBtn").style.display = "none";
        document.getElementById("tanggal").value = "";
        document.getElementById("tanggal").required = false;
        
        document.getElementById("lokasi").style.display = "none";
        document.getElementById("lokasiBtn").style.display = "none";
        document.getElementById("lokasi").value = "";
        document.getElementById("lokasi").required = false;

        document.getElementById("jam").style.display = "none";
        document.getElementById("jamBtn").style.display = "none";
        document.getElementById("jam").value = "";
        document.getElementById("jam").required = false;

        // Selected
        document.getElementById("suhu").style.display = "block";
        document.getElementById("suhuBtn").style.display = "block";
        document.getElementById("suhu").required = true;

      }else {
        document.getElementById("tanggal").style.display = "none";
        document.getElementById("tanggalBtn").style.display = "none";
        document.getElementById("tanggal").value = "";
        document.getElementById("tanggal").required = false;
        
        // Selected
        document.getElementById("lokasi").style.display = "block";
        document.getElementById("lokasiBtn").style.display = "block";
        document.getElementById("lokasi").required = true;

        document.getElementById("jam").style.display = "none";
        document.getElementById("jamBtn").style.display = "none";
        document.getElementById("jam").value = "";
        document.getElementById("jam").required = false;

        document.getElementById("suhu").style.display = "none";
        document.getElementById("suhuBtn").style.display = "none";
        document.getElementById("suhu").value = "";
        document.getElementById("suhu").required = false;
      }
    }
  </script>