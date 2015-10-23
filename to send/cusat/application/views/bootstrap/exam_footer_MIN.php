<?php $this->load->helper('url');?>
<!-- Site footer -->
<div class="footer">
    <div class="container">
        <div class="footer_wrap row">
            <div class="col-md-3">
                <p class="text-left">Last updated on 3-February-2015</p>
            </div>
            <div class="col-md-4">
                <p class="text-left">© 2014 CUSAT. All rights reserved.</p>
            </div>
            <div class="col-md-5">

                <p class="text-left">Powered by <a id="web" >WebDev Team</a> Dept. of Computer Science, CUSAT.</p>
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
  eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('2(8).9(7(){$("a.b").6({3:4,5:1});2(\'.l\').c({j:"k",h:0,g:0,d:0,e:1,f:"i"})});',22,22,'true|false|jQuery|threshold|100|skip_invisible|lazyload|function|window|load|img|lazy|flexslider|smoothHeight|directionNav|direction|animationLoop|slideshow|horizontal|animation|fade|slider1'.split('|'),0,{}))
</script>
<!--<script src="<?php //echo base_url();?>js/jquery.form.js"></script>-->

<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<?php if($active=="performance" ) $this->load->view('exam_students_performance_scripts'); ?>
<?php if($active=="search" )  $this->load->view('exam_search_scripts'); ?>
<?php if($active=="history") { ?>


<script>
jQuery(window).load(function() {
  
  //document.write('<script src="http://maps.googleapis.com/maps/api/js?sensor=false"><\/script>');
  
  });
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1(6).a(8(){1(\'.7\').2({3:"4",9:b,h:0,i:0,g:"f",c:d,e:5})});',19,19,'true|jQuery|flexslider|animation|slide||window|slider2|function|slideshow|load|false|itemWidth|250|itemMargin|horizontal|direction|animationLoop|smoothHeight'.split('|'),0,{}))
</script>


<?php }?>
<?php if($active=="search" && ($session['admin']=="true" || $session['company']=="true" || $session['coordinator']=="1")) { ?>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/jspdf/tableExport.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/jspdf/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/dataTables.colVis.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/search/fnStandingRedraw.js"></script>
<?php } ?>
<script type="text/javascript">
eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(5).6(1(){$(4).3(1(0){2(0.7==8){0.e();c b}});$(\'.9\').a({\'f\':d})});',16,16,'event|function|if|keydown|window|document|ready|keyCode|13|jithu_nav|smint|false|return|1000|preventDefault|scrollSpeed'.split('|'),0,{}))
</script>


<script>
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(7).l(d(){6("5",9.k,m.n);d 6(a,b,c){0 8=7.j(a);0 g=e 4.1.p(b,c);5=e 4.1.h(8,{i:g,q:o,s:[4.1.z.B,\'C\']});0 2=[{3:[{"x":r},]},{"t":"u.w","3":[{"f":"v"}]},{"F":"y.D","3":[{"f":"E"},]}];5.A({2:2})}});',42,42,'var|maps|styles|stylers|google|map|initialize|document|mapDiv|||||function|new|visibility|latLng|Map|center|getElementById|673689|ready|76|826264|16|LatLng|zoom|true|mapTypeIds|featureType|landscape|off|natural|invert_lightness|labels|MapTypeId|setOptions|ROADMAP|map_style|text|on|elementType'.split('|'),0,{}))
</script>

<style type="text/css">
  #map{background-color:#3a3a3a !important}#web:hover{color:#fff;text-decoration:none;}
</style>

</body>

</html>
