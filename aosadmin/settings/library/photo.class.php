<?php
 
/*
* Old filename: SimpleImage.php
* Author: Simon Jarvis
* Copyright: 2006 Simon Jarvis
* Date: 08/11/06
* Link: http://www.white-hat-web-design.co.uk/articles/php-image-resizing.php
*
* This program is free software; you can redistribute it and/or
* modify it under the terms of the GNU General Public License
* as published by the Free Software Foundation; either version 2
* of the License, or (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details:
* http://www.gnu.org/licenses/gpl.html
*
*/

function embeddedImg1($photo) {
	
   $base64 = explode(";", $photo);
   if(count($base64) >= 3) {
     $base64 = $base64[2];
     $base64 = explode(":", $base64);
     if(count($base64) >= 2) {
       $base64 = str_replace(" ", "", $base64[1]);
       return ($photo != "" ? '<img alt="User Image" class="img-circle"  style=" height:auto; -moz-border-radius:15px;" src="data:image/jpg;base64,'.$base64.'"/><br>' : "");

     }
   }
   return "";
}
function embeddedImg2($photo) {
   
   $base64 = explode(";", $photo);
   if(count($base64) >= 3) {
     $base64 = $base64[2];
     $base64 = explode(":", $base64);
     if(count($base64) >= 2) {
       $base64 = str_replace(" ", "", $base64[1]);
       return ($photo != "" ? '<img alt="User Image" class="user-image"  style="width:30px; height:auto; margin-right:0px; margin-bottom:-20px; -moz-border-radius:15px;" src="data:image/jpg;base64,'.$base64.'"/><br>' : "");
       
     }
   }
   return "";
}
function embeddedImglogo($photo) {
   
   $base64 = explode(";", $photo);
   if(count($base64) >= 3) {
     $base64 = $base64[2];
     $base64 = explode(":", $base64);
     if(count($base64) >= 2) {
       $base64 = str_replace(" ", "", $base64[1]);
       return ($photo != "" ? '<img alt="User Image"  class="img-responsive" alt="" width="159" style="margin-top:-2px; height:auto;  -moz-border-radius:15px;" src="data:image/jpg;base64,'.$base64.'"/><br>' : "");
       
     }
   }
   return "";
}

class Photo {
 
   var $filename;
   var $image;
   var $image_type;
 
   function __construct($filename) {
   	$this->filename = $filename;
   	$this->load($filename);
   }

   function scaleToMaxSide($max_side) {
   	 if($this->getWidth() > $this->getHeight()) {
   	   $this->resizeToWidth($max_side);
   	 } else {
   	   $this->resizeToHeight($max_side);
   	 }
   }

   function getBase64() {
   	 $filename = $this->filename;
   	 $this->save($filename); // Save as JPG
     $data  = fread(fopen($filename, "r"), filesize($filename));
     return 'PHOTO;ENCODING=BASE64;TYPE=JPEG:'
            .base64_encode($data);
   }

   function load($filename) {
 
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
 
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
 
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
 
         $this->image = imagecreatefrompng($filename);
      }
   }

   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image,$filename);
      }
      if( $permissions != null) {
 
         chmod($filename,$permissions);
      }
   }

   function output($image_type=IMAGETYPE_JPEG) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($this->image);
      }
   }
   function getWidth() {
 
      return imagesx($this->image);
   }
   function getHeight() {
 
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
 
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
 
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
 
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }
 
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      
 
}
?>