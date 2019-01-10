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
function DDtoDMS($dec,$kode)
{
    // Converts decimal format to DMS ( Degrees / minutes / seconds ) 
    $vars = explode(".",$dec);
    $deg = $vars[0];
    $tempma = "0.".$vars[1];

    $mn = $tempma * 60;
    list($l1,$l2)=explode('.',$mn);

    $s=$l2*60;
    $ss=strtok($s,'.');
    $tempma = $tempma * 3600;
    $min = floor($tempma / 60);
    $sec = $tempma - ($min*60);

    // return array("deg"=>$deg,"min"=>$min,"sec"=>$sec);
    return $deg.'°'.$l1."'0".number_format($sec,1)."''".$kode;
    // return $deg.'°'.$l1."'".$ss."''".$kode;
}
function kategori_2017()
{
    $data['jenis']=array('Politik','Ekonomi','Sosial Budaya','Antar Suku/Etnis, Agama','Taswil','Sda','Distribusi Sda','Jumlah');
    $data['jumlah']=array(
        'ACEH' => array(7,2,16,8,21,15,1,70),
        'SUMATERA UTARA' => array(29,59,75,17,6,108,0,294),
        'SUMATERA BARAT' => array(9,18,57,4,25,17,1,131),
        'RIAU' => array(3,4,95,11,15,25,0,153),
        'JAMBI' => array(0,0,75,10,1,11,0,97),
        'SUMATERA SELATAN' => array(8,7,8,1,14,22,0,60),
        'BENGKULU' => array(0,0,3,1,2,0,2,8),
        'LAMPUNG' => array(3,70,9,4,6,2,0,94),
        'DKI JAKARTA' => array(10,24,63,24,9,0,0,130),
        'JAWA BARAT' => array(21,29,24,20,5,17,3,119),
        'JAWA TENGAH' => array(14,35,55,24,12,11,0,151),
        'DI YOGYAKARTA' => array(1,0,10,6,0,3,0,20),
        'JAWA TIMUR' => array(27,29,137,17,1,16,0,227),
        'BALI' => array(5,5,30,4,12,0,0,56),
        'KALIMANTAN BARAT' => array(7,54,12,7,12,3,46,141),
        'KALIMANTAN TIMUR' => array(16,16,18,10,8,14,2,84),
        'KALIMANTAN SELATAN' => array(16,57,26,14,4,10,3,130),
        'KALIMANTAN TENGAH' => array(10,11,24,9,8,3,0,65),
        'SULAWESI BARAT' => array(0,0,0,0,2,3,0,5),
        'SULAWESI SELATAN' => array(1,37,46,11,4,19,0,118),
        'SULAWESI TENGGARA' => array(20,22,24,4,18,9,3,100),
        'SULAWESI TENGAH' => array(23,14,17,13,1,9,2,79),
        'SULAWESI UTARA' => array(0,0,7,0,0,0,0,0,7),
        'NUSA TENGGARA BARAT' => array(10,13,11,16,5,3,0,58),
        'NUSA TENGGARA TIMUR' => array(3,0,30,16,50,1,0,100),
        'MALUKU' => array(58,0,59,0,36,4,0,157),
        'PAPUA' => array(66,4,13,1,0,0,0,84),
        'BANTEN' => array(0,0,3,0,2,2,0,7),
        'KEPULAUAN BANGKA BELITUNG' => array(0,12,12,3,2,12,0,41),
        'GORONTALO' => array(4,9,10,0,0,0,0,23),
        'MALUKU UTARA' => array(0,8,8,15,10,5,0,46),
        'KEPULAUAN RIAU' => array(6,1,2,8,0,27,1,45),
        'PAPUA BARAT' => array(5,13,1,1,3,1,0,24),
    );
    return $data;
}
?>