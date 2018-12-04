<?php
function level()
{
    $level=array(
        '0'=>'Administrator',
        '1'=>'Staf TU',
        '2'=>'Kasubbag TU',
        '3'=>'Staf Kasubdit',
        '4'=>'Kasubdit',
        '5'=>'Eselon III',
        '6'=>'Staf Eselon III',
        '7'=>'Eselon IV',
        '8'=>'Staf Eselon IV',
    );
    return $level;
}
function rupiah($angka){
	
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
function autonumber($num)
{
    if($num<10)
        return '0000'.$num;
    elseif($num>=10 && $num<100)
        return '000'.$num;
    elseif($num>=100 && $num<1000)
        return '00'.$num;
    elseif($num>=1000 && $num<10000)
        return '0'.$num;
    else
        return $num;
}
?>