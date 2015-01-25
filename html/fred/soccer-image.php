<?php
  //Set the Content Type
  header('Content-type: image/jpeg');

  // Create Image From Existing File
  $imgPng = imagecreatefrompng('images/soc-3rd-853.png');
  imagealphablending($imgPng, true);
  imagesavealpha($imgPng, true);

  // Allocate A Color For The Text
  $white = imagecolorallocate($imgPng, 255, 255, 255);

  // Set Path to Font File
  $font_path = 'fonts/CollegiateFLF.ttf';

  // Set Text to Be Printed On Image
  $text = $_GET["title"];
  $subtext =  $_GET["subtitle"];

  // Print Text On Image
  imagettftext($imgPng, 25, 0, 150, 75, $white, $font_path, $text);
  imagettftext($imgPng, 20, 0, 150, 100, $white, $font_path, $subtext);

  // Send Image to Browser
  imagepng($imgPng);

  // Clear Memory
  imagedestroy($imgPng);
?>