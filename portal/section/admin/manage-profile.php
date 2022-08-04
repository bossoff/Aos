<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";


if(isset($_POST['Profile']) && $_POST['Profile'] == 'Updateed'){
    $er = false;
    date_default_timezone_set('Africa/Lagos');// change according timezone
    $currentTime = date( 'd-m-Y h:i:s A', time () );

    $email = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(strtolower($_POST['email']))))));
    // $email = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(strtolower($_POST['email']))))));
    $firstname = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['firstname']))))))));
    $lastname = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['lastname']))))))));
    $middle = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['middle']))))))));

        $name = 'Mr. '.$firstname;
        $image_name = $_FILES['userfile']['name'];
        $image_type = $_FILES['userfile']['type'];
        $image_size = $_FILES['userfile']['size'];
        $image_tmp  = $_FILES['userfile']['tmp_name'];
        $image_extension = explode('.', $image_name);
        $image_extension = end($image_extension);
        $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
        $image_allowed_extention = array('jpeg','jpg','png','gif');
        $image_allowed_size = 1024;//kb
         $Representgallery_userfile = strtoupper($name."_profile")."_".date("y").".".$image_extension;

            // $destination1 = base_home('upload');
            $destination = '../../../upload';
            if (empty('userfile')){
                $er = true;
                $errmsg = "Sorry this field is require";
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
                    $errmsg = "Sorry Image size should not be less than 1024kb";
                }
            }

      if($er == false){
        if($image_type=='image/jpeg' || $image_type=='image/png' || $image_type=='image/jpg' || $image_type=='image/gif'){  
             $query_update = mysqli_query($connect, "UPDATE ceoadmin SET firstname = '$firstname', email = '$email', middle = '$middle', lastname = '$lastname', avartar = 'upload/$Representgallery_userfile', name = '$name'")or die(mysqli_error($connect));
                 move_uploaded_file($_FILES['userfile']['tmp_name'],"$destination/$Representgallery_userfile");
            if($query_update>0){
                $er = false;
                $succes = "Your Profile as been updated.";
            }

            if($query_update==0){
                $er = true;
                $errmsg = "Unable to update profile";
            }
        }
    }
}


// public function cleanInput($input)
// {
//     $secure = htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($input)))))));

//     return $secure;
// }

if(isset($_POST['change']) && $_POST['change'] == 'pass'){
    $er = false;
    $password = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['cpassword']))))))));
    $new_password = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['new_password']))))))));
    $confirm_new_password = mysqli_real_escape_string($connect, htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtolower(removeBadChars($_POST['confirm_new_password']))))))));
    $query_password = mysqli_query($connect, "SELECT password FROM ceoadmin WHERE email = '".$_SESSION['ad_email']."'");
    $get_password = mysqli_fetch_assoc($query_password);


    if($password != $get_password['password']){
        $er = true;
        $errmsg = "You have to provide your current password.";
    }

    if($new_password!=$confirm_new_password){
        $er = true;
        $errmsg = 'New password and Confirm Password do not match.';
    }else{
        if($er==false){
            $new_password = md5(sha1($new_password)).sha1($new_password);
            $insert = mysqli_query($connect, "UPDATE ceoadmin SET password = '$new_password'");
            if(!empty($insert)){
                $er = false;
                $succes = 'Your password has been updated.';
            }
        }
    }



}


?>



<?php
require 'inc/header.php'
?>
<title><?=TITLE2;?></title>

<script type="text/javascript">
    
   
    
</script>


            
            <!-- <hr style="margin-top:0px;" /> -->
           <h3 style="">
            <i class="entypo-right-circled"></i> 
                Manage Profile         
            </h3>  
    <div class="row">
    	<div class="col-md-12">
        

        	<!------CONTROL TABS START------>
    		<ul class="nav nav-tabs bordered">

    			<li class="active">
                	<a href="#list" data-toggle="tab"><i class="entypo-user"></i> 
    					Manage Profile
                        	</a></li>
    		</ul>
        	<!------CONTROL TABS END------>         
    	
    		<div class="tab-content" >
            	<!----EDITING FORM STARTS---->
    			<div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content">
                            <form action="<?=base_url('manage-profile.php');?>" method="POST" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"> 
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Portal Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="name" readonly value="<?php echo $row_admin['name'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">email:</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="email" value="<?php echo $row_admin['email'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Surname:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="firstname" value="<?php echo $row_admin['firstname'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Firstname:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="lastname" value="<?php echo $row_admin['lastname'];?>"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Middle Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="middle" value="<?php echo $row_admin['middle'];?>"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Photo:</label>
                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <img src="<?=base_home('');?><?=$avartar;?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="userfile" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="Profile" value="Updateed" class="btn btn-success">Update Profile</button>
                                  </div>
    								</div>
                            </form>
    					
                    </div>
    			</div>
                <!----EDITING FORM ENDS-->
                
    		</div>
    	</div>
    </div>


    <!--password-->
    <div class="row">
    	<div class="col-md-12">
        
        	<!------CONTROL TABS START------->
    		<ul class="nav nav-tabs bordered">

    			<li class="active">
                	<a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
    					<?php echo get_phrase('change_password');?>
                        	</a></li>
    		</ul>
        	<!------CONTROL TABS END------->
            
    	
    		<div class="tab-content">
            	<!----EDITING FORM STARTS---->
    			<div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
    					
                            <form action="<?=base_url('manage-profile.php');?>" method="POST" class="form-horizontal form-groups-bordered validate" target="top">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Current Password:</label>
                                    <div class="col-sm-5">
                                        <input type="password" required="" class="form-control" name="cpassword" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">New Password:</label>
                                    <div class="col-sm-5">
                                        <input type="password" required="" class="form-control" name="new_password" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Confirm New Password:</label>
                                    <div class="col-sm-5">
                                        <input type="password" required="" class="form-control" name="confirm_new_password" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="change" value="pass" class="btn btn-success"> Submit to Change</button>
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