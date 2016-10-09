<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Input Slider</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Input Slider
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=input_slider" enctype="multipart/form-data">
                            <label>Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" placeholder="Judul Event huruf tipis" name="judul">
                            </div>
                            <label>Judul lanjutan</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                <input type="text" class="form-control" placeholder="Judul Event huruf tebal" name="judul2">
                            </div>
                            <label>Sub Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                <input type="text" class="form-control" placeholder="Subjudul" name="subjudul">
                            </div>                         
                            <label>Gambar (900 x 600)</label>
                            <div class="form-group input-group">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <label>Link</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" class="form-control" placeholder="Link artikel" name="link">
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