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
        <nav class="navbar navbar-light bg-light mb-3">
            <a class="navbar-brand mx-3" style="color: rgb(89, 82, 194)" href="/dokter">
                <i class="fa fa-user-md"></i>
                &nbsp;
                <b>SPK Jantung Koroner</b>
            </a>
            <a style="color:white" class="btn btn-danger float-right" href="/logout">Logout</a>
        </nav>
        <h5 class="text-primary mx-5 my-2">Dokter</h5>
        <label id="categories" style="display: hidden">
            @php $categories @endphp
        </label>
        <div class="row mx-3">
            <div class="col-3">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <i class="fa fa-key mx-2"></i>
                    Aturan
                </a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <i class="fa fa-plus mx-2"></i>
                    Tambah Aturan
                </a>
              </div>
            </div>
            <div class="col-9">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="alert alert-primary m-2" role="alert">
                        List Aturan
                    </div>
                    <div class="card mx-2">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori 1</th>
                            <th scope="col">Kategori 2</th>
                            <th scope="col">Kategori 3</th>
                            <th scope="col">Kategori 4</th>
                            <th scope="col">Then</th>
                            <th scope="col">Tindakan</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($rule as $r)
                          <tr>
                            <td>{{$r['name']}}</td>
                            <td>{{$r['category1']}}</td>
                            <td>{{$r['category2']}}</td>
                            <td>{{$r['category3']}}</td>
                            <td>{{$r['category4']}}</td>
                            <td>{{$r['then']}}</td>
                            <td><a class="btn btn-danger" href="dokter/aturan/hapus/{{ $r['id'] }}">Hapus</a></td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="alert alert-primary m-2" role="alert">
                        Tambah Aturan Baru
                    </div>
                    <div class="card mx-2 p-3">
                  <form action="/dokter/aturan/tambah" method="post">
                    @csrf
                      <div class="row">
                      <input class="form-control mx-3 my-2" type="text" name="name" id="name" readonly value="R{{$rule[count($rule)-1]['id']+1}}">
                      </div>
                      <div class="row">
                        <div class="col">
                            <select class="custom-select my-2" name="var1" id="var1">
                            <option selected>Pilih Variable</option>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($variables as $variable)
                                <option value="{{ $i }}">{{ $variable->name }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                          </select>
                        </div>

                        <div class="col">
                          <select class="custom-select my-2" name="cat1" id="cat1">
                            <option selected>Pilih Category</option>
                          </select>
                        </div>

                      </div>
                      <div class="row">

                        <div class="col">
                          <select class="custom-select my-2" name="var2" id="var2">
                            <option selected>Pilih Variable</option>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($variables as $variable)
                                <option value="{{ $i }}">{{ $variable->name }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                          </select>
                        </div>

                        <div class="col">
                            <select class="custom-select my-2" name="cat2" id="cat2">
                                <option selected>Pilih Category</option>
                            </select>
                          </div>

                      </div>

                      <div class="row">
                        <div class="col">
                          <select class="custom-select my-2" name="var3" id="var3">
                            <option selected>Pilih Variable</option>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($variables as $variable)
                                <option value="{{ $i }}">{{ $variable->name }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                          </select>
                        </div>

                        <div class="col">
                            <select class="custom-select my-2" name="cat3" id="cat3">
                                <option selected>Pilih Category</option>
                            </select>
                          </div>
                      </div>

                      <div class="row">

                        <div class="col">
                          <select class="custom-select my-2" name="var4" id="var4">
                            <option selected>Pilih Variable</option>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($variables as $variable)
                                <option value="{{ $i }}">{{ $variable->name }}</option>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                          </select>
                        </div>

                        <div class="col">
                            <select class="custom-select my-2" name="cat4" id="cat4">
                                <option selected>Pilih Category</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group my-3">
                        <label for="exampleFormControlInput1">Hasil Tingkat Resiko</label>
                        <select class="custom-select" name="then">
                            <option value="TINGGI">TINGGI</option>
                            <option value="RENDAH">RENDAH</option>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary float-right">Tambah</button>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#resultModal').modal('show');
            });
        </script>
        <script>
          $(document).ready(function() {
                $("#var1").change(function(){
                    var selected = $(this). children("option:selected"). val();
                    var categories = $('#categories').text();
                    var categories = {!! json_encode($categories->toArray()) !!};

                    $( ".inner1" ).remove();
                    for(var i = 1; i <= 10; i++) {
                        if(selected == i) {
                            for(var j = 0; j < 25; j++) {
                                if(categories[j]['variable_id'] == i) {
                                    $( "#cat1" ).append( '<option class="inner1" value="' + categories[j]['id'] + '">' + categories[j]['name'] + '</option>' );
                                }
                            }
                        }
                    }
                });
                $("#var2").change(function(){
                    var selected = $(this). children("option:selected"). val();
                    var categories = $('#categories').text();
                    var categories = {!! json_encode($categories->toArray()) !!};
                    $( ".inner2" ).remove();
                    for(var i = 1; i <= 10; i++) {
                        if(selected == i) {
                            for(var j = 0; j < 25; j++) {
                                if(categories[j]['variable_id'] == i) {

                                console.log(categories[j]['variable_id']);
                                    $( "#cat2" ).append( '<option class="inner2" value="' + categories[j]['id'] + '">' + categories[j]['name'] + '</option>' );
                                }
                            }
                        }
                    }
                });
                $("#var3").change(function(){
                    var selected = $(this). children("option:selected"). val();
                    var categories = $('#categories').text();
                    var categories = {!! json_encode($categories->toArray()) !!};

                    $( ".inner3" ).remove();
                    for(var i = 1; i <= 10; i++) {
                        if(selected == i) {
                            for(var j = 0; j < 25; j++) {
                                if(categories[j]['variable_id'] == i) {
                                    $( "#cat3" ).append( '<option class="inner3" value="' + categories[j]['id'] + '">' + categories[j]['name'] + '</option>' );
                                }
                            }
                        }
                    }
                });
                $("#var4").change(function(){
                    var selected = $(this). children("option:selected"). val();
                    var categories = $('#categories').text();
                    var categories = {!! json_encode($categories->toArray()) !!};

                    $( ".inner4" ).remove();
                    for(var i = 1; i <= 10; i++) {
                        if(selected == i) {
                            for(var j = 0; j < 25; j++) {
                                if(categories[j]['variable_id'] == i) {
                                    $( "#cat4" ).append( '<option class="inner4 " value="' + categories[j]['id'] + '">' + categories[j]['name'] + '</option>' );
                                }
                            }
                        }
                    }
                });
            });
        </script>
        <!--  Chart js -->
    </body>
</html>
