<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/template/dist/css/adminlte.min.css">
    <script src="<?= base_url(); ?>/template/dist/js/jquery-3.4.1.min.js"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a href="/auth/logout" class="btn btn-primary">Logout</a>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="../../index3.html" class="brand-link">
                <img src="<?= base_url(); ?>/template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a> -->

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url(); ?>/template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= session()->get('nama'); ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/dashboard" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/assesment" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Assesment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Welcome <?= session()->get('nama'); ?></h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header alert alert-warning">
                                <h3 class="card-title">Table Informasi User</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <a href="/assesment/create_assesment" class="btn btn-primary mb-3">Create Assesment</a>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= session()->getFlashdata('pesan'); ?>
                                    </div>
                                <?php endif; ?>
                                </br>
                                <table id="table_id" class="table table-bordered">
                                    <thead class="alert alert-warning">
                                        <tr>
                                            <th>Nama Kelas</th>
                                            <th>Periode</th>
                                            <th>Tipe Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kuis as $item) : ?>
                                            <tr>
                                                <td style="width: 30%"><?= $item->nama_kelas; ?></td>
                                                <td style="width: 25%"><?= $item->periode; ?></td>
                                                <td style="width: 20%"><?= $item->nama_metode ?></td>
                                                <td style="width: 40%">
                                                    <button class="btn btn-success" id="popup" data-toggle="modal" data-target="#modal_form" onclick="edit(<?php echo $item->id; ?>)"><i class="fa fa-edit"></i></button>
                                                    <!-- <button type="button" class="btn btn-success" id="btn-edit" data-toggle="modal" data-target="#modalUbah" data-id="" data-kelas="" data-periode="">
                                                        <i class="fa fa-edit"></i></button> -->
                                                    <?= csrf_field(); ?>
                                                    <!-- <form action="/dashboard/delete/" method="POST" class="d-inline">
                                                        <button type="hidden" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Di Hapus ?')"><i class="fa fa-trash"></i></button>
                                                    </form> <button type="button" class="btn btn-primary">Detail</button> -->
                                                    <button class="btn btn-danger" onclick="hapus(<?php echo $item->id; ?>)">Delete</button>
                                                    <button type="button" id="info" data-toggle="modal" data-target="#modal_detail" data-namakelas="<?= $item->nama_kelas; ?>" data-periode="<?= $item->periode; ?>" data-namametode="<?= $item->nama_metode; ?>" class="btn btn-primary">Detail</button>
                                                    <a href="<?= base_url('dashboard/report/' . $item->id) ?>" class="btn btn-info"><i class="fa fa-print"></i>Cetak</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="modal_form" role="dialog">
                        <div class=" modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/dashboard/update/" id="form">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group mb-0">
                                            <label for="nama_kelas">Nama Kelas</label>
                                            <input type="text" name="nama_kelas" id="nama_kelas" class="form-control namakelas" placeholder="Masukan Nama Kelas" value="">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="periode">Periode</label>
                                            <input type="number" name="periode" id="periode" class="form-control periode" placeholder="Masukan Periode" value="">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger tombol-tutup" data-dismiss="modal">Close</button>
                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal Edit-->

                    <!-- Modal Detail-->
                    <div class="modal fade" id="modal_detail" role="dialog">
                        <div class=" modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Metode</h5>
                                    <!-- <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"> -->
                                    <!-- <span aria-hidden="true">&times;</span> -->
                                    </button>
                                </div>
                                <div class="modal-body" id="bodymodal_userDetail">
                                    <table class="table table-bordered no-margin" id="info">
                                        <thead class="alert alert-warning">
                                            <tr>
                                                <th>Nama Kelas</th>
                                                <th>Periode</th>
                                                <th>Tipe Kelas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span id="namakelas"></span></td>
                                                <td><span id="tahun"></span></td>
                                                <td><span id="tipekelas"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger tombol-tutup" data-dismiss="modal">Close</button>

                                    <!-- <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Update</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- End Modal Detail-->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
            <strong>&copy; 2021-2022.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/template/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/template/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src=">/template/dist/js/demo.js"></script> -->

    <!-- <script src="/template/dist/js/script.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        // jQuery(window).on('load', function() {
        //     $('#modal_form').modal('show');
        // });
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
        var save_method; //for save method string
        var table;

        function edit(id) {
            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            <?php header('Content-type: application/json'); ?>
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/dashboard/ajax_edit') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    console.log(data);

                    $('[name="id"]').val(data.id);
                    $('[name="nama_kelas"]').val(data.nama_kelas);
                    $('[name="periode"]').val(data.periode);

                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    // $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    alert('Error get data from ajax');
                }
            });
        }

        function save() {

            // ajax adding data to database
            $.ajax({
                url: "<?php echo site_url('/dashboard/update') ?>",
                type: "POST",
                data: $('#form').serialize(),
                dataType: "JSON",
                success: function(data) {
                    //if success close modal and reload ajax table
                    $('#modal_form').modal('hide');
                    location.reload(); // for reload a page
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error adding / update data');
                }
            });
        }

        function hapus(id) {
            if (confirm('Apakah Yakin Ingin Dihapus?')) {
                // ajax delete data dari database
                $.ajax({
                    url: "<?php echo site_url('/dashboard/delete') ?>/" + id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error Hapus Data');
                    }
                });
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#info', function() {
                var namakelas = $(this).data('namakelas');
                var periode = $(this).data('periode');
                var namametode = $(this).data('namametode');
                $('#namakelas').text(namakelas);
                $('#tahun').text(periode);
                $('#tipekelas').text(namametode);
                // $('#modal-detail').modal('hide');
            })
        })
    </script>
    <!-- <script>
        $(document).ready(function() {
            $(document).on('click', '#btn-edit', function() {
                $('.modal-body #id-siswa').val($(this).data('id'));
                $('.modal-body #kelas').val($(this).data('kelas'));
                $('.modal-body #periode').val($(this).data('periode'))
            })
        })
    </script> -->
</body>

</html>