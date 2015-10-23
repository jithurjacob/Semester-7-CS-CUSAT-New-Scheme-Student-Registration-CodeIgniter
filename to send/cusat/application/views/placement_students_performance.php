<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">

                <div class="helper_div chart_container"></div>
                <div class="helper_div radial_container"></div>
                <div class="helper_div horizontal_container"></div>
                <div class="helper_div vertical_container"></div>
                <div class="helper_div digital_container"></div>
                <div class="helper_div trend_container"></div>
                <div class="helper_div map_container"></div>
                <!--  Scripts -->
                <div id='div_obj' style='width:100%;height:460px;'></div> 

                <br>
                <br>
                <div id="result"></div>
                <div >
                    <ul id="students_list" class="students_list pull-left">
                    <?php $this->load->helper('inflector'); ?>
                    <?php foreach ($student_details as $student):?>

                    	<li>
                    	<span class="name"><?php echo humanize( $student["name"]); ?></span>
                    	<a id="reg_<?php echo $student['regno']; ?>" class="add pull-right" onclick="change('reg_<?php echo $student['regno']; ?>');">+</a>
                    	</li>
                <?php endforeach; ?>
                          </ul>
                </div>
                <br>
                <br>
            </div>

        </div>


    </div>




</div>

<script type="text/javascript">
$(document).ready(function(){
change('reg_<?php echo $session["regno"]; ?>');
});
	function change(arg) {
		if($('#'+arg).hasClass('add')){
			$('#'+arg).html('-');
			$('#'+arg).removeClass('add');
			$('#'+arg).addClass('remove');
		}
		else{
			$('#'+arg).html('+');
			$('#'+arg).removeClass('remove');
			$('#'+arg).addClass('add');
		}

		var list=new Array();
		$('#students_list>li>a').each(function(index,element){
			//alert($(this).html());
			if($(this).hasClass('remove')){
				list.push($(this).attr('id').replace("reg_",""));
			}
		});
		//alert(list);

		$.ajax({
			url:"<?php echo base_url(); ?>index.php/exam/performance_marks",
			data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','list':JSON.stringify(list)},
			type:'POST',
			success: function(result){ //alert(result);
    		//$('#result').html(result);
    		create(JSON.parse(result));
    		},error: function(result){//alert(result);
      		$('#result').html(result);
      
    		}
		});

	}
</script>

