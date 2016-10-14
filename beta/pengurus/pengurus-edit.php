<?php
    $sql="select * from pengurus where id = $_GET[id]";
    $q=mysql_query($sql) or die(mysql_error());
    $row=mysql_fetch_array($q);
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: black">Edit pengurus</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data pengurus
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="post" role="form" action="save.php?act=edit_pengurus" enctype="multipart/form-data">
                        <div class="col-lg-6">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <label>Jabatan</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan'];?>">
                            </div>
                            <label>Nama</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="nama" value="<?php echo $row['nama'];?>">
                            </div>                         
                            <label>Gambar (400 x 400)</label>
                            <img src="../<?php echo $row['gambar']; ?>" name="aboutme" width="320" height="429" border="0" class="img-responsive"></img>
                            <div class="form-group input-group">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <label class="control-label" for="date">Tanggal Lahir</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-gift"></i>
                                </div>
                                <input class="form-control" value="<?php echo $row['tgl_lahir'];?>" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal" type="text"/>
                            </div>
                        </div> 
                        <!-- col-lg-6 -->
                        <div class="col-lg-6">
                            <label>Angkatan</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-mortar-board"></i></span>
                                <input type="text" class="form-control" placeholder="Ex : 2015" name="angkatan" value="<?php echo $row['angkatan'];?>">
                            </div>
                            <label>Alamat</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-road"></i></span>
                                <input type="text" class="form-control" placeholder="Kecamatan, Kabupaten" name="alamat" value="<?php echo $row['alamat'];?>">
                            </div>
                            <label>Motto Hidup</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-heart"></i></span>
                                <input type="text" class="form-control" placeholder="Motto Singkat" name="motto" value="<?php echo $row['motto'];?>">
                            </div>
                            <label>Media Sosial</label>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="text" class="form-control" placeholder="Link Fb" name="fb" value="<?php echo $row['fb'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="text" class="form-control" placeholder="Link Twitter" name="twt" value="<?php echo $row['twt'];?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" class="form-control" placeholder="Link Ig" name="ig" value="<?php echo $row['ig'];?>">
                                    </div>
                                </div>
                            </div>
                            <!-- row medsos -->
                            <input type="submit" class="btn btn-default" value="Sumbit" name="submit">
                        </div>
                        <!-- col-lg-6 -->                                      
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->