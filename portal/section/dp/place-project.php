<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['Pro']) && $_POST['Pro'] == 'Projects'){
    $er = false;
    $topic = mysqli_real_escape_string($connect,strtoupper($_POST['topic']));
    $supervisor = mysqli_real_escape_string($connect,ucfirst(strtolower($_POST['supervisor'])));
    $school = mysqli_real_escape_string($connect,ucfirst($_POST['institution']));
    $fullname = mysqli_real_escape_string($connect,ucwords(strtolower($_POST['fullname'])));
    $year = mysqli_real_escape_string($connect,ucwords(strtolower($_POST['year'])));

    if($er == false){
        // $check = mysqli_query($connect, "SELECT project_up FROM project WHERE uid = '$uid'");
        // if(!empty($check)){}
        $queryin = mysqli_query($connect, sprintf("INSERT INTO project SET topic = '$topic', supervisor = '$supervisor', uid = '$uid', matric = '$matric', phone = '$phone', fullname = '$fullname', department = '$department', email = '$email',year = '$year', creation_date = '$currentTime', level = '$sub_level', school = '$school', project_up = 1"));
        // $queryNum = mysqli_num_rows($queryin);
        if(!empty($queryin)){
            $er = false;
            $succes = "Thank you for placing your first project";
            header("LOCATION: ".base_url("in_active.php?rdir=project_submitted%proceed"));
        }else{
            $er = true;
            $errmsg = "Unable to place Your project. Retry";
        }
    }
}

$check = mysqli_query($connect, "SELECT project_up FROM project WHERE uid = '$uid'");
$get = mysqli_fetch_assoc($check);
if($get['project_up'] == 1){
     header("LOCATION: ".base_url("project.php?rdir=project_submitted%exist"));
 }
require "inc/header.php";


?>
<title><?=TITLE2;?></title>
<h3 style="">
    <i class="entypo-right-circled"></i> 
    <?= $application_no;?> (Place Your Project)      
</h3> 

<hr>

 <div class="row">
        <div class="col-md-12">
        

            <!------CONTROL TABS START------>
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
                        Place Project
                            </a></li>
            </ul>
            <!------CONTROL TABS END------>         
        
            <div class="tab-content" >
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content">
                           <form action="<?=base_url('place-project.php');?>" method="POST" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Full Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="fullname" placeholder="Example: Kola abdulazeez kudrat" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Project Topic:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="topic"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Project Supervisor:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="supervisor"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Matric No:</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly="" class="form-control" required="" name="matric" value="<?=$matric;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Graduating Year:</label>
                                    <div class="col-sm-5">
                                        <input type="text"  class="form-control" required="" name="year" placeholder="Exameple @ 12, Octomber <?=date('Y');?>" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Level:</label>
                                    <div class="col-sm-3">
                                        <input type="text" required="" readonly="" class="form-control" name="level" value="<?=$level;?>" />
                                    </div>

                                    <label class="col-sm-2 control-label">Sub Level:</label>
                                    <div class="col-sm-3">
                                        <input type="text" required="" readonly="" class="form-control" name="sub_level" value="<?=$sub_level;?>" />
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Department:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" readonly="" class="form-control" name="department" value="<?=$department;?>"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Higher Institution:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="institution" placeholder="School Name"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Email:</label>
                                    <div class="col-sm-5">
                                        <input type="email" readonly="" class="form-control" required="" name="email" value="<?php echo $email;?>"/>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number:</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly="" required="" class="form-control" name="phone" value="<?=$phone;?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="Pro" value="Projects" class="btn bn-lg btn-success">Submit Project</button>
                                  </div>
                                    </div>
                            </form>
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS-->
                
            </div>
        </div>
    </div>


    
    <?php require "inc/footer.php"?>

      

</div>
