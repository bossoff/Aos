

<?php 
require "connection/function.php";
require "connection/database.php";
require "sub_lib/user_validation.php";
require "sub_lib/sub_code.php";
require "sub_inc/header.php";
 // require (BASE_URL."inc/header.php");

?>

<!doctype html>
<html lang="en">
<head>

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, true); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<!-- <link href="css1/bootstrap.css" rel='stylesheet' type='text/css' /> -->
<!-- Custom CSS -->
<!-- <link href="css1/style.css" rel='stylesheet' type='text/css' /> -->
<!-- Graph CSS -->
<link href="css1/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="../css/icon-font.css" type='text/css' />
<!-- //lined-icons -->
 <!-- Meters graphs -->
<!-- <script src="js/jquery-2.1.4.js"></script> -->

</head>
	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" /> -->
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

</head>

<body>

	<!--  Made With Get Shit Done Kit  -->
		<!-- <a href="http://fb.com/kvngrajih.samad" class="made-with-mk">
			<div class="brand">Code</div>
			<div class="made-with">  By <strong>Outhubict</strong></div>
		</a> -->
 <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-12">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">


                    <form action="pre-process.php?rdir=true" method="POST" enctype="multipart/form-data">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                          <div class="wizard-navigation" style="">
                             <ul>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                                <li><a href="#account" data-toggle="tab">Account</a></li>
                                <li><a href="#address" data-toggle="tab">Address</a></li>
                            </ul>
                          </div>
  
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
                                  <h4 class="info-text"> 
                                    Let's know more information about you <?=$username;?> (with validation)
                                  
                                  </h4>
                                  <div class="col-sm-4 col-sm-offset-1">
                                     <div class="picture-container">
                                          <div class="picture">
                                              <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                                              <input type="file" name="user_image" id="wizard-picture">
                                          </div>
                                          <h6>Choose Picture</h6>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                        <label>First Name: <small>(required)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Andrew...">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name: <small>(required)</small></label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Smith...">
                                      </div>
                                  </div>
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                          <label>Email:  <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="andrew@gmail.com">
                                      </div>
                                  </div>
                              </div>
                            </div>



                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Tell Us Your Sex type? <?=$username;?> (checkboxes) </h4>
                                <div class="row">


                                 <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Wow <?=$username;?> we can wait to know your Gender as a Male">
                                              <!-- <input hidden="radio" type="radio" name="sex" value="Male" > -->
                                                <input type="radio" name="sex" value="Male" >
                                                <div class="icon">
                                                    <img src="images/male.png" alt="ng_female" style="width: 105px; border-radius: 100px; margin-top:  1.4px;">
                                                </div>
                                                <h6>Male</h6>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Wow <?=$username;?> we can wait to know your Gender as a Female">
                                              <!-- <input hidden="radio" type="radio" name="sex" value="Female"> -->
                                                <input type="radio" name="sex" value="Female">
                                                <div class="icon">
                                                    <img src="images/female.png" alt="ng_female" style="width: 105px; border-radius: 100px; margin-top:  1.4px;">
                                                </div>
                                                <h6>Famale</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>

                                  
                                  
                                  <!-- <div class="col-sm-10 col-sm-offset-1">
                                        <div class="col-sm-4 col-sm-offset-2">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Wow <?=$username;?> we can wait to know your Gender as a Male">
                                              <input hidden="radio" type="radio" name="sex" value="Male" >
                                                <input type="radio" name="sex" value="Male" >
                                                <div class="icon">
                                                    <img src="images/male.png" alt="ng_female" style="width: 105px; border-radius: 100px; margin-top:  1.4px;">
                                                </div>
                                                <h6>Male</h6>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Wow <?=$username;?> we can wait to know your Gender as a Female">
                                              <input hidden="radio" type="radio" name="sex" value="Female">
                                                <input type="radio" name="sex" value="Female">
                                                <div class="icon">
                                                    <img src="images/female.png" alt="ng_female" style="width: 105px; border-radius: 100px; margin-top:  1.4px;">
                                                </div>
                                                <h6>Famale</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->

                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Are you living in a nice area? <?=$username;?> Please tell us.</h4>
                                    </div>
                                    <div class="col-sm-7 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="5h Avenue" required="required">
                                          </div>
                                    </div>
                                    <div class="col-sm-3">
                                         <div class="form-group">
                                            <label>Occupation</label>
                                            <input type="text" name="occupation" class="form-control" placeholder="Student..." >
                                          </div>
                                    </div>
                                    <div class="col-sm-5 col-sm-offset-1">
                                         <div class="form-group">
                                            <label>City</label>
                                            <input type="text" name="city" class="form-control" placeholder="Ikeja..." >
                                          </div>
                                    </div>
                                    <div class="col-sm-5">
                                         <div class="form-group">
                                            <label>Country</label><br>

                                             <select name="country" class="form-control" >
                                                <option value=""> -Select- </option>
                                                <option value="Afghanistan"> Afghanistan </option>
                                                <option value="Albania"> Albania </option>
                                                <option value="Algeria"> Algeria </option>
                                                <option value="American Samoa"> American Samoa </option>
                                                <option value="Andorra"> Andorra </option>
                                                <option value="Angola"> Angola </option>
                                                <option value="Anguilla"> Anguilla </option>
                                                <option value="Antarctica"> Antarctica </option>
                                                <option value="...">...</option>
                                            </select>
                                          </div>
                                    </div>

                             <!--  <div class="tab-pane" id="description"> -->
                                
                                    <div class="col-sm-6 col-sm-offset-1"> 
                                      
                                         <div class="form-group">
                                          <!-- <h4 class="info-text"> Drop us a small description </h4> -->
                                            <label>Bio. description</label>
                                            <textarea class="form-control" name="bio" placeholder="" rows="9" >
                                            </textarea>
                                          </div>
                                    </div>
                                    <div class="col-sm-4">
                                         <div class="form-group">
                                            <label>Example</label>
                                            <p class="description">"<?=$username;?> We hope you had no stress in filling those forms. Thanks for your update."</p>
                                          </div>
                                    </div>
                                <!-- </div> -->
                            
                        


                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <!-- <input type="submit" name="finish" hidden="update" value="account"> -->
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />
                                <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='account' value='Finish' />

                            </div>

                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' />
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->
    <br/><br/>
<?php require (_BASE_URL."inc/footer.php");?>
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>
