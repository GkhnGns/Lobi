<?php session_start(); define('access',"False");
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit(); 
} 
include('baglanti.php'); include('tarihfonksiyonu.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Zamanlanan makaleler</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link href="css/dist/lity.css" rel="stylesheet"/>
<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
<script src="css/dist/vendor/jquery.js"></script>
<script src="css/dist/lity.js"></script>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : 'img/loading.gif',
closeImage   : 'img/closelabel.png'
})
})
</script>
<style>
/* Tooltip */
.hizmeticerik + .tooltip > .tooltip-inner {
max-height:200px;
overflow-x: hidden;
overflow-y: auto;
font-size:13px;
}
</style>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">ZAMANLANAN makaleler</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon alert-info">Hızlı Kayıt Ara</div>
<input type="search" class="light-table-filter form-control" data-table="Arama" placeholder="Aranacak kelime...">
</div>
</div>
<table class="table table-bordered table-hover Arama">
<thead>
<tr>
<th>Resim</th>
<th>Başlık</th>
<th>Yayın Zamanı</th>
<th>İşlemler</th>
</tr>
</thead>
<tbody>	
<?php 
$verisayisi = count($conn->query("select * from uyeler where durum='Cron'",PDO::FETCH_ASSOC)->fetchAll());
$gosterilecek = 15;
$sayfa;
$sayfasayisi = ceil($verisayisi/$gosterilecek);
if(isset($_GET['sayfa'])){
$sayfa = htmlentities($_GET['sayfa'],  ENT_QUOTES,  "utf-8");
}else{
$sayfa = 1;
}
if($sayfa > $sayfasayisi){
$sayfa  = 1;
}elseif(!is_numeric($sayfa) || $sayfa < 1){
$sayfa = 1;
}
$baslangic = ($gosterilecek * $sayfa)-$gosterilecek;
?>
<?php 
$query = $conn->prepare("select * from blog where durum=? order by id desc limit $baslangic,$gosterilecek");
$query->execute(array('Cron'));
$count = $query->rowcount();
if ($count > 0){ 
while($row = $query->fetch()){
$id 	   = $row['id'];
$baslik    = $row['baslik'];
$resim	   = $row['resim'];
$paylasim  = $row['paylasim'];
$hit	   = $row['hit'];
?>
<tr class="kayitlar">
<td>
<?php if($resim!==''){ ?>
<a href="../blogresim/<?php echo $resim; ?>" data-lity><img src="../blogresim/<?php echo $resim; ?>" class="img-thumbnail img-responsive" width="75px"></a>
<?php }else{ ?>
<img src="../img/resimyok.jpg" class="img-thumbnail img-responsive" width="75px">
<?php } ?>
</td>
<td><?php echo $baslik; ?></td>	
<td><small><?php echo turkcetarih('j F l Y H:i',$paylasim); ?></small></td>
<td><a href="blogduzenle.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a> 
<a href="#" title="Sil" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs silbuton" id="<?php echo $id; ?>" ><span class="glyphicon glyphicon-remove"></span></a></td>                                    
</tr>
<?php } ?>
<?php } else{ echo '<tr><td colspan="4"><div class="alert alert-warning" role="alert">Zamanlanmış gönderi yok!</div></td></tr>'; ?>  <?php } ?>
</tbody>
</table>
</div>
</div>
<div class="panel-footer">
<nav aria-label="Page navigation">
<ul class="pagination pagination-sm">
<?php 
if($sayfa > 1){
echo '<li><a href="blog.php?sayfa=1">İlk</a></li>';
echo '<li><a title="önceki" href="blog.php?sayfa='.($sayfa-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
}
$ekgoster = 2;
for($i = $sayfa - $ekgoster; $i <= $sayfa + $ekgoster;$i++){
if($i > 0 && $i <= $sayfasayisi){
if($i == $sayfa){
echo '<li class="active"><a>'.$i.'</a></li>';
}else{
echo '<li><a href="blog.php?sayfa='.$i.'">'.$i.'</a></li>';
}
}
}
if($sayfa < $sayfasayisi){
echo '<li><a title="sonraki" href="blog.php?sayfa='.($sayfa+1).'"><span aria-label="Next">&raquo;</span></a></li>';
echo '<li><a href="blog.php?sayfa='.$sayfasayisi.'">Son</a></li>';
}
?>
</div>
</div>
</div>	
</div>
</div><!-- /.container -->
<script type="text/javascript">
$(function() {
$(".silbuton").click(function(){
//Save the link in a variable called element
var element = $(this);
//Find the id of the link that was clicked
var del_id = element.attr("id");
//Built a url to send
var info = 'id=' + del_id;
if(confirm("Bu içeriğe ait bilgileri ve resimleri silmek istediğinize emin misiniz? UYARI Bu işlem geri alınamaz!"))
{
$.ajax({
type: "GET",
url: "blogsil.php",
data: info,
success: function(){
}
});
$(this).parents(".kayitlar").animate({ backgroundColor: "#fbc7c7" }, "fast")
.animate({ opacity: "hide" }, "slow");
}
return false;
});
});
</script>
<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
$('.btn-default').tooltip({trigger: "click"}); 
});
</script>
<!-- Arama -->
<script>
(function(document) {
'use strict';
var LightTableFilter = (function(Arr) {
var _input;
function _onInputEvent(e) {
_input = e.target;
var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
Arr.forEach.call(tables, function(table) {
Arr.forEach.call(table.tBodies, function(tbody) {
Arr.forEach.call(tbody.rows, _filter);
});
});
}
function _filter(row) {
var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
}
return {
init: function() {
var inputs = document.getElementsByClassName('light-table-filter');
Arr.forEach.call(inputs, function(input) {
input.oninput = _onInputEvent;
});
}
};
})(Array.prototype);
document.addEventListener('readystatechange', function() {
if (document.readyState === 'complete') {
LightTableFilter.init();
}
});
})(document);
</script>
<!-- Arama -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-tagsinput.min.js"></script>
</body>
</html>