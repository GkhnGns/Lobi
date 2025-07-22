<?php if(!defined('access')){ echo "Hacking ?"; exit(); } ?>
<footer id="footer">
<div class="col-md-12">	
<div class="panel panel-default panel-stili">
<div class="list-group text-center">
<?php echo $SiteBilgi['copyright']; ?>
</div>
</div>
</div>
</footer>

<div id="modelbasvuru" class="modal fade" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h6 class="modal-title ilanhatti text-center">Hemen İlan Ver</h6>
</div>
<div class="modal-body" style="max-height: 350px; overflow-y: auto;">
<section id="about" class="section-content">
<div class="col-md-12 text-center">
<h5 class="name">Değerli Ziyaretçimiz Web Sitemize İlan Vermek İçin İlan Kurallarını Okumanız ve Ödemenizi Gününde Yapmanız Gerekmektedir. İlan Ücretleri ve İlan Verme Kuralları Hakkında Danışmanınızdan Bilgi Alabilirsiniz.</h5>
<div class="title-divider">
<span class="hr-divider col-xs-5"></span>
<span class="icon-separator col-xs-2 blink2"><span class="glyphicon glyphicon-hand-down"></span></span>
<span class="hr-divider col-xs-5"></span>
<br><br>
<h6 class="slogan"><a href="tel:<?php echo $SiteBilgi['telefon']; ?>"><?php echo $SiteBilgi['telefon']; ?></a></h6>
<h6 class="slogan"><a href="https://api.whatsapp.com/send?phone=<?php echo $SiteBilgi['telefon']; ?>&text=Merhabalar İlan Sitenize *İlan Vermek İstiyorum*. Fiyat ve İlan Koşullarınız Hakkında Bilgi Verebilirmisiniz?">Whatsapp'la İlan Ver</a></h6>
</div>
</div>
</section>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Kapat</button>
</div>
</div>
</div>
</div>
<!-- Model Başvuru -->
<script type="text/javascript">
function effectBlinkIn(){
$(".blink").
fadeOut(500).
fadeIn(1000, function(){
$(".blink").fadeIn(1000).fadeOut(500, effectBlinkIn());
});
}
$(document).ready(
function(){effectBlinkIn();}
);
function effectBlinkIn2(){
$(".blink2").
fadeOut(300).
fadeIn(500, function(){
$(".blink2").fadeIn(500).fadeOut(300, effectBlinkIn2());
});
}
$(document).ready(
function(){effectBlinkIn2();}
);
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $SiteBilgi["analytics"]; ?>"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', '<?php echo $SiteBilgi["analytics"]; ?>');
</script>
<?php echo $SiteBilgi["footer"]; ?>