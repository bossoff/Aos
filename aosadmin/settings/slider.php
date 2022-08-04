
   
   <?php
   //require "connection/function.php";
    require "set_inc/header.php";
    require "set_inc/aside.php";

   ?>

   <title><?= TITLE_SLIDER; ?></title>

<style type="text/css"> button{background: #f15814; border: 1px solid; button:hover: #49872E;} </style>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sliders Update With the Site Logo
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Sliders Update With Site Logo</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
          <!-- left column -->
            <div class="col-md-8 col-sm-offset-2">
            <div class="box box-primary" style="border-top: 3px solid #49872E;">
                <div class="box-header">
                  <h3 class="box-title">Upload Site Logo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="lib/process.php?Logo_acction" enctype="multipart/form-data" role="form">
                   <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "logo_uploaderror"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Network Problem or Contact your Wapmaster</div>
                  <?php
                  }
                  ?>

                  <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "logo_upload"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">Logo was succesfully uploaded</div>

                  <?php
                  unset($_GET['rdir']);
                  }
                  ?> 
                  <div class="box-body">  
                                
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Logo</label>
                      <input type="file" name="logo" value="logo" required="">
                      <p class="help-block">Any logo you upload here will be shown on top of your every website pages</p>
                    </div>
                  </div>
                  
                  <div class="box-footer">
                    <button type="submit" name="LOGO" value="Header" class="btn btn-primary" style="">Submit</button>
                  </div>
                </form>
              </div>

<br/><br/>
            
              <!-- general form elements -->
              <div class="box box-primary" style="border-top: 3px solid #49872E;">
                <div class="box-header">
                  <h3 class="box-title">Update Sliders</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="lib/process.php?Slider_acction" method="POST" enctype="multipart/form-data">
                    <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Slider_Upload_Set=errorR=01"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Sorry Only your wapmaster can repair this.</div>
                  <?php
                  }
                  ?>

                   <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Slider_Upload_Set=error=01"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: #ec3434; text-align: center; font-size: 18px;">Opps Fields most not be empty.</div>
                  <?php
                  }
                  ?>

                  <?php
                    if(isset($_GET['rdir']) && $_GET['rdir'] == "Slider_Upload_Set=successful=01"){
                  ?>
                    <div style="padding: 10px; color: #fff; background: green; text-align: center; font-size: 18px;">Sliders Updated succesfully.</div>

                  <?php
                  unset($_GET['rdir']);
                  }
                  ?> 
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title for Slider 1</label>
                      <input type="text"  name="title1" class="form-control" id="exampleInputEmail1" placeholder="Whats on your mind? for Slider 1">
                    </div>          

                    <div class="form-group">
                      <label for="exampleInputEmail1">Short Decription for Slider 1</label>
                      <input type="text" name="decription1" class="form-control" id="exampleInputEmail1" placeholder="Short description">
                    </div>

                     <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title for Slider 2</label>
                      <input type="text" name="title2" class="form-control" id="exampleInputEmail1" placeholder="Whats on your mind? for Slider 2">
                    </div>          

                    <div class="form-group">
                      <label for="exampleInputEmail1">Short Decription for Slider 2</label>
                      <input type="text" name="decription2" class="form-control" id="exampleInputEmail1" placeholder="Short description">
                    </div>

                     <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Title for Slider 3</label>
                      <input type="text" name="title3" class="form-control" id="exampleInputEmail1" placeholder="Whats on your mind? for Slider 2">
                    </div>          

                    <div class="form-group">
                      <label for="exampleInputEmail1">Short Decription for Slider 3</label>
                      <input type="text" name="decription3" class="form-control" id="exampleInputEmail1" placeholder="Short description">
                    </div>

                    
                    <div class="box-footer">
                      <div class="form-group">
                        <label for="exampleInputFile">Image Slider 1</label>
                        <input type="file" name="slider1" id="exampleInputFile">
                        <p class="help-block">Place your Image true here for the slider 1.</p>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Image Slider 2</label>
                        <input type="file" name="slider2" id="exampleInputFile">
                        <p class="help-block">Place your Image true here for the slider 2.</p>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputFile">Image Slider 3</label>
                        <input type="file" name="slider3" id="exampleInputFile">
                        <p class="help-block">Place your Image true here for the slider 3.</p>
                      </div>
                    </div>

                    <div class="checkbox">
                      <label>
                        <input type="checkbox"> Check me out
                      </label>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" name="slider" value="Post_Slider" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->              


    
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     
     <?php
      require "set_inc/footer.php";
     ?>
