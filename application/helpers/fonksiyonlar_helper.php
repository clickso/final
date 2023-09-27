<?php


function lisans () {
	$lisans= "AqeKs0WESm3WO5pFFgwj5jTtC1m3W" ;
	return $lisans	;
}

function foldersize($path) {
	$total_size = 0;
	$files = scandir($path);

	foreach($files as $t) {
		if (is_dir(rtrim($path, '/') . '/' . $t)) {
			if ($t<>"." && $t<>"..") {
				$size = foldersize(rtrim($path, '/') . '/' . $t);

				$total_size += $size;
			}
		} else {
			$size = filesize(rtrim($path, '/') . '/' . $t);
			$total_size += $size;
		}
	}
	return $total_size;
}

function lisansbilgisi () {

	$t = &get_instance();

	$lisansbilgi = $t->session->userdata("lisans");

	return $lisansbilgi	;
}



function alert ($title,$text,$type) {
	$alert=array(
		"title" => $title,
		"text" => $text,
		"type" => $type
	);

	return $alert;

}


function seo($text){

	$turkce  = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}");
	$convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

	return strtolower(str_replace($turkce, $convert, $text));


}


function get_active_user(){

	$t = &get_instance();

	$user = $t->session->userdata("user");

	if($user)
		return $user;
	else
		return false;

}


function ayarlar(){

	$t = &get_instance();
	$t->load->model("ayar_model");

	$ayar= $t->ayar_model->cek(
		array(
			"id"=>1
		)
	);

	return $ayar;

}


function size(){

	$t = &get_instance();
	$t->load->model("cozunurluk_model");

	$size= $t->ayar_model->tumu(

	);

	return $size;

}

function adres_cek($id){

    $t = &get_instance();
    $t->load->model("adresler_model");

    $ad=$t->adresler_model->cek(
        array(
            'id'=>$id
        )

    );
    $a=json_decode($ad->adres);

    $adres=$a->baslik.": İstanbul".$a->ilce."-".$a->mahalle."-".$a->bina."-".$a->sokak."-".$a->tarif;

    return $adres;

}

function resim_yukle($file, $uploadPath, $width, $height, $name){

	$t = &get_instance();
	$t->load->library("simpleimagelib");


	if(!is_dir("{$uploadPath}/{$width}x{$height}")){
		mkdir("{$uploadPath}/{$width}x{$height}");
	}

	$upload_error = false;
	try {

		$simpleImage = $t->simpleimagelib->get_simple_image_instance();

		$simpleImage
			->fromFile($file)
			->thumbnail($width,$height,'center')
			->toFile("{$uploadPath}/{$width}x{$height}/$name", 'image/png');

	} catch(Exception $err) {
		$error =  $err->getMessage();
		$upload_error = true;
	}

	if($upload_error){
		echo $error;
	} else {
		return true;
	}


}

function odeme_durum ($id) {

    if ($id==99) { $a="Sipariş Bekliyor";}
    if ($id==1) { $a="Sipariş Bekliyor";}
    if ($id==89) { $a="Hazırlanıyor";}
    if ($id==79) { $a="Gönderiliyor";}
    if ($id==69) { $a="Onaylandı";}
    if ($id==59) { $a="Teslimatta";}
    if ($id==0) { $a="İptal Edildi";}

    return $a;
}


function resim_orjinal_yukle($file, $uploadPath, $name){

	$t = &get_instance();
	$t->load->library("simpleimagelib");


	if(!is_dir("{$uploadPath}/")){
		mkdir("{$uploadPath}/");
	}

	$upload_error = false;
	try {

		$simpleImage = $t->simpleimagelib->get_simple_image_instance();

		$simpleImage
			->fromFile($file)
			->toFile("{$uploadPath}/$name", 'image/png');

	} catch(Exception $err) {
		$error =  $err->getMessage();
		$upload_error = true;
	}

	if($upload_error){
		echo $error;
	} else {
		return true;
	}


}


function galeri_yukle($file, $uploadPath, $name,$yolu){

	$t = &get_instance();
	$t->load->library("simpleimagelib");


	if(!is_dir("{$uploadPath}/{$yolu}")){
		mkdir("{$uploadPath}/{$yolu}");
	}

	$upload_error = false;
	try {

		$simpleImage = $t->simpleimagelib->get_simple_image_instance();

		$simpleImage
			->fromFile($file)
			->toFile("{$uploadPath}/{$yolu}/$name", 'image/png');

	} catch(Exception $err) {
		$error =  $err->getMessage();
		$upload_error = true;
	}

	if($upload_error){
		echo $error;
	} else {
		return true;
	}


}

function tarih($format, $datetime = 'now')
{
	$z = date("$format", strtotime($datetime));
	$gun_dizi = array(
		'Monday' => 'Pazartesi',
		'Tuesday' => 'Salı',
		'Wednesday' => 'Çarşamba',
		'Thursday' => 'Perşembe',
		'Friday' => 'Cuma',
		'Saturday' => 'Cumartesi',
		'Sunday' => 'Pazar',
		'January' => 'Ocak',
		'February' => 'Şubat',
		'March' => 'Mart',
		'April' => 'Nisan',
		'May' => 'Mayıs',
		'June' => 'Haziran',
		'July' => 'Temmuz',
		'August' => 'Ağustos',
		'September' => 'Eylül',
		'October' => 'Ekim',
		'November' => 'Kasım',
		'December' => 'Aralık',
		'Mon' => 'Pts',
		'Tue' => 'Sal',
		'Wed' => 'Çar',
		'Thu' => 'Per',
		'Fri' => 'Cum',
		'Sat' => 'Cts',
		'Sun' => 'Paz',
		'Jan' => 'Oca',
		'Feb' => 'Şub',
		'Mar' => 'Mar',
		'Apr' => 'Nis',
		'Jun' => 'Haz',
		'Jul' => 'Tem',
		'Aug' => 'Ağu',
		'Sep' => 'Eyl',
		'Oct' => 'Eki',
		'Nov' => 'Kas',
		'Dec' => 'Ara',
	);
	foreach ($gun_dizi as $en => $tr) {
		$z = str_replace($en, $tr, $z);
	}
	if (strpos($z, 'Mayıs') !== false && strpos($format, 'F') === false) $z = str_replace('Mayıs', 'May', $z);
	return $z;
}

function mailayar(){


	$ayar=ayarlar();
	$config = array(

		"protocol"   => "smtp",
		"smtp_host"  => $ayar->smtp_host,
		"smtp_port"  => $ayar->smtp_port,
		"smtp_user"  => $ayar->smtp_user,
		"smtp_pass"  => $ayar->smtp_pass,
		"smtp_crypto"=> $ayar->smtp_ssl,
		"starttls"   => true,
		"charset"    => "utf-8",
		"mailtype"   => "html",
		"wordwrap"   => true,
		"newline"    => "\r\n"
	);



	return $config;


}


function bayrak($id) {

	if($id==1) {
		$bayrak = base_url("assets/images/flags/")."assets/images/flags/tr.jpg";
	}

	if($id==2) {
		$bayrak = base_url("")."assets/images/flags/us.jpg";
	}
	if($id==3) {
		$bayrak = base_url("")."assets/images/flags/germany.jpg";
	}
	if($id==3) {
		$bayrak = base_url("")."assets/images/flags/germany.jpg";
	}

	return $bayrak;


}


function kategori($id) {

    if($id==1) {
        $kategori= "Ürünler";
    }
    if($id==2) {
        $kategori= "Haberler";
    }
    if($id==3) {
        $kategori= "Hizmetler";
    }
    if($id==4) {
        $kategori= "Projeler";
    }
    if($id==5) {
        $kategori= "Portfolio";
    }
    if($id==6) {
        $kategori= "Sayfalar";
    }
    if($id==7) {
        $kategori= "Diğer";
    }



    return $kategori;


}


function dil($id) {

	if($id==1) {
		$dil ="tr";
	}

	if($id==38) {
		$dil ="en";
	}
	if($id==3) {
		$dil ="ger";
	}

	return $dil;
}
