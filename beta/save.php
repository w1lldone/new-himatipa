<?php
session_start();
if ($_SESSION['pref']=='admin') {

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
				tambahUrut("slider");
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
				link='$_POST[link]',
				judul='$_POST[judul]',
				subjudul='$_POST[subjudul]',
				judul2='$_POST[judul2]' where id=$_POST[id]");
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
						judul2='$_POST[judul2]' where id=$_POST[id]");
					echo "<script>window.alert('Slider diperbarui');
					window.location=('modul.php?isi=slider-tabel')</script>";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} 

	}// edit slider

	if ($_GET['act']=='matikan') {
		$start=hasil("select urut from slider where id = $_GET[id] ");
		mysql_query("update slider set status = 0, urut = 0 where id = $_GET[id]");
		kurangUrut("slider", $start);
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=slider-tabel')</script>";
	}

	if ($_GET['act']=='aktifkan') {
		tambahUrut("slider");
		mysql_query("update slider set status = 1, urut = 1 where id = $_GET[id]");
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=slider-tabel')</script>";
	}

	if ($_GET['act']=='hapuss') {
		$start=hasil("select urut from slider where id = $_GET[id]");
		$gambar=hasil("select gambar from slider where id = $_GET[id]");
		unlink("../$gambar");
		mysql_query("delete from slider where id = $_GET[id]");
		if ($start!=0) {
			kurangUrut("slider", $start);
		}
		echo "<script>window.alert('Slider dihapus');
				window.location=('modul.php?isi=slider-tabel')</script>";
	}

	if ($_GET['act']=='slideup') {
		$id=$_GET['id'];
		urutUp("slider", $id);
		echo "<script>window.location=('modul.php?isi=slider-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='slidedown') {
		$id=$_GET['id'];
		urutDown("slider", $id);
		echo "<script>window.location=('modul.php?isi=slider-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='input_event') {
		$target_dir = "../img/event/";
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
				$gambar="img/event/".$nama;
				tambahUrut("event");
				mysql_query("INSERT INTO event(urut, gambar, judul, subjudul, link)
					VALUES(
					'1',
					'$gambar',
					'$_POST[judul]',
					'$_POST[subjudul]',
					'$_POST[link]')");
				echo "<script>window.alert('The file $nama has been uploaded.');
				window.location=('modul.php?isi=event-tabel')</script>";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	} // input event

	if ($_GET['act']=='eventup') {
		$id=$_GET['id'];
		urutUp("event", $id);
		echo "<script>window.location=('modul.php?isi=event-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='eventdown') {
		$id=$_GET['id'];
		urutDown("event", $id);
		echo "<script>window.location=('modul.php?isi=event-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='mati_event') {
		$start=hasil("select urut from event where id = $_GET[id] ");
		mysql_query("update event set status = 0, urut = 0 where id = $_GET[id]");
		kurangUrut("event", $start);
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=event-tabel')</script>";
	}

	if ($_GET['act']=='aktif_event') {
		tambahUrut("event");
		mysql_query("update event set status = 1, urut = 1 where id = $_GET[id]");
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=event-tabel')</script>";
	}

	if ($_GET['act']=='hapus_event') {
		$start=hasil("select urut from event where id = $_GET[id]");
		$gambar=hasil("select gambar from event where id = $_GET[id]");
		unlink("../$gambar");
		mysql_query("delete from event where id = $_GET[id]");
		if ($start!=0) {
			kurangUrut("event", $start);
		}
		echo "<script>window.alert('event dihapus');
				window.location=('modul.php?isi=event-tabel')</script>";
	}

	if ($_GET['act']=='edit_event') {
		if (empty($_FILES["fileToUpload"]["name"])) {
			mysql_query("UPDATE event set
				link='$_POST[link]',
				judul='$_POST[judul]',
				subjudul='$_POST[subjudul]' where id=$_POST[id]");
			echo "<script>window.alert('Slider diperbarui');
			window.location=('modul.php?isi=event-tabel')</script>";

		} else{ //jika ada file

			$target_dir = "../img/event/";
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
					$gambar="img/event/".$nama;
					mysql_query("UPDATE event set
						gambar='$gambar',
						link='$_POST[link]',
						judul='$_POST[judul]',
						subjudul='$_POST[subjudul]' where id=$_POST[id]");
					echo "<script>window.alert('event diperbarui');
					window.location=('modul.php?isi=event-tabel')</script>";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} 

	}// edit event

	if ($_GET['act']=='input_galeri') {
		$target_dir = "../img/galeri/";
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
				$gambar="img/galeri/".$nama;
				tambahUrut("galeri");
				mysql_query("INSERT INTO galeri(urut, gambar, judul, subjudul, link)
					VALUES(
					'1',
					'$gambar',
					'$_POST[judul]',
					'$_POST[subjudul]',
					'$_POST[link]')");
				echo "<script>window.alert('The file $nama has been uploaded.');
				window.location=('modul.php?isi=galeri-tabel')</script>";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	} // input galeri

	if ($_GET['act']=='galeriup') {
		$id=$_GET['id'];
		urutUp("galeri", $id);
		echo "<script>window.location=('modul.php?isi=galeri-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='galeridown') {
		$id=$_GET['id'];
		urutDown("galeri", $id);
		echo "<script>window.location=('modul.php?isi=galeri-tabel&change=$id')</script>";
	}

	if ($_GET['act']=='mati_galeri') {
		$start=hasil("select urut from galeri where id = $_GET[id] ");
		mysql_query("update galeri set status = 0, urut = 0 where id = $_GET[id]");
		kurangUrut("galeri", $start);
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=galeri-tabel')</script>";
	}

	if ($_GET['act']=='aktif_galeri') {
		tambahUrut("galeri");
		mysql_query("update galeri set status = 1, urut = 1 where id = $_GET[id]");
		echo "<script>window.alert('Status berhasil dirubah');
				window.location=('modul.php?isi=galeri-tabel')</script>";
	}

	if ($_GET['act']=='hapus_galeri') {
		$start=hasil("select urut from galeri where id = $_GET[id]");
		$gambar=hasil("select gambar from galeri where id = $_GET[id]");
		unlink("../$gambar");
		mysql_query("delete from galeri where id = $_GET[id]");
		if ($start!=0) {
			kurangUrut("galeri", $start);
		}
		echo "<script>window.alert('galeri dihapus');
				window.location=('modul.php?isi=galeri-tabel')</script>";
	}

	if ($_GET['act']=='edit_galeri') {
		if (empty($_FILES["fileToUpload"]["name"])) {
			mysql_query("UPDATE galeri set
				link='$_POST[link]',
				judul='$_POST[judul]',
				subjudul='$_POST[subjudul]' where id=$_POST[id]");
			echo "<script>window.alert('Slider diperbarui');
			window.location=('modul.php?isi=galeri-tabel')</script>";

		} else{ //jika ada file

			$target_dir = "../img/galeri/";
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
					$gambar="img/galeri/".$nama;
					mysql_query("UPDATE galeri set
						gambar='$gambar',
						link='$_POST[link]',
						judul='$_POST[judul]',
						subjudul='$_POST[subjudul]' where id=$_POST[id]");
					echo "<script>window.alert('galeri diperbarui');
					window.location=('modul.php?isi=galeri-tabel')</script>";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} 

	}// edit galeri

	if ($_GET['act']=='edit_pengurus') {
		if (empty($_FILES["fileToUpload"]["name"])) {
			mysql_query("UPDATE pengurus set
				jabatan='$_POST[jabatan]',
				nama='$_POST[nama]',
				panggilan='$_POST[panggilan]',
				tgl_lahir='$_POST[tanggal]',
				angkatan='$_POST[angkatan]',
				alamat='$_POST[alamat]',
				motto='$_POST[motto]',
				email='$_POST[email]',
				fb='$_POST[fb]',
				twt='$_POST[twt]',
				ig='$_POST[ig]'
				 where id=$_POST[id]");
			echo "<script>window.alert('Pengurus diperbarui');
			window.location=('modul.php?isi=pengurus-tabel')</script>";

		} else{ //jika ada file

			$target_dir = "../img/pengurus/";
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
					$gambar="img/pengurus/".$nama;
					mysql_query("UPDATE pengurus set
						gambar='$gambar',
						jabatan='$_POST[jabatan]',
						nama='$_POST[nama]',
						panggilan='$_POST[panggilan]',
						tgl_lahir='$_POST[tanggal]',
						angkatan='$_POST[angkatan]',
						alamat='$_POST[alamat]',
						motto='$_POST[motto]',
						email='$_POST[email]',
						fb='$_POST[fb]',
						twt='$_POST[twt]',
						ig='$_POST[ig]'
						 where id=$_POST[id]");
					echo "<script>window.alert('pengurus diperbarui');
					window.location=('modul.php?isi=pengurus-tabel')</script>";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
		} 

	}// edit pengurus
} // session start	
	?>