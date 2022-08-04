<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";



if(isset($_POST['LOGO']) && $_POST['LOGO'] == 'Header'){
   $er=false;
    $TheLogoupload = "";//initial photo data value is empty


    //now, process attached photo
      if (isset($_FILES["logo"]) && !empty($_FILES["logo"]['name'])){
        $max_upload_size = 200;//in KB
        $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
        //define allowed file extensions
        $allowedExts = array("jpg", "jpeg", "png", "jpe");
        //get the extension of the uploaded file
        $extension = explode(".", $_FILES["logo"]["name"]);
        $extension = end($extension);
        //get the dimension of the uploaded file if necessary //it stores array values
        $photodimension = getimagesize($_FILES["logo"]["tmp_name"]);
        $photowidth = $photodimension[0];
        $photoheight = $photodimension[1];
        //$ImageType = $_FILES["logo"]["type"];

        //validate image
        if ((isset($_FILES["logo"]) && !empty($_FILES["logo"]['name'])) && (($_FILES["logo"]["type"] == "image/png") || ($_FILES["logo"]["type"] == "image/jpeg") || ($_FILES["logo"]["type"] == "image/pjpeg"))  && ($_FILES["logo"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
        {
          // if($max_upload_size > 200){
          //  $er = true;
          //   $errmsg = "Sorry only passport is allow";
          // }
          if($_FILES["logo"]["error"] > 0){
           $er = true;
            $errmsg = "Error: " . $_FILES["logo"]["error"];
          }else{
            //now convert image to base64
            //the class and methods are loaded from the included photo.class.php file
            if (isset($_FILES["logo"]) && $_FILES["logo"]["error"] <= 0) {
              $file_tmp_name = $_FILES["logo"]["tmp_name"];
              $file_name = $_FILES["logo"]["name"];    
              $photo = new Photo($file_tmp_name);
              $photo->scaleToMaxSide(331);
              $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
              $TheLogoupload = $addr['photo'];
              //photo is ready to be stored in the database
              //the photo text data, $addr['photo'] should be stored in a medium text field in the database
              }
          }

        }else{
          //error has sele
         $er = true;
          if(!in_array($extension, $allowedExts)){
            //if the extension is not in the specified array of extensions
            $errmsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
          }
          elseif($photowidth > $photoheight){
            //this is an optional

            $errmsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
          }
          elseif($_FILES["logo"]["size"] > $max_upload_size){
            //if the size is greater than specified max size
            $errmsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
          }
          else{
            $errmsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
          }
        }
    }

    if($er==false){
        $logo_query = mysqli_query($connect,"UPDATE logo SET  logo = '$TheLogoupload'") or die(mysqli_error($connect));
        if ($logo_query>0){
           $er = false;
            $succes = 'logo was succesfully uploaded.';
            
        }else{
           $er = true;
            $errmsg = "Errro";
        }
    }
}




?>
<title><?=TITLE3;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Upload Logo         
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                        <?php echo get_phrase('Upload_Logo');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('update-logo.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Current Logo:</label>
                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <?=$logo;?>
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="logo" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="LOGO" value="Header" class="btn btn-success"> Submit to Change</button>
                                  </div>
                                </div>

                            </form>
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS--->
                
            </div>
        </div>
    </div>




      <?php require "inc/footer.php"?>
           
           

</div>