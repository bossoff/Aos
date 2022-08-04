<?php
require "library/photo.class.php";

// slider
$slider_Query = mysqli_query($connect, "SELECT * FROM slider");
	if(!empty($slider_Query)){
		$fetch_slider = mysqli_fetch_assoc($slider_Query);

		$title1 = $fetch_slider['title1'];
		$decription1 = $fetch_slider['description1'];
		$image1 = $fetch_slider['image1'];

		$title2 = $fetch_slider['title2'];
		$decription2 = $fetch_slider['description2'];
		$image2 = $fetch_slider['image2'];

		$title3 = $fetch_slider['title3'];
		$decription3 = $fetch_slider['description3'];
		$image3 = $fetch_slider['image3'];
	}

// logo
$logo_query = mysqli_query($connect, "SELECT * FROM logo");
	if(!empty($logo_query)){
		$fetch_logo = mysqli_fetch_assoc($logo_query);
		$logo = embeddedImglogoHome($fetch_logo['logo']);
	}

// testimonies
// $testimonies_query = mysqli_query($connect, "SELECT * FROM testimony");
// 	if(!empty($testimonies_query)){
// 		$fetch_testimony = mysqli_fetch_assoc($testimonies_query);
// 		$tphoto = embeddedImgtestimony($fetch_testimony['tphoto']);
// 		$comment = $fetch_testimony['comment'];
// 		$occupation = $fetch_testimony['customer_name'];
// 	}

// ABOUT
	
?>



