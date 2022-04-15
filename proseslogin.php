<?php 

SESSION_START();

include 'config.php';

$username = $_POST['username'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$sql = mysqli_query($koneksi, "select * from user where username='$username'");

$cek = mysqli_num_rows($sql);
 
// menghitung jumlah data yang ditemukan
if($cek > 0){

	$data = mysqli_fetch_assoc($sql);

	//cek user sebagai admin
	if($data['level']=="admin"){

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		//mengalihkan
		header("location:dashboard_admin.php");


	//cek user sebagai member
	}else if($data['level']=="siswa"){

		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		//mengalihkan
		header("location:dashboard_siswa.php");
	
	}
}
?>