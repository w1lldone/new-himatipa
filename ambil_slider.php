<?php 
    include 'beta/config.php';
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