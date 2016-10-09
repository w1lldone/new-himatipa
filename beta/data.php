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

	function tambahUrut(){
		$sql="select * from slider where status = 1";
		$q=mysql_query($sql) or die(mysql_error());
		while ($row=mysql_fetch_array($q)){
			$b=$row['urut']+1;
			mysql_query("update slider set urut = $b where ids = $row[ids] ");
		}
	}

	function kurangUrut($start){
		$query="select * from slider where status = 1 and urut > $start";
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq)+$start;
		while ($start <= $counts) {
			$a=$start+1;
			mysql_query("update slider set urut = $start where urut = $a ");
			$start++;
		}

	}
?>