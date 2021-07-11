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
                            <h1>Data Lilliefors</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Data Lilliefors</li>
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
                    <h3 style="text-align:center">Tabel Data Lilliefors</h3>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Yi</th>
                                    <th>Frekuensi</th>
                                    <th>Fkum</th>
                                    <th>Zi</th>
                                    <th>F(Zi)</th>
                                    <th>S(Zi)</th>
                                    <th>|F(Zi)-S(Zi)|</th>

                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $banyakData; $i++) <tr>
                                    <td> {{ $frekuensi[0][$i]->nilai}}</td>
                                    <td> {{ $frekuensi[0][$i]->frekuensi}}</td>
                                    <td> {{ $fkum2[$i] }}</td>
                                    <td> {{ $Zi[$i] }}</td>
                                    <td> {{ $fZi[$i] }}</td>
                                    <td> {{ $sZi[$i] }}</td>
                                    <td> {{ $lilliefors[$i] }}</td>
                                    </tr>
                                    @endfor
                                    <tr class="text-bold">
                                        <td>Total:</td>
                                        <td></td>
                                        <td>{{ $n }}</td>
                                        <td>{{ $n }}</td>
                                        <td></td>
                                        <td></td>
                                        <td> {{ $totalLillie }}</td>
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