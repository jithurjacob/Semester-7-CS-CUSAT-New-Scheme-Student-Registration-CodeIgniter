<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
<div id="result"></div>
                <div class="home_steps well text-justify noborder">
                    <h2>Student Verification</h2>
                    <br />
                    <br />
                    <?php
                    if (count($marks_details)==0) { ?>
                       <h4> No more mark records to verify :)</h4>
                    <?php } ?>
                    <?php 
                     function name_($regno,$student_details)
                    {
                        foreach ($student_details as $std) {

                            if($regno==$std['regno'])
                                return $std['name'];
                        }
                    }
                    
                        $this->load->helper('array');
                         $this->load->helper('form');
                          $this->load->helper('url');

                           $semesters= array('2','3','4','5','6','7','8');
                            $exists=array();
                            $current=0;
                            $enc_id=0;
                            //echo count($marks_details);
                            //print_r($marks_details);
                             if (isset($marks_details[0])) {
                                
                              foreach ($marks_details as $mark) {

                               $sem_=element('sem', $mark);
                               $enc_id=$this->encrypt->encode($mark['id']);
                               if($current!=element( 'regno', $mark)){
                                $current=element( 'regno', $mark);
                               ?>
                               <br >
                               <br >
                        <h2>Marks - <?php $this->load->helper('inflector'); echo humanize(name_($current,$student_details)); ?> (<?php echo $current; ?>)</h2>
                        <?php } ?>
                        
                        <div class="responsive-table" id="students_table_<?php echo $mark['id']; ?>">
                           <h3>Semester <?php switch ($sem_) { case '2': $sem_=1; echo "I & II"; array_push($exists, "2"); break; case '3': echo "III"; array_push($exists, "3"); break; case '4': echo "IV"; array_push($exists, "4"); break; case '5': echo "V"; array_push($exists, "5"); break; case '6': echo "VI"; array_push($exists, "6"); break; case '7': echo "VII"; array_push($exists, "7"); break; case '8': echo "VIII"; array_push($exists, "8"); break; default: break; }?>

                        </h3>
                            <table  class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                                <thead>
                                    <th>Subject Code</th>
                                    <th>
                                        <?php echo $sem_; ?>01</th>
                                    <th>
                                        <?php echo $sem_; ?>02</th>
                                    <th>
                                        <?php echo $sem_; ?>03</th>
                                    <th>
                                        <?php echo $sem_; ?>04</th>
                                    <th>
                                        <?php echo $sem_; ?>05</th>
                                    <th>
                                        <?php echo $sem_; ?>06</th>
                                    <?php if($sem_!="8" ) { ?>
                                    <th>
                                        <?php echo $sem_; ?>07</th>
                                    <th>
                                        <?php echo $sem_; ?>08</th>
                                    <?php } if($sem_=="7" or $sem_=="1" ) { ?>
                                    <th>
                                        <?php echo $sem_; ?>09</th>
                                    <?php } if($sem_=="1" ) { ?>
                                    <th>
                                        <?php echo $sem_; ?>10</th>
                                    <th>
                                        <?php echo $sem_; ?>11</th>
                                    <?php } ?>
                                    <th>Total</th>
                                </thead>
                                <tr>
                                    <th>Marks</th>
                                    <td id="mark_<?php echo $sem_; ?>01">
                                        <!-- 101 -->
                                        <?php echo element( 'sub1', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>02">
                                        <!-- 102 -->
                                        <?php echo element( 'sub2', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>03">
                                        <!-- 103 -->
                                        <?php echo element( 'sub3', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>04">
                                        <!-- 104 -->
                                        <?php echo element( 'sub4', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>05">
                                        <!-- 105 -->
                                        <?php echo element( 'sub5', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>06">
                                        <!-- 106 -->
                                        <?php echo element( 'sub6', $mark); ?>
                                    </td>
                                    <?php if($sem_!="8" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>07">
                                        <!-- 107 -->
                                        <?php echo element( 'sub7', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>08">
                                        <!-- 108 -->
                                        <?php echo element( 'sub8', $mark); ?>
                                    </td>
                                    <?php } if($sem_=="7" or $sem_=="1" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>09">
                                        <!-- 109 -->
                                        <?php echo element( 'sub9', $mark); ?>
                                    </td>
                                    <?php } if($sem_=="1" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>10">
                                        <!-- 110 -->
                                        <?php echo element( 'sub10', $mark); ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>11">
                                        <!-- 111 -->
                                        <?php echo element( 'sub11', $mark); ?>
                                    </td>
                                    <?php } ?>
                                    <td id="mark_<?php echo $sem_; ?>_total">
                                        <!-- Total -->
                                        <?php echo element( 'total', $mark); ?>
                                    </td>

                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td id="mark_<?php echo $sem_; ?>01_status">
                                        <!-- 101 -->
                                        <?php echo element( 'sub1_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>02_status">
                                        <!-- 102 -->
                                        <?php echo element( 'sub2_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>03_status">
                                        <!-- 103 -->
                                        <?php echo element( 'sub3_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>04_status">
                                        <!-- 104 -->
                                        <?php echo element( 'sub4_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>05_status">
                                        <!-- 105 -->
                                        <?php echo element( 'sub5_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>06_status">
                                        <!-- 106 -->
                                        <?php echo element( 'sub6_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <?php if($sem_!="8" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>07_status">
                                        <!-- 107 -->
                                        <?php echo element( 'sub7_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>08_status">
                                        <!-- 108 -->
                                        <?php echo element( 'sub8_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <?php } if($sem_=="7" or $sem_=="1" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>09_status">
                                        <!-- 109 -->
                                        <?php echo element( 'sub9_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <?php } if($sem_=="1" ) { ?>
                                    <td id="mark_<?php echo $sem_; ?>10_status">
                                        <!-- 110 -->
                                        <?php echo element( 'sub10_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <td id="mark_<?php echo $sem_; ?>11_status">
                                        <!-- 111 -->
                                        <?php echo element( 'sub11_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                                    </td>
                                    <?php } ?>
                                    <td id="mark_<?php echo $sem_; ?>_percent">
                                        <!-- Total -->
                                        <?php echo element( 'percent', $mark). "%"; ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="text-center">
                            <button class="btn btn-lg btn-primary btn-inline" type="submit" onclick="action('v','<?php echo $enc_id; ?>','<?php echo $mark['id']; ?>');">Valid</button>
                            <button class="btn btn-lg btn-primary btn-inline" type="submit" onclick="action('r','<?php echo $enc_id; ?>','<?php echo $mark['id']; ?>');">Invalid</button>
                              </div>
                                <br>
                        </div>
                            
                        <div id="result_<?php echo $mark['id']; ?>"></div>
                        <?php } } ?>
                    
                    <br />
                    
                    <br />
                </div>
            </div>

        </div>


    </div>




</div>
<script type="text/javascript">
var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Marks Validated Successfully</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Marks Validation failed    </div>';

    function action (status,id,did) {
        var url="";
        if(status=="v") url='<?php echo base_url(); ?>index.php/exam/marks_validate_ajax/v';
        else url='<?php echo base_url(); ?>index.php/exam/marks_validate_ajax/r';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','id':id},
  type:'POST',
  url:url,
  success: function(result){//alert(result);
    if(result=="ok"){//alert(0);
        $("#students_table_"+did).remove();
        $('#result_'+did).html(ok);
       // alert($('#result_'+did).html());
    }
    else{
    $('#result_'+did).html(fail);
    }
    },error: function(result){
      $('#result').html(result);
      
    }
  });
    }
</script>
