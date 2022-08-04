<?php
require "connection/function.php";
require "lib/user_checker.php";
check_login();

require "inc/header.php";


?>
<title><?=TITLE19;?></title>
<h3 style="">
    <i class="entypo-right-circled"></i> 
    <?= $application_no;?> (Dashboard)      
</h3> 

<hr>


<div class="row">
    <div class="col-md-3">
        <div class="row">

            <?php
                
                $title ='All Fees';

                if($user_level == 'Project'){
                    $queryCount = mysqli_query($connect, "SELECT uid FROM memberslog WHERE uid ='$uid'");
                    echo '<div class="col-md-12">
                    <a href="'.base_url('place-project.php').'">            
                            <div class="tile-stats tile-blue">
                                <div class="icon"><i class="entypo-book"></i></div>
                                <div class="num" data-start="0" data-end="" 
                                        data-postfix="" data-duration="800" data-delay="0">Start</div>

                                <h3>Your Project Now!</h3>
                               <p>And get it done within 2weeks</p>
                            </div>
                        </div>
                    </a>

                    <a href="'.base_url('payment-status.php').'">
                        <div class="col-md-12">            
                            <div class="tile-stats tile-red">
                                <div class="icon"><i class="fa fa-bag"></i></div>
                                <div class="num" data-start="0" data-end="" 
                                        data-postfix="" data-duration="1500" data-delay="0">Check</div>
                                
                                <h3>Payments Status</h3>
                               <p>Click here</p>
                            </div>                
                        </div>
                    </a>

                        ';
                }

                elseif($user_level == 'French'){
                    echo ' <a href="'.base_url('add-courses.php').'">
                        <div class="col-md-12">            
                            <div class="tile-stats tile-red">
                                <div class="icon"><i class="entypo-pencil"></i></div>
                                <div class="num" data-end="" 
                                        data-postfix="" data-duration="800" data-delay="0">Courses</div>

                                <h3>Register Your Course</h3>
                               <p>Here you go.</p>
                            </div>
                        </div>
                    </a>

                    <a href="'.base_url('make-fees.php').'">
                        <div class="col-md-12">            
                            <div class="tile-stats tile-green">
                                <div class="icon"><i class="entypo-bag"></i></div>
                                <div class="num" 
                                        data-postfix="" data-duration="500" data-delay="0">Payments</div>

                                <h3>'.$title.'</h3>
                               <p>Click here</p>
                            </div>                
                        </div>
                    </a>';
                }

                elseif($user_level == 'Tutorial'){
                    echo '
                    <a href="'.base_url('add-courses.php').'">
                        <div class="col-md-12">            
                            <div class="tile-stats tile-green">
                                <div class="icon"><i class="entypo-pencil"></i></div>
                                <div class="num" data-end="" 
                                        data-postfix="" data-duration="800" data-delay="0">Courses</div>

                                <h3>Register Your Course</h3>
                               <p>Here you go.</p>
                            </div>
                        </div>
                    </a>

                    <a href="'.base_url('make-fees.php').'">
                        <div class="col-md-12">            
                            <div class="tile-stats tile-aqua">
                                <div class="icon"><i class="entypo-bag"></i></div>
                                <div class="num" 
                                        data-postfix="" data-duration="500" data-delay="0">Payments</div>

                                <h3>'.$title.'</h3>
                               <p>Click here</p>
                            </div>                
                        </div>
                    </a>
                       ';
                }

            ?>


        </div>
    </div>




    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12 col-xs-12">    
                <div class="panel panel-success " data-collapsed="0">
                     <div class="panel-heading">
                        <div class="panel-title">
                            <i class="entypo-calendar"></i>
                            Event Callendar
                        </div>
                    </div>
                    <div class="calendar-env">           
                        <!-- Calendar Body -->
                        <div class="calendar-body">
                            <div id="calendar"></div>    
                        </div>    
                    </div>  

                </div>
            </div>
        </div>
    </div>

</div>	

	
<?php require "inc/footer.php"?>

	
</div>

