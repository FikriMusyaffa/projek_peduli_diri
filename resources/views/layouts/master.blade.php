@include('layouts.styles')

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title> @yield('title') &mdash; Peduli Diri</title>
</head>

<body>
    <div id="app">
        {{-- @include('layouts.alert') --}}
        <div class="main-wrapper">

            @include('layouts.navbar')
            @include('layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    <div class="section-header">
                        <h1>
                            {{-- Judul Section --}}
                            @yield('section-header-name')
                        </h1>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12">
                                @hasSection('card-content')
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>
                                                {{-- Judul Card --}}
                                                @yield('card-title')
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            {{-- Konten Card --}}
                                            @yield('card-content')
                                        </div>
                                    </div>
                                @else
                                    {{-- Konten tanpa card --}}
                                    @yield('content')
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    By Fikri Musyaffa Rasyid &mdash; XII RPL 1
                </div>
            </footer>
        </div>
    </div>
</body>
