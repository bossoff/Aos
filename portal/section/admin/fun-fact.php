<?php
require "connection/function.php";
require "lib/admin_checker.php";
check_login();
require "lib/basic_info.php";
require "inc/header.php";


if(isset($_POST['fun']) && $_POST['fun']=='fact'){
    $er = false;
    $heading = mysqli_real_escape_string($connect, trim(strtoupper($_POST['heading']) ));
    $percent = mysqli_real_escape_string($connect, trim($_POST['percent'])).'%';
    $content = mysqli_real_escape_string($connect, trim($_POST['content']));
    $percent;
    if($er == false){
        $query_fun = mysqli_query($connect, "INSERT INTO fun_fact SET percent = '$percent', heading = '$heading', content = '$content'") or die(mysqli_error($connect));
        if(!empty($query_fun)){
            $er = false;
            $succes = "Fun Fact as been updated successfully.";
        }
    }
}


if(isset($_GET['Delete'])){
  $er =false;
  $fid = $_GET['Delete'];
  $query_delete = mysqli_query($connect, "DELETE FROM fun_fact WHERE fid = '$fid'");
  if(!empty($query_delete)){
    $er = true;
    $errmsg = "This FAQ has been Deleted";
  }
}

?>



<title><?=TITLE21;?></title>

<h3 style="">
<i class="entypo-right-circled"></i> 
    Fun Fact      
</h3>  

<div class="row">
        <div class="col-md-12">
        
            <!------CONTROL TABS START------->
            <ul class="nav nav-tabs bordered">

                <li class="active">
                    <a href="#list" data-toggle="tab"><i class="entypo-layout"></i> 
                        <?php echo get_phrase('Fun Fact');?>
                            </a></li>
            </ul>
            <!------CONTROL TABS END------->
            
    
            <div class="tab-content">
                <!----EDITING FORM STARTS---->
                <div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
                        
                            <form action="<?=base_url('fun-fact.php');?>" method="POST" class="form-horizontal form-groups-bordered validate"enctype="multipart/form-data">



                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Percent:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="percent" placeholder="Example: 100" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Heading:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="heading" placeholder="Heading" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Description:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" class="form-control" rows="8" name="content" placeholder="Enter....." /></textarea>
                                    </div>
                                </div>                              


                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="fun" value="fact" class="btn btn-success"> Submit to Change</button>
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
            $Query_register_course = mysqli_query($connect, "SELECT * FROM fun_fact")or die(mysqli_error($connect));
             while($get_register_course = mysqli_fetch_assoc($Query_register_course)){
              $fid = $get_register_course['fid'];
              $heading = $get_register_course['heading'];
              $eventtime = $get_register_course['time'];
             
                
          ?>
        <tr class="odd gradeX" style="font-weight: bold;">      
          <td><?= $cnt;?></td>
          <td><?= $heading;?></td>
          <td class="center"><?= $eventtime;?></td>
          
          <td class="center">
          
            <a href="fun-fact.php?Delete=<?=$fid;?>" class="btn btn-danger btn-sm btn-icon icon-left">
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