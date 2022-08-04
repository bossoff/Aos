<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_GET['Delete'])){
  $er =false;
  $osid = $_GET['Delete'];
  $query_get = mysqli_query($connect, "SELECT staff_image1 FROM our_staff WHERE osid = '$osid'");
  if(!empty($query_get)){
    $a = mysqli_fetch_assoc($query_get);
    $query_delete = mysqli_query($connect, "DELETE FROM our_staff WHERE osid = '$osid'");
    if(!empty($query_delete)){
       $delete_picture = ("../../../upload/".$a['staff_image1']);
        if(file_exists($delete_picture)){
          unlink($delete_picture); 
          $er = true;
          $errmsg = "This particular Staff has been Deleted";
        }
      
    }
  }
  
}

if(isset($_POST['our_staff']) && $_POST['our_staff'] == 'Set_STAFF'){
    $er = false;
    $staff1 = $_SESSION['staff1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['staff1']))))));
    $post1 = $_SESSION['post1'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['post1']))))));
    $facebook1 = $_SESSION['facebook1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['facebook1'])))));
    $twitter1 = $_SESSION['twitter1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['twitter1'])))));
    $google_plus1 = $_SESSION['google_plus1'] = mysqli_real_escape_string($connect, strtolower(htmlentities(trim(sanitize($_POST['google_plus1'])))));
    $office_number1 = $_SESSION['office_number1'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['office_number1']))));
    $mobile_number1 = $_SESSION['mobile_number1'] = mysqli_real_escape_string($connect, htmlentities(trim(sanitize($_POST['mobile_number1']))));
    $image_name = $_FILES['staff_image1']['name'];
    $image_type = $_FILES['staff_image1']['type'];
    $image_size = $_FILES['staff_image1']['size'];
    $image_tmp  = $_FILES['staff_image1']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $staff_image1 = strtoupper("Our_staff_image".rand()."_".date("Y")).".".$image_extension;
     $destination = "../../../upload";
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
                    $what_we_do_query = mysqli_query($connect, "INSERT INTO our_staff SET staff1 = '$staff1' , post1 = '$post1', staff_image1 = '$staff_image1', facebook1 = '$facebook1', twitter1 = '$twitter1', google_plus1 = '$google_plus1', office_number1 = '$office_number1', mobile_number1 = '$mobile_number1'") or die(mysqli_error($connect));
                        if ($what_we_do_query>0){
                            $er = false;
                            $succes = "Your Image as been successful!";

                             move_uploaded_file($_FILES['staff_image1']['tmp_name'],"$destination/$staff_image1");                     

                        }          
                }
            }

            


}

?>



<title><?=TITLE22;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Our Admin's      
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Our Admin');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('admin_update.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Full Name:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="staff1" placeholder="Staff Full Name"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Post:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required=""  class="form-control" name="post1" placeholder="Staff Posistion"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number 1:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required=""  name="office_number1" class="form-control" placeholder="Staff Office Number  1"/>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Phone Number 2:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required=""  name="mobile_number1" class="form-control" placeholder="Staff Office Number  2"/>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Facebook Handle:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" name="facebook1" class="form-control" value="http://facebook.com/" placeholder="http//facebook/username"/>
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Twitter Handle:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" name="twitter1" class="form-control" value="http://twitter.com/" placeholder="http//twitter/username"/>
                                    </div>
                                </div>


                                 <div class="form-group">
                                    <label class="col-sm-3 control-label">Google Plus Handle:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" name="google_plus1" class="form-control" value="http://googleplus.com/" placeholder="http//google+/username"/>
                                    </div>
                                </div>

                            
                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Image:</label>                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                              <!-- <img src="<?=base_home('');?><?=$get_student['s_image'];?>"> -->
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" required="" name="staff_image1" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="our_staff" value="Set_STAFF" class="btn btn-success"> Submit to Change</button>
                                  </div>
                                </div>

                            </form>
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS--->
                
            </div>
        </div>
    </div>






 <script type="text/javascript">
    jQuery( document ).ready( function( $ ) {
      var $table4 = jQuery( "#table-4" );
      
      $table4.DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copyHtml5',
          'excelHtml5',
          'csvHtml5',
          'pdfHtml5'
        ]
      } );
    } );    
    </script>
    
    <table class="table table-bordered datatable" id="table-4">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Staff Name</th>
          <th>Time</th>
          <!-- <th>Register Date</th> -->
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
             $cnt=1; 
            $Query_register_course = mysqli_query($connect, "SELECT * FROM our_staff")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $osid = $get_register_course['osid'];
              $staff1 = $get_register_course['staff1'];
              $eventtime = $get_register_course['time'];
             
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $staff1;?></td>
          <td class="center"><?= $eventtime;?></td>
          
          <td class="center">
          
            <a href="admin_update.php?Delete=<?=$osid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a>

          </td>

          
        </tr>
        <?php $cnt=$cnt+1;}?>
      </tbody>
    
    </table>

      <?php require "inc/footer.php"?>
               
            <!-- Imported styles on this page -->
  <link rel="stylesheet" href="<?=base_url('');?>assets/js/datatables/datatables.css">
  <link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2-bootstrap.css">
  <link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2.css">


  <!-- Imported scripts on this page -->
  <script src="<?=base_url('');?>assets/js/datatables/datatables.js"></script>
  <script src="<?=base_url('');?>assets/js/select2/select2.min.js"></script>
  <script src="<?=base_url('');?>assets/js/neon-chat.js"></script>




</div>