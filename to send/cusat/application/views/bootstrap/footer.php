<?php $this->load->helper('url'); ?>
<!-- Site footer -->
<div class="footer">
    <div class="container">
        <div class="footer_wrap row">
        <div class="col-md-3">
                <p class="text-left">Last updated on 24-January-2014</p>
            </div>
            <div class="col-md-4">
                <p class="text-left">© 2014 CUSAT. All rights reserved.</p>
            </div>
            <div class="col-md-5">

                <p class="text-left">Powered by WebDev Team Dept. of Computer Science, CUSAT.</p>
            </div>

        </div>
    </div>
</div>


<!-- Include jQuery and bootstrap JS plugins -->
<!--<script src="<?php echo base_url();?>js/jquery-2.1.0.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
if (!window.jQuery) {
    document.write('<script src=<?php echo base_url();?>js/jquery-2.1.0.min.js><\/script>');
}
</script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
<script>    $.fn.modal || document.write('<script src=<?php echo base_url();?>js/bootstrap.min.js>\/script>')</script>

<script src="<?php echo base_url();?>js/bootstrap.hover.js"></script>
<script src="<?php echo base_url();?>js/jquery.smint.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>



<script type="text/javascript">


$(document).ready(function() {
    $('.jithu_nav').smint();
});

</script>
 <script type="text/javascript">
    function cssLoaded(href) {
        var cssFound = false;

        for (var i = 0; i < document.styleSheets.length; i++) {
            var sheet = document.styleSheets[i];
            if(sheet['href']!=null)
            if (sheet['href'].indexOf(href) >= 0 && sheet['cssRules'].length > 0) {
                cssFound = true;
            }
        };

        return cssFound;
    }

    if (!cssLoaded('bootstrap-combined.min.css')) {
        local_bootstrap = document.createElement('link');
        local_bootstrap.setAttribute("rel", "stylesheet");
        local_bootstrap.setAttribute("type", "text/css");
        local_bootstrap.setAttribute("href", "<?php echo base_url();?>css/bootstrap.min.css" );
        document.getElementsByTagName("head")[0].appendChild(local_bootstrap);
    }
</script>
 <script>
      initialize("map",9.673689,76.826264);

function initialize(a,b,c) {
        var mapDiv = document.getElementById(a);
        var latLng = new google.maps.LatLng(b, c);
        map = new google.maps.Map(mapDiv, {
          center: latLng,
          zoom: 16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        
       //   var image = "flag.png";
        var myLatLng = new google.maps.LatLng(b,c);
        
 // var content = '<div style="width:300px;">CEP</div>';

 // var infowindow = new google.maps.InfoWindow({
   // content: content
  //});

 // var marker = new google.maps.Marker({
   // map: map,
  //  position: map.getCenter(),
  //  draggable: true,
  //  icon: image
 //});

 // infowindow.open(map, marker);

  
      }
    </script>
</body>

</html>
