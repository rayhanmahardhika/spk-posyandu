<html class="no-js" lang="">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PosyonduAPP</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            </head>
            <body>
                @if(!empty($hasil) && $nilai == 0 )
            <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hasil Perhitungan SPK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Tingkat Resiko: {{ $hasil }}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
                </div>
            </div>
            @endif
            @if(!empty($nilai))
            <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Hasil Perhitungan SPK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        Tingkat Resiko: {{ $hasil }} dengan presentase {{ $nilai }}
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
                </div>
            </div>
            @endif
            <!-- Left Panel -->
            <aside id="left-panel" class="left-panel">
                <nav class="navbar navbar-expand-sm navbar-default">
                    <div id="main-menu" class="main-menu collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{{ url('/') }}">
                                    <i class="menu-icon fa fa-stethoscope"></i>
                                </i>Tingkat Resiko</a>
                        </li>
                        <li>
                            <a href="{{ url('/record') }}">
                                <i class="menu-icon fa fa-file-text-o"></i>Rekap Data Pasien</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
                </nav>
            </aside>
            <!-- /#left-panel -->
            <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-right">
                <div class="navbar-header">
                    <a class="navbar-brand" style="color: rgb(89, 82, 194)" href="./">
                        <i class="fa fa-user-md"></i>
                        &nbsp;
                        <b>SPK Jantung Koroner</b>
                    </a>
                    <!-- <a id="menuToggle" class="menutoggle">
                        <i class="fa fa-bars"></i>
                    </a> -->
                    <a class="btn btn-danger username float-right mt-2" href="/logout">
                        Logout
                    </a>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
        <!--  Traffic  -->
        <div class="row">
        <div class="col-lg-6">
        <div class="card">
        <div class="card-body">
        <h4 class="box-title">Data Lansia</h4>
        <br>
        <form method="post" action="/hitung">
        @csrf
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Nama</label>
        <div class="col-sm-8">
            <input type="text" name="nama" class="form-control" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Umur</label>
            <div class="col-sm-6">
                <input type="number" name="umur" class="form-control" required></div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-6">
                    <select class="form-control" name="kelamin" required>
                        <option value="laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Tinggi Badan</label>
                <div class="col-sm-6">
                    <input type="number" name="tinggi_badan" class="form-control" required>
                </div>
                <div class="col-sm-2">cm</div>
            </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Berat Badan</label>
                    <div class="col-sm-6">
                        <input type="number" name="berat_badan" class="form-control" required>
                    </div>
                    <div class="col-sm-2">kg</div>
                </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Tekanan Darah</label>
                        <div class="col-sm-6">
                            <input type="number" name="tekanan_sistolik" class="form-control" placeholder="Sistolik" required></div>
                    <div class="col-sm-2">mm</div></div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tekanan Darah</label>
                            <div class="col-sm-6">
                                <input type="number" name="tekanan_diastolik" class="form-control" placeholder="Diastolik" required></div>
                    <div class="col-sm-2">hg</div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Denyut Jantung</label>
                                <div class="col-sm-6">
                                    <input type="number" name="denyut_jantung" class="form-control" placeholder="" required></div>
                    <div class="col-sm-2">bpm</div>
                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Gula Darah</label>
                                    <div class="col-sm-6">
                                        <input type="number" name="gula_darah" class="form-control" placeholder="" required></div>
                    <div class="col-sm-2">mg/DL</div>
                </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Kolesterol</label>
                                        <div class="col-sm-6">
                                            <input type="number" name="kolesterol" class="form-control" placeholder="" required></div>
                    <div class="col-sm-2">mg/DL</div>
                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="box-title">Gaya Hidup Lansia</h4>
                                        <br>
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Olahraga</label>
                                                <div class="col-sm-4">
                                                    <input type="number" name="olahraga" class="form-control" required></div>
                    <div class="col-sm-4">kali / minggu</div>
                </div>
                                            </div>
                                                        <div class="form-group row ml-2">
                                                            <label class="col-sm-4 col-form-label">Makan Buah & Sayur</label>
                                                            <div class="col-sm-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" name="BuahRB" type="radio" value="Jarang" required>
                                                                        <label class="form-check-label">Jarang</label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <input class="form-check-input" name="BuahRB" type="radio" value="Kadang" required>
                                                                            <label class="form-check-label">Kadang</label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <input class="form-check-input" name="BuahRB" type="radio" value="Sering" required>
                                                                                <label class="form-check-label">Sering</label>
                                                                            </div>
                                                                            <div class="form-check form-check-inline">
                                                                                <input class="form-check-input" name="BuahRB" type="radio" value="Selalu" required>
                                                                                    <label class="form-check-label">Selalu</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row ml-2">
                                                                            <label class="col-sm-4 col-form-label">Stress</label>
                                                                            <div class="col-sm-8">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" name="StressRB" type="radio" value="Jarang" required>
                                                                                        <label class="form-check-label">Jarang</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input class="form-check-input" name="StressRB" type="radio" value="Kadang" required>
                                                                                            <label class="form-check-label">Kadang</label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-inline">
                                                                                            <input class="form-check-input" name="StressRB" type="radio" value="Sering" required>
                                                                                                <label class="form-check-label">Sering</label>
                                                                                            </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-grou p row ml-2">
                                                                                            <label class="col-sm-4 col-form-label">Merokok</label>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="form-check form-check-inline">
                                                                                                    <input class="form-check-input" name="MerokokRB" type="radio" value="Ya" required>
                                                                                                        <label class="form-check-label">Ya</label>
                                                                                                    </div>
                                                                                                    <div class="form-check form-check-inline">
                                                                                                        <input class="form-check-input" name="MerokokRB" type="radio" value="Tidak" required>
                                                                                                            <label class="form-check-label">Tidak</label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group row ml-2">
                                                                                                    <label class="col-sm-4 col-form-label">Mengkonsumsi Alkohol</label>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="form-check form-check-inline">
                                                                                                            <input class="form-check-input" name="AlkoholRB" type="radio" value="Ya" required>
                                                                                                                <label class="form-check-label">Ya</label>
                                                                                                            </div>
                                                                                                            <div class="form-check form-check-inline">
                                                                                                                <input class="form-check-input" name="AlkoholRB" type="radio" value="Tidak" required>
                                                                                                                    <label class="form-check-label">Tidak</label>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>
                                                                                                        <button type="submit" class="btn btn-primary my-2 mx-3">Hitung Tingkat Resiko</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="clearfix"></div>
                                                                                        <div class="col-lg-6"></div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
                                                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                                                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                                                                    <script>
                                                                        $(document).ready(function() {
                                                                            // console.log("aSU");
                                                                            $('#resultModal').modal('show');
                                                                        });
                                                                    </script>
                                                                    <!--  Chart js -->
                                                                </body>
                                                            </html>
