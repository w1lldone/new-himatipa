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
    <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="img/logo/logo-besar.png">

    <!-- Style -->
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Header
    ============================================= -->
    <section class="main-header">
        <div id="owl-hero" class="owl-carousel owl-theme">
            <div class="item" style="background-image: url(img/sliders/slide-1.jpg)">
                <div class="caption">
                    <img src="img/logo/logo-himatipa.png" class="img-responsive center-block" alt="logo" width="150" height="150">
                    <h1>We Are <span>Himatipa</span></h1>
                </div>
            </div>
            <?php 
            include 'beta/config.php';
            include 'beta/data.php';
            $sql="select * from slider where status=1 order by urut asc";
            $q=mysql_query($sql) or die(mysql_error());
            while ($row=mysql_fetch_array($q)){
                ?>
                <div class="item" style="background-image: url(<?php echo $row['gambar']; ?>)">
                    <div class="caption">
                        <h6><?php echo $row['subjudul']; ?></h6>
                        <h1><?php echo $row['judul']; ?> <span><?php echo $row['judul2']; ?></span></h1>
                        <a class="btn btn-transparent" href="<?php echo $row['link']; ?>">Learn More</a>
                    </div>
                </div>

                <?php } ?>
        </div>
    </section>

    <!-- Events -->
    <section id="team">
        <div class="container">
            <h2>Events</h2>
            <hr class="sep">
            <p>Event yang diadakan oleh Himatipa</p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <?php 
                $sql="select * from event where status=1 order by urut asc limit 3";
                $q=mysql_query($sql) or die(mysql_error());
                while ($row=mysql_fetch_array($q)){
                ?>
                    <div class="col-md-4">
                        <div class="team">
                            <img class="img-responsive center-block" src="<?php echo $row['gambar'] ?>" alt="1">
                            <h4><?php echo $row['judul'] ?></h4>
                            <p><?php echo $row['subjudul'] ?></p>
                            <a class="btn-block" href="<?php echo $row['link'] ?>">Get Details</a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Portfolio
    ============================================= -->
    <section id="portfolio">
        <div class="container-fluid">
            <h2>Galeri</h2>
            <hr class="sep">
            <p>Dokumentasi Kegiatan Himatipa</p>
            <div class="row">
            <?php 
                $sql="select * from galeri where status=1 order by urut asc limit 6";
                $q=mysql_query($sql) or die(mysql_error());
                while ($row=mysql_fetch_array($q)){
            ?>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <a class="portfolio-box" href="<?php echo $row['link']; ?>">
                        <img src="<?php echo $row['gambar']; ?>" class="img-responsive" alt="1">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    <?php echo $row['judul']; ?>
                                </div>
                                <div class="project-name">
                                    <?php echo $row['subjudul']; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </section>

    <section id="links">
        <div class="container wow fadeInUp" data-wow-delay=".3s">
            <h2>Struktur Kepengurusan </h2>
            <hr class="light-sep">
            <p>Pengurus Harian Himatipa 2016</p>
            <div class="row" style="margin-bottom: 60px;"> 
                <!-- margin-bottom buat menambah spasi dibawah gambar-->
                <div class="col-lg-4 col-lg-offset-2">
                    <?php pengurus(1); ?>                
                </div>
                <div class="col-lg-4">
                    <?php pengurus(2); ?>                    
                </div>
            </div>
            <!-- row -->

            <div class="row" style="margin-bottom: 30px;">
                <div class="col-lg-3">
                    <?php pengurus(3); ?>                    
                </div>
                <div class="col-lg-3">
                    <?php pengurus(4); ?>                    
                </div>
                <div class="col-lg-3">
                    <?php pengurus(5); ?>                    
                </div>
                <div class="col-lg-3">
                    <?php pengurus(6); ?>                    
                </div>
            </div>

            <div id="more" class="collapse"> 
                <!-- row -->
                <div class="row">
                    <div class="col-lg-6" style="margin-top: 30px;">
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(7); ?>                    
                            </div>
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(8); ?>                    
                            </div>
                        </div>
                    </div>
                    <!--col-lg-5-->
                    <div class="col-lg-6" style="margin-top: 30px;">
                        <!--class box untuk memberi garis kotak, dipake buat ngokati per departemen-->
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(9); ?>                   
                            </div>
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(10); ?>                   
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!--col-lg-6-->
                </div>
                <!-- row -->

                <div class="row">
                    <div class="col-lg-6" style="margin-top: 60px;">
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(11); ?>                    
                            </div>
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(12); ?>                    
                            </div>
                        </div>
                        <!-- row -->
                    </div>
                    <!-- col-lg-5-->
                    <div class="col-lg-6" style="margin-top: 60px;">
                        <!--class box untuk memberi garis kotak, dipake buat ngokati per departemen-->
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(13); ?>                    
                            </div>
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(14); ?>                    
                            </div>
                        </div>
                    </div>
                    <!-- col-lg-5-->
                </div>
                <!--row-->

                <div class="row" style="margin-bottom: 30px">
                    <div class="col-lg-6 col-lg-offset-3" style="margin-top: 60px;">
                        <div class="row">
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(15); ?>                    
                            </div>
                            <div class="col-lg-6" style="margin-top: 20px;">
                                <?php pengurus(16); ?>                    
                            </div>
                        </div>
                        
                    </div>
                    <!-- col-lg-5-->
                </div>
                <!--row-->
            </div>
            <!-- collapse -->
            <center>
                <button type="button" class="btn btn-transparent" data-toggle="collapse" data-target="#more" style="margin-bottom: 30px">View More</button>
            </center>
        </div>
        <!--container-->
    </section>
    <?php include 'modal.php'; ?>


    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery/dist/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>
    <!-- GOOGLE MAP -->
    <script src="js/maps.js"></script>
</body>

</html>