<?php /* if(!defined('access')){ echo "Hacking ?"; exit(); } */
$SiteAdresi = $AmpBilgi['amp_domain'];
$SubAdresi  = $AmpBilgi['amp_sub'];
if($SubAdresi == '' || $SubAdresi == NULL){
$YeniAdres = str_replace(''.$SiteAdresi, 'https://'.str_replace('.', '-', $SiteAdresi).'.cdn.ampproject.org/c/'.$SiteAdresi.'/amp', $SiteAdresi);
}else{		
$YeniAdres = str_replace(''.$SiteAdresi, 'https://'.$SubAdresi.'-'.str_replace('.', '-', $SiteAdresi).'.cdn.ampproject.org/c/'.$SubAdresi.'.'.$SiteAdresi.'/amp', $SiteAdresi);
}
?>