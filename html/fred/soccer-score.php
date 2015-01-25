<?php
  //Set the Content Type
  header('Content-type: image/jpeg');

  // Create Image From Existing File
  $imgJpg = imagecreatefromjpeg('images/soccer-score-480.jpg');

  // Allocate A Color For The Text
  $yellow = imagecolorallocate($imgJpg, 255, 255, 0);
  $white = imagecolorallocate($imgJpg, 255, 255, 255);

  // Set Path to Font File
  $digitalHeavy = 'fonts/digital/SF Digital Readout Heavy.ttf';
  $college = 'fonts/CollegiateFLF.ttf';

  // Set Text to Be Printed On Image
  $home = isset($_GET["home"])?$_GET["home"]:"00";
  $guest =  isset($_GET["guest"])?$_GET["guest"]:"00";
  $period = isset($_GET["period"])?$_GET["period"]:"1";
  $minutes = isset($_GET["minutes"])?$_GET["minutes"]:"00";
  $seconds = isset($_GET["seconds"])?$_GET["seconds"]:"00";
  $homename = isset($_GET["homename"])?$_GET["homename"]:"home";
  $guestname = isset($_GET["guestname"])?$_GET["guestname"]:"visitor";
  
  
  // Get Bounding Box Size for team names
  function centerText($font_size,$angle,$font,$text,$spacewidth,$startpixel){
  	$text_box = imagettfbbox($font_size,$angle,$font,$text);
	$textlocation = ($spacewidth/2 - ($text_box[2] - $text_box[0])/2) + $startpixel;
	return $textlocation;
  }
  
  // Get Bounding Box Size for team names
  function rightText($font_size,$angle,$font,$text,$startpixel){
  	$text_box = imagettfbbox($font_size,$angle,$font,$text);
	$textlocation = ($startpixel - round($text_box[2] - $text_box[0]));
	return $textlocation;
  }

  // Print Text On Image
  imagettftext($imgJpg, 68, 0, rightText(68,0,$digitalHeavy,$home,85), 113, $yellow, $digitalHeavy, $home);
  imagettftext($imgJpg, 68, 0, centerText(68,0,$digitalHeavy,$guest,76,372), 113, $yellow, $digitalHeavy, $guest);
  imagettftext($imgJpg, 50, 0, 275, 123, $yellow, $digitalHeavy, $period);
  imagettftext($imgJpg, 68, 0, 154, 67, $yellow, $digitalHeavy, $minutes);
  imagettftext($imgJpg, 68, 0, 263, 67, $yellow, $digitalHeavy, $seconds);
  imagettftext($imgJpg, 20, 0, centerText(20,0,$college,$homename,124,10), 40, $white, $college, $homename);
  imagettftext($imgJpg, 20, 0, centerText(20,0,$college,$guestname,124,348), 40, $white, $college, $guestname);

  // Send Image to Browser
  imagejpeg($imgJpg);

  // Clear Memory
  imagedestroy($imgJpg);
?>