<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


if(isset($_POST['WHAT_WE_DO']) && $_POST['WHAT_WE_DO'] == 'Set_DO'){
    $er = false;
    $w_heading1 = $_SESSION['w_heading1'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['w_heading1'])))));
    $w_content1 = $_SESSION['w_content1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['w_content1']))))));
    $w_heading2 = $_SESSION['w_heading2'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['w_heading2'])))));
    $w_content2 = $_SESSION['w_content2'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['w_content2']))))));
    $destination = "../../../upload";
    $image_name = $_FILES['w_image1']['name'];
    $image_type = $_FILES['w_image1']['type'];
    $image_size = $_FILES['w_image1']['size'];
    $image_tmp  = $_FILES['w_image1']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_w_image1 = strtoupper("what_we_do_1_".date("Y")).".".$image_extension;

        

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

    $image_name = $_FILES['w_image2']['name'];
    $image_type = $_FILES['w_image2']['type'];
    $image_size = $_FILES['w_image2']['size'];
    $image_tmp  = $_FILES['w_image2']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_w_image2 = strtoupper("what_we_do_2_".date("Y")).".".$image_extension;

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
                if($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){
                    $what_we_do_query = mysqli_query($connect, "UPDATE what_we_do SET w_heading1 = '$w_heading1', w_content1 = '$w_content1', w_image1 = 'upload/$Represent_w_image1', w_heading2 = '$w_heading2', w_content2 = '$w_content2', w_image2 = 'upload/$Represent_w_image2'") or die(mysqli_error($connect));

                        if ($what_we_do_query>0){
                            $er = false;
                             move_uploaded_file($_FILES['w_image1']['tmp_name'],"$destination/$Represent_w_image1");                             
                             move_uploaded_file($_FILES['w_image2']['tmp_name'],"$destination/$Represent_w_image2");                             
                             
                             $succes= "Your Image as been successful!";
                        }           
                }                              
            }


}


?>



<title><?=TITLE20;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    What We Do        
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase(' What We Do ');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('what-we-do.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">1st Heading:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" required="" name="w_heading1"  placeholder="First Heading"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">1st Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" required=""  rows="8" name="w_content1" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">1st Image:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" required="" name="w_image1" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>







                                    <div class="form-group">
                                    <label class="col-sm-3 control-label">2st Heading:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" required=""  name="w_heading2"  placeholder="First Heading"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">2st Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" required=""  rows="8" name="w_content2" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">2st Image:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" required=""  name="w_image2" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="WHAT_WE_DO" value="Set_DO" class="btn btn-success"> Submit to Change</button>
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