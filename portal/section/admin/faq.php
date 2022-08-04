<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";

if(isset($_GET['Delete'])){
  $er =false;
  $fid = $_GET['Delete'];
  $query_delete = mysqli_query($connect, "DELETE FROM faq WHERE faqid = '$fid'");
  if(!empty($query_delete)){
    $er = true;
    $errmsg = "This FAQ has been Deleted";
  }
}

if(isset($_GET['Delet'])){
  $er =false;
  $lid = $_GET['Delet'];
  $query_delete = mysqli_query($connect, "DELETE FROM learning WHERE lfid = '$lid'");
  if(!empty($query_delete)){
    $er = true;
    $errmsg = "This Learning Facilities has been Deleted";
  }
}

date_default_timezone_set('Africa/Lagos');// change according timezone
  $currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['faq']) && $_POST['faq'] == 'ans'){
  $er = false;

  $question = mysqli_real_escape_string($connect, trim( strtoupper($_POST['question'])));
  $answer = mysqli_real_escape_string($connect, trim(ucwords(strtolower($_POST['answer']))));

  if(empty($question) && empty($answer)){
    $er = true; 
    $errmsg = "Sorry all field can not be empty.";
  }else{
    $query_check = mysqli_query($connect, "SELECT * FROM faq");
      $get_ch =  mysqli_fetch_assoc($query_check);
      if($answer == $get_ch['answer']  AND $question == $get_ch['question']){
        $er = true;
        $errmsg = "This post is alredy Exist";
      }else{
        $query_in = mysqli_query($connect, "INSERT INTO faq SET question = '$question', answer = '$answer', creation_date = '$currentTime'");
        if(!empty($query_in)){
          $er = false;
          $succes = "Faq updated successfully.";
        }
      }
  }

 
}


if(isset($_POST['lean']) && $_POST['lean'] == 'ing'){
  $er = false;
  $post = mysqli_real_escape_string($connect, trim(ucfirst($_POST['learn'])));
  if(empty($post)){
    $er = true;
    $errmsg = "This field can not be empty.";
  }

  $quer_ch = mysqli_query($connect, "SELECT * FROM learning");
  $get_inch = mysqli_fetch_assoc($quer_ch);
  if($get_inch['topic'] == $post){
    $er = true; 
    $errmsg = "This post is alredy exist.";
  }else{
    $query_instert = mysqli_query($connect, "INSERT INTO learning SET topic = '$post'");
    if(!empty($query_instert)){
      $er= false;
      $succes = "Learning Facilities updated";
    }
  }
}


?>



<title><?=TITLE18;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    FAQ and Learning Facilities       
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                        <?php echo get_phrase('FAQ ');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('faq.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Queation:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="question" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Answer:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="answer"/></textarea>
                                    </div>
                                </div>                              

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="faq" value="ans" class="btn btn-success"> Submit to Change</button>
                                  </div>
                                </div>
                            </form>

      
                        
                    </div>
                </div>
                <!----EDITING FORM ENDS--->
                
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-lock"></i> 
                        <?php echo get_phrase('Learning Facilities');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('faq.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Learning Facilities:</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" rows="8" name="learn"/>
                                    </div>
                                </div>                              

                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="lean" value="ing" class="btn btn-success"> Submit to Change</button>
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
            $Query_register_course = mysqli_query($connect, "SELECT * FROM faq")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $faqid = $get_register_course['faqid'];
              $question = $get_register_course['question'];
              $answer = $get_register_course['answer'];
              $eventtime = $get_register_course['creation_date'];
              // $creation_date = $get_register_course['creation_date'];
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $question;?></td>
          <td><?= $answer;?></td>
          <td class="center"><?= $eventtime;?></td>
          
          <td class="center">
          
            <a href="faq.php?Delete=<?=$faqid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
              <i class="entypo-cancel"></i>
              Delete
            </a>

          </td>

          
        </tr>
        <?php $cnt=$cnt+1;}?>
      </tbody>
    
    </table>




    <table class="table table-bordered datatable" id="table-4">
      <thead>
        <tr>
          <th>S/N</th>
          <th>Topic</th>
          
          <th>Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php
             $cnt=1; 
            $Query_register_course = mysqli_query($connect, "SELECT * FROM learning")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $lfid = $get_register_course['lfid'];
              $topic = $get_register_course['topic'];
              // $creation_date = $get_register_course['creation_date'];
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $topic;?></td>
          
          <td class="center">
          
            <a href="faq.php?Delet=<?=$lfid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
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