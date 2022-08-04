<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_GET['Delete'])){
  $er =false;
  $cid = $_GET['Delete'];
  $query_delete = mysqli_query($connect, "DELETE FROM event WHERE eventid = '$cid'");
  if(!empty($query_delete)){
    $er = true;
    $errmsg = "This Course has been Deleted";
  }
}

if(isset($_POST['EVENT']) && $_POST['EVENT'] == 'Set_EVENT'){
  date_default_timezone_set('Africa/Lagos');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );
    $er = false;
    $event_topic = $_SESSION['event_topic'] = mysqli_real_escape_string($connect,strtoupper(htmlentities(trim(sanitize($_POST['event_topic'])))));
    $event_massage = $_SESSION['event_massage'] = mysqli_real_escape_string($connect, ucwords(htmlentities(trim(sanitize($_POST['event_massage'])))));
     $query_check = mysqli_query($connect, "SELECT event_topic, event_message FROM event") or die(mysqli_error($connect));
    $get_ch = mysqli_fetch_assoc($query_check);
    if($get_ch['event_topic'] == $event_topic AND $get_ch['event_message'] == $event_massage){
        $er = true;
        $errmsg = "This Post is already Exist.";
    }

    if(empty($event_topic) || empty($event_massage) && empty($_FILES['even_image'])){
       $er = true;
       $errmsg = "Sorry all fields can not be empty.";
    }else{
        $theEvenupdatedata = "";//initial photo data value is empty
    //now, process attached photo
      if (isset($_FILES["even_image"]) && !empty($_FILES["even_image"]['name'])){
        $max_upload_size = 200;//in KB
        $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
        //define allowed file extensions
        $allowedExts = array("jpg", "jpeg", "png", "jpe");
        //get the extension of the uploaded file
        $extension = explode(".", $_FILES["even_image"]["name"]);
        $extension = end($extension);
        //get the dimension of the uploaded file if necessary //it stores array values
        $photodimension = getimagesize($_FILES["even_image"]["tmp_name"]);
        $photowidth = $photodimension[0];
        $photoheight = $photodimension[1];
        //$ImageType = $_FILES["even_image"]["type"];

        //validate image
        if ((isset($_FILES["even_image"]) && !empty($_FILES["even_image"]['name'])) && (($_FILES["even_image"]["type"] == "image/png") || ($_FILES["even_image"]["type"] == "image/jpeg") || ($_FILES["even_image"]["type"] == "image/pjpeg"))  && ($_FILES["even_image"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
        {
          // if($max_upload_size > 200){
          //   $er = true;
          //   $errmsg = "Sorry only passport is allow";
          // }
          if($_FILES["even_image"]["error"] > 0){
            $er = true;
            $errmsg = "Error: " . $_FILES["even_image"]["error"];
          }else{
            //now convert image to base64
            //the class and methods are loaded from the included photo.class.php file
            if (isset($_FILES["even_image"]) && $_FILES["even_image"]["error"] <= 0) {
              $file_tmp_name = $_FILES["even_image"]["tmp_name"];
              $file_name = $_FILES["even_image"]["name"];    
              $photo = new Photo($file_tmp_name);
              $photo->scaleToMaxSide(331);
              $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
              $theEvenupdatedata = $addr['photo'];
              //photo is ready to be stored in the database
              //the photo text data, $addr['photo'] should be stored in a medium text field in the database
              }
          }

        }else{
          //error has sele
          $er = true;
          if(!in_array($extension, $allowedExts)){
            //if the extension is not in the specified array of extensions
            $errmsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
          }
          elseif($photowidth > $photoheight){
            //this is an optional
            $errmsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
          }
          elseif($_FILES["even_image"]["size"] > $max_upload_size){
            //if the size is greater than specified max size
            $errmsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
          }
          else{
            $errmsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
          }
        }
    }

      if($er == false){
          $evnt_insert = "INSERT INTO `event` (event_topic, event_message, short_event, event_image, eventtime) VALUES ('$event_topic', '$event_massage', '$event_massage','$theEvenupdatedata', '$currentTime')";
          $event_query = mysqli_query($connect, $evnt_insert) or die(mysqli_error($connect));
          if(!empty($event_query)){
              $er = false;
                  $succes =  "The Event is Been Poblished.";
                 
          }
      }

    }

    
}

?>



<title><?=TITLE17;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Events       
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                        <?php echo get_phrase('Post Events');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('events.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Event Topic:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="event_topic" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Event Message:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="event_massage"/></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Event Image:</label>
                                    
                                    <div class="col-sm-5">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">

                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                                <?=$logo;?>
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-white btn-file">
                                                    <span class="fileinput-new">Select Image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="even_image" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="EVENT" value="Set_EVENT" class="btn btn-success"> Submit to Change</button>
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
          <th>Time</th>
          <!-- <th>Register Date</th> -->
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
             $cnt=1; 
            $Query_register_course = mysqli_query($connect, "SELECT * FROM event")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $eventid = $get_register_course['eventid'];
              $event_topic = $get_register_course['event_topic'];
              $event_massage = $get_register_course['short_event'];
              $eventtime = $get_register_course['eventtime'];
              // $creation_date = $get_register_course['creation_date'];
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $event_topic;?></td>
          <td><?= $event_massage;?></td>
          <td class="center"><?= $eventtime;?></td>
          
          <td class="center">
          <!--   <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a> -->
            
            <a href="events.php?Delete=<?=$eventid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a>

          </td>

          
        </tr>
        <?php $cnt=$cnt+1;}?>
      </tbody>
    
    </table>
    
        
    <br />

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