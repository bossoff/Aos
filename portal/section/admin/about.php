<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_POST['About']) && $_POST['About'] == 'Set_ABOUT'){
    $er = false;
    $a_heading = $_SESSION['a_heading'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['a_heading'])))));
    $a_content = $_SESSION['a_content'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['a_content']))))));
    $a_video_link = $_SESSION['a_video_link'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['a_video_link'])))));
    if (empty($a_content) || empty($a_heading) || empty($a_video_link)) {
        $er = true;
        $errmsg = "This Field can not be empty.";
    }else{
        if($er == false){
        $about_query = mysqli_query($connect, "UPDATE about SET a_heading = '$a_heading', a_content = '$a_content', a_video_link = '$a_video_link'");
            if(!empty($about_query)){
               $er = false;
               $succes = "About Us as been updated successfully.";          
            }
        }
    }    
}


?>



<title><?=TITLE19;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    About Us      
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('About Us');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('about.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                             <div class="form-group">
                                    <label class="col-sm-3 control-label">About Heading:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="a_heading" placeholder="About Heading"/>
                                    </div>
                                </div>

                                  <div class="form-group">
                                    <label class="col-sm-3 control-label">About Video Link:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="a_video_link" placeholder="http://"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="a_content" placeholder="Enter ..."/></textarea>
                                    </div>
                                </div>                


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" required="" name="About" value="Set_ABOUT" class="btn btn-success"> Submit to Change</button>
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