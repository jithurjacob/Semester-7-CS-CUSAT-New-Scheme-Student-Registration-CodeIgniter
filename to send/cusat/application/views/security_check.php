<div class="hidden" id="result"></div>
<script type="text/javascript">
$(document).ready(function() {
  $.ajax({ type:'GET',
         cache: false,
    url:'<?php echo base_url(); ?>index.php/exam/check_isvalidated',
        success: function(result){ $('#result').html(result);},
    error:function(result){}
        });
});
</script>
