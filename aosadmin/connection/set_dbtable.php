<?php
$error = false;
$server = 'localhost'; $db_name = 'root'; $db_password = '';
$con = mysqli_connect($server, $db_name, $db_password) or die("Sorry Could not to the Server Sir".mysqli_error($con));
if($con == false){
	die("ERROR: occour");
}else{
	// CREATION OF THE  DATABASE IS START HERE!
	$DATABASE = "CREATE DATABASE `ngmedia` CHARACTER SET utf8 COLLATE utf8_general_ci";
	if(mysqli_query($con,$DATABASE)){
		$error = true;
		$dbrr = "The DATABASE as been successful Created.";
		//echo "The DATABASE as been successful Created.";
		
		if($dbrr == "The DATABASE as been successful Created."){
			require "../dbconnect/database.php";
			// THIS IS THE CRETION OF THE ADMIN TABLE 
			$ADMIN = "CREATE TABLE `ngmedia`.`admin` ( `id` INT NOT NULL AUTO_INCREMENT , 
						`firstname` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`lastname` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`username` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`phone` VARCHAR(14) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`Status` INT NOT NULL DEFAULT '0' , 
						`tokin` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`password` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`con_password` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
						`last_register` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
						-- `date_register` DATE NOT NULL DEFAULT CURRENT_DATE, 
						-- `time_register` TIME NOT NULL DEFAULT CURRENT_TIME,
						PRIMARY KEY (`id`), UNIQUE (`username`), UNIQUE (`email`))";
				if(mysqli_query($connect,$ADMIN)){
				echo "<h3>Your ADMIN Table has been be created successful.</h3> <br/>";
				}else{
					echo "CRITICAL ERROR detected and The Admin Table has not been Created. Please check your running code. <br/>";
				}
		

			$LOGIN_ATTEMPTS = "CREATE TABLE `ngmedia`.`login_attempts` ( `login_id` INT NOT NULL AUTO_INCREMENT ,
								 `login_username` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
								 `login_time` TIME NOT NULL ,
								 `login_ip` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
								 `login_count` INT NOT NULL DEFAULT '0' , 
								 PRIMARY KEY (`login_id`)) ENGINE = InnoDB";
				if(mysqli_query($connect,$LOGIN_ATTEMPTS)){
				echo "<h3>Your LOGIN_ATTEMPTS Table has been be created successful.</h3> <br/>";
				}else{
					echo "CRITICAL ERROR detected and The LOGIN_ATTEMPTS Table has not been Created. Please check your running code. <br/>";
				}


			$USER_TABLE  = "CREATE TABLE `ngmedia`.`user` ( `userid` INT NOT NULL AUTO_INCREMENT , 
							`user_login` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
							`user_level` ENUM('Normal','Admin','Vip','Spammer') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Normal', 
							`user_name` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
							`user_email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
							`phone` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
							`user_password` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
							`firstname` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`lastname` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , `reg_date` DATE NULL , 
							`reg_time` TIME NULL , 
							`user_lastlogin` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00' , 
							`user_url` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`user_ip` VARCHAR(26) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' , 
							`user_lastip` VARCHAR(26) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' , 
							`address` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`city` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`state` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`public_email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`user_avatar_source` VARCHAR(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`user_occupation` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`facebook` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`yahoo` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`googleplus` VARCHAR(225) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`user_language` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL , 
							`status_switch` TINYINT NULL DEFAULT '0' , 
							`status_comment` TINYINT NULL DEFAULT '0' , 
							`status_email` TINYINT NULL DEFAULT '0' , PRIMARY KEY (`userid`)) ENGINE = InnoDB";
				if(mysqli_query($connect,$USER_TABLE)){
				echo "<h3>Your USER_TABLE Table has been be created successful.</h3> <br/>";
				}else{
					echo "CRITICAL ERROR detected and The USER_TABLE Table has not been Created. Please check your running code. <br/>";
				}


			$SLIDER_TABLE = "CREATE TABLE `ngmedia`.`slider` ( `slider1` BLOB NOT NULL , 
								`slider2` BLOB NOT NULL , 
								`slider3` BLOB NOT NULL , 
								`trending` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
								`slider_title` VARCHAR(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL , 
								`album_by` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ) ENGINE = InnoDB";
				if(mysqli_query($connect,$SLIDER_TABLE)){
					echo "<h3>Your SLIDER_TABLE Table has been be created successful.</h3> <br/>";
				}else{
					echo "CRITICAL ERROR detected and The SLIDER_TABLE Table has not been Created. Please check your running code. <br/>";
				}
		}

	}else{
		$error = true;
		die("ERROR: CRITICAL issue. DATABASE could not be CREATED". mysqli_error($con));;
	}



}

if(isset($dbrr)) echo "<h1>".$dbrr."</h1>";
?>