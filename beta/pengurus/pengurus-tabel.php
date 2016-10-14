<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Pengurus Himatipa</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="../slider.php" target="_blank">
                    <button type="button" class="btn btn-success"><i class="fa fa-check"></i>  Lihat Pengurus</button>
                </a>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql="select * from pengurus order by id asc";
                          $q=mysql_query($sql) or die(mysql_error());
                          while ($row=mysql_fetch_array($q)){
                            $id=$row['id'];
                            echo"<tr class='odd gradeX'>";
                            echo"<td>$row[id]</td>";
                            echo"<td>$row[jabatan]</td>";
                            echo"<td>$row[nama]</td>";
                            ?>
                            <!-- Split button --> 
                            <td class="text-center">
                            <a href="modul.php?isi=pengurus-edit&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info">Edit</button></a>
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
    <!-- /.col-lg-12 -->
</div>
            <!-- /.row -->