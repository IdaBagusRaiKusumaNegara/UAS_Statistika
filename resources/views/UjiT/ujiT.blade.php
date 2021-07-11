<!DOCTYPE html>
<html>

<head>
    @include('Template.head')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('Template.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Template.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Data Uji T</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Data Uji T</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Tabel Uji T</h3>
                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"
                            style="margin-left: 320px;"><i class="fas fa-file-upload"></i> Import Data</a>
                        <a href="{{ route('dataexport') }}" class="btn btn-success"><i class="fas fa-file-download"></i>
                            Expot Data</a>
                        <a href="{{ route('create-ujiT') }}" class="btn btn-primary"><i class="fas fa-plus-square"></i>
                            Tambah Data</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>X1</th>
                                    <th>X2</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <td> {{$item->id }} </td>
                                    <td> {{$item->x1 }} </td>
                                    <td> {{$item->x2 }} </td>
                                    <td>
                                        <a href="{{ url('edit-ujiT', $item->id) }}"><i class="fas fa-edit"
                                                style="color: gold;"></i></a>
                                        |
                                        <a href="#modalDelete" data-toggle="modal"
                                            onclick="$('#modalDelete #formDelete').attr('action','<?= url('delete-ujiT', $item->id) ?>')"><i
                                                class="fas fa-trash" style="color: red;"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card">
                    <br>
                    <h3 style="text-align:center">Hasil Uji T</h3>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th>Rata-rata X1</th>
                                <th>{{ number_format($rata2x1, 2) }}</th>
                            </tr>
                            <tr>
                                <th>Rata-rata X2</th>
                                <th>{{ number_format($rata2x2, 2) }}</th>
                            </tr>
                            <tr>
                                <th>Varians X1</th>
                                <th>{{ number_format($variansX1, 2) }}</th>
                            </tr>
                            <tr>
                                <th>Varians X2</th>
                                <th>{{ number_format($variansX2, 2) }}</th>
                            </tr>
                            <tr>
                                <th>Standar Deviasi X1</th>
                                <th>{{ $sdX1 }}</th>
                            </tr>
                            <tr>
                                <th>Standar Deviasi X2</th>
                                <th>{{ $sdX2 }}</th>
                            </tr>
                            <tr>
                                <th>Nilai Uji T</th>
                                <th> {{ $nilaiUjiT }}</th>
                            </tr>
                            <tr>
                                <th>T Tabel </th>
                                <th> {{ $TTabel }}</th>
                            </tr>
                            <tr>
                                <th>Status H0 </th>
                                <th> {{ $status }}</th>
                            </tr>
                        </table>
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            @include('Template.footer')
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('Template.script')
</body>

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Menghapus Data Ini?</p>
            </div>
            <form id="formDelete" action="" method="delete">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dataimport') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Selesai</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
        </div>
        </form>
    </div>
</div>

</html>