<?php $this->load->helper('url');?>
<!-- Site footer -->
<div class="footer">
    <div class="container">
        <div class="footer_wrap row">
            <div class="col-md-3">
                <p class="text-left">Last updated on 3-February-2015</p>
            </div>
            <div class="col-md-4">
                <p class="text-left">© 2015 CUSAT. All rights reserved.</p>
            </div>
            <div class="col-md-5">

                <p class="text-left">Powered by <a id="web">WebDev Team</a> Dept. of Computer Science, CUSAT.</p>
            </div>

        </div>
    </div>
</div>




<!-- Include jQuery and bootstrap JS plugins -->
<!-- <script src="<?php // echo base_url();?>js/jquery-2.1.0.min.js"></script>-->

<!-- <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script> -->
<script>
$.fn.modal || document.write('<script src="<?php echo base_url();?>js/bootstrap.min.js"><\/script>');
</script>


<!--<script src="<?php //echo base_url();?>js/bootstrap.hover.js"></script>-->
<script src="<?php echo base_url();?>js/jquery.smint.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.flexslider.js"></script>
<script type="text/javascript">
  
  jQuery(window).load(function() {
  
  
    $("img.lazy").lazyload(
                           {threshold:100,skip_invisible:false}
);
 jQuery('.slider1').flexslider({
    animation: "fade",
    slideshow: true,
    animationLoop: true,
    smoothHeight: true,
    directionNav: false,
    direction: "horizontal"
      
  
});

});
</script>
<!--<script src="<?php //echo base_url();?>js/jquery.form.js"></script>-->

<!-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
<?php if($active=="performance" ) $this->load->view('exam_students_performance_scripts'); ?>
<?php if($active=="search" )  $this->load->view('exam_search_scripts'); ?>
<?php if($active=="history") { ?>


<script>

jQuery(window).load(function() {
  
  document.write('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"><\/script>');
  
  
 

  jQuery('.slider2').flexslider({
    animation: "slide",
    slideshow: false,
    animationLoop: true,
    smoothHeight: true,
    direction: "horizontal",
    itemWidth: 250,
    itemMargin: 5   
  });
});
  

</script>


<?php }?>
<?php if($active=="search" && ($session['admin']=="true" || $session['company']=="true" || $session['coordinator']=="1")) { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/jspdf/tableExport.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/jspdf/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/dataTables.colVis.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/fnStandingRedraw.js"></script>
<?php } ?>
<script type="text/javascript">
$(document).ready(function() {

$(window).keydown(
function(event) {
  if(event.keyCode == 13){
    event.preventDefault();
    return false;
  }
}
);

    $('.jithu_nav').smint({
        'scrollSpeed': 1000
    });

    //  //$("#events").html("k");
    // // var ur = "events/";
    //new String(<?php echo base_url();?>) ;
    //+ "/events/";
    //  $("#events").html(ur);
    //  $.ajax({
    //      url: ur,
    //      success: function(result) {
    //          $("#events").html(result);
    //      }
    //  });
});
</script>


<script>
$(document).ready(function() {
   initialize("map",9.673689,76.826264);

function initialize(a,b,c) {
        var mapDiv = document.getElementById(a);
        var latLng = new google.maps.LatLng(b, c);
        map = new google.maps.Map(mapDiv, {
          center: latLng,
         // disableDefaultUI: true,
          //backgroundColor: '#3A3A3A',
         // fillColor:"#3A3A3A",

          zoom: 16,
          mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
        });
var styles = [
  {
    stylers: [
     {"invert_lightness": true },
      // { hue: "#3A3A3A" },
      // { saturation: 20 }
    ]
  },{
    "featureType": "landscape.natural",
    "stylers": [
      { "visibility": "off" }
    ]
  },{
    "elementType": "labels.text",
    "stylers": [
      { "visibility": "on" },
     // { "invert_lightness": false },
     // { "hue": "#333" }
     // { "saturation": 57 },
     // { "gamma": 0.29 },
     // { "lightness": 100 }
    ]
  }
];

map.setOptions({styles: styles});
       //   var image = "flag.png";
  //       var myLatLng = new google.maps.LatLng(b,c);

  // var content = '<div style="width:300px;">CEP</div>';

  // var infowindow = new google.maps.InfoWindow({
  //   content: content
  // });

 // var marker = new google.maps.Marker({
   // map: map,
  //  position: map.getCenter(),
  //  draggable: true,
  //  icon: image
 //});

 // infowindow.open(map, marker);


      }

    });
</script>
<style type="text/css">
  #map{background-color:#3a3a3a !important}#web:hover{color:#fff;text-decoration:none;}
</style>
<script>
// setTimeout("kill()",3000);
// function kill () {
// // document.appendchild('<script src="<?php echo base_url();?>js/gravityscript-autorun.js"><\/script>');
//$('body').append('<script src="<?php echo base_url();?>js/gravityscript-autorun.js"><\/script>');
//}
</script>

</body>

</html>
