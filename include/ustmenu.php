<?php if(!defined('access')){ echo "Hacking ?"; exit(); } ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
<span class="icon-bar">MENU</span>
</button>
<a href="anasayfa.html" class="navbar-brand effect-shine"><?php echo $SiteBilgi['logoyazi']; ?></a>
</div>
<div id="navbar-menu" class="collapse navbar-collapse">
<ul class="nav navbar-nav">

</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="index.html">ANASAYFA</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">KATEGORİLER <b class="caret"></b></a>
<ul class="dropdown-menu" style="text-transform: uppercase;" id="scrollcss">
<?php
$katSor = $conn->prepare("select * from kategori order by baslik asc"); $katSor->execute();
while($kategori = $katSor->fetch()){ 
?>
<li><a href="kategori/<?php echo $kategori['seo']; ?>/<?php echo $kategori['id']; ?>.html"> > <?php echo $kategori['baslik']; ?></a></li>
<?php } ?>
</ul>
</li>
<li><a href="makaleler.html"><span class="glyphicon glyphicon-comment"></span>BLOG</a></li>
<li><a data-toggle="modal" data-target="#modelbasvuru" class="pointer"><span class="glyphicon glyphicon-send"></span>İLAN VER</a></li>
</ul>
</div>
</div>
</nav>
<div class="col-xs-12 hidden-lg hidden-md hidden-sm" style="margin-top:5px;margin-bottom:15px;">
<a data-toggle="modal" data-target="#modelbasvuru" class="btn btn-info btn-block">İLAN VER</a>
</div>