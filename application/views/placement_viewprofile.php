<?php
if(!isset($student_details)) exit();
$this->load->helper('inflector');
 
$student=$student_details[0];
//print_r($student);

$privacy_settings=array("privacy_profile_pic"=>$student["privacy_profile_pic"],
    "privacy_personal"=>$student["privacy_personal"],
    "privacy_academic"=>$student["privacy_academic"],
    "privacy_resume"=>$student["privacy_resume"]);
//print_r($privacy_settings);
$relation=find_relation($student,$session);

//echo $relation;

function find_relation($student,$session)
{
    if($session['admin']=="true" || $session['company']=="true")
        return "superuser";
if($session['year_pass']==$student['year_pass']){
       if($session['branch']==$student['branch']) {
        if($session['coordinator']=="1")
            return "coordinator";
    
       }}

    if($session['year_pass']==$student['year_pass']){
       if($session['branch']==$student['branch']) {
         if($session['regno']==$student['regno'])
        return "self";
    else
         return "classmates";
       }
     else
        
        return "batchmates";


    }

   

    return "anyone";
}

function privacy_check($relation,$value)
{
    //echo $relation.$value;
    if($value=="anyone" || $relation=="self" || $relation=="coordinator" || $relation=="superuser")
        return true;

    if($relation==$value)
        return true;
    if($value=="batchmates" && $relation=="classmates")
        return TRUE;

    return false;
}

function relation_($value)
{
   if($value=="superuser")
    return "admin or companies";
    if($value=="self")
        return "self";

    return $value;
}
?>
<div class="middle">
    <div class="container">

<div class="row about">
    <div class="col-md-12">
        <div id="container_id" class="home_steps well text-justify noborder">
        <?php if(isset($profile_check))if($profile_check=="true"){?>
        <h4>Hello <?php echo humanize($student["name"]);?>, you are viewing your profile as how  your <?php echo relation_($relation);?> views your profile.</h4>
        <br>
        <br>
        <?php }?>
            <h1 class="text-center"><?php echo humanize($student["name"]); ?></h1>
            <br>
            <br>
            <?php if($relation=="superuser" || privacy_check($relation,$privacy_settings["privacy_profile_pic"])){?>
            <div class="text-center">
            <img style="max-height:200px;max-width:200px;" src="<?php echo base_url();?>profile_pics/<?php echo $student["pic"]; ?>">
            </div>
            
           <?php }else{ ?>
            <h5><?php echo humanize($student["name"]); ?> has blocked you from viewing his/her profile picture</h5>
            <?php } ?>
            <br>
            <br>
            <h3>Personal Details</h3>
            <br>
            <br>
            <?php if($relation=="superuser" || privacy_check($relation,$privacy_settings["privacy_personal"])){?>
            <div class="responsive-table">
                        <table id="students_personal_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
<tr>
    <td colspan="2">Name</td>
    <td colspan="2"><?php echo humanize($student["name"]); ?></td>
</tr>
<tr>
    <td colspan="2">Admission Number</td>
    <td colspan="2"><?php echo humanize($student["admnno"]); ?></td>
</tr>
<tr>
    <td colspan="2">Register Number</td>
    <td colspan="2"><?php echo humanize($student["regno"]); ?></td>
</tr>
<tr>
    <td colspan="2">Year of Passing</td>
    <td colspan="2"><?php echo humanize($student["year_pass"]); $year_pass=$student["year_pass"]; ?></td>
</tr>
<tr>
    <td colspan="2">Gender</td>
    <td colspan="2"><?php echo humanize($student["gender"]); ?></td>
</tr>
<tr>
    <td colspan="2">Semester</td>
    <td colspan="2"><?php echo humanize($student["semester"]); ?></td>
</tr>
<tr>
    <td colspan="2">Date of Birth</td>
    <td colspan="2"><?php echo humanize($student["dob"]); ?></td>
</tr>
<tr>
    <td colspan="2">Permanent Address</td>
    <td colspan="2"><?php echo humanize($student["perm_addr"]); ?></td>
</tr>
<tr>
    <td colspan="2">Temporary Address</td>
    <td colspan="2"><?php echo humanize($student["temp_addr"]); ?></td>
</tr>
<tr>
    <td colspan="2">Mobile Number</td>
    <td colspan="2"><?php echo humanize($student["mobno"]); ?></td>
</tr>
<!-- <tr>
    <td colspan="2">Contact Number</td>
    <td colspan="2"><?php //echo humanize($student["contactno"]); ?></td>
</tr> -->
<tr>
    <td colspan="2">Percentage in tenth</td>
    <td colspan="2"><?php echo humanize($student["tenth"]); ?></td>
</tr>
<tr>
    <td colspan="2">Percentage in Twelth</td>
    <td colspan="2"><?php echo humanize($student["twelth"]); ?></td>
</tr>
<tr>
    <td colspan="2">Entrance Rank</td>
    <td colspan="2"><?php echo humanize($student["entrance_rank"]); ?></td>
</tr>
                        </table>
                        </div>

<?php }else{ ?>
            <h5><?php echo humanize($student["name"]); ?> has blocked you from viewing this data</h5>
            <?php } ?>
            <br>
<br>
             <h3>Academic Details</h3>
            <br>
            <br>
            <?php if($relation=="superuser" || privacy_check($relation,$privacy_settings["privacy_academic"])){?>
             
            <?php if (isset($mark_details[0])) { ?>
                    <h4 class="text-center">Percentage : <?php echo get_percent($mark_details[0]['regno'],$mark_details);?>%</h4>
                    <h4 class="text-center">CGPA : <?php echo get_cgpa($mark_details[0]['regno'],$mark_details);?></h4>
                    <h4 class="text-center">Arriers : <?php echo get_arriers($mark_details[0]['regno'],$mark_details);?></h4>
                    <br>
                    <br>
                    <?php } ?>
             <?php $this->load->helper('array');
                     $this->load->helper('form');
                      $this->load->helper('url');
                       $semesters= array('2','3','4','5','6','7','8');
                       $exists=array();
                       if (isset($mark_details[0])) {
                       
                         
                          foreach ($mark_details as $mark) {
                          $sem_=element('sem', $mark);?>
                    <h4>Semester
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
                    </h4>
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
                                  <?php  if($mark["year_pass"]>2015) { ?>
                                  <th>
                                    <?php echo $sem_; ?>12</th>
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
                                <?php  if($mark["year_pass"]>2015) { ?>
                                 <td id="mark_<?php echo $sem_; ?>12">
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
                                <td id="mark_<?php echo $sem_; ?>02_status">
                                    <!-- 102 -->
                                    <?php echo grade_of_sub('2',element( 'sub2', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>03_status">
                                    <!-- 103 -->
                                    <?php echo grade_of_sub('3',element( 'sub3', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>04_status">
                                    <!-- 104 -->
                                    <?php echo grade_of_sub('4',element( 'sub4', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>05_status">
                                    <!-- 105 -->
                                   <?php echo grade_of_sub('5',element( 'sub5', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>06_status">
                                    <!-- 106 -->
                                    <?php echo grade_of_sub('6',element( 'sub6', $mark),$semg); ?>
                                </td>
                                <?php if($sem_!="8" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>07_status">
                                    <!-- 107 -->
                                    <?php echo grade_of_sub('7',element( 'sub7', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>08_status">
                                    <!-- 108 -->
                                    <?php echo grade_of_sub('8',element( 'sub8', $mark),$semg); ?>
                                </td>
                                <?php } if($sem_=="7" or $sem_=="1" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>09_status">
                                    <!-- 109 -->
                                   <?php echo grade_of_sub('9',element( 'sub9', $mark),$semg); ?>
                                </td>
                                <?php } if($sem_=="1" ) { ?>
                                <td id="mark_<?php echo $sem_; ?>10_status">
                                    <!-- 110 -->
                                    <?php echo grade_of_sub('10',element( 'sub10', $mark),$semg); ?>
                                </td>
                                <td id="mark_<?php echo $sem_; ?>11_status">
                                    <!-- 111 -->
                                    <?php echo grade_of_sub('11',element( 'sub11', $mark),$semg); ?>
                                </td>
                                <?php if($session["year_pass"]>2015){?>
                                <td id="mark_<?php echo $sem_; ?>12_status">
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
                                <?php if($mark["year_pass"]>2015){?>
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
                
                <?php }else{ ?>
            <h5><?php echo humanize($student["name"]); ?> has blocked you from viewing this data</h5>
            <?php } ?>
            <br>
                <br>
             <h3>Performance</h3>
            <br>
            <br>
            <?php if($relation=="superuser" || privacy_check($relation,$privacy_settings["privacy_academic"])){?>
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
                
                <script type="text/javascript" src="<?php echo base_url();?>js/jchartfx.system.js"></script>
   <script type="text/javascript" src="<?php echo base_url();?>js/jchartfx.coreVector.js"></script>
                <script type="text/javascript">
                    $(document).ready(function(){
                        change('reg_<?php echo $student["regno"]; ?>');
                    });
                    function change(arg) {
       

        var list=new Array();
       
                list.push((arg).replace("reg_",""));
        
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

    function create(data){
    $('#div_obj').html('');
delete chart1;
     chart1 = new cfx.Chart(); 
// if(data=='')
// PopulateData(chart1);
// else{
chart1.setDataSource(data);
// }
var titles = chart1.getTitles();
var title = new cfx.TitleDockable();


chart1.getAxisY().getLabelsFormat().setDecimals(2);
//title.setText("Marks shows your performance in an exam not who you are");
titles.add(title); 
chart1.getAxisX().setStaggered(false);
chart1.getAxisY().setMax(100);
chart1.getAxisY().setMin(0);
chart1.getAxisY().setStep(5);
chart1.getAxisY().setForceZero(false);
chart1.create('div_obj');
 }
                </script>
            
            <?php }else{ ?>
            <h5><?php echo humanize($student["name"]); ?> has blocked you from viewing this data</h5>
            <?php } ?>
            <br>
            <br>
            <h3>Resume</h3>
            <br>
            <br>
            <?php if($relation=="superuser" || privacy_check($relation,$privacy_settings["privacy_resume"])){?>
            <?php 
            	if( $student["resume"]!="") {?>
            
            
            <object data="<?php  echo base_url().'resume/'.$student['resume']; ?>" type="application/pdf" width="100%" height="1000px">
                        alt:<a href="<?php     echo base_url() . 'resume/resume.pdf'; ?>">Download PDF</a>
                    </object>
                    <?php }else {?>
                    <h5><?php echo humanize($student["name"]); ?> has not uploaded a resume.</h5>
                    <?php } ?>
             <br>
            <br>
            <?php }else{ ?>
            <h5><?php echo humanize($student["name"]); ?> has blocked you from viewing this data</h5>
            <?php } ?>
            <br>
            <br>
            <div  class="centertext" style="width:50%;margin-left:25%">
            <?php if($session["company"]=="true") {?>
            <?php
            $company_enc=$this->encrypt->encode($session["username"]);
            $student_enc=$this->encrypt->encode($student["username"]);
            $sent=false;
            foreach ($offer_details as $offer) {
                if($offer["company_username"]==$session["username"])
                    $sent=TRUE;
            }
            if($sent==FALSE){
            ?>
                <button id="offer_btn" onclick="offer('<?php echo $company_enc; ?>','<?php echo $student_enc; ?>')" class="btn btn-lg btn-primary btn-block" type="submit">Give job offer</button>
              <br>
              <textarea  required class="form-control margin_bottom_10" id="desc" name="desc"  placeholder="Description"></textarea>
             <div id="result"></div>
              <?php } else{?>
              <h3>Offer already sent</h3>

            <?php    } }?>                  
            </div>
            <br>
            <br>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
    function offer(company,std){
     var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Job offer sent successfully.It would be forwarded to the student once admin verifies your offer</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Job offer sending failed    </div>';
var sent='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Job offer already sent    </div>';
   
    var url='<?php echo base_url(); ?>index.php/exam/give_offer';
    var desc=$('#desc').val();
   // alert(desc);
    if(desc==""){
        $('#desc').focus();
        alert("Description is required");
        return false;
    }
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','company':company,'std':std,'desc':desc},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
    $('#result').html(ok);
        $('#offer_btn , #desc').hide();
    }else if(result=="sent"){
        $('#result').html(sent);
    }
    else{
    $('#result').html(fail);
    }
    },error: function(result){
      $('#result').html(result);
      
    }
  });
}
</script>


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