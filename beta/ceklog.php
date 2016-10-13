<?php
	include"data.php";

	$pass=md5($_POST['password']);
	$user=$_POST['username'];

	$sql=mysql_query("select * from user where id='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
	
	if($count>0){		
		session_start();
			$_SESSION['nama']=$rs['nama'];
			$_SESSION['pref']=$rs['privilage'];
			$_SESSION['idsk']=$rs['idsk'];
		if ($rs['privilage']=='tpi') {
			header('location:modul.php?isi=awal');
		}
		if ($rs['privilage']=='admin') {
			header('location:modul.php?isi=prof_mar');
		}					
			
	} 
	else{
		echo"<center><h2>username atau password anda salah.</h2><br>
				<a href=login.php><b>Ulangi Lagi</b></a></center>
				<a href=index.php><b>Kembali</b></a></center>";	
	}
?>