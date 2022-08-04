<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


if(isset($_POST['slider']) && $_POST['slider'] == 'Post_Slider'){
    $er = false;
    $title1 = $_SESSION['title1'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title1'])))));
    $description1 = $_SESSION['description1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['description1']))))));
    $title2 = $_SESSION['title2']= mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title2'])))));
    $description2 = $_SESSION['description2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['description2']))))));
    $title3 = $_SESSION['title3'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['title3'])))));
    $description3 = $_SESSION['description3'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['description3']))))));

    if(empty($title1) || empty($title3) || empty($title2) || empty($description1) || empty($description2) || empty($description3)){
        $er  = true;
       $errmsg = "This fields can not be empty.";
    }else{
        $image_name = $_FILES['slider1']['name'];
        $image_type = $_FILES['slider1']['type'];
        $image_size = $_FILES['slider1']['size'];
        $image_tmp  = $_FILES['slider1']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider1 = strtoupper("AOS_SLIDER1_".date("Y")).".".$image_extension;

        $image_name = $_FILES['slider2']['name'];
        $image_type = $_FILES['slider2']['type'];
        $image_size = $_FILES['slider2']['size'];
        $image_tmp  = $_FILES['slider2']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider2 = strtoupper("AOS_SLIDER2_".date("Y")).".".$image_extension;

        $image_name = $_FILES['slider3']['name'];
        $image_type = $_FILES['slider3']['type'];
        $image_size = $_FILES['slider3']['size'];
        $image_tmp  = $_FILES['slider3']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1034;//kb
         $Representgallery_slider3 = strtoupper("AOS_SLIDER3_".date("Y")).".".$image_extension;

            $destination = '../../../upload';
            if (!in_array($image_extension, $image_allowed_extention)) {
                    $er = true;
                    $errmsg = "File not allowed";
                }

                if (!in_array($image_type, $image_allowed_type)) {
                    $er = true;
                    $errmsg = "Invalid Image type";
                }

                if ($image_size > ($image_allowed_size*1024)){
                    $er = true;
                    $errmsg = "Sorry Image size should not be less than 100kb";
                }

                if ($er == false){
                    //Insert Query
                    if ($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                    $slider_query = mysqli_query($connect, "UPDATE slider SET title1 = '$title1', title2 = '$title2', title3 = '$title3', description1 = '$description1', description2 = '$description2', description3 = '$description3', image1 = 'upload/$Representgallery_slider1', image2 = 'upload/$Representgallery_slider2', image3 = 'upload/$Representgallery_slider3'") or die(mysqli_error($connect));

                            if ($slider_query>0){
                                $er = false;
                                 move_uploaded_file($_FILES['slider1']['tmp_name'],"$destination/$Representgallery_slider1");
                                 move_uploaded_file($_FILES['slider2']['tmp_name'],"$destination/$Representgallery_slider2");
                                 move_uploaded_file($_FILES['slider3']['tmp_name'],"$destination/$Representgallery_slider3");

                                $succes = "Your Image as been successful!";
                            }           
                    }
                
                }else{
                    $er = true;
                    $errmsg = "This page is corrupt.";
                }
                
            

               

    }
}


?>

<title><?=TITLE4;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Slider Update         
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Update_Slider');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('update-slider.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle 1:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 30 characters</em></strong>
                                        <input type="text" class="form-control" name="title1" value="<?php echo $get_slider['title1'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description 1:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 50 characters</em></strong>
                                        <input type="text" class="form-control" name="description1" value="<?php echo $get_slider['description1'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 1:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_slider['image1'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="slider1" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>








                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle 2:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 30 characters</em></strong>
                                        <input type="text" class="form-control" name="title2" value="<?php echo $get_slider['title2'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description 2:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 50 characters</em></strong>
                                        <input type="text" class="form-control" name="description2" value="<?php echo $get_slider['description2'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 2:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?=base_home('');?><?=$get_slider['image2'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="slider2" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>








                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle 3:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 30 characters</em></strong>
                                        <input type="text" class="form-control" name="title3" value="<?php echo $get_slider['title3'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description 3:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most not longer than 50 characters</em></strong>
                                        <input type="text" class="form-control" name="description3" value="<?php echo $get_slider['description3'];?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 3:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?=base_home('');?><?=$get_slider['image3'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="slider3" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="slider" value="Post_Slider" class="btn btn-success"> Submit to Change</button>
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