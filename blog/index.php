<?php 
require "inc/header.php";
?>
    <title><?=TITLE1;?></title>
    <body>
        <div class="main-content">
            <div class="clearfix"></div>

            <div class="search">
                <li id="btn-search1"><a href="javascript:void(0)" id="btn-search2"><i class="fa fa-search"></i></a></li>

                <button id="btn-search-close" class="btn btn--search-close" aria-label="Close search form"> <i class="ti-close"></i></button>
                      </div>
           

            <!-- <div class="container">
                <div class="newstricker_inner">
                    <div class="trending"><strong>Trending</strong> Now</div>
                    <div id="newsTicker" class="owl-carousel owl-theme">
                        <div class="item">
                            <a href=""> Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                        </div>
                        <div class="item">
                            <a href="#"> It is a long established fact that a reader will be distracted by the readable.</a>
                        </div>
                        <div class="item">
                            <a href="#"> Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                        </div>
                    </div>
                </div>
            </div> -->
            
            
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="hidden-xs hidden-sm col-md-2 leftSidebar">
                            <div class="trending-post">
                                <div class="title-holder">
                                    <h3 class="title">Trending Posts</h3>
                                </div>

                                <?php

                                    $news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY RAND() LIMIT 6");
                                    while($fetch_news = mysqli_fetch_assoc($news_query)){
                                        $post_by = $fetch_news['user_level'];
                                         $pid = $fetch_news['postid'];
                                        // $postnews_id = substr(base64_encode($pid), 3);
                                        $postnews_id = base64_encode($pid);
                                        $n_title = $fetch_news['title'];
            
                                        $comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                        $count = mysqli_num_rows($comment_query);
                                                        
                                ?>
                                <div class="single-post">
                                    <div class="entry-meta">
                                        <span class="comment-link"><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a></span><?=$count;?> Comments</a></span>
                                    </div>
                                    <h4><a href="#"><em><strong><?=$n_title;?></strong></em></a></h4>
                                </div>
                                <?php };?>

                            </div>

                            <!-- <div class="banner-content">
                                <img src="assets/img/ad-180x480-1.png" class="img-responsive" alt="">
                            </div> -->
                        </div>

                        <main class="col-xs-12 col-sm-8 col-md-7 content p_r_40">
                        <?php

                            $news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY RAND() LIMIT 1");
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
                                $comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                $count = mysqli_num_rows($comment_query);
                        ?>
                            <article class="grid_post grid_post_lg text-center">
                                <figure>
                                    <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>" class="grid_image"><img src="<?=home('');?>upload/<?=$newsimage;?>" class="img-responsive" alt=""></a>
                                    <figcaption>
                                        <div class="post-cat"><span>Most view</span> <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"> Post</a></div>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="<?=$date;?>"><?=$date;?></time></span> 
                                            <span class="comment-link"><a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$count;?> Comments</a></span>
                                        </div>

                                        <h3 class="grid_post_title">
                                            <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><?=$n_title;?></a>
                                        </h3>
                                        <p class="text-left">
                                            <?=$short_content;?>
                                        </p>
                                        <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>" class="btn link-btn btn-outline btn-rounded">Reading &#8702;</a>
                                    </figcaption>
                                </figure>
                            </article>
                        <?php };?>


    
                            <div class="grid-content latest_articles">
                                <?php

                                    $numbers_per_page = 6;

                                    $query = mysqli_query($connect, "SELECT * FROM update_news");
                                    $count = mysqli_num_rows($query);

                                    $page_result = ceil($count/$numbers_per_page);

                                    if(!isset($_GET['page'])){
                                        $page = 1;
                                     }else{
                                        $page = $_GET['page'];
                                     }

                                    $determin_the_first_page = ($page-1)*$numbers_per_page;

                                    $news_query = mysqli_query($connect, "SELECT * FROM update_news ORDER BY `update_news`.`date` DESC LIMIT ".$determin_the_first_page.','.$numbers_per_page);
                                    $count_result = mysqli_num_rows($news_query);

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
                                        $comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                        $count = mysqli_num_rows($comment_query);
                                            
                                ?>
                                
                                 <article class="grid_post">
                                    <figure>
                                        <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>" class="grid_image">
                                            <img src="<?=home('');?>upload/<?=$newsimage;?>" class="img-responsive" alt="">
                                        </a>
                                        <figcaption>
                                            <div class="entry-meta">
                                                <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="<?=$date;?>"><?=$date;?></time></span> 
                                                <span class="comment-link"><a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?=$count;?> Comments</a></span>
                                            </div>                                            
                                            <h4 class="grid_post_title"><a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><?=$n_title;?></a></h4>
                                            <div class="element-block">
                                                <a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>" class="btn link-btn btn-outline btn-rounded">Reading &#8702;</a>
                                                <div class="post_share">
                                                        <i class="fa fa-check" style="color: #f26522;"></i>
                                                    <a class="smedia facebook fa fa-facebook" href="#"></a>
                                                    <a class="smedia twitter fa fa-twitter" href="#"></a>
                                                    <a class="smedia googleplus fa fa-google-plus" href="#"></a>
                                                </div>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <?php };?>                        
                                                                                            
                            </div>    
                             <ul class="pagination">
                                <li class="disabled"><a href="#">&#8701;</a></li>
                                <li class="active"><a href="<?=base_url('?page=1');?>"><?=$page;?><span class="sr-only">(current)</span></a></li>
                                <?php 
                                for ($page=2; $page<=$page_result; $page++) {?>                                     
                                
                                    <li><a href="<?=base_url('?page=').$page;?>"><?=$page;?><span class="sr-only">(current)</span></a></li>
                                    
                                <?php }?>
                                <li><a href="<?=base_url('?page=').$page;?>">&#8702;</a></li>

                            </ul>
                        </main>





                        <aside class="col-xs-12 col-sm-4 col-md-3 rightSidebar">
                            <div class="latest_post_widget">
                                <div class="title-holder">
                                    <h3 class="title">Most Popular</h3>
                                    <span class="title-shape title-shape-dark" ></span>
                                </div>
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
                                        $comment_query = mysqli_query($connect, "SELECT * FROM comment WHERE post_id = '$pid'");
                                        $count = mysqli_num_rows($comment_query);
                                                        
                                ?>
                                <div class="media latest_post">
                                    <a class="media-left" href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>">
                                        <img src="<?=home('');?>upload/<?=$newsimage;?>" class="media-object" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="<?=base_url('');?>read.php?post=<?=$postnews_id;?>"><?=$n_title;?></a></h6>
                                        <div class="entry-meta">
                                            <span class="entry-date"><i class="fa fa-calendar-o" aria-hidden="true"></i><time datetime="<?=$date;?>"><?=$date;?></time></span>
                                        </div>
                                    </div>
                                </div>
                                <?php };?>
                               
                            </div>
                            
                            

                            <div class="fb_like">
                                <div class="title-holder">
                                    <h3 class="title">Facebook</h3>
                                    <span class="title-shape title-shape-dark"></span>
                                </div>
                                <!--  /.End of title -->
                                <div class="fb-page" data-href="https://www.facebook.com/aosacademyofficial/" data-tabs="timeline" data-width="268" data-height="214" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/aosacademyofficial/" class="fb-xfbml-parse-ignore">
                                        <a href="https://www.facebook.com/aosacademyofficial/">A.O.S Academy</a>
                                    </blockquote>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <div class=" container">
                    <div class="height_15"></div>
                    <div class="banner-content">
                        <img src="assets/img/ad-728x90-1.png" class="img-responsive center-block" alt="">
                    </div>
                    <!-- /.End of banner content -->
                </div>




                <div class="youtube_video" style="margin-bottom: -80px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <div class="title-holder">
                                    <h3 class="title title-white">Featured Videos</h3>
                                    <span class="title-shape title-shape-white"></span>
                                </div>
                                <!--  /.End of title -->
                                <h3 class="video-title">Video</h3>
                                <div class="item vide_post_item">
                                    <!-- the class "videoWrapper169" means a 16:9 aspect ration video. Another option is "videoWrapper43" for 4:3. -->
                                    <div class="videoWrapper videoWrapper169 js-videoWrapper">
                                        <!-- YouTube iframe. -->
                                        <!-- note the iframe src is empty by default, the url is in the data-src="" argument -->
                                        <!-- also note the arguments on the url, to autoplay video, remove youtube adverts/dodgy links to other videos, and set the interface language -->
                                        <iframe class="videoIframe js-videoIframe"  allowfullscreen data-src="https://www.youtube.com/embed/hgzzLIa-93c?autoplay=1& modestbranding=1&rel=0&hl=sv"></iframe>
                                        <!-- the poster frame - in the form of a button to make it keyboard accessible -->
                                        <button class="videoPoster js-videoPoster" style="background-image:url(assets/img/youtube-video.jpg);">Play video</button>
                                    </div>
                                    <!--<button onclick="videoStop()">external close button</button>-->
                                </div>
                                <!-- /.End of video post item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
      

        <?php
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
    </body>

</html>