    <?php
   //require "connection/function.php";
    require "set_inc/header.php";
    require "set_inc/aside.php";

   ?>
    <title>A.O.S ACADEMY :: updates</title>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            General Form Elements For Update <?= $firstname_row;?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">General Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->

            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">ABOUT</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="lib/process.php?Testimonies/About.php" method="POST" enctype="multipart/form-data">
                     <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "about_Upload_Set=error=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>

                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "about_Upload_Set=successful=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">About succefully Updated</div>
                    <?php                  
                    }
                    ?>

                  <!-- unset($_GET['rdir']); -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">About Heading:</label>
                      <input type="text" name="a_heading" class="form-control" id="exampleInputEmail1" placeholder="About Heading">
                    </div>

                     <div class="form-group">
                      <label>About Content:</label>
                      <textarea name="a_content" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">About Video Link</label>
                      <input type="text" name="a_video_link" class="form-control" id="exampleInputPassword1" placeholder="http://">
                    </div>
                                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="About" value="Set_ABOUT" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->




              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">OUR STAFF</h3>
                </div>
                <div class="box-body">
                  <form role="form" action="lib/process.php?staff/our_staff.php" method="POST" enctype="multipart/form-data">
                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "ourstaffimage_Set=error=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>
                     <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "ourstaffimage_Set=successful=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">The staffs as been updated.</div>
                    <?php                  
                    }
                    ?>
                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "ourstaffimage_Set=errorr=01"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Staff 1:</label>
                      <input type="text" name="staff1" class="form-control" id="exampleInputPassword1" placeholder="Staff Full Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Staff Post 1:</label>
                      <input type="text" name="post1" class="form-control" id="exampleInputPassword1" placeholder="Staff Posistion">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Staff Image 1:</label>
                      <input type="file" name="staff_image1" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Staff 1 Office Number:</label>
                      <input type="text" name="office_number1" class="form-control" id="exampleInputPassword1" placeholder="Staff Office Number  1">      
                    </div>

                    <div class="form-group">
                      <label>Staff 1 Mobile Number:</label>
                      <input type="text" name="mobile_number1" class="form-control" id="exampleInputPassword1" placeholder="Staff Mobile Number  1">      
                    </div>

                    <div class="form-group">
                      <label>Staff 1 Facebook Handle:</label>
                      <input type="text" name="facebook1" class="form-control" id="exampleInputPassword1" value="http://" placeholder="http//facebook/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 1 Twitter Handle:</label>
                      <input type="text" name="twitter1" class="form-control" id="exampleInputPassword1" value="http://" placeholder="http//twitter/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 1 Google Plus Handle:</label>
                      <input type="text" name="google_plus1" class="form-control" id="exampleInputPassword1" value="http://" placeholder="http//google+/username">      
                    </div>

                      <label style="color: #fff; background: red; padding: 6px; mask: 30px"> Staff 2 Update </label>

                      <div class="form-group">
                      <label for="exampleInputPassword1">Staff 2:</label>
                      <input type="text" name="staff2" class="form-control" id="exampleInputPassword2" placeholder="Staff Full Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Staff Post 2:</label>
                      <input type="text" name="post2" class="form-control" id="exampleInputPassword1" placeholder="Staff Posistion">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">Staff Image 2:</label>
                      <input type="file" name="staff_image2" class="form-control" id="exampleInputEmail2" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Staff 2 Office Number:</label>
                      <input type="text" name="office_number2" class="form-control" id="exampleInputPassword2" placeholder="Staff Office Number  2">      
                    </div>

                    <div class="form-group">
                      <label>Staff 2 Mobile Number:</label>
                      <input type="text" name="mobile_number2" class="form-control" id="exampleInputPassword2" placeholder="Staff Mobile Number  2">      
                    </div>

                    <div class="form-group">
                      <label>Staff 2 Facebook Handle:</label>
                      <input type="text" name="facebook2" class="form-control" id="exampleInputPassword2" value="http://" placeholder="http//facebook/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 2 Twitter Handle:</label>
                      <input type="text" name="twitter2" class="form-control" id="exampleInputPassword2" value="http://" placeholder="http//twitter/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 2 Google Plus Handle:</label>
                      <input type="text" name="google_plus2" class="form-control" id="exampleInputPassword2" value="http://" placeholder="http//google+/username">      
                    </div>

                    <label style="color: #fff; background: red; padding: 6px; mask: 30px"> Staff 3 Update </label>

                      <div class="form-group">
                      <label for="exampleInputPassword1">Staff 3:</label>
                      <input type="text" name="staff3" class="form-control" id="exampleInputPassword3" placeholder="Staff Full Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Staff Post 3:</label>
                      <input type="text" name="post3" class="form-control" id="exampleInputPassword1" placeholder="Staff Posistion">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Staff Image 3:</label>
                      <input type="file" name="staff_image3" class="form-control" id="exampleInputEmail3" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Staff 3 Office Number:</label>
                      <input type="text" name="office_number3" class="form-control" id="exampleInputPassword3" placeholder="Staff Office Number  3">      
                    </div>

                    <div class="form-group">
                      <label>Staff 3 Mobile Number:</label>
                      <input type="text" name="mobile_number3" class="form-control" id="exampleInputPassword3" placeholder="Staff Mobile Number  3">      
                    </div>

                    <div class="form-group">
                      <label>Staff 3 Facebook Handle:</label>
                      <input type="text" name="facebook3" class="form-control" id="exampleInputPassword3" value="http://" placeholder="http//facebook/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 3 Twitter Handle:</label>
                      <input type="text" name="twitter3" class="form-control" id="exampleInputPassword3" value="http://" placeholder="http//twitter/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 3 Google Plus Handle:</label>
                      <input type="text" name="google_plus3" class="form-control" id="exampleInputPassword3" value="http://" placeholder="http//google+/username">      
                    </div>

                    <label style="color: #fff; background: red; padding: 6px; mask: 30px"> Staff 4 Update </label>

                      <div class="form-group">
                      <label for="exampleInputPassword1">Staff 4:</label>
                      <input type="text" name="staff4" class="form-control" id="exampleInputPassword4" placeholder="Staff Full Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Staff Post 4:</label>
                      <input type="text" name="post4" class="form-control" id="exampleInputPassword1" placeholder="Staff Posistion">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail4">Staff Image 4:</label>
                      <input type="file" name="staff_image4" class="form-control" id="exampleInputEmail4" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Staff 4 Office Number:</label>
                      <input type="text" name="office_number4" class="form-control" id="exampleInputPassword4" placeholder="Staff Office Number  4">      
                    </div>

                    <div class="form-group">
                      <label>Staff 4 Mobile Number:</label>
                      <input type="text" name="mobile_number4" class="form-control" id="exampleInputPassword4" placeholder="Staff Mobile Number  4">      
                    </div>

                    <div class="form-group">
                      <label>Staff 4 Facebook Handle:</label>
                      <input type="text" name="facebook4" class="form-control" id="exampleInputPassword4" value="http://" placeholder="http//facebook/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 4 Twitter Handle:</label>
                      <input type="text" name="twitter4" class="form-control" id="exampleInputPassword4" value="http://" placeholder="http//twitter/username">      
                    </div>

                    <div class="form-group">
                      <label>Staff 4 Google Plus Handle:</label>
                      <input type="text" name="google_plus4" class="form-control" id="exampleInputPassword4" value="http://" placeholder="http//google+/username">      
                    </div>
                                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="our_staff" value="Set_STAFF" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->                     

            </div><!--/.col (left) -->












            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">WHAT WE DO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="lib/process.php?News_Post/whatwedo.php" method="POST" enctype="multipart/form-data">
                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "whatwedo_Set=error=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "whatwedo_Upload_Set=successful=01"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">What we do is successfully updated.</div>
                    <?php                  
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "settings/about.php?rdir=whatwedo_Set=errorr=01"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>
                    <!-- text input -->
                      <div class="form-group">
                        <label>What we do Headings 1</label>
                        <input type="text" name="w_heading1" class="form-control" placeholder="Heading..."/>
                      </div>
                      <div class="form-group">
                        <label>What we do Image 1</label>
                        <input type="file" name="w_image1" class="form-control" placeholder="Drag Images..."/>
                      </div>
                      <div class="form-group">
                        <label>What we do Content 1</label>
                        <textarea class="form-control" name="w_content1" rows="4" placeholder="Enter ..."></textarea>
                      </div> 


                      <div class="form-group">
                        <label>What we do Headings 3</label>
                        <input type="text" name="w_heading3" class="form-control" placeholder="Heading..."/>
                      </div>
                      <div class="form-group">
                        <label>What we do Image 3</label>
                        <input type="file" name="w_image3" class="form-control" placeholder="Drag Images..."/>
                      </div>
                      <div class="form-group">
                        <label>What we do Content</label>
                        <textarea class="form-control" name="w_content3" rows="4" placeholder="Enter ..."></textarea>
                      </div> 



                      <div class="box-footer">
                      <button type="submit" name="WHAT_WE_DO" value="Set_DO" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->


            <!-- right column -->
            <div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-header">
                  <h3 class="box-title">Fun Facts</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="lib/process.php?News_Post/Update_Our_Student.php" method="POST" enctype="multipart/form-data">
                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=error=5"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=successful=5"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">The our student has been Published successfuly.</div>
                    <?php                  
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=errorr=5"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                    <?php
                    }
                    ?> 
                    <!-- text input -->
                      <div class="form-group">
                        <label>News Headings</label>
                        <input type="text" name="s_topic" class="form-control" placeholder="Enter Title..."/>
                      </div>
                      <div class="form-group">
                        <label>News Image</label>
                        <input type="file" name="s_image" class="form-control" placeholder="Drag Images..."/>
                      </div>
                      <div class="form-group">
                        <label>News Content</label>
                        <textarea class="form-control" name="s_content" rows="7" placeholder="Enter ..."></textarea>
                      </div> 

                      <div class="box-footer">
                      <button type="submit" name="Our_student" value="Set_Student" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!--/.col (right) -->




            


          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 3.1.3 -->
      <?php
      require "set_inc/footer.php";
     ?>
 