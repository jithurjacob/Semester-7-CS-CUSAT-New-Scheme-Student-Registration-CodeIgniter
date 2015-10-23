<div class="middle">
    <div class="container">
<input id="year_pass" name="year_pass" type="hidden" value="<?php echo $session["year_pass"]; ?>">
        <div class="row about">
            <div class="col-md-12">
                <div id="container_id" class="home_steps well text-justify noborder">
                    <h2>Marks</h2>
                    <br>
                    <br>
                    <?php if (isset($marks_details[0])) { ?>
                    <h4 class="text-center">Percentage : <?php echo get_percent($marks_details[0]['regno'],$marks_details);?>%</h4>
                    <h4 class="text-center">CGPA : <?php echo get_cgpa($marks_details[0]['regno'],$marks_details);?></h4>
                    <h4 class="text-center">Arriers : <?php echo get_arriers($marks_details[0]['regno'],$marks_details);?></h4>
                    <br>
                    <br>
                    <?php } ?>
                    <?php $this->load->helper('array');
                     $this->load->helper('form');
                      $this->load->helper('url');
                       $semesters= array('2','3','4','5','6','7','8');
                       $exists=array();
                       if (isset($marks_details[0])) {
                       
                         
                          foreach ($marks_details as $mark) {
                          $sem_=element('sem', $mark);?>
                    <h3>Semester
                        <?php switch ($sem_) {
                         case '2': $sem_=1; echo "I & II"; array_push($exists, "2"); break;
                          case '3': echo "III"; array_push($exists, "3"); break;
                           case '4': echo "IV"; array_push($exists, "4"); break;
                            case '5': echo "V"; array_push($exists, "5"); break;
                             case '6': echo "VI"; array_push($exists, "6"); break;
                              case '7': echo "VII"; array_push($exists, "7"); break;
                               case '8': echo "VIII"; array_push($exists, "8"); break;
                                default:  break; }?>
                                <?php
                                if(element( 'valid', $mark)=="0")
                                    echo "<font color='red'>- Unverified</font>";
                                else if(element( 'valid', $mark)=="-1")
                                    echo "<font color='red'>- Invalid marks </font>";
                                ?>
                    </h3>
                    <div class="responsive-table">
                        <table id="students_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
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
                                <?php if($session["year_pass"]>2015){?>
                                <th>
                                    <?php echo $sem_; ?>12
                                </th>
                                <?php } ?>
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
                                <?php if($session["year_pass"]>2015){?>
                                <td  id="mark_<?php echo $sem_; ?>12">
                                <!-- 112 -->
                                    <?php echo element( 'sub12', $mark); ?>
                                    </td>
                                <?php } ?>
                                <?php } ?>
                                <td id="mark_<?php echo $sem_; ?>_total">
                                    <!-- Total -->
                                    <?php echo element( 'total', $mark); ?>
                                </td>

                            </tr>
                            <!--grade-->
                            <?php if($mark['year_pass']>2015){ ?>
                            <tr>
                                <th>Grade</th>
                                <td id="mark_<?php echo $sem_; ?>01_grade">
                                    <!-- 101 -->
                                    <?php if($sem_=="1") $semg="2";else $semg=$sem_; ?>
                                    <?php echo grade_of_sub('1',element( 'sub1', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>02_grade">
                                    <!-- 102 -->
                                    <?php echo grade_of_sub('2',element( 'sub2', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>03_grade">
                                    <!-- 103 -->
                                    <?php echo grade_of_sub('3',element( 'sub3', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>04_grade">
                                    <!-- 104 -->
                                    <?php echo grade_of_sub('4',element( 'sub4', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>05_grade">
                                    <!-- 105 -->
                                   <?php echo grade_of_sub('5',element( 'sub5', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>06_grade">
                                    <!-- 106 -->
                                    <?php echo grade_of_sub('6',element( 'sub6', $mark),$semg); ?>
                                </td>
                                <?php if($sem_!="8" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>07_grade">
                                    <!-- 107 -->
                                    <?php echo grade_of_sub('7',element( 'sub7', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>08_grade">
                                    <!-- 108 -->
                                    <?php echo grade_of_sub('8',element( 'sub8', $mark),$semg); ?>
                                </td>
                                <?php } if($sem_=="7" or $sem_=="1" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>09_grade">
                                    <!-- 109 -->
                                   <?php echo grade_of_sub('9',element( 'sub9', $mark),$semg); ?>
                                </td>
                                <?php } if($sem_=="1" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>10_grade">
                                    <!-- 110 -->
                                    <?php echo grade_of_sub('10',element( 'sub10', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>11_grade">
                                    <!-- 111 -->
                                    <?php echo grade_of_sub('11',element( 'sub11', $mark),$semg); ?>
                                </td>
                                <?php if($session["year_pass"]>2015){?>
                                <td id="mark_<?php echo $sem_; ?>12_grade">
                                <!-- 112 -->
                                     <?php echo grade_of_sub('12',element( 'sub12', $mark),$semg); ?>
                               
                                    </td>
                                <?php } ?>
                                <?php } ?>
                                <td id="mark_<?php echo $sem_; ?>_percent">
                                    <!-- Total -->
                                    <?php echo round(gpa_of_sem($mark),4); ?>
                                </td>
                            </tr>
                            <!-- grade -->
                            <?php }?>
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
                                <?php if($session["year_pass"]>2015){?>
                                <td id="mark_<?php echo $sem_; ?>12_status">
                                <!-- 112 -->
                                     <?php echo element( 'sub12_status', $mark)=="FAIL" ? "<font color='red'>FAIL</font>": "PASS"; ?>
                               
                                    </td>
                                <?php } ?>
                                <?php } ?>
                                <td id="mark_<?php echo $sem_; ?>_percent">
                                    <!-- Total -->
                                    <?php echo element( 'percent', $mark)."%"; ?>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <?php } } ?>
                </div>

                <div class="home_steps well text-justify noborder">
                    <h2>Edit Marks</h2>
                    <br>
                    <br>
                    <!-- sems to edit :<?php// print_r( array_intersect($semesters,$exists)); ?> -->
                    <div class="responsive-table">
                        <?php echo form_open( '/exam/students_editmarks', array( 'class'=>'form-register', 'role' => 'form','onsubmit'=>'if(!calculate_edit())return false;')); ?>
                        <table class="table table-condensed text-left">

                            <tr>
                                <td>
                                    <label for="edit_semester">Semester</label>
                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="edit_semester" id="edit_semester">
                                        <option class="form-control margin_bottom_10" value="NULL" <?php 
                                        echo set_select( 'semester', 'NULL', TRUE); ?> >SELECT SEMESTER</option>
                                       <?php
                                       $edit_semester=0;
                                       if(isset($processed)){
                                                if(($processed=="TRUE" )){
                                if(isset($edit_semester)) $edit_semester=set_value( 'edit_semester',0);

                                      }} ?>
                                    <?php
                                    print_r($semesters);
                                     foreach ( array_intersect($semesters,$exists) as $sem_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $sem_;?>" <?php echo $sem_==$edit_semester ? "selected='selected'": '' ; ?>>
                                            <?php echo sem_name($sem_);?>
                                        </option>
                                        <?php endforeach ?>
                                    </select>
                                </td>

                            </tr>
                        </table>

                        <?php $this->view('exam_students_edit_marks');?>
                       </form>
                        
                    </div>
                </div>
                <div class="home_steps well text-justify noborder">
                    <h2>Add Marks</h2>
                    <br>
                    <br>
                    <!-- sems to add :<?php //print_r( array_diff($semesters,$exists)); ?> -->
                    <div class="responsive-table">
                        <?php echo form_open( '/exam/students_addmarks', array( 'class'=>'form-register', 'role' => 'form','onsubmit'=>'if(!calculate())return false;'));
                         ?>
                        <table class="table table-condensed text-left">

                            <tr>
                                <td>
                                    <label for="semester">Semester</label>
                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="add_semester" id="add_semester">
                                        <option class="form-control margin_bottom_10" value="NULL" <?php echo set_select( 'semester', 'NULL', TRUE); ?>>SELECT SEMESTER</option>
                                        <?php $add_semester=0; 
                                        $sub1=0; $sub2=0;
                                         $sub3=0; $sub4=0;
                                          $sub5=0; $sub6=0;
                                           $sub7=0; $sub8=0;
                                            $sub9=0; $sub10=0;
                                             $sub11=0;$sub12=0; $total=0;
                                              $percent=0;
                                               if(isset($processed)){
                                                if(($processed=="TRUE" )){
                                                 if(isset($add_semester))
                                                  $add_semester=set_value( 'add_semester',0);
                                                   if(isset($sub1)) $sub1=set_value( 'sub1',0); 
                                                   if(isset($sub2)) $sub2=set_value( 'sub2',0);
                                                    if(isset($sub3)) $sub3=set_value( 'sub3',0); 
                                                    if(isset($sub4)) $sub4=set_value( 'sub4',0); 
                                                    if(isset($sub5)) $sub5=set_value( 'sub5',0);
                                                     if(isset($sub6)) $sub6=set_value( 'sub6',0);
                                                      if(isset($sub7)) $sub7=set_value( 'sub7',0);
                                                       if(isset($sub8)) $sub8=set_value( 'sub8',0);
                                                        if(isset($sub9)) $sub9=set_value( 'sub9',0);
                                                     if(isset($sub10)) $sub10=set_value( 'sub10',0);
                                                      if(isset($sub11)) $sub11=set_value( 'sub11',0);
                                                      if(isset($sub12)) $sub12=set_value( 'sub12',0);
                                        if(isset($total)) $total=set_value( 'total',0);
                                         if(isset($percent))
                                          $percent=set_value( 'percent',0); 
                                      }else{ } 

                                      } ?>
                                        <?php function sem_name($value='' ){
                                         switch ($value) { 
                                            case '2': return "I & II"; break;
                                             case '3': return "III"; break; 
                                             case '4': return "IV"; break;
                                              case '5': return "V"; break;
                                               case '6': return "VI"; break;
                                                case '7': return "VII"; break;
                                                 case '8': return "VIII"; break;
                                                  default:  break; } }
                                 foreach ( array_diff($semesters,$exists) as $sem_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $sem_;?>" <?php echo $sem_==$add_semester ? "selected='selected'": '' ; ?>>
                                            <?php echo sem_name($sem_);?>
                                        </option>
                                <?php endforeach ?>
                                    </select>
                                </td>

                            </tr>
                        </table>

                        <table class="table table-condensed text-left" id="mark_entry" style="<?php if(isset($processed)){if((!($processed=="TRUE"))) echo "display:none";}else echo "display:none";?>">

                            <tr id="sub1_row" style="<?php if(isset($processed)){if((!($processed=="TRUE"))|| $success=="TRUE") echo "display:none"; }else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub1">Subject
                                        <span id="span_add"></span>01</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10"  onkeyup="calculate();" onchange="calculate();" name="sub1" value="<?php echo $sub1; ?>">

                                </td>
                                <td style="width:20%">
                                    <select class="form-control margin_bottom_10" name="sub1_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub2_row" style="<?php if(isset($processed)){if((!($processed==" TRUE"))|| $success=="TRUE") echo "display:none";}else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub2">Subject
                                        <span id="span_add"></span>02</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub2" value="<?php echo $sub2; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub2_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub3_row" style="<?php if(isset($processed)){if((!($processed==" TRUE"))|| $success=="TRUE") echo "display:none";}else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub3">Subject
                                        <span id="span_add"></span>03</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub3" value="<?php echo $sub3; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub3_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub4_row" style="<?php if(isset($processed)){if((!($processed==" TRUE"))|| $success=="TRUE") echo "display:none";}else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub4">Subject
                                        <span id="span_add"></span>04</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub4" value="<?php echo $sub4; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub4_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub5_row" style="<?php if(isset($processed)){if((!($processed=="TRUE"))|| $success=="TRUE") echo "display:none ";}else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub5">Subject
                                        <span id="span_add"></span>05</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub5" value="<?php echo $sub5; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub5_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub6_row" style="<?php if(isset($processed)){if((!($processed=="TRUE"))|| $success=="TRUE") echo "display:none";}else echo "display:none";?>">
                                <td colspan="2">
                                    <label for="sub6">Subject
                                        <span id="span_add"></span>06</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub6" value="<?php echo $sub6; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub6_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub7_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub7">Subject
                                        <span id="span_add"></span>07</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub7" value="<?php echo $sub7; ?>">

                                </td>
                                <td >
                                    <select class="form-control margin_bottom_10 " name="sub7_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub8_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub8">Subject
                                        <span id="span_add"></span>08</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub8" value="<?php echo $sub8; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub8_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub9_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub9">Subject
                                        <span id="span_add"></span>09</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub9" value="<?php echo $sub9; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub9_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub10_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub10">Subject
                                        <span id="span_add"></span>10</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub10" value="<?php echo $sub10; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub10_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="sub11_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub11">Subject
                                        <span id="span_add"></span>11</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub11" value="<?php echo $sub11; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub11_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                              <?php if($session["year_pass"]>2015){ ?>
                            <tr id="sub12_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="sub12">Subject
                                        <span id="span_add"></span>12</label>
                                </td>
                                <td>
                                    <input type="number" class="form-control margin_bottom_10" onkeyup="calculate();" onchange="calculate();" name="sub12" value="<?php echo $sub12; ?>">

                                </td>
                                <td>
                                    <select class="form-control margin_bottom_10" name="sub12_status">
                                        <option class="form-control margin_bottom_10" value="FAIL">FAIL</option>
                                        <option class="form-control margin_bottom_10" value="PASS">PASS</option>
                                    </select>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr id="total_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="2">
                                    <label for="total">Total</label>
                                </td>
                                <td colspan="2">
                                    <input type="number" class="form-control margin_bottom_10" readonly="readonly" name="total" value="<?php echo $total; ?>">

                                </td>
                                 <tr id="percent_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                               
                                <td colspan="2">
                                    <label for="percent">Percent</label>
                                </td>
                                <td colspan="2">
                                    <input type="number" class="form-control margin_bottom_10" readonly="readonly" name="percent" value="<?php echo $percent; ?>">

                                </td>
                            </tr>
                            <?php if (isset($addmarks_form_error_msg)) {if ($addmarks_form_error_msg !="" ) {?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert   alert-danger  alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $addmarks_form_error_msg;?>
                                    </div>
                                </td>
                            </tr>
                            <?php }}?>

                            <?php if (isset($addmarks_form_success_msg)) {if ($addmarks_form_success_msg !="" ) {?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert   alert-success  alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <?php echo $addmarks_form_success_msg;?>
                                    </div>
                                </td>
                            </tr>
                            <?php }}?>
                            <tr id="warning_row" style="<?php if(isset($processed)){if((!($processed==" TRUE "))|| $success=="TRUE ") echo "display:none ";}else echo "display:none ";?>">
                                <td colspan="4">
                                    Adding marks will make your account status unverified till administrator verifies your marks.Providing incorrect data may even lead to account termination.
                                </td>
                            </tr>
                            <tr id="btn_row" style="<?php if(isset($processed)){if((!($processed==" TRUE"))|| $success=="TRUE") echo "display:none";}else echo "display:none";?>">
                                <td colspan="2" style="width:50%">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Confirm</button>
                                    <br>
                                </td>
                                 <td colspan="2">
                                    <button class="btn btn-lg btn-primary btn-block" type="cancel" onclick="$('#mark_entry').hide();$('#add_semester').val('NULL');return false;">Cancel</button>
                                    <br>
                                </td>
                            </tr>
                        </table>

                        </form>
                        <?php //form_close(); ?>
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>

    <script type="text/javascript">
    function check(val, min, max) { //return false;//debug
        //alert('incheck');
        if (parseInt($('input[name=sub' + val + ']').val()) < min || parseInt($('input[name=sub' + val + ']').val()) > max) {
            //$('input[name=sub'+val+']').val('0')
            alert("Subject " + val + " should have marks between " + min + " and " + max);


            return true;
        }

        if(parseInt($('input[name=sub' + val + ']').val())>=(0.5*max)){//alert(0);
            $('select[name=sub' + val + '_status]').val("PASS");
        }else{
             $('select[name=sub' + val + '_status]').val("FAIL");
        }

        return false;
    }

    function calculate() { //alert('incalc');
        if (check(1, 0, 150) || check(2, 0, 150) || check(3, 0, 150) || check(4, 0, 150))
            return false;
        switch ($('#add_semester').val()) {

            case '2':
                if (check(5, 0, 150) || check(6, 0, 150) || check(7, 0, 150) || check(8, 0, 150) || check(9, 0, 150) || check(10, 0, 100) || check(11, 0, 100) <?php if($session["year_pass"]>2015) {?>|| check(12, 0, 100) <?php } ?> )
                    return false;
                break;
            case '3':
            case '4':
            case '5':
            case '6':
                if (check(5, 0, 150) || check(6, 0, 150) || check(7, 0, 100) || check(8, 0, 100))
                    return false;
                break;
            case '7': //here
                if (check(5, 0, 150) || check(6, 0, 100) || check(7, 0, 100) || check(8, 0, 50) || check(9, 0, 50))
                    return false;
                break;
            case '8': //here
                if (check(5, 0, 300) || check(6, 0, 100))
                    return false;
                break;
            default:
                break;
        }
        var total = parseInt($('input[name=sub1]').val()) + parseInt($('input[name=sub2]').val()) + parseInt($('input[name=sub3]').val()) + parseInt($('input[name=sub4]').val()) + parseInt($('input[name=sub5]').val()) + parseInt($('input[name=sub6]').val()) + parseInt($('input[name=sub7]').val()) + parseInt($('input[name=sub8]').val()) + parseInt($('input[name=sub9]').val()) + parseInt($('input[name=sub10]').val()) + parseInt($('input[name=sub11]').val());
        <?php if($session["year_pass"]>2015){?>
            total+=parseInt($('input[name=sub12]').val());
        <?php } ?>
        $('input[name=total]').val(total);
        if ($('#add_semester').val() == '2')
           <?php if($session["year_pass"]<2015){ ?>
            $('input[name=percent]').val((total / 1550) * 100);
            <?php }else{ ?>
                $('input[name=percent]').val((total / 1650) * 100);
            <?php } ?>
         else if ($('#add_semester').val() == '7')
            $('input[name=percent]').val((total / 1050) * 100);
        else if ($('#add_semester').val() == '8')
            $('input[name=percent]').val((total / 1000) * 100);
        
        else
            $('input[name=percent]').val((total / 1100) * 100);
        //alert('true');
        return true;
    }
    $('select#add_semester').change(function() {
        <?php if($session["year_pass"]<=2015){ ?>
        $('input[name=sub1] , input[name=sub2] , input[name=sub3] ,input[name=sub4] ,  input[name=sub5] , input[name=sub6] , input[name=sub7] , input[name=sub8] , #input[name=sub9] , #input[name=sub10] , input[name=sub11] , input[name=total] , input[name=percent]').val('0');
        <?php } else{ ?>
 $('input[name=sub1] , input[name=sub2] , input[name=sub3] ,input[name=sub4] ,  input[name=sub5] , input[name=sub6] , input[name=sub7] , input[name=sub8] , #input[name=sub9] , #input[name=sub10] , input[name=sub11] , input[name=sub12] , input[name=total] , input[name=percent]').val('0');
            <?php } ?>
        // alert($(this).val());
        $('#sub1_row , #sub2_row , #sub3_row , #sub4_row ,#sub5_row,#sub6_row ').show();
        $('#btn_row , #warning_row , #total_row , #percent_row  ').show();
        switch ($(this).val()) {
            case 'NULL':
                $('#mark_entry').hide();
                break;
            case '2':
                $('#mark_entry').show();
                <?php if($session["year_pass"]<=2015){ ?>
                $('#sub7_row , #sub8_row , #sub9_row , #sub10_row , #sub11_row').show();
                <?php } else{ ?>
                    $('#sub7_row , #sub8_row , #sub9_row , #sub10_row , #sub11_row , #sub12_row').show();
                <?php } ?>
                $('span#span_add').html('1');
                break;
            case '3':
                $('#mark_entry').show();
                $('#sub7_row , #sub8_row').show();
                $('#sub9_row , #sub10_row , #sub11_row , #sub12_row').hide();
                $('span#span_add').html('3');
                break;
            case '4':
                $('#mark_entry').show();
                $('#sub7_row , #sub8_row').show();
                $('#sub9_row , #sub10_row , #sub11_row , #sub12_row').hide();
                $('span#span_add').html('4');
                break;
            case '5':
                $('#mark_entry').show();
                $('#sub7_row , #sub8_row').show();
                $('#sub9_row , #sub10_row , #sub11_row , #sub12_row').hide();
                $('span#span_add').html('5');
                break;
            case '6':
                $('#mark_entry').show();
                $('#sub7_row , #sub8_row').show();
                $('#sub9_row , #sub10_row , #sub11_row , #sub12_row').hide();
                $('span#span_add').html('6');
                break;
            case '7':
                $('#mark_entry').show();
                $('#sub7_row , #sub8_row , #sub9_row').show();
                $(' #sub10_row , #sub11_row').hide();
                $('span#span_add').html('7');
                break;
            case '8':
                $('#mark_entry').show();

                $('#sub7_row , #sub8_row , #sub9_row , #sub10_row , #sub11_row , #sub12_row').hide();
                $('span#span_add').html('8');
                break;
            default:
                break;
        }
    });
    </script>

</div>



<?php 

function mark_of_sem($value,$year_pass)
{
  switch ($value) {
    case '2':
    if($year_pass>2015)
      return 1650;
    else 
      return 1550;
      break;
    case '3':
     case '4':
     case '5':
     case '6': 
     return 1100;
      break;
      case '7':
        return 1050;
        break;
        case '8':
          return 1000;
          break;
    default:
      
      break;
  }
}

function get_sub_percent($sub,$mark,$sem)
{
  switch ($sem) {
    case '2':
          switch ($sub) {
            case '1':
            case '2':
            case '3':
            case '4':
            case '5':
            case '6':
            case '7':
            case '8':
            case '9':
              return $mark/150;
            break;
            default:
              return $mark/100;
              break;
          }
      break;
    case '3':
    case '4':
    case '5':
    case '6':
      switch ($sub) {
        case '1':
            case '2':
            case '3':
            case '4':
            case '5':
            case '6':
              return $mark/150;
            break;
            default:
              return $mark/100;
              break;
      }
      break;
    case '7':
      switch ($sub) {
        case '1':
            case '2':
            case '3':
            case '4':
            case '5':
              return $mark/150;
            break;
            case '8':
            case '9':
              return $mark/50;
            default:
              return $mark/100;
              break;
      }
    break;
    case '8':
      switch ($sub) {
        case '1':
            case '2':
            case '3':
            case '4':
              return $mark/150;
            break;
            case '5':
              return $mark/300;
            default:
              return $mark/100;
              break;
      }
    break;
    default:
      # code...
      break;
  }
}
function gradepoint_of_sub($sub,$mark,$sem)
{

$mark=(get_sub_percent($sub,$mark,$sem))*100;

  if($mark>=90)
    return 10;
  elseif ($mark>=80) 
    return 9;
  elseif ($mark>=70) 
    return 8;
  elseif ($mark>=60) 
    return 7;
  elseif ($mark>=50) 
    return 6;
  else 
    return 0;
}
function grade_of_sub($sub,$mark,$sem)
{

$mark=(get_sub_percent($sub,$mark,$sem))*100;

  if($mark>=90)
    return 'S';
  elseif ($mark>=80) 
    return 'A';
  elseif ($mark>=70) 
    return 'B';
  elseif ($mark>=60) 
    return 'C';
  elseif ($mark>=50) 
    return 'D';
  else 
    return 'F';
}
function creditpoint_of_sub($sub,$sem)
{
  switch ($sem) {
    case '2':
          switch ($sub) {
            case '1':
            case '2':
            case '3':
            case '6':
            case '7':
            case '8':
            case '10':
              return 4;
              break;
            case '4':
            case '5':
               return 5;
            case '9':
              return 3;
              break;
              case '11':
              return 2;
              break;
              case '12':
              return 1;
              break;
            default:
              # code...
              break;
          }
      break;
    case '3':
    case '4':
    case '5':
    case '6':
      switch ($sub) {
        case '7':
        case '8':
          return 2;
          break;
        
        default:
          return 3;
          break;
      }
      break;
    case '7':
      switch ($sub) {
        case '6':
        case '7':
        case '9':
          return 2;
          break;
        case '8':
        return 1;
        default:
          return 3;
          break;
      }
    break;
    case '8':
      switch ($sub) {
        case '5':
          return 8;
          break;
        case '6':
        return 2;
        default:
          return 3;
          break;
      }
    break;
    default:
      # code...
      break;
  }
}

function creditpoints_of_sem($sem,$year_pass)
{

  switch ($sem) {
    case '2':
        if($year_pass>2015)
          return 44;
        else
          return 43;
      break;
    default:
       return 22;
      break;
  }
}

function gpa_of_sem($mark_row)
{
//  print_r($mark_row);     
  $total_credit=0;
  $total=0;
  $total+=(gradepoint_of_sub(1,$mark_row["sub1"],$mark_row["sem"])*creditpoint_of_sub(1,$mark_row["sem"]));
  //echo gradepoint_of_sub(1,$mark_row["sub1"],$mark_row["sem"])."..".$total."..";
  $total+=(gradepoint_of_sub(2,$mark_row["sub2"],$mark_row["sem"])*creditpoint_of_sub(2,$mark_row["sem"]));
         $total+=(gradepoint_of_sub(3,$mark_row["sub3"],$mark_row["sem"])*creditpoint_of_sub(3,$mark_row["sem"]));
          $total+=(gradepoint_of_sub(4,$mark_row["sub4"],$mark_row["sem"])*creditpoint_of_sub(4,$mark_row["sem"]));
           $total+=(gradepoint_of_sub(5,$mark_row["sub5"],$mark_row["sem"])*creditpoint_of_sub(5,$mark_row["sem"]));
            $total+=(gradepoint_of_sub(6,$mark_row["sub6"],$mark_row["sem"])*creditpoint_of_sub(6,$mark_row["sem"]));
             
  switch($mark_row["sem"]){
    case '2':
      $total+=(gradepoint_of_sub(7,$mark_row["sub7"],$mark_row["sem"])*creditpoint_of_sub(7,$mark_row["sem"]));
       $total+=(gradepoint_of_sub(8,$mark_row["sub8"],$mark_row["sem"])*creditpoint_of_sub(8,$mark_row["sem"]));
        $total+=(gradepoint_of_sub(9,$mark_row["sub9"],$mark_row["sem"])*creditpoint_of_sub(9,$mark_row["sem"]));
         $total+=(gradepoint_of_sub(10,$mark_row["sub10"],$mark_row["sem"])*creditpoint_of_sub(10,$mark_row["sem"]));
          $total+=(gradepoint_of_sub(11,$mark_row["sub11"],$mark_row["sem"])*creditpoint_of_sub(11,$mark_row["sem"]));
    if($mark_row["year_pass"]>2015){
      $total_credit+=creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]);
       $total+=(gradepoint_of_sub(12,$mark_row["sub12"],$mark_row["sem"])*creditpoint_of_sub(12,$mark_row["sem"]));
    }else{
      $total_credit+=creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]);
    }
    break;
    case '3':
    case '4':
    case '5':
    case '6':
       $total_credit+=creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]);
        $total+=(gradepoint_of_sub(7,$mark_row["sub7"],$mark_row["sem"])*creditpoint_of_sub(7,$mark_row["sem"]));
        $total+=(gradepoint_of_sub(8,$mark_row["sub8"],$mark_row["sem"])*creditpoint_of_sub(8,$mark_row["sem"]));
    break;
    case '7':
       $total_credit+=creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]);
       $total+=(gradepoint_of_sub(7,$mark_row["sub7"],$mark_row["sem"])*creditpoint_of_sub(7,$mark_row["sem"]));
       $total+=(gradepoint_of_sub(8,$mark_row["sub8"],$mark_row["sem"])*creditpoint_of_sub(8,$mark_row["sem"]));
        $total+=(gradepoint_of_sub(9,$mark_row["sub9"],$mark_row["sem"])*creditpoint_of_sub(9,$mark_row["sem"]));
       
      break;
  }

  return $total/$total_credit;
}
function get_cgpa($regno,$marks_search)
{
  $total=0;$total_=0;$min_one_row=FALSE;$count=0;
  $total_gpa=0;
  $total_credit=0;
  foreach ($marks_search as $mark_row) {
  //  print_r($marks_search);
    if($mark_row["regno"]==$regno){
      $total_gpa=$total_gpa+(gpa_of_sem($mark_row)*creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]));
      $total_credit+=creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]);
    //  echo $total_gpa.":::::".$total_credit.":::".creditpoints_of_sem($mark_row["sem"],$mark_row["year_pass"]).">>";
      $min_one_row=TRUE;
      if($count++ >7) break;
    }
  }
if ($min_one_row==FALSE) {
  return 0;
}
  return round(($total_gpa/$total_credit),2);

}
function get_percent($regno,$marks_search)
{
  $total=0;$total_=0;$min_one_row=FALSE;$count=0;
  foreach ($marks_search as $mark_row) {
  //  print_r($marks_search);
    if($mark_row["regno"]==$regno){
      $total+=mark_of_sem($mark_row["sem"],$mark_row["year_pass"]);
      $total_+=$mark_row["total"];
      $min_one_row=TRUE;
      if($count++ >7) break;
    }
  }
if ($min_one_row==FALSE) {
  return 0;
}
  return round(($total_/$total)*100,2);

}
function get_arriers($regno,$marks_search)
{
   $total=0;$min_one_row=FALSE;$count=0;
   foreach ($marks_search as $mark_row) {
    if($mark_row["regno"]==$regno){
      $total+=$mark_row["arriers"];      
      $min_one_row=TRUE;
      if($count++ >7) break;
    }
  }
 if (!$min_one_row) {
  return 0;
}
return $total;
}

?>
