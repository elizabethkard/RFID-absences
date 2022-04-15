<?php 
      include "config.php";
      
      //INSERT SERVER
          if (isset($_POST['submit'])) {
            $hari = $_POST['hari'];
            $id_pelajaran = $_POST['id_pelajaran'];
            $jam_mulai = $_POST['jam_mulai'];
            $jam_selesai = $_POST['jam_selesai'];
            

          $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tabel_pelajaran WHERE id_pelajaran='$id_pelajaran'"));

          if ($cek > 0){
          echo "<script>window.alert('ID Pelajaran yang anda masukkan sudah ada')
          window.location='form_pelajaran.php'</script>";
          }else {
            mysqli_query($conn,"INSERT INTO tabel_pelajaran (hari, id_pelajaran, jam_mulai, jam_selesai) VALUES ('$hari','$id_pelajaran', '$jam_mulai', 
              '$jam_selesai')");
 
        echo "<script>window.alert('Data Berhasil ditambahkan')
        document.location.href = 'pelajaran.php'</script>";
            }
          }

          //EDIT SERVER
          if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $hari = $_POST['hari'];
            $id_pelajaran = $_POST['id_pelajaran'];
            $jam_mulai = $_POST['jam_mulai'];
            $jam_selesai = $_POST['jam_selesai'];

          

        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pelajaran WHERE id_pelajaran='$id_pelajaran'"));

                  if ($cek > 0){
                    mysqli_query($conn, "UPDATE pelajaran set id_pelajaran = '$id_pelajaran' where id='$id'");
                  echo "<script>window.alert('ID Pelajaran yang anda masukan sudah ada')
                  window.location='pelajaran.php'</script>";
                  }else {
                    mysqli_query($conn, "UPDATE pelajaran set id_pelajaran='$id_pelajaran', hari = '$hari' where id='$id'");
                    echo "<script>
                    alert('Data berhasil diupdate!');
                    document.location.href = 'pelajaran.php'
                </script>"; 
            }
        }


          //DELETE SERVER
          if( isset($_GET['id']) ){

        // ambil id dari query string
        $id = $_GET['id'];

        // buat query hapus
        $sql = "UPDATE  pelajaran SET deleted = '1' WHERE id=$id";
        $query = mysqli_query($conn, $sql);

        // apakah query hapus berhasil?
        if( $query ){
            echo "<script>
            alert('Data berhasil dihapus!');
            document.location.href = 'pelajaran.php'
        </script>"; 

        } else {
            echo "<script>
            alert('Data Gagal dihapus!');
            document.location.href = 'pelajaran.php'
        </script>"; 
        }

    } else {
        die("akses dilarang...");
    }
       ?>
