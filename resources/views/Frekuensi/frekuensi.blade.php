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
                            <h1>Data Frekuensi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Data Frekuensi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <br>
                    <h3 style="text-align:center">Tabel Frekuensi</h3>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nilai</th>
                                    <th>Frekuensi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($frekuensi as $item)
                                <tr>
                                    <td> {{ $item->nilai }} </td>
                                    <td> {{ $item->frekuensi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

                    </div>
                </div>

                <div class="card">
                    <br>
                    <h3 style="text-align:center">Tabel Hasil Data</h3>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <tr>
                                <th>Nilai Maksimal </th>
                                <th>{{ $max }}</th>
                            </tr>
                            <tr>
                                <th>Nilai Minimal </th>
                                <th>{{ $min }}</th>
                            </tr>
                            <tr>
                                <th>Nilai Rata Rata </th>
                                <th>{{ $rata2 }}</th>
                            </tr>
                            <tr>
                                <th>Total Frekuensi </th>
                                <th>{{ $totalfrekuensi }}</th>
                            </tr>
                            <tr>
                                <th>Total nilai </th>
                                <th>{{ $totalnilai }}</th>
                            </tr>
                        </table>
                    </div>

                </div>
                <!-- /.card -->
                <!-- /.card -->

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

</html>