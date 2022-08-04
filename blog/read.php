<?php 
ob_start();
require "inc/header.php";
if(!isset($_GET['post']) ||  $_GET['post']==NULL){
    header("LOCATION:".base_url(''));
}

?>
    <title><?=TITLE1;?></title>
                <!-- /.End of page header -->
                <div class=" page-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="details-body">
                                    <div class="post_details stickydetails">
                                        <header class="details-header">
                                            <?php
                                                
                                                if(isset($_GET['post'])){
                                                    $news_query = mysqli_query($connect, "SELECT * FROM update_news WHERE postid ='".base64_decode($_GET['post'])."'");
                                                    if(!empty($news_query)){                        
                                                        $fetch_news = mysqli_fetch_assoc($news_query);
                                                        $postnews_id = $fetch_news['postid'];
                                                        $post_by = $fetch_news['user_level'];
                                                        $n_title = $fetch_news['title'];
                                                        $short_content = $fetch_news['short_content'];
                                                        $content = $fetch_news['content'];
                                                        $newsimage = $fetch_news['newsimage'];
                                                        $news_date = $fetch_news['date'];
                                                        $date = strftime("%b %d, %Y", strtotime($fetch_news['date']));
                                                        $time = strftime("%I : %M : %S %p", strtotime($fetch_news['date']));
                                                    }                                                               
                                                }                                           
                                                    

                                                     $pid = base64_decode($_GET['post']);
                                                    $comment_query1 = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                                    $count = mysqli_num_rows($comment_query1);
                                                       
                                            ?>
                                            <!-- <div class="post-cat"><a href="#">Fashion</a><a href="#">Travel</a><a href="#">Lifestyle</a></div> -->
                                            <h2><element><?=$n_title;?></element></h2>
                                                <?php if(isset($_SESSION['msg'])){?>
                                                <div class="col-sm-12">
                                                    <div class="alert alert-success">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                        <strong>Success!</strong> <?=$_SESSION['msg'];?>
                                                    </div>
                                                </div>
                                            <?php }?>



                                            <div class="element-block">
                                                <div class="entry-meta">
                                                    <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="<?=$date;?>"><?=$date;?></time></span> 
                                                    <span class="comment-link"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$count;?> Comments</a></span>
                                                </div>
                                                <div class="reading-time"><span class="eta"></span> (<span class="words"></span> words)</div>
                                            </div>
                                        </header>
                                        <figure>
                                            <img src="<?=home('');?>upload/<?=$newsimage;?>" alt="" class="aligncenter img-responsive">
                                        </figure>
                                        <h3><?=$n_title;?></h3>
                                        <p><?=$content;?></p>                                      
                                       
                                        <!-- <blockquote>
                                            There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                                            by injected humour, or randomised words which don't look even slightly believable.
                                        </blockquote> -->
                                        
                                    </div>
                                    <!-- /.End of post details -->
                                    <div class="stickyshare">
                                        <aside class="share_article">
                                            <a href="#" class="boxed_icon facebook" data-share-url="http://aosacademy.com" data-share-network="facebook" data-share-text="Share this awesome link on Facebook" data-share-title="Facebook Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-facebook"></i><span>28</span></a>
                                            <a href="#" class="boxed_icon twitter" data-share-url="http://aosacademy.com" data-share-network="twitter" data-share-text="Share this awesome link on Twitter" data-share-title="Twitter Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-twitter"></i></a>
                                            <a href="#" class="boxed_icon google-plus" data-share-url="http://aosacademy.com" data-share-network="googleplus" data-share-text="Share this awesome link on Google+" data-share-title="Google+ Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-google-plus"></i></a>
                                            <!-- <a href="#" class="boxed_icon pinterest" data-share-url="http://aosacademy.com" data-share-network="pinterest" data-share-text="Share this awesome link on Pinterest" data-share-title="Pinterest Share" data-share-via="" data-share-tags="" data-share-media=""><i class="fa fa-pinterest-p"></i></a>
                                            <a href="#" class="boxed_icon comment"><svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" width="14" height="14" viewBox="0 0 14 14" enable-background="new 0 0 14 14" xml:space="preserve"><path d="M3.6 14c0 0-0.1 0-0.1 0 -0.1-0.1-0.2-0.2-0.2-0.3v-2.7h-2.9C0.2 11 0 10.8 0 10.6V0.4C0 0.2 0.2 0 0.4 0h13.3C13.8 0 14 0.2 14 0.4v10.2c0 0.2-0.2 0.4-0.4 0.4H6.9L3.9 13.9C3.8 14 3.7 14 3.6 14zM0.7 10.2h2.9c0.2 0 0.4 0.2 0.4 0.4v2.2l2.5-2.4c0.1-0.1 0.2-0.1 0.2-0.1h6.6v-9.5H0.7V10.2z"></path></svg><span>3</span></a> -->
                                        </aside>
                                    </div>
                                    <!-- /End of share icon -->
                                </div>




                                <!-- <aside class="about-author">
                                    <h3>About The Author</h3>
                                    <div class="author-bio">
                                        <div class="author-img">
                                            <a href="#"><img alt="Johnny Doe" src="assets/img/about-avatar.jpg" class="avatar img-responsive"></a>												
                                        </div>
                                        <div class="author-info">
                                            <h4 class="author-name">Johnny Doe</h4>
                                            <p>Johnny Doe was born in Ulm, in the Kingdom of Württemberg in the German Empire on 14 March 1879. His father was Hermann Einstein, a salesman and engineer. He was a really good man for sure.</p>
                                            <p>
                                                <a class="social-link facebook" href="#"><i class="fa fa-facebook"></i></a>
                                                <a class="social-link twitter" href="#"><i class="fa fa-twitter"></i></a>
                                                <a class="social-link vine" href="#"><i class="fa fa-vine"></i></a>
                                                <a class="social-link dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                                                <a class="social-link instagram" href="#"><i class="fa fa-instagram"></i></a>
                                            </p>
                                        </div>
                                    </div>
                                </aside> -->





                                <div class="post_related">
                                    <h3 class="related_post_title">You Might Also Like...</h3>
                                    <div class="row">
                                        <?php

                                                $news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY RAND() LIMIT 4");
                                                while($fetch_news = mysqli_fetch_assoc($news_query)){
                                                    $post_by = $fetch_news['user_level'];
                                                     $pid = $fetch_news['postid'];
                                                    // $postnews_id = substr(base64_encode($pid), 3);
                                                    $postnews_id = base64_encode($pid);
                                                    $n_title = $fetch_news['title'];
                                                    $short_content = $fetch_news['short_content'];
                                                    $content = $fetch_news['content'];
                                                    $newsimage = $fetch_news['newsimage'];
                                                    $news_date = $fetch_news['date'];
                                                    $date = strftime("%b %d, %Y", strtotime($fetch_news['date']));
                                                    $time = strftime("%I : %M : %S %p", strtotime($fetch_news['date']));
                                            
                                                                
                                        ?>
                                        <div class="col-sm-3">
                                            <article class="post_article item_related">
                                                <a class="post_img" href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>">
                                                    <figure>
                                                        <img class="img-responsive" src="<?=home('');?>upload/<?=$newsimage;?>" alt="">
                                                    </figure>
                                                </a>
                                                <h4><a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><strong><?=$n_title;?></strong></a></h4>
                                            </article>
                                        </div>
                                        <?php };?>
                                    </div>
                                </div>




                                <!-- /.End of  related post -->
                                <div class="comments">
                                    
                                    <h3 class="comment_title"><?=$count;?> Comments</h3>
                                   <!--  <div class="media">
                                        <div class="media-left">
                                            <img src="assets/img/img_avatar1.png" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Jahangir Alom <small>Posted on February 19, 2016</small></h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            <a href="#" class="btn link-btn btn-rounded">Reply ⇾</a>
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="assets/img/img_avatar2.png" alt="Demo Avatar Jane Doe" class="media-object">
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Jane Doe <small>Posted on February 20, 2016</small></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                    <a href="#" class="btn link-btn btn-rounded">Reply ⇾</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                   
                                        <?php                            
                                            // if(isset($_GET['post'])){
                                                $pid = base64_decode($_GET['post']);
                                                $comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                                    while($fetch_comment = mysqli_fetch_assoc($comment_query)){
                                                        $comment_image = mysqli_query($connect,"SELECT * FROM avarta");
                                                    $fetch_avarta = mysqli_fetch_assoc($comment_image);
                                                    $comment_name = $fetch_comment['user_name'];
                                                    $comments = $fetch_comment['comment'];
                                                    $comment_date = strftime("%B %d, %Y", strtotime($fetch_comment['date']));
                                                    $comment_id = $fetch_comment['com_id'];
                                                    $post_id_comment = $fetch_comment['post_id'];
                                                    $comment_image = embeddedImgevent($fetch_avarta['avarta']);
                                            // }
                                                
                                            ?> 
                                        <div class="media">
                                        <div class="media-left">
                                            <img src="<?=base_url('');?>images/photo.jpg" alt="" class="media-object">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?=$comment_name;?> <small><i>Posted on <?=$comment_date;?></i></small></h4>
                                            <p><?=$comments;?></p>
                                            <!-- <a href="#" class="btn link-btn btn-rounded">Reply ⇾</a> -->
                                        </div>
                                   
                                    </div>

                                
                                 <?php };?>
                                </div>

                                <?php

                                    if(isset($_POST['Post']) && $_POST['Post'] =='Com'){
                                        $er = false;
                                        $pid = base64_decode($_GET['post']);
                                        $name = mysqli_real_escape_string($connect, trim(ucwords(strtolower($_POST['name']))));
                                        $email = mysqli_real_escape_string($connect, trim(ucwords(strtolower($_POST['email']))));
                                        $message = mysqli_real_escape_string($connect, trim(ucwords(strtolower($_POST['message']))));
                                        if($er == false){

                                            $query = mysqli_query($connect,"INSERT INTO comment SET user_name = '$name', post_id = '$pid', comment = '$message',user_email = '$email'");
                                            if(!empty($query)){
                                                $check_mails = mysqli_query($connect, "SELECT email FROM email_lists") or die(mysqli_error($connect));
                                                $getmails = mysqli_fetch_assoc($check_mails);
                                                if($getmails['email']==$email){
                                                    $mail = mysqli_query($connect, "UPDATE email_lists SET name = '$name', email = '$email'")or die(mysqli_error($connect));
                                                }
                                                else{
                                                    $mail = mysqli_query($connect, "INSERT INTO email_lists SET name = '$name', email = '$email'")or die(mysqli_error($connect));
                                                }   
                                                $_SESSION['msg'] = 'Comments posted';
                                            }

                                        }
                                    }

                                ?>

                                <div class="comment_form">
                                    <form action="<?=base_url('');?>read.php?post=<?=base64_encode($pid);?>" method="POST">
                                        <h3 class="replay_title">Leave a Reply </h3>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" required="" id="textarea" rows="5"></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label" required="">Full Name *</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="name2" required="" type="text" name="name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label" >Email *</label>
                                        <div class="col-sm-5">
                                            <input class="form-control" id="email2" required="" type="email" name="email">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn link-btn" name="Post" value="Com">Post Comment ⇾</button>
                                    </form>
                                </div>
                                <!-- /.End of comment content -->
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <?php
            unset($_SESSION['msg']);
            require "../inc/foot.php";
            require "inc/js.php";



        ?>
        <script>
            $(document).ready(function () {
                'use strict';
                //Grid content 
                var masonry = new Macy({
                    container: '.grid-content',
                    trueOrder: false,
                    waitForImages: false,
                    useOwnImageLoader: false,
                    debug: true,
                    mobileFirst: true,
                    columns: 1,
                    margin: 30,
                    breakAt: {
                        1200: 2,
                        992: 2,
                        768: 2,
                        480: 2
                    }
                });
            });
        </script>