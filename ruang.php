<?php
require 'function.php';
require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ruang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Sistem Inventaris</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <!-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <<!-- ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <!-- <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul> --> -->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="barang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                                Barang
                            </a>
                            <a class="nav-link" href="ruang.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                                Ruang
                            </a>
                            <a class="nav-link" href="kategori.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="rekap.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-print"></i></div>
                                Rekap
                            </a>
                            <a class="nav-link" href="logout.php">
                                <!-- <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div> -->
                                Logout
                            </a>
                           
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ruang</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Ruang
                                  </button>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Ruang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                            <tbody>


                                                <?php 

                                                $ambilsemuadataruang = mysqli_query($conn,"select * from ruang");
                                                $i=1;
                                                while ($data=mysqli_fetch_array($ambilsemuadataruang)){
                                                        $idr = $data['idruang'];
                                                        $namaruang = $data['namaruang'];
                                                ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namaruang;?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idr;?>">
                                                        Edit
                                                    </button>
                                                   <input type="hidden" name="idruangyangmaudihapus" value="<?=$idr;?>">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$idr;?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                                
                                             <!-- Edit Modal -->
                                              <div class="modal fade" id="edit<?=$idr;?>">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                  
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Edit Ruang</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                      <label>Nama Ruang</label>
                                                      <input type="text" name="namaruang" value="<?=$namaruang;?>" class="form-control" required>
                                                      
                                                      <br>
                                                      <input type="hidden" name="idr" value="<?=$idr;?>">
                                                      <button type="submit" class="btn btn-primary" name="updateruang">Update</button>
                                                    </div>
                                                    </form>

                                                    </div>
                                                    </div>
                                                  </div>


                                                 <!-- Hapus Modal -->
                                              <div class="modal fade" id="hapus<?=$idr;?>">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                  
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">Hapus Ruang</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus Ruang <?=$namaruang;?> ?
                                                        <input type="hidden" name="idr" value="<?=$idr;?>">
                                                      <br>
                                                       <br>
                                                      <button type="submit" class="btn btn-danger" name="hapusruang">Hapus</button>
                                                    </div>
                                                    </form>
                                                    </div>
                                                    </div>
                                                  </div>


                                                <?php 
                                                };

                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </main> -->
               <!--  <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> -->
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

<!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Ruang</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
              <label>Ruang</label>
              <input type="text" name="namaruang" placeholder="Input Nama Ruang" class="form-control" required>
              
              <br>
              <button type="submit" class="btn btn-primary" name="addnewruang">Submit</button>
            </div>
            </form>

</html>
