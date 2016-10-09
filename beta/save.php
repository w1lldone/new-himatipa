<?php
include 'config.php';
include 'data.php';

if ($_GET['act']=='input_slider') {
	$target_dir = "../img/sliders/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$nama=basename( $_FILES["fileToUpload"]["name"]);
			$gambar="img/sliders/".$nama;
			tambahUrut();
			mysql_query("INSERT INTO slider(urut,gambar, link, judul, subjudul, judul2)
				VALUES(
				'1',
				'$gambar',
				'$_POST[link]',
				'$_POST[judul]',
				'$_POST[subjudul]',
				'$_POST[judul2]')");
			echo "<script>window.alert('The file  $nama has been uploaded.');
			window.location=('modul.php?isi=slider-tabel')</script>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
// input slider

if ($_GET['act']=='edit_slider') {
	if (empty($_FILES["fileToUpload"]["name"])) {
		mysql_query("UPDATE slider set
			gambar='$_POST[lama]',
			link='$_POST[link]',
			judul='$_POST[judul]',
			subjudul='$_POST[subjudul]',
			judul2='$_POST[judul2]' where ids=$_POST[id]");
		echo "<script>window.alert('Slider diperbarui');
			window.location=('modul.php?isi=slider-tabel')</script>";

	} else{ //jika ada file

		$target_dir = "../img/sliders/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$nama=basename( $_FILES["fileToUpload"]["name"]);
			$gambar="img/sliders/".$nama;
			mysql_query("UPDATE slider set
			gambar='$gambar',
			link='$_POST[link]',
			judul='$_POST[judul]',
			subjudul='$_POST[subjudul]',
			judul2='$_POST[judul2]' where ids=$_POST[id]");
			echo "<script>window.alert('Slider diperbarui');
			window.location=('modul.php?isi=slider-tabel')</script>";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
} // edit slider

}

if ($_GET['act']=='matikan') {
	$start=hasil("select urut from slider where ids = $_GET[id] ");
	mysql_query("update slider set status = 0, urut = 0 where ids = $_GET[id]");
	kurangUrut($start);
	echo "<script>window.alert('Status berhasil dirubah');
			window.location=('modul.php?isi=slider-tabel')</script>";
}

if ($_GET['act']=='aktifkan') {
	tambahUrut();
	mysql_query("update slider set status = 1, urut = 1 where ids = $_GET[id]");
	echo "<script>window.alert('Status berhasil dirubah');
			window.location=('modul.php?isi=slider-tabel')</script>";
}

if ($_GET['act']=='hapuss') {
	$start=hasil("select urut from slider where ids = $_GET[id]");
	mysql_query("delete from slider where ids = $_GET[id]");
	if ($start!=0) {
		kurangUrut($start);
	}
	echo "<script>window.alert('Slider dihapus');
			window.location=('modul.php?isi=slider-tabel')</script>";
}

if ($_GET['act']=='slideup') {
	$id=$_GET['id'];
	$start=hasil("select urut from slider where ids = $id");
	$up=$start-1;
	$atas=hasil("select ids from slider where urut = $up");	
	mysql_query("update slider set urut = $start where ids = $atas ");
	mysql_query("update slider set urut = $up where ids = $id");
	echo "<script>window.location=('modul.php?isi=slider-tabel&change=$id')</script>";
}

if ($_GET['act']=='slidedown') {
	$id=$_GET['id'];
	$start=hasil("select urut from slider where ids = $id");
	$down=$start+1;
	$bawah=hasil("select ids from slider where urut = $down");	
	mysql_query("update slider set urut = $start where ids = $bawah ");
	mysql_query("update slider set urut = $down where ids = $id");
	echo "<script>window.location=('modul.php?isi=slider-tabel&change=$id')</script>";
}
?>