<!DOCTYPE html>
<html style="margin-top: 0px !important;" <?php language_attributes(); ?>>
<head>
<meta name="title" content="<?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?>">
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0, user-scalable=1"> -->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

?></title>
<link href='http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style.css">
<link rel="shortcut icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/favicon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<script type="text/javascript">
  $(document).ready(function() {
   		$("#searchid").click(function () {
			$("#search-box").show(150);
			$("#searchid").addClass("spot");

		});      
   		$(".contracted").click(function () {
			$(".hiddendrawer").hide(150);
			$(".filtercontrols li").removeClass("selected");
			$(this).addClass("selected");
		});      
   		$(".expanded").click(function () {
			$(".hiddendrawer").show(150);
			$(".filtercontrols li").removeClass("selected");
			$(this).addClass("selected");
		});      	  
   	});
    function toggleContent(myId) {
		var targetID = (('#postcontent-')+myId);
  			$(targetID).toggle(150);
			$(".filtercontrols li").removeClass("selected");
	}
    function toggleComment(myId) {
		var targetID = (('#postcomment-')+myId);
  			$(targetID).fadeToggle(300);
  	}
    function toggleAssignment(myId) {
		var targetID = (('#postassignment-')+myId);
  			$(targetID).toggle(150);
  			$(".filtercontrols li").removeClass("selected");
	}
    function toggleResources(myId) {
		var targetID = (('#postresources-')+myId);
  			$(targetID).toggle(150);
			$(".filtercontrols li").removeClass("selected");
	}


</script>
<?php wp_head(); ?>
</head>
<body>