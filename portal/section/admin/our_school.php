<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_POST['gallery']) && $_POST['gallery'] == 'Set_GALLERY'){
	$er = false;
	$s_title = $_SESSION['s_title'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['s_title'])))));	
    $image_name = $_FILES['image1']['name'];
    $image_type = $_FILES['image1']['type'];
    $image_size = $_FILES['image1']['size'];
    $image_tmp  = $_FILES['image1']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image1 = strtoupper("AOS_WELCOME_GALLERY1_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image2']['name'];
    $image_type = $_FILES['image2']['type'];
    $image_size = $_FILES['image2']['size'];
    $image_tmp  = $_FILES['image2']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image2 = strtoupper("AOS_WELCOME_GALLERY2_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image3']['name'];
    $image_type = $_FILES['image3']['type'];
    $image_size = $_FILES['image3']['size'];
    $image_tmp  = $_FILES['image3']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image3 = strtoupper("AOS_WELCOME_GALLERY3_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image4']['name'];
    $image_type = $_FILES['image4']['type'];
    $image_size = $_FILES['image4']['size'];
    $image_tmp  = $_FILES['image4']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image4 = strtoupper("AOS_WELCOME_GALLERY4_".date("Y")).".".$image_extension;

    $image_name = $_FILES['image5']['name'];
    $image_type = $_FILES['image5']['type'];
    $image_size = $_FILES['image5']['size'];
    $image_tmp  = $_FILES['image5']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Representgallery_image5 = strtoupper("AOS_WELCOME_GALLERY5_".date("Y")).".".$image_extension;

        $destination = "../../../upload";
        if (empty($_POST['s_title']) || empty('image1') || empty('image2') || empty('image3') || empty('image4') || empty('image5')){
            $er = true;
            $errmsg = "This field is required.";
        }else{

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
                    $query = mysqli_query($connect,"UPDATE school_advert SET s_title = '$s_title', image1 = 'upload/$Representgallery_image1', image2 = 'upload/$Representgallery_image2', image3 = 'upload/$Representgallery_image3', image4 = 'upload/$Representgallery_image4', image5 = 'upload/$Representgallery_image5'") or die(mysqli_error($connect));
                        if ($query>0){
                            $er = false;
                             move_uploaded_file($_FILES['image1']['tmp_name'],"$destination/$Representgallery_image1");
                             move_uploaded_file($_FILES['image2']['tmp_name'],"$destination/$Representgallery_image2");
                             move_uploaded_file($_FILES['image3']['tmp_name'],"$destination/$Representgallery_image3");
                             move_uploaded_file($_FILES['image4']['tmp_name'],"$destination/$Representgallery_image4");
                             move_uploaded_file($_FILES['image5']['tmp_name'],"$destination/$Representgallery_image5");
                            $succes = "Your Image as been successfully upload.";
            			}           
            	}
	        
            }  
            
        }
}

?>



<title><?=TITLE15;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Welcome to Our School         
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Update Our School');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('our_school.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle:</label>
                                    <div class="col-sm-5">
                                        <strong><em>It most be long characters</em></strong>
                                        <input type="text" class="form-control" name="s_title" value="<?php echo $get_school['s_title'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <strong><em>This first Image most be portrait.</em></strong>

                                    <label for="field-1" class="col-sm-3 control-label">Image 1:</label>                                    
                                    <div class="col-sm-5">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_school['image1'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image1" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 2:</label>                                    
                                    <div class="col-sm-5">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_school['image2'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image2" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                 <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 3:</label>                                    
                                    <div class="col-sm-5">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_school['image3'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image3" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>








                                 <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 4:</label>                                    
                                    <div class="col-sm-5">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_school['image4'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image4" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                 <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image 5:</label>                                    
                                    <div class="col-sm-5">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_school['image5'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="image5" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>





                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="gallery" value="Set_GALLERY" class="btn btn-success"> Submit to Change</button>
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