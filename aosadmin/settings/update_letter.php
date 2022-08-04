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
                  <h3 class="box-title">TESTIMONIES UPDATE</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="lib/process.php?Testimonies/Update.php" method="POST" enctype="multipart/form-data">
                     <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_set=error=2"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>

                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Lettererset=error=2"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">Unsupported file! <br>Ensure that the file you are uploading is of JPG or PNG format, and size not larger than</div>
                    <?php                  
                    }
                    ?> 

                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=successful=2"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">Testimonies Updated succefully</div>
                    <?php                  
                    }
                    ?>

                  <!-- unset($_GET['rdir']); -->
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Customer Picture:</label>
                      <input type="file" name="tphoto" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Customer Testimony:</label>
                      <textarea name="comment" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Customer Name</label>
                      <input type="text" name="customer_name" class="form-control" id="exampleInputPassword1" placeholder="Rafiu Adeniyi">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Occupation</label>
                      <input type="text" name="occupation" id="exampleInputFile">
                      <p class="help-block">Example block-level help text here.</p>
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="Testimony" value="Set_Testimonies" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->




              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">LATEST EVENT UPDATE</h3>
                </div>
                <div class="box-body">
                  <form role="form" action="lib/process.php?Event/latest_event.php" method="POST" enctype="multipart/form-data">
                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=error=4"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>
                     <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=successful=4"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">The Event has Been Poblished.</div>
                    <?php                  
                    }
                    ?>
                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=errorr=4"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Topic</label>
                      <input type="text" name="event_topic" class="form-control" id="exampleInputPassword1" placeholder="The Topic">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event Image:</label>
                      <input type="file" name="even_image" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label>Event Message:</label>
                      <textarea name="event_massage" class="form-control" rows="5" placeholder="Enter ..."></textarea>
                    </div>

                                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="EVENT" value="Set_EVENT" class="btn btn-primary">Submit</button>
                  </div>
                </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->  


              <!-- Form Element sizes -->
              <div class="box box-success">
                <div class="box-header">
                 <h3 class="box-title">Welcome To Our School</h3>
                </div>
                <div class="box-body">
                  <form role="form" action="lib/process.php?Welcome/Welcom_advert.php" method="POST" enctype="multipart/form-data">
                  <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=errorr=1"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>
                   <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=error=1"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Empty in Gallery or content.</div>
                  <?php
                  }
                  ?>

                  <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=successful=1"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">Welcome to school advert Updated</div>
                  <?php                  
                  }
                  ?>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gallery Title</label>
                      <input type="text" name="s_title" class="form-control" id="exampleInputPassword1" placeholder="Gallery Title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Gallery1 Image:</label>
                      <input type="file" name="image1" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">Gallery2 Image:</label>
                      <input type="file" name="image2" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gallery3 Image:</label>
                      <input type="file" name="image3" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gallery4 Image:</label>
                      <input type="file" name="image4" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Gallery5 Image:</label>
                      <input type="file" name="image5" class="form-control" id="exampleInputEmail1" placeholder="Drag Photo">
                    </div>

                                      
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="gallery" value="Set_GALLERY" class="btn btn-primary">Submit</button>
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
                  <h3 class="box-title">NEWS UPDATE</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" action="lib/process.php?News_Post/Update_news.php" method="POST" enctype="multipart/form-data">
                    <?php
                      if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=error=3"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=successful=3"){
                    ?>
                      <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">The news has been Published successfuly.</div>
                    <?php                  
                    }
                    ?>

                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Update_Letter_Set=errorr=3"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>
                    <!-- text input -->
                      <div class="form-group">
                        <label>News Headings</label>
                        <input type="text" name="ntitle" class="form-control" placeholder="Enter Title..."/>
                      </div>
                      <div class="form-group">
                        <label>News Image</label>
                        <input type="file" name="newsimage" class="form-control" placeholder="Drag Images..."/>
                      </div>
                      <div class="form-group">
                        <label>News Content</label>
                        <textarea class="form-control" name="ncontent" rows="10" placeholder="Enter ..."></textarea>
                      </div> 

                      <div class="box-footer">
                      <button type="submit" name="news_post" value="Set_News" class="btn btn-primary">Submit</button>
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
                  <h3 class="box-title">Our Student</h3>
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

    <!-- jQuery 2.1.3 -->
      <?php
      require "set_inc/footer.php";
     ?>
 