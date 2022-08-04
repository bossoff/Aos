<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();
require "inc/header.php";
?>

<title><?=TITLE4;?></title>

<?php
date_default_timezone_set('Africa/Lagos');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']) && $_POST['submit']=="complains1"){
	$er = false;
	$subject=mysqli_real_escape_string($connect,htmlspecialchars(htmlentities(sanitize(clean(ucwords(strtoupper($_POST['subject'])))))));
	$message=mysqli_real_escape_string($connect,htmlspecialchars(htmlentities(sanitize(clean(ucwords($_POST['message']))))));
	
	if($er == false){
		$check_complain  = mysqli_query($connect, "SELECT subject, message, waip FROM complains WHERE uid = '$uid'  ORDER BY `complains`.`waip` ASC");
		$cheched = mysqli_fetch_assoc($check_complain);

		if($subject == $cheched['subject']){
			$er = true;
			$errmsg = "Your Complains already been taken, and will feed you back soon.";
		}
		elseif($message == $cheched['message']){
			$er = true;
			$errmsg = "Your Complains already been taken, and you will be feed you back soon.";
		}
		elseif($cheched['waip']==0){
			$query_complain = mysqli_query($connect, "INSERT INTO complains SET subject = '$subject', application_no = '$application_no', name = '$surname', message = '$message',short_msg = '$message', status = '2', uid = '$uid', posted_date = '$currentTime'");
			if(!empty($query_complain)){
				$Q_waip = mysqli_query($connect, "UPDATE complains SET waip = '1' WHERE uid = '$uid'");
				$er = true;
				$succes = "Thank You ".$surname." your Complains as been recieve will will feed you back soon.";
			}
		}
		elseif($cheched['waip']==1){
			$query_complain = mysqli_query($connect, "INSERT INTO complains SET subject = '$subject', application_no = '$application_no', name = '$surname', message = '$message',short_msg = '$message', status = '2', uid = '$uid', posted_date = '$currentTime'");
			if(!empty($query_complain)){
				$Q_waip = mysqli_query($connect, "UPDATE complains SET waip = '0'  WHERE uid = '$uid'");
				$er = true;
				$succes = "Thank You ".$surname." your Complains as been recieve we will feed you back soon.";
			}
			
		}
		
	}

}


?>
<div class="row">
    	<div class="col-md-12">
        
        	<!------CONTROL TABS START------->
    		<ul class="nav nav-tabs bordered">

    			<?php

                		$Q_status = mysqli_query($connect, "SELECT status, waip FROM complains WHERE uid = '$uid' AND waip ='1'  ORDER BY `complains`.`posted_date` ASC");
                		$get_s = mysqli_fetch_assoc($Q_status);

                		if($get_s['status']==0){
                			echo '<li class="active">
		                	<a href="#list" data-toggle="tab">	
		                		
		                        <i class="entypo-bell"></i>	
		                     ';
		    						
		    				echo get_phrase('complains');

		    				echo '</a></li>';
                		}
                		elseif($get_s['status']==2){
                			echo ' <li class="active btn btn-danger">
					                	<a href="#list" data-toggle="tab">
                						<i class="entypo-bell"></i>
					                      <tr class="odd gradeX" style="background: red;">
											<td class="">Pending</td>
										  </tr>  	
					                     </a>
					                </li>';
                		}
                		elseif($get_s['status']==1){
                			echo '<li class="active btn btn-success">
				                	<a href="#list" data-toggle="tab">	
                					<i class="entypo-bell"></i>
				                		<tr class="odd gradeX">
											<td class="">Approved</td>
										</tr>
				                        	
				                     </a>
				                </li>';
                		}

                		?>

    			
    		</ul>
        	<!------CONTROL TABS END------->
            
    	
    		<div class="tab-content">
            	<!----EDITING FORM STARTS---->
    			<div class="tab-pane box active" id="list" style="padding: 5px">
                    <div class="box-content padded">
    					<p style="color:red;">
    						<?php if(isset($errmsg)){?>
								<?=htmlentities($errmsg);?>
							<?php }?>
						</p>
						<p style="color:green;">
    						<?php if(isset($succes)){?>
								<?=htmlentities($succes);?>
							<?php }?>
						</p>

                            <form action="<?=base_url('complains.php');?>" method="POST" class="form-horizontal form-groups-bordered validate" target="top">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Subject:</label>
                                    <div class="col-sm-5">
                                        <input type="text" required="" class="form-control" name="subject" value=""/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Application No:</label>
                                    <div class="col-sm-5">
                                        <input type="text" readonly class="form-control" name="application_no" value="<?= $application_no;?>"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Messages:</label>
                                    <div class="col-sm-5">
                                        <textarea type="text" required="" class="form-control" name="message" value=""/></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-3 col-sm-5">
                                      <button type="submit" name="submit" cols="9" value="complains1" class="btn btn-success"> Submit to Change</button>
                                  </div>
    								</div>
                            </form>
    					
                    </div>
    			</div>
                <!----EDITING FORM ENDS--->
                
    		</div>
    	</div>
    </div>






<?php include('inc/footer.php'); ?>
