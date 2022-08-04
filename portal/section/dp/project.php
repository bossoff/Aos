<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
$check = mysqli_query($connect, "SELECT project_up FROM project WHERE uid = '$uid'");
$get = mysqli_fetch_assoc($check);
if($get['project_up'] == 0){
     header("LOCATION: ".base_url("place-project.php?rdir=no_active"));
 }
require "inc/header.php";
?>
<title><?=TITLE3;?></title>
<h3 style="">
    <i class="entypo-right-circled"></i> 
    <?= $application_no;?> (Project management)      
</h3> 

<hr>

                <a href="javascript:;" data-target="#modal-6" onclick="jQuery('#modal-6').modal('show', {backdrop: 'static'});" class="btn btn-primary pull-right"> 
               
                <i class="entypo-plus-circled"></i>
                Add Another Project
                </a> 
                <!-- <br><br> -->

                 <ul class="nav nav-tabs bordered">

                    <li class="active">
                        <a href="#list" data-toggle="tab"><i class="entypo-book"></i> 
                            Project Management
                        </a></li>
                </ul>
               <table class="table table-bordered datatable" id="table_export">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Topic</th>
                            <th>Supervisor</th>
                            <th>Fullname</th>
                            <th>Matric</th>
                            <th>Institusion</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $count = 1; 
                            $query_pro = mysqli_query($connect, "SELECT * FROM project WHERE uid ='$uid'");
                                

                            while ($get_row = mysqli_fetch_assoc($query_pro)) {
                               
                            ?>
                            <?php
                                //  if($get_row['status'] == 0){
                                //      $status_load = " <td class='btn-info'>Payment Available Soon</td>";
                                // }

                                // if($get_row['status'] == 3){
                                //      $status_load = " <td class='btn btn-danger'><a href='".base_url('payment.php?rdir=make_payment')."' style='color:#fff;'> Make Payment</a></td>";
                                // }

                                // elseif ($get_row['status'] == 2) {
                                //      $status_load = "<td class='btn-warning' style='color:#000;> In-progress</td>";
                                // }

                                // elseif($get_row['status'] == 1){
                                //      $status_load = "<td class='btn-success'> Completed</td>";
                                // }

                                
                            ?>


                        <tr>
                            <td><?= $count++;?></td>
                            <td><?= $get_row['topic'];?></td>
                            <td><?= $get_row['supervisor'];?></td>
                            <td><?= $get_row['fullname'];?></td>
                            <td><?= $get_row['matric'];?></td>
                            <td><?= $get_row['school'];?></td>
                            <!-- <td><?= $status_load;?></td> -->
                            <?php
                                // $get_row1 = mysqli_fetch_assoc($query_pro);
                                $status_load = '';
                                if($get_row['status'] == 0){
                                    echo $status_load = " <td class='btn-info'>Payment In-Active</td>";
                                }

                                elseif($get_row['status'] == 3){
                                    echo $status_load = " <td href='".base_url('payments.php?payment=').base64_encode($get_row['id'])."' style='color:#fff;'class='btn btn-danger'><a href='".base_url('payments.php?payment=').base64_encode($get_row['id'])."' style='color:#fff;'> Make Payment</a></td>";
                                }

                                elseif ($get_row['status'] == 2) {
                                    echo $status_load = "<td class='btn-warning' style='color: #000;'> In-Progress</td>";
                                }

                                elseif($get_row['status'] == 1){
                                    echo $status_load = "<td class='btn-success'> Completed</td>";
                                }
                            ?> 
                            <td>
                                
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Action <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-default pull-right" role="menu">
                                        
                                        <li>
                                            <a href="#">
                                                <i class="entypo-pencil"></i>
                                                    Edit
                                                </a>
                                                        </li>
                                        <li class="divider"></li>
                                        
                                        <li>
                                            <a href="#"">
                                                <i class="entypo-trash"></i>
                                                    <?= get_phrase('delete');?>
                                                </a>
                                        </li>

                                    </ul>
                                </div>
                                
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>



<?php
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['Pro']) && $_POST['Pro'] == 'Projects'){
    $er = false;
    $topic = mysqli_real_escape_string($connect,strtoupper($_POST['topic']));
    $supervisor = mysqli_real_escape_string($connect,ucfirst(strtolower($_POST['supervisor'])));
    $school = mysqli_real_escape_string($connect,ucfirst($_POST['institution']));
    $fullname = mysqli_real_escape_string($connect,ucwords(strtolower($_POST['fullname'])));
    $year = mysqli_real_escape_string($connect,ucwords(strtolower($_POST['year'])));
    $query_check_in = mysqli_query($connect, "SELECT topic FROM project WHERE uid = '$uid'");
    $get_topic = mysqli_fetch_assoc($query_check_in);
    if($get_topic['topic']==$topic):
        $er = true;
        $errmsg = "Sorry This Topic Project as Already been Taken.";
    endif;
    if($er == false){
        // $check = mysqli_query($connect, "SELECT project_up FROM project WHERE uid = '$uid'");
        // if(!empty($check)){}
        $queryin = mysqli_query($connect, sprintf("INSERT INTO project SET topic = '$topic', supervisor = '$supervisor', uid = '$uid', matric = '$matric', phone = '$phone', fullname = '$fullname', department = '$department', email = '$email',year = '$year', creation_date = '$currentTime', level = '$sub_level', school = '$school', project_up = 1"));
        // $queryNum = mysqli_num_rows($queryin);
        if(!empty($queryin)){
            $er = false;
            $succes = "Your new as been placed.";
            header("LOCATION: ".base_url("in_active.php?rdir=project_submitted%proceed"));
        }else{
            $er = true;
            $errmsg = "Unable to place Your project. Retry";
        }
    }
}


?>


<div class="modal fade" id="modal-6">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Place Another Project</h4>
                </div>
                
                <div class="modal-body">
                     <form action="<?=base_url('project.php');?>" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <div class="col-md-6">                                            
                            <div class="form-group">

                                <label for="field-1" class="control-label">Full Name:</label>                                
                                <input type="text" required="" class="form-control" name="fullname" placeholder="Example: Kola abdulazeez kudrat" />
                            </div>                            
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">

                                <label for="field-2" class="control-label">Project Topic:</label>                               
                                 <input type="text" required="" class="form-control" name="topic"/>

                            </div>                       
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">                                            
                            <div class="form-group">

                                <label for="field-1" class="control-label">Project Supervisor:</label>                         
                                <input type="text" required="" class="form-control" name="supervisor"/>
                            </div>                            
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">

                                <label for="field-2" class="control-label">Matric No:</label>                               
                                 <input type="text" readonly="" class="form-control" required="" name="matric" value="<?=$matric;?>"/>

                            </div>                       
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">                                            
                            <div class="form-group">

                                <label for="field-1" class="control-label">Graduating Year:</label>                         
                                <input type="text"  class="form-control" required="" name="year" placeholder="Exameple @ 12, Octomber <?=date('Y');?>" />
                            </div>                            
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">

                                <label for="field-2" class="control-label">Level:</label>                               
                                 <input type="text" required="" readonly="" class="form-control" name="level" value="<?=$level;?>" />

                            </div>                       
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">                                            
                            <div class="form-group">

                                <label for="field-1" class="control-label">Sub Level:</label>                         
                                <input type="text" required="" readonly="" class="form-control" name="sub_level" value="<?=$sub_level;?>" />
                            </div>                            
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">

                                <label for="field-2" class="control-label">Department:</label>                               
                                 <input type="text" required="" readonly="" class="form-control" name="department" value="<?=$department;?>"/>

                            </div>                       
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6">                                            
                            <div class="form-group">

                                <label for="field-1" class="control-label">Higher Institution:</label>                         
                                <input type="text" required="" class="form-control" name="institution" placeholder="School Name"/>
                            </div>                            
                        </div>
                        
                        <div class="col-md-6">                            
                            <div class="form-group">

                                <label for="field-2" class="control-label">Email:</label>                               
                                 <input type="email" readonly="" class="form-control" required="" name="email" value="<?php echo $email;?>"/>

                            </div>                       
                        </div>

                    </div>                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <label for="field-3" class="control-label">Phone Number:</label>                                
                                <input type="text" readonly="" required="" class="form-control" name="phone" value="<?=$phone;?>"/>
                            </div>  
                            
                        </div>
                    </div>
                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button  type="submit" name="Pro" value="Projects" class="btn btn-md btn-success">Submit Project</button>
                </form>
                </div>
            </div>
        </div>
    </div>

<?php require "inc/footer.php"?>

    
</div>






