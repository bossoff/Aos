<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_POST['Gallery']) && $_POST['Gallery'] == 'gallery'){
    $er = false;
    $g_topic = $_SESSION['g_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['g_topic'])))));
    $g_content = $_SESSION['g_content'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['g_content'])))));

    $image_name = $_FILES['g_image']['name'];
    $image_type = $_FILES['g_image']['type'];
    $image_size = $_FILES['g_image']['size'];
    $image_tmp  = $_FILES['g_image']['tmp_name'];
    $image_extension = explode('.', $image_name);
    $image_extension = end($image_extension);
    $image_allowed_type = array('image/png','image/jpg','image/gif','image/jpeg');
    $image_allowed_extention = array('jpeg','jpg','png','gif');
    $image_allowed_size = 1034;//kb
     $Represent_g_image = strtoupper("AOS_gallery_".rand().date("Y")).".".$image_extension;

        $destination = "../../../upload";
        if (empty($_POST['g_topic']) || empty('g_content') || empty($_FILES['g_image']['name'])){
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
                    $Our_student_query = mysqli_query($connect, "INSERT INTO gallery SET title = '$g_topic', short = '$g_content', content = '$g_content', image = 'upload/$Represent_g_image'") or die(mysqli_query($connect));                 
                    // $news_query = mysqli_query($connect,"INSERT INTO update_news SET user_level = '$user_logins', title = '$ntitle', short_content = '$ncontent', content = '$ncontent', s_image = '$Represent_s_image'") or die(mysqli_error($connect));
                        if ($Our_student_query>0){
                            $er = false;
                             move_uploaded_file($_FILES['g_image']['tmp_name'],"$destination/$Represent_g_image");
                            $succes = "This image as been added to the gallery.";
                       }                
                }                 
            }
        }
}



if(isset($_GET['Delete'])){
  $er =false;
  $gid = $_GET['Delete'];
  $query_get = mysqli_query($connect, "SELECT image FROM gallery WHERE gid = '$gid'");
  if(!empty($query_get)){
        $r = mysqli_fetch_assoc($query_get);
      $query_delete = mysqli_query($connect, "DELETE FROM gallery WHERE gid = '$gid'");

      if(!empty($query_delete)){
         $delete_picture = ("../../../".$r['image']);
        if(file_exists($delete_picture)){
          unlink($delete_picture); 
          $er = true;
          $errmsg = "This image has been Deleted from the Gallery";
        }
       
      }
  }
     
}



?>



<title><?=TITLE16;?></title>

<h3 style="">
    <i class="entypo-right-circled"></i> 
Gallery       
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Gallery Update');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('gallery.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Tittle:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="g_topic"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="g_content"/></textarea>
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
                                                    <input type="file" name="g_image" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="Gallery" value="gallery" class="btn btn-success"> Submit to Change</button>
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
          <th>Topic</th>
          <th>Description</th>
          <!-- <th>Time</th> -->
          <!-- <th>Register Date</th> -->
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
             $cnt=1; 
            $Query_register_course = mysqli_query($connect, "SELECT * FROM gallery")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $gid = $get_register_course['gid'];
              $title = $get_register_course['title'];
              $short = $get_register_course['short'];
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $title;?></td>
          <td><?= $short;?></td>
          <!-- <td class="center"><?= $eventtime;?></td> -->
          
          <td class="center">
          
            <a href="gallery.php?Delete=<?=$gid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a>

          </td>

          
        </tr>
        <?php $cnt=$cnt+1;}?>
      </tbody>
    
    </table>




      <?php require "inc/footer.php"?>
      <link rel="stylesheet" href="<?=base_url('');?>assets/js/datatables/datatables.css">
  <link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2-bootstrap.css">
  <link rel="stylesheet" href="<?=base_url('');?>assets/js/select2/select2.css">


  <!-- Imported scripts on this page -->
  <script src="<?=base_url('');?>assets/js/datatables/datatables.js"></script>
  <script src="<?=base_url('');?>assets/js/select2/select2.min.js"></script>
  <script src="<?=base_url('');?>assets/js/neon-chat.js"></script>


</div>