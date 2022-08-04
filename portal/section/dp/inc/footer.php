<style type="text/css">
	
#sub-footer1{
	border-top: 3px solid #f26522;
	background:#49872E;
	margin: 0px;
	padding: 20px;
}

#sub-footer1{
	text-shadow:none;
	padding:0;
	padding-top:20px;
}

.copyright {
	text-align:left;
	font-size:12px;
}	

	.row {
	margin-bottom:5px;
}

</style>
<?php require "javascript.php";?>

<footer class="main"  style="clear: both;">
	<div id="sub-footer1" style="padding: 15px; margin-bottom: -25px;">
		
			<div class="row">
				<div class="col-lg-6 footer-grid">
					<div class="copyright" style="color: #fff; margin-top: 10px;">
						<p>  © 2016 - <?= date('Y');?> || <?=FOOTER;?></p>
					</div>
				</div>

			</div>

	</div>
</footer>



</body>
</html>

 <?php
            if (isset($er) && $er == false) { ?>
                <script>
                     var opts = {
            "closeButton": true,
            "debug": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        
        toastr.success("<?=$succes;?>", "<?=$name;?>", opts);
                </script>
            <?php }?>


        <?php
            if (isset($er) && $er == true) { ?>
                <script>
             toastr.error('<?=$errmsg;?>');
        </script>
    <?php }?>