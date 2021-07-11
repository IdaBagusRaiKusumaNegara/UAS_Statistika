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
                            <h1>Data Chikuadrat</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Data Chikuadrat</li>
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
                    <h3 style="text-align:center">Tabel Data Chikuadrat</h3>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rentangan</th>
                                    <th>f0</th>
                                    <th>Batas Bawah Kelas</th>
                                    <th>Batas Atas Kelas</th>
                                    <th>Batas Bawah Z</th>
                                    <th>Batas Atas Z</th>
                                    <th>Z Tabel Bawah</th>
                                    <th>Z Tabel Atas</th>
                                    <th>L/Proporsi</th>
                                    <th>L*N (fe)</th>
                                    <th>(f0-fe)^2/fe</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $kelas; $i++) <tr>
                                    <td> {{ $data[$i] }}</td>
                                    <td> {{ $frekuensi[$i] }}</td>
                                    <td> {{ $batasBawahBaru[$i] }}</td>
                                    <td> {{ $batasAtasBaru[$i] }}</td>
                                    <td> {{ $zBawah[$i] }}</td>
                                    <td> {{ $zAtas[$i] }}</td>
                                    <td> {{ $zTabelBawahFix[$i] }}</td>
                                    <td> {{ $zTabelAtasFix[$i] }}</td>
                                    <td> {{ $lprop[$i] }}</td>
                                    <td> {{ $fe[$i] }}</td>
                                    <td> {{ $kai[$i] }} </td>

                                    </tr>

                                    @endfor
                                    <tr>
                                        <th> Total: </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>{{ $totalchi }}</th>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">

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

</html>