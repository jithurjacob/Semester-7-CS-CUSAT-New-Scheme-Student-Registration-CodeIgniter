<?php $this->load->helper('url');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Set the viewport so this responsive site displays correctly on mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>College of Engineering Poonjar</title>
    
    <style type="text/css">
 #spinner{position:fixed;left:0;top:0;width:100%;height:100%;z-index:9999;background:url("<?php echo base_url();?>css/images/395.gif") 50% 50% no-repeat #030303}#spinner #load{position:fixed;left:47%;top:63%;font-size:25px}
</style>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<!-- Include bootstrap CSS -->
 <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type='text/css'> -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" type='text/css'>
<link href="<?php echo base_url();?>css/style_exam.css" rel="stylesheet" type='text/css'>
<link href="<?php echo base_url();?>css/style_body_override.css" rel="stylesheet" type='text/css'>
<?php
 if(isset($active)) if($active=="performance"){ ?>
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url();?>css/presenter.css"/> -->
<?php } 
 if(isset($active)) if($active=="history"){ ?>
 <?php }
 if(isset($active)) if($active=="search"){ ?>
<link href="<?php echo base_url();?>js/search/jquery.nouislider.min.css" rel="stylesheet" type='text/css'>
<link href="<?php echo base_url();?>js/search/jquery.dataTables.min.css" rel="stylesheet" type='text/css'>
<link href="<?php echo base_url();?>js/search/dataTables.colVis.min.css" rel="stylesheet" type='text/css'>
<?php } 
?>
<link href="<?php echo base_url();?>css/flexslider.css" rel="stylesheet" type='text/css'>
<!--<script type="text/javascript">
    // function cssLoaded(href) {//alert(0);
    //     var cssFound = false;
    //     for (var i = 0; i < document.styleSheets.length; i++) {
    //         var sheet = document.styleSheets[i];
    //         //alert(sheet['href']);
    //         if(sheet[href]!=null)
    //         if (sheet['href'].indexOf(href) >= 0 && sheet['cssRules'].length > 0) {
    //             cssFound = true;
    //         }
    //     };

    //     return cssFound;
    // }

    // if (!cssLoaded('bootstrap.min.css')) {//-combined
    //     local_bootstrap = document.createElement('link');
    //     local_bootstrap.setAttribute("rel", "stylesheet");
    //     local_bootstrap.setAttribute("type", "text/css");
    //     local_bootstrap.setAttribute("href", "<?php //echo base_url();?>css/bootstrap.min.css" );
    //     document.getElementsByTagName("head")[0].appendChild(local_bootstrap);
    // }
 </script>-->

 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
if (!window.jQuery) {
    document.write('<script src="<?php echo base_url();?>js/jquery-2.1.0.min.js"><\/script>');
}
</script>
<script src="<?php echo base_url();?>js/lazyload.min.js"></script>
 



<!-- Preloader -->
<script type="text/javascript">// <![CDATA[
$(window).load(function() { $("#spinner").fadeOut("normal"); })
// ]]></script>

</head>

<body>
<div id="spinner"><div id="load">Loading...</div></div>

<!-- <div class="alert   alert-danger  alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
Site is currently under testing if you find any bugs please report it to developer immediately  
 </div> -->
    <div class="header">
        <div class="container center-block">
            <div id="header_wrap" class="row center-block">

                <img alt="logo image" src="<?php echo base_url();?>css/images/Logow_copy.png" class="img-responsive center-block inline logo">
                <!-- <h2 class="inline title">College of Engineering,Poonjar</h2> -->
            </div>
        </div>
    </div>

    <!-- <div id="feedback">
        <a href="http://www.123contactform.com/form-1130118/Report-Bugs" target="_blank" class="blueLink13">Report Bugs</a>
    </div> -->
