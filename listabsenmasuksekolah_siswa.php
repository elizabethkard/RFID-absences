<?php
SESSION_START();
include 'koneksi.php';
?>

<!DOCTYPE html>

<style type="text/css">

#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #1E90FF;
  color: white;
}

.gg-pen {
    box-sizing: border-box;
    position: relative;
    display: block;
    transform: rotate(-45deg) scale(var(--ggs,1));
    width: 14px;
    height: 4px;
    border-right: 2px solid transparent;
    box-shadow:
        0 0 0 2px,
        inset -2px 0 0;
    border-top-right-radius: 1px;
    border-bottom-right-radius: 1px;
    margin-right: -2px;
    top: 6px
}
.gg-pen::after,
.gg-pen::before {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute
}
.gg-pen::before {
    background: currentColor;
    border-left: 0;
    right: -6px;
    width: 3px;
    height: 4px;
    border-radius: 1px;
    top: 0
}
.gg-pen::after {
    width: 8px;
    height: 7px;
    border-top: 4px solid transparent;
    border-bottom: 4px solid transparent;
    border-right: 7px solid;
    left: -11px;
    top: -2px
}

.gg-trash {
    box-sizing: border-box;
    position: relative;
    display: block;
    transform: scale(var(--ggs,1));
    width: 10px;
    height: 12px;
    border: 2px solid transparent;
    box-shadow:
        0 0 0 2px,
        inset -2px 0 0,
        inset 2px 0 0;
    border-bottom-left-radius: 1px;
    border-bottom-right-radius: 1px;
    margin-top: 4px;
    left: 40px;
    top: -5px
}
.gg-trash::after,
.gg-trash::before {
    content: "";
    display: block;
    box-sizing: border-box;
    position: absolute
}
.gg-trash::after {
    background: currentColor;
    border-radius: 3px;
    width: 16px;
    height: 2px;
    top: -4px;
    left: -5px
}
.gg-trash::before {
    width: 10px;
    height: 4px;
    border: 2px solid;
    border-bottom: transparent;
    border-top-left-radius: 2px;
    border-top-right-radius: 2px;
    top: -7px;
    left: -2px
}

/*  INPUT TYPE SUBMIT */
input[type=submit] {
  background-color: blue;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: left;
}

input[type=submit]:hover {
  background-color: black;
  color: white
}

</style>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="dashboard_siswa.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Service</div>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Absen Sekolah
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listabsenmasuksekolah_siswa.php">List Absen Masuk Sekolah</a>
                                    <a class="nav-link" href="absenmasuksekolah_siswa.php">Absen Masuk Sekolah</a>
                                    <a class="nav-link" href="listabsenkeluarsekolah_siswa.php">List Absen Keluar Sekolah</a>
                                    <a class="nav-link" href="absenkeluarsekolah_siswa.php">Absen Keluar Sekolah</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Masuk Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="listabsenmasukkelas_siswa.php">List Absen Masuk Kelas</a>
                                    <a class="nav-link" href="absenmasukkelas_siswa.php">Absen Masuk Kelas</a>
                                </nav>
                            </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">

                        <h1 class="mt-4">List Absensi</h1>  
                </main>

                    <!-- main code php disini ya-->
                    <table id="customers">
                    <tr>
                        <th>No.</th>
                        <th>ID Siswa</th>
                        <th>Nama</th>
                        <th>Masuk Sekolah</th>
                    </tr>
 
                    <?php 
                        $no = 1;
                        $sql = mysqli_query($koneksi,"select * from masuksekolah inner join user on masuksekolah.username = user.username");
                        while($data = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['waktumasuk']; ?></td>
                                </tr>
                                <?php 
                            }
                            ?>

                </table>

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        </div>
                    </div>
                </footer>
            </div>
        </div> 
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
