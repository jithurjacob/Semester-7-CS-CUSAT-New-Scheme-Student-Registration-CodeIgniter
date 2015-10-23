 <?php
                                         $edit_semester=0; $edit_sub1=0;
                                         $edit_sub2=0; $edit_sub3=0;
                                          $edit_sub4=0; $edit_sub5=0;
                                           $edit_sub6=0; $edit_sub7=0;
                                            $edit_sub8=0; $edit_sub9=0;
                                             $edit_sub10=0; $edit_sub11=0;$edit_sub12=0;
                                              $edit_total=0; $edit_percent=0;
                                               if(isset($processed)){
                                                if(($processed=="TRUE" )){
                                if(isset($edit_semester)) $edit_semester=set_value( 'edit_semester',0);
                                if(isset($edit_sub1)) $edit_sub1=set_value( 'edit_sub1',0); 
                                if(isset($edit_sub2)) $edit_sub2=set_value( 'edit_sub2',0);
                                if(isset($edit_sub3)) $edit_sub3=set_value( 'edit_sub3',0); 
                                if(isset($edit_sub4)) $edit_sub4=set_value( 'edit_sub4',0); 
                                if(isset($edit_sub5)) $edit_sub5=set_value( 'edit_sub5',0); 
                                if(isset($edit_sub6)) $edit_sub6=set_value( 'edit_sub6',0); 
                                if(isset($edit_sub7)) $edit_sub7=set_value( 'edit_sub7',0); 
                                if(isset($edit_sub8)) $edit_sub8=set_value( 'edit_sub8',0); 
                                if(isset($edit_sub9)) $edit_sub9=set_value( 'edit_sub9',0); 
                                if(isset($edit_sub10)) $edit_sub10=set_value( 'edit_sub10',0); 
                                if(isset($edit_sub11)) $edit_sub11=set_value( 'edit_sub11',0);
                                 if(isset($edit_sub12)) $edit_sub12=set_value( 'edit_sub12',0);  
                                if(isset($edit_total)) $edit_total=set_value( 'edit_total',0); 
                                if(isset($edit_percent)) $edit_percent=set_value( 'edit_percent',0);
                                 }else{ } } ?>
<table class="table table-condensed text-left" id="edit_mark_entry" style="<?php if(isset($processed)){if((!($processed==" TRUE "))) echo "display:none";}else echo "display:none";?>">

      <tr id="edit_sub1_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none"; }else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub1">Subject
                <span id="span_edit"></span>01</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub1" value="<?php echo $edit_sub1; ?>">

        </td>
        <td style="width:20%">
            <select class="form-control margin_bottom_10" name="edit_sub1_status" id="edit_sub1_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr> 
    <tr id="edit_sub2_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub2">Subject
                <span id="span_edit"></span>02</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub2" value="<?php echo $edit_sub2; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub2_status" id="edit_sub2_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub3_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub3">Subject
                <span id="span_edit"></span>03</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub3" value="<?php echo $edit_sub3; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub3_status" id="edit_sub3_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub4_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub4">Subject
                <span id="span_edit"></span>04</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub4" value="<?php echo $edit_sub4; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub4_status" id="edit_sub4_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub5_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub5">Subject
                <span id="span_edit"></span>05</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub5" value="<?php echo $edit_sub5; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub5_status" id="edit_sub5_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub6_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub6">Subject
                <span id="span_edit"></span>06</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub6" value="<?php echo $edit_sub6; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub6_status" id="edit_sub6_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub7_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub7">Subject
                <span id="span_edit"></span>07</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub7" value="<?php echo $edit_sub7; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub7_status" id="edit_sub7_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub8_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub8">Subject
                <span id="span_edit"></span>08</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub8" value="<?php echo $edit_sub8; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub8_status" id="edit_sub8_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub9_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub9">Subject
                <span id="span_edit"></span>09</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub9" value="<?php echo $edit_sub9; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub9_status" id="edit_sub9_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub10_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub10">Subject
                <span id="span_edit"></span>10</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub10" value="<?php echo $edit_sub10; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub10_status" id="edit_sub10_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <tr id="edit_sub11_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub11">Subject
                <span id="span_edit"></span>11</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub11" value="<?php echo $edit_sub11; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub11_status" id="edit_sub11_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <?php if($session["year_pass"]>2015){ ?>
    <tr id="edit_sub12_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_sub12">Subject
                <span id="span_edit"></span>12</label>
        </td>
        <td>
            <input type="number" class="form-control margin_bottom_10" onkeyup="calculate_edit();" onchange="calculate_edit();" name="edit_sub12" value="<?php echo $edit_sub12; ?>">

        </td>
        <td>
            <select class="form-control margin_bottom_10" name="edit_sub12_status" id="edit_sub12_status">
                <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                <option class="form-control margin_bottom_10" value="PASS">PASS</option>
            </select>
        </td>
    </tr>
    <?php } ?>
    <tr id="edit_total_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2">
            <label for="edit_total">Total</label>
        </td>
        <td colspan="2">
            <input type="number" class="form-control margin_bottom_10" readonly="readonly"  name="edit_total" value="<?php echo $edit_total; ?>">

        </td>
        <tr id="edit_percent_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
     
        <td colspan="2">
            <label for="edit_percent">Percent</label>
        </td>
        <td colspan="2">
            <input type="number" class="form-control margin_bottom_10" readonly="readonly" name="edit_percent" value="<?php echo $edit_percent; ?>">

        </td>
    </tr> 
    <?php if (isset($editmarks_form_error_msg)) {if ($editmarks_form_error_msg !="" ) {?>
    <tr>
        <td colspan="4">
            <div class="alert   alert-danger  alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $editmarks_form_error_msg;?>
            </div>
        </td>
    </tr>
    <?php }}?>

    <?php if (isset($editmarks_form_success_msg)) {if ($editmarks_form_success_msg !="" ) {?>
    <tr>
        <td colspan="4">
            <div class="alert   alert-success  alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $editmarks_form_success_msg;?>
            </div>
        </td>
    </tr>
    <?php }}?>
    <tr id="edit_warning_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="4">
            Adding marks will make your account status unverified till administrator verifies your marks.Providing incorrect data may even lead to account termination.
        </td>
    </tr>
    <tr id="edit_btn_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none";}else echo "display:none";?>">
        <td colspan="2" style="width:50%">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
            <br>
        </td>
        <td colspan="2">
                <button class="btn btn-lg btn-primary btn-block" type="cancel" onclick="$('#edit_mark_entry').hide();$('#edit_semester').val('NULL');return false;">Cancel</button>
                                    <br>
                                </td>

    </tr> 
</table>

<script type="text/javascript">
    
function check_edit(val, min, max) { //return false;//debug
        //alert('incheck');
        if (parseInt($('input[name=edit_sub' + val + ']').val()) < min || parseInt($('input[name=edit_sub' + val + ']').val()) > max) {
            //$('input[name=sub'+val+']').val('0')
            alert("Subject " + val + " should have marks between " + min + " and " + max);


            return true;
        }
        if(parseInt($('input[name=edit_sub' + val + ']').val())>=(0.5*max)){//alert(0);
            $('select[name=edit_sub' + val + '_status]').val("PASS");
        }else{
            $('select[name=edit_sub' + val + '_status]').val("FAIL");
        }
        return false;
    }
    function calculate_edit() { //alert('incalc');
        if (check_edit(1, 0, 150) || check_edit(2, 0, 150) || check_edit(3, 0, 150) || check_edit(4, 0, 150))
            return false;
        switch ($('#edit_semester').val()) {

            case '2':
                if (check_edit(5, 0, 150) || check_edit(6, 0, 150) || check_edit(7, 0, 150) || check_edit(8, 0, 150) || check_edit(9, 0, 150) || check_edit(10, 0, 100) || check_edit(11, 0, 100) <?php if($session["year_pass"]) {?> || check_edit(11, 0, 100) <?php }?>  )
                    return false;
                break;
            case '3':
            case '4':
            case '5':
            case '6':
                if (check_edit(5, 0, 150) || check_edit(6, 0, 150) || check_edit(7, 0, 100) || check_edit(8, 0, 100))
                    return false;
                break;
            case '7': //here
                if (check_edit(5, 0, 150) || check_edit(6, 0, 100) || check_edit(7, 0, 100) || check_edit(8, 0, 50) || check_edit(9, 0, 50))
                    return false;
                break;
            case '8': //here
                if (check_edit(5, 0, 300) || check_edit(6, 0, 100))
                    return false;
                break;
            default:
                break;
        }
        var edit_total = parseInt($('input[name=edit_sub1]').val()) + parseInt($('input[name=edit_sub2]').val()) + parseInt($('input[name=edit_sub3]').val()) + parseInt($('input[name=edit_sub4]').val()) + parseInt($('input[name=edit_sub5]').val()) + parseInt($('input[name=edit_sub6]').val()) + parseInt($('input[name=edit_sub7]').val()) + parseInt($('input[name=edit_sub8]').val()) + parseInt($('input[name=edit_sub9]').val()) + parseInt($('input[name=edit_sub10]').val()) + parseInt($('input[name=edit_sub11]').val());

        <?php if($session["year_pass"]>2015) {?>
        edit_total+=parseInt($('input[name=edit_sub12]').val());
        <?php }?>
        $('input[name=edit_total]').val(edit_total);
        if ($('#edit_semester').val() == '2')
            <?php if($session["year_pass"]>2015){ ?>
            $('input[name=edit_percent]').val((edit_total / 1650) * 100);
            <?php }else{ ?>
                 $('input[name=edit_percent]').val((edit_total / 1550) * 100);
                <?php }?>
        else if ($('#edit_semester').val() == '7')
            $('input[name=edit_percent]').val((edit_total / 1050) * 100);
        else if ($('#edit_semester').val() == '8')
            $('input[name=edit_percent]').val((edit_total / 1000) * 100);
        else
            $('input[name=edit_percent]').val((edit_total / 1100) * 100);
        //alert('true');
        return true;
    }
    $('select#edit_semester').change(function() {//alert('inchange');
        
        $('input[name=edit_sub1] , input[name=edit_sub2] , input[name=edit_sub3] ,input[name=edit_sub4] ,  input[name=edit_sub5] , input[name=edit_sub6] , input[name=edit_sub7] , input[name=edit_sub8] , #input[name=edit_sub9] , input[name=edit_sub10] , input[name=edit_sub11] , input[name=edit_total] , input[name=edit_sub12] , input[name=edit_percent]').val('0');
        // alert($(this).val());
        $('#edit_sub1_row , #edit_sub2_row , #edit_sub3_row , #edit_sub4_row ,#edit_sub5_row,#edit_sub6_row ').show();
        $('#edit_btn_row , #edit_warning_row , #edit_total_row , #edit_percent_row  ').show();

        switch ($(this).val()) {
            case 'NULL':
                $('#edit_mark_entry').hide();
                break;
            case '2':
                populate(1,101);populate(2,102);populate(3,103);populate(4,104);populate(5,105);populate(6,106);populate(7,107);populate(8,108);populate(9,109);populate(10,110);populate(11,111);populate_total_percent('2');
                <?php if($session["year_pass"]>2015){ ?>
                    populate(12,112);
                    <?php } ?>
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row , #edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').show();
                $('span#span_edit').html('1');
                break;
            case '3':
                populate(1,301);populate(2,302);populate(3,303);populate(4,304);populate(5,305);populate(6,306);populate(7,307);populate(8,308);
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row').show();
                $('#edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('3');populate_total_percent('3');
                break;
            case '4':
                populate(1,401);populate(2,402);populate(3,403);populate(4,404);populate(5,405);populate(6,406);populate(7,407);populate(8,408);populate_total_percent('4');
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row').show();
                $('#edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('4');
                break;
            case '5':
                populate(1,501);populate(2,502);populate(3,503);populate(4,504);populate(5,505);populate(6,506);populate(7,507);populate(8,508);populate_total_percent('5');
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row').show();
                $('#edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('5');
                break;
            case '6':
                populate(1,601);populate(2,602);populate(3,603);populate(4,604);populate(5,605);populate(6,606);populate(7,607);populate(8,608);populate_total_percent('6');
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row').show();
                $('#edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('6');
                break;
            case '7':
            populate(1,701);populate(2,702);populate(3,703);populate(4,704);populate(5,705);populate(6,706);populate(7,707);populate(8,708);populate(9,709);populate_total_percent('7');
                $('#edit_mark_entry').show();
                $('#edit_sub7_row , #edit_sub8_row , #edit_sub9_row').show();
                $(' #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('7');
                break;
            case '8':
            populate(1,801);populate(2,802);populate(3,803);populate(4,804);populate(5,805);populate(6,806);populate_total_percent('8');
                $('#edit_mark_entry').show();

                $('#edit_sub7_row , #edit_sub8_row , #edit_sub9_row , #edit_sub10_row , #edit_sub11_row , #edit_sub12_row').hide();
                $('span#span_edit').html('8');
                break;
            default:
                break;
        }
    });

   function populate (va,id) {
    
    //alert("val :"+val+"id :"+id+"mrk:"+$('#mark_' +id + '').html());
    var str=$('#mark_' +id + '').html();
    str=str.replace(/<!-- \d* -->/,"");
    //alert(parseInt(str));
    //alert('input[name=edit_sub' + va + ']');
     $('input[name=edit_sub' + va + ']').val(parseInt(str));

      var str_=$('#mark_' +id + '_status').html();
      if(str_.indexOf("FAIL")>=0)
        $('#edit_sub'+va+'_status').val('FAIL');
    else  if(str_.indexOf("PASS")>=0)
        $('#edit_sub'+va+'_status').val('PASS');
    else
        alert("Error");

 }
  function populate_total_percent(id) {
    if(id==2)id=1;
   // alert("id :"+id+"mrk:"+$('#mark_' +id + '_total').html());
    var str=$('#mark_' +id + '_total').html();
    str=str.replace(/<!-- \d*\w* -->/,"");
   // alert(str);
    //alert('input[name=edit_sub' + va + ']');
     $('input[name=edit_total]').val(new Number(str));
   //  alert($('input[name=edit_total]').val());
     
     var str=$('#mark_' +id + '_percent').html();
    str=str.replace(/<!-- \d*\w* -->/,"");
    str=str.replace("%","");
   // alert(parseInt(str));
    //alert('input[name=edit_sub' + va + ']');
     $('input[name=edit_percent]').val(new Number(str));
 }
    </script>
