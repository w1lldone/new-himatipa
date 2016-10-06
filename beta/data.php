<?php
// data.php adalah kumpulan function yg sering dipanggil

	include "config.php";
	$hasil=null;
	function hasil($query){
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			$hasil=mysql_result($qq, 0);
			return $hasil;
		}
		
	}

	function grafikTotalTgl($data){
		$q=mysql_query("select distinct tanggal from rata") or die(mysql_error());
		while ($row=mysql_fetch_array($q)){			
			$qq=mysql_query("select $data from rata where tanggal = '$row[tanggal]'") or die(mysql_error());
			$counts=mysql_num_rows($qq);		
			if ($counts!=0){
				while ($row=mysql_fetch_assoc($qq)){
					$hasil[]=$row;
				}
				
			}
		}
		return json_encode($hasil);
		
	}
	
	function grafik($query){
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			while ($row=mysql_fetch_assoc($qq)){
				$hasil[]=$row;
			}
			return json_encode($hasil);
		}
	}

	function margin(){
		$sqla="select avg(hr1), avg(hr2), avg(hr3), avg(br1), avg(br2), avg(br3) from rata";
		$qa=mysql_query($sqla) or die(mysql_error());
		$rowa=mysql_fetch_array($qa);

		$sm_nel=($rowa['avg(hr1)']-$rowa['avg(br1)'])/$rowa['avg(hr3)'];
		$sm_pk=($rowa['avg(hr2)']-$rowa['avg(br2)']-$rowa['avg(hr1)'])/$rowa['avg(hr3)'];
		$sm_pd=($rowa['avg(hr3)']-$rowa['avg(br3)']-$rowa['avg(hr2)'])/$rowa['avg(hr3)'];

		$pm_nel=($rowa['avg(hr1)']-$rowa['avg(br1)'])/$rowa['avg(hr1)'];
		$pm_pk=($rowa['avg(hr2)']-$rowa['avg(br2)']-$rowa['avg(hr1)'])/$rowa['avg(hr2)'];
		$pm_pd=($rowa['avg(hr3)']-$rowa['avg(br3)']-$rowa['avg(hr2)'])/$rowa['avg(hr3)'];

		$sm_nel=number_format($sm_nel, 3);
		$sm_pk=number_format($sm_pk, 3);
		$sm_pd=number_format($sm_pd, 3);

		$pm_nel=number_format($pm_nel, 3);
		$pm_pk=number_format($pm_pk, 3);
		$pm_pd=number_format($pm_pd, 3);

		mysql_query("update margin set 
					sm_nel=$sm_nel, 
					sm_pk=$sm_pk,
					sm_pd=$sm_pd, 
					pm_nel=$pm_nel, 
					pm_pk=$pm_pk,
					pm_pd=$pm_pd
					where idpm=1");	
	}

	//menghapus rata yg kosong
	function cekrata(){
		$sql="select * from rata";
		$q=mysql_query($sql) or die(mysql_error());
		while ($row=mysql_fetch_array($q)) {
			$jumlah = 0;
			$jumlah = $row['vr1']+$row['vr3']+$row['vr4'];
			if ($jumlah==0) {
				mysql_query("delete from rata where idr = $row[idr]");
			}
		}
	}
?>