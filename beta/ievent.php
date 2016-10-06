<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Himatipa - Himpunan Mahasiswa Teknologi Industri Pertanian</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap Css -->
    <link href="../bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/logo/logo-besar.png"/>

    <!-- Style -->
    <link href="../plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="../plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="../plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="../plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="../plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="../plugins/animate.css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>           
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
                                        <label>Judul lanjut</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                                            <input type="text" class="form-control" placeholder="Judul Event huruf tebal" name="judul2">
                                        </div>
                                        <label>Sub Judul</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                                            <input type="text" class="form-control" placeholder="Subjudul" name="subjudul">
                                        </div>                         
                                        <label>Gambar</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <!-- JS PLUGINS -->
    <script src="../plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="../plugins/countTo/jquery.countTo.js"></script>
    <script src="../plugins/inview/jquery.inview.min.js"></script>
    <script src="../plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="../plugins/WOW/dist/wow.min.js"></script>
</body>

</html>