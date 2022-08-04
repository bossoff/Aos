<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_GET['Delete'])){
  $er =false;
  $cid = $_GET['Delete'];
  $query_delete = mysqli_query($connect, "DELETE FROM testimony WHERE testmoid = '$cid'");
  if(!empty($query_delete)){
    $er = true;
    $errmsg = "This Course has been Deleted";
  }
}

if(isset($_POST['Testimony']) && $_POST['Testimony'] == 'Set_Testimonies'){

    $er = false;
    $comment = $_SESSION['comment'] = mysqli_real_escape_string($connect,ucwords(htmlentities(trim(sanitize($_POST['comment'])))));
    $customer_name = $_SESSION['customer_name'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['customer_name']))))));
    $occupation = $_SESSION['occupation'] = mysqli_real_escape_string($connect, ucwords(strtolower(htmlentities(trim(sanitize($_POST['occupation']))))));

    $query_check = mysqli_query($connect, "SELECT comment, customer_name, occupation FROM testimony") or die(mysqli_error($connect));
    $get_ch = mysqli_fetch_assoc($query_check);
    if($get_ch['customer_name'] == $customer_name AND $get_ch['occupation'] == $occupation){
        $er = true;
        $errmsg = "This Post is already Exist.";
    }    
    if(empty($comment) && empty($customer_name) && empty($occupation)){
        $er = true;
       $errmsg ="Sorry all this field can not be empty";
    }else{

        $theTestimonidata = "";//initial photo data value is empty

        //now, process attached photo
      if (isset($_FILES["tphoto"]) && !empty($_FILES["tphoto"]['name'])){
        $max_upload_size = 500;//in KB
        $max_upload_size *= 1024;//multiplied by 1024 to convert it to bytes
        //define allowed file extensions
        $allowedExts = array("jpg", "jpeg", "png", "jpe");
        //get the extension of the uploaded file
        $extension = explode(".", $_FILES["tphoto"]["name"]);
        $extension = end($extension);
        //get the dimension of the uploaded file if necessary //it stores array values
        $photodimension = getimagesize($_FILES["tphoto"]["tmp_name"]);
        $photowidth = $photodimension[0];
        $photoheight = $photodimension[1];
        //$ImageType = $_FILES["tphoto"]["type"];

        //validate image
        if ((isset($_FILES["tphoto"]) && !empty($_FILES["tphoto"]['name'])) && (($_FILES["tphoto"]["type"] == "image/png") || ($_FILES["tphoto"]["type"] == "image/jpeg") || ($_FILES["tphoto"]["type"] == "image/pjpeg"))  && ($_FILES["tphoto"]["size"] < $max_upload_size) && in_array($extension, $allowedExts)) /*feel free to remove ($photowidth<$photoheight) from the condition if not collecting passport photo*/
        {
          // if($max_upload_size > 200){
          //   $er = true;
          //   $errmsg = "Sorry only passport is allow";
          // }
          if($_FILES["tphoto"]["error"] > 0){
            $er = true;
            $errmsg = "Error: " . $_FILES["tphoto"]["error"];
          }else{
            //now convert image to base64
            //the class and methods are loaded from the included photo.class.php file
            if (isset($_FILES["tphoto"]) && $_FILES["tphoto"]["error"] <= 0) {
              $file_tmp_name = $_FILES["tphoto"]["tmp_name"];
              $file_name = $_FILES["tphoto"]["name"];    
              $photo = new Photo($file_tmp_name);
              $photo->scaleToMaxSide(331);
              $addr['photo'] = $photo->getBase64();//this is the value you'll store in db
              $theTestimonidata = $addr['photo'];
              //photo is ready to be stored in the database
              //the photo text data, $addr['photo'] should be stored in a medium text field in the database
              }
          }

        }else{
          //error has sele
          $er = true;
          if(!in_array($extension, $allowedExts)){
            $er = true;
            //if the extension is not in the specified array of extensions
            $errmsg = "Invalid photo file format! Only JPG or PNG photo is allowed!";
          }
          elseif($photowidth > $photoheight){
            $er = true;
            //this is an optional
            $errmsg = "Passport Photo WIDTH cannot be longer than the HEIGHT.";
          }
          elseif($_FILES["tphoto"]["size"] > $max_upload_size){
            $er = true;
            //if the size is greater than specified max size
            $errmsg = "Upload a photo file not larger than ".(floor($max_upload_size/1024)."KB");
          }
          else{ 
            $er = true;
            $errmsg = "Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than ".floor($max_upload_size/1024)."KB";
           
          }
        }
    }


        if($er == false){
            $testimony_query = mysqli_query($connect, "INSERT INTO testimony (tphoto,comment,customer_name,occupation) VALUES ('$theTestimonidata', '$comment', '$customer_name', '$occupation')");
            if(!empty($testimony_query)){
                $er = false;
                $succes = "Testimonies Updated succefully.";
                
            }
        }

    }   
}


?>



<title><?=TITLE3;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Here From our Students         
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                        <?php echo get_phrase('Here From our Students');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('hear_from_the_students.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">FullName:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="customer_name" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Occupation:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="occupation" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="comment"/></textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="field-1" class="col-sm-3 control-label">Customer Picture:</label>
                                    
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
                                                    <input type="file" name="tphoto" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="Testimony" value="Set_Testimonies" class="btn btn-success"> Submit to Change</button>
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
          <th>Name</th>
          <th>Occupation</th>
          <th>Description</th>
          <!-- <th>Register Date</th> -->
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
             $cnt=1; 
            $Query_register_course = mysqli_query($connect, "SELECT * FROM testimony")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $testmoid = $get_register_course['testmoid'];
              $customer_name = $get_register_course['customer_name'];
              $occupation = $get_register_course['occupation'];
              $comment = $get_register_course['comment'];
              // $creation_date = $get_register_course['creation_date'];
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $customer_name;?></td>
          <td><?= $occupation;?></td>
          <td class="center"><?= $comment;?></td>
          >
          <td class="center">
          <!--   <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
              <i class="entypo-pencil"></i>
              Edit
            </a> -->
            
            <a href="hear_from_the_students.php?Delete=<?=$testmoid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
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