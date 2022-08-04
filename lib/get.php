<?php
if(isset($_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c']) ){
$news_query = mysqli_query($connect, "SELECT * FROM update_news WHERE postid ='".$_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c']."'");
	if(!empty($news_query)){						
		$fetch_news = mysqli_fetch_assoc($news_query);
		$postnews_id = $fetch_news['postid'];
		if(isset($_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c']) && $_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c'] =="" && $_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c'] == $postnews_id."a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=lp&q/comments.php" || !isset($_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c'])){

			header("Location:" .base_url("blog.php?get=blog_set=").sha1("loadblog").base64_encode("loadblog")."lp&q/comments.php");
		}
	}else{
		header("Location:" .base_url("blog.php?get=blog_set=").sha1("loadblog").base64_encode("loadblog")."lp&q/comments.php");

	}
}else{
	header("Location:" .base_url("blog.php?get=blog_set=").sha1("loadblog").base64_encode("loadblog")."lp&q/comments.php");

}

// echo  $postnews_id.'a8bb930f6c443eeed9f59e397238c33b415a5f9bG9hZGJsb2c=lp&q/comments.php'."<br>";
// echo $_GET['a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c']== $postnews_id."a8bb930f6c443eeed9f59e397238c33b4915a5f9bG9hZGJsb2c=lp&q/comments.php" ;
?>

<!-- || $_GET['news_update'] == '"'$postnews_id.'"a8bb930f6c443eeed9f59e397238c33b415a5f9bG9hZGJsb2c=lp&q/comments.php' -->