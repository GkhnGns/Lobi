<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand"><strong>YÖNETİCİ</strong></a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li class=""><a href="ilan-ekle.php">İLAN EKLE</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">İLANLAR <span class="caret"></span></a>
<ul class="dropdown-menu">	
<li><a href="platin-ilanlar.php">Platin İlanlar <span class="label label-default pull-right"> 
<?php $sor1 = $conn->prepare("SELECT * FROM uyeler where seviye=?"); $sor1->execute(array('platin')); echo $sor1->rowCount(); ?>
</span></a></li> 			 
<li><a href="gold-ilanlar.php">Gold İlanlar <span class="label label-default pull-right"> 
<?php $sor2 = $conn->prepare("SELECT * FROM uyeler where seviye=?"); $sor2->execute(array('gold')); echo $sor2->rowCount(); ?>
</span></a></li>
<li><a href="ilanlar.php">Tüm İlanlar <span class="label label-success pull-right"> 
<?php $sor3 = $conn->prepare("SELECT * FROM uyeler"); $sor3->execute(); echo $sor3->rowCount(); ?></span></a></li> 
</ul>
</li>
<li class=""><a href="kategoriler.php">KATEGORİLER</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MAKALE YÖNETİMİ<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="blog.php">makaleler</a></li>
<li><a href="zamanliblog.php">Zamanlanmış <span class="label label-default"> 
<?php $blogsayisor = $conn->prepare("SELECT * FROM blog where durum = ? ");
$blogsayisor->execute(array('Cron'));
$blogsay = $blogsayisor->rowCount(); 
echo $blogsay ; ?></span></a></li>
</ul>
</li>			
</ul>		    
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AYARLAR <span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="sitebilgileri.php">Site Ayarları</a></li>
<li><a href="ampayar.php">Amp Ayarları</a></li>
<li><a href="linkler.php">Odak Linkler </a></li>
<li><a href="htaccess.php">htaccess Dosyası </a></li>
<li><a href="robots.php">robots Dosyası </a></li>
<li><a href="adminbilgileri.php">Admin Bilgileri</a></li>             
</ul>
</li>
<li><a href="../" target="_blank">Site</a></li>
<li><a href="cikis.php">Çıkış</a></li>
</ul>
</div>
</div>
</nav>