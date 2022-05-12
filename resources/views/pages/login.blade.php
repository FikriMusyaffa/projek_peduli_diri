@include('layouts.styles')

{{-- Flash message jika login gagal --}}
@if (session('login-gagal'))
    <div class="alert alert-danger alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('login-gagal') }}
        </div>
    </div>

{{-- Flash message jika register berhasil --}}
@elseif (session('register-berhasil'))
    <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{ session('register-berhasil') }}
        </div>
    </div>    
@endif

{{-- Title tab di browser --}}
<title>Login &mdash; Peduli Diri</title>

<body>
    <div id="app"> 
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        {{-- Peduli Diri Logo --}}
                        <div class="login-brand">
                            {{-- <h5>Peduli Diri</h5> --}}
                            <img src="../assets/img/peduli-diri-logo-with-name.svg" alt="logo" width="170">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="/post-login" class="needs-validation" novalidate>
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="email">NIK</label>
                                        <input id="email" type="number" class="form-control" name="email" tabindex="1" pattern=".{16,}" onkeypress="if(this.value.length==16) return false;" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required autofocus>
                                        <input id="password" type="hidden" class="form-control" name="password"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Tolong isi dengan benar NIK anda 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Nama Lengkap</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="1"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Tolong isi dengan benar nama lengkap anda
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    Belum punya akun ? <a href="/register">Register</a>
                                </div>
                            </div>
                        </div>

                        <div class="simple-footer">
                            By Fikri Musyaffa Rasyid &mdash; XII RPL 1
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script>
    window.onload = function() {
        var src = document.getElementById("email"),
            dst = document.getElementById("password");
        src.addEventListener('input', function() {
            dst.value = src.value;
        });
    };
</script>
