@include('layouts.styles')

{{-- Title tab browser --}}
<title>Register &mdash; Peduli Diri</title>
    
<body>
    <div id="app">
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        {{-- Logo Peduli diri --}}
                        <div class="login-brand">
                            <img src="../assets/img/peduli-diri-logo-with-name.svg" alt="logo" width="170">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                {{-- Form input data --}}
                                <form method="POST" action="/simpanUser" class="needs-validation" novalidate>
                                    {{ csrf_field() }}

                                    {{-- Textinput NIK --}}
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input id="nik" type="number" class="form-control" name="nik" tabindex="1" onkeypress="if(this.value.length==16) return false;" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" min="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Tolong isi dengan benar NIK anda
                                        </div>
                                    </div>

                                    {{-- Textinput Email --}}
                                    <div class="form-group">
                                        <label for="nik">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Tolong isi dengan benar Email anda
                                        </div>
                                    </div>

                                    {{-- Textinput Nama --}}
                                    <div class="form-group">
                                        <label for="name" class="control-label">Nama Lengkap</label>
                                        <input id="name" type="text" class="form-control" name="name" tabindex="2" required minlength="5" maxlength="35">
                                        <div class="invalid-feedback">
                                            Tolong isi dengan benar nama lengkap anda
                                        </div>
                                    </div>

                                    {{-- Button Submit --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                                <div class="mt-5 text-muted text-center">
                                    Sudah punya akun ? <a href="/login">Login</a>
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