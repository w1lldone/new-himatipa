<?php
    $sql="select * from event where id = $_GET[id]";
    $q=mysql_query($sql) or die(mysql_error());
    $row=mysql_fetch_array($q);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Edit event</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data event
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=edit_event" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <label>Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" placeholder="Judul Event huruf tipis" name="judul" value="<?php echo $row['judul'];?>">
                            </div>
                            <label>Sub Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <input type="text" class="form-control" placeholder="Subjudul" name="subjudul" value="<?php echo $row['subjudul'];?>">
                            </div>                         
                            <label>Gambar (320 x 429)</label>
                            <img src="../<?php echo $row['gambar']; ?>" name="aboutme" width="320" height="429" border="0" class="img-responsive"></img>
                            <input type="hidden" name="lama" value="<?php echo $row['gambar']; ?>">
                            <div class="form-group input-group">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <label>Link</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" class="form-control" placeholder="Link artikel" name="link" value="<?php echo $row['link'];?>">
                            </div>
                            <input type="submit" class="btn btn-default" value="Sumbit" name="submit">                                       
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->