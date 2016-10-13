<?php
// data.php adalah kumpulan function yg sering dipanggil
	$hasil=null;
	function hasil($query){
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			$hasil=mysql_result($qq, 0);
			return $hasil;
		}
		
	}

	function tambahUrut($tabel){
		$sql="select * from $tabel where status = 1";
		$q=mysql_query($sql) or die(mysql_error());
		while ($row=mysql_fetch_array($q)){
			$b=$row['urut']+1;
			mysql_query("update $tabel set urut = $b where id = $row[id] ");
		}
	}

	function kurangUrut($tabel, $start){
		$query="select * from $tabel where status = 1 and urut > $start";
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq)+$start;
		while ($start <= $counts) {
			$a=$start+1;
			mysql_query("update $tabel set urut = $start where urut = $a ");
			$start++;
		}

	}

	function urutUp($tabel, $id){
		$start=hasil("select urut from $tabel where id = $id");
		$up=$start-1;
		$atas=hasil("select id from $tabel where urut = $up");	
		mysql_query("update $tabel set urut = $start where id = $atas ");
		mysql_query("update $tabel set urut = $up where id = $id");
	}

	function urutDown($tabel, $id){
		$start=hasil("select urut from $tabel where id = $id");
		$down=$start+1;
		$bawah=hasil("select id from $tabel where urut = $down");	
		mysql_query("update $tabel set urut = $start where id = $bawah ");
		mysql_query("update $tabel set urut = $down where id = $id");
	}
?>