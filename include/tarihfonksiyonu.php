<?php 
// TARİH FONKSİYONU
function turkcetarih($f, $zt = 'now'){  
$z = date("$f", strtotime($zt));  
$donustur = array(  
'Monday'    => 'Pazartesi',  
'Tuesday'   => 'Salı',  
'Wednesday' => 'Çarşamba',  
'Thursday'  => 'Perşembe',  
'Friday'    => 'Cuma',  
'Saturday'  => 'Cumartesi',  
'Sunday'    => 'Pazar',  
'January'   => 'Ocak',  
'February'  => 'Şubat',  
'March'     => 'Mart',  
'April'     => 'Nisan',  
'May'       => 'Mayıs',  
'June'      => 'Haziran',  
'July'      => 'Temmuz',  
'August'    => 'Ağustos',  
'September' => 'Eylül',  
'October'   => 'Ekim',  
'November'  => 'Kasım',  
'December'  => 'Aralık',  
'Mon'       => 'Pts',  
'Tue'       => 'Sal',  
'Wed'       => 'Çar',  
'Thu'       => 'Per',  
'Fri'       => 'Cum',  
'Sat'       => 'Cts',  
'Sun'       => 'Paz',  
'Jan'       => 'Oca',  
'Feb'       => 'Şub',  
'Mar'       => 'Mar',  
'Apr'       => 'Nis',  
'Jun'       => 'Haz',  
'Jul'       => 'Tem',  
'Aug'       => 'Ağu',  
'Sep'       => 'Eyl',  
'Oct'       => 'Eki',  
'Nov'       => 'Kas',  
'Dec'       => 'Ara',  
);  
foreach($donustur as $en => $tr){  
$z = str_replace($en, $tr, $z);  
}  
if(strpos($z, 'Mayıs') !== false && strpos($f, 'F') === false)
$z = str_replace('Mayıs', 'May', $z);  
return $z;  
}