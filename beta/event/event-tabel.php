<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Event</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo "<strong>Perhatian!</strong> Hanya 3 event teratas yang ditampilkan di web"; ?>
        </div>
    <?php if (isset($_GET['change'])) {
        $sql2="select * from event where id = $_GET[change]";
        $q2=mysql_query($sql2) or die(mysql_error());
        $row2=mysql_fetch_array($q2);
        $judul=$row2['judul'];
        $urut=$row2['urut'];
    ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo "Event <b>$judul</b> dipindah ke urutan <b>$urut</b>"; ?>
        </div>
    <?php } ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="modul.php?isi=event-input&act=tambah">
                    <button type="button" class="btn btn-primary"><i class="fa fa-plus-square"></i>  Tambah event</button>
                </a>
                <a href="../event.php" target="_blank">
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i>  Lihat event</button>
                </a>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Ubah</th>
                                <th>Judul</th>
                                <th>Status</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql="select * from event order by urut asc";
                          $q=mysql_query($sql) or die(mysql_error());
                          $max=hasil("select max(urut) from event");
                          while ($row=mysql_fetch_array($q)){
                                $id=$row['id'];
                              if ($row['status']==0) {
                                    $matikan='disabled';
                                    $aktifkan='';
                                    $urutan='Mati';
                                } else{
                                    $matikan='';
                                    $aktifkan='disabled';
                                    $urutan=$row['urut'];
                                }						
                                echo"<tr class='odd gradeX'>";
                                echo"<td>$urutan</td>";
                                echo"<td>";
                                if($urutan!='Mati' && $urutan!=1 && $urutan!=$max){?>
                                <div class="btn-group">
                                    <a href="save.php?act=eventup&id=<?php echo $id; ?>" role="button" class="btn btn-default">
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                    <a href="save.php?act=eventdown&id=<?php echo $id; ?>" role="button" class="btn btn-default" aria-expanded="false">
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                </div>
                                <?php }elseif ($urutan==1) {?>
                                    <a href="save.php?act=eventdown&id=<?php echo $id; ?>" role="button" class="btn btn-default" aria-expanded="false">
                                        <span class="fa fa-angle-down"></span>
                                    </a>
                                <?php }elseif ($urutan==$max) {?>
                                    <a href="save.php?act=eventup&id=<?php echo $id; ?>" role="button" class="btn btn-default" aria-expanded="false">
                                        <span class="fa fa-angle-up"></span>
                                    </a>
                                <?php } 
                                        echo"</td>";
                                        echo"<td>$row[judul]</td>";
                            
                            ?>
                            <!-- Split button -->
                        </div>
                            <td class="text-center">
                                <a href="save.php?&act=aktif_event&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info <?php echo $aktifkan ?>">Aktifkan</button> 
                                <a href="save.php?&act=mati_event&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-warning <?php echo $matikan ?>">Matikan</button></a>
                            </td> 
                            <td class="text-center">
                                <a href="modul.php?isi=event-edit&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info">Edit</button> 
                                <a href="save.php?act=hapus_event&id=<?php echo $row['id'] ?>" onclick="return confirm('Anda Yakin?')"><button type="button" class="btn btn-danger">Hapus</button></a>
                            </td> 
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                        <!-- /.table-responsive -->
            </div>
                    <!-- /.panel-body -->
        </div>
                <!-- /.panel -->
    </div>
            <!-- /.col-lg-6 -->
</div>
            <!-- /.row -->