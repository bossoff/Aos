<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_POST['Our_student']) && $_POST['Our_student'] == 'Set_Student'){
    $er = false;
    $s_topic = $_SESSION['s_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['s_topic'])))));
    $s_content = $_SESSION['s_content'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['s_content'])))));

    $image_name = $_FILES['s_image']['name'];
    $image_type = $_FILES['s_image']['type'];
    $image_size = $_FILES['s_image']['size'];
    $image_tmp  = $_FILES['s_image']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_s_image = strtoupper("AOS_OUR_STUDENT_".date("Y")).".".$image_extension;

        $destination = "../../../upload";
        if (empty($_POST['s_topic']) || empty('s_content') || empty($_FILES['s_image']['name'])){
            $er = true;
            $errmsg = "All Field most not empty.";
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
                    $Our_student_query = mysqli_query($connect, "UPDATE our_students SET s_topic = '$s_topic', s_short_content = '$s_content', s_content = '$s_content', s_image = 'upload/$Represent_s_image'") or die(mysqli_query($connect));                 
                    // $news_query = mysqli_query($connect,"INSERT INTO update_news SET user_level = '$user_logins', title = '$ntitle', short_content = '$ncontent', content = '$ncontent', s_image = '$Represent_s_image'") or die(mysqli_error($connect));
                        if ($Our_student_query>0){
                            $er = false;
                             move_uploaded_file($_FILES['s_image']['tmp_name'],"$destination/$Represent_s_image");
                            $succes = "This content as been updated.";
                       }                
                }                 
            }
        }
}

?>



<title><?=TITLE16;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Director's Note       
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Director Note');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('dirctor_note.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="s_topic" value="<?php echo $get_student['s_topic'];?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="s_content" value="<?php echo $get_student['s_s_content'];?>"/></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <img src="<?=base_home('');?><?=$get_student['s_image'];?>">
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="s_image" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="Our_student" value="Set_Student" class="btn btn-success"> Submit to Change</button>
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