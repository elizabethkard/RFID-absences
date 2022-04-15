<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {
            $rfid = $_POST['rfid'];
            $nama_siswa = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $kelas = $_POST['kelas'];
            $time = $_POST['time'];

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM userid WHERE rfid='$rfid'"));

          if ($cek > 0){
          echo "<script>window.alert('No RFID yang anda masukan sudah ada')
          window.location='form_siswa.php'</script>";
          }else {
          	mysqli_query($conn,"INSERT INTO userid (rfid, nama) VALUES ('$rfid','$nama')");
 
    		echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'siswa.php'</script>";
            }
          }

          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $rfid = $_POST['rfid'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $kelas = $_POST['kelas'];
            $time = $_POST['time'];

          

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM userid WHERE rfid='$rfid'"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE siswa set nama = '$nama' where id='$id'");
                  echo "<script>window.alert('ID Akun yang anda masukan sudah ada')
                  window.location='siswa.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE siswa set rfid='$rfid', nama = '$nama' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'siswa.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "UPDATE  userid SET deleted = '1' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'siswa.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'siswa.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
       ?>
