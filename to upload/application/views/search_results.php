

<?php
$this->load->helper('inflector');
function branch_name($value,$branch_details)
{
  foreach ($branch_details as $branch) {
    if($value==$branch["id"])
      return $branch["name"];
  }
}
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
function get_arrier($regno,$marks_search)
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




function find_relation($student,$session)
{ 
    if($session['admin']=="true" || $session['company']=="true" || $session['username']=="jithu")
        return "superuser";

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
    if($value=="anyone" || $relation=="self" || $relation=="superuser")
        return true;

    if($relation==$value)
        return true;
    if($value=="batchmates" && $relation=="classmates")
        return TRUE;

    return false;
}

function isCoordinator($student,$session)
{
  if($session['coordinator']=="1" && $session['year_pass']==$student['year_pass'])
    return true;
  else
    return false;
}

$output=array();
//print_r($students_search);
foreach ($students_search as $student) {
  $enc_usr=$this->encrypt->encode($student["username"]."@#$");
//print_r($marks_search);
  $cgpa=get_cgpa($student["regno"],$marks_search);
  $percent=get_percent($student["regno"],$marks_search);
  $arrier=get_arrier($student["regno"],$marks_search);
  //echo "perc:".$percent;
  if(!($percent >= $this->input->post('percent_min') && $percent <= $this->input->post('percent_max'))){
 // echo "here";  
    continue;
  }
  if(!($cgpa >= $this->input->post('cgpa_min') && $cgpa <= $this->input->post('cgpa_max'))){
 // echo "here";  
    continue;
  }
  if(!($arrier >= $this->input->post('arrier_min') && $arrier <= $this->input->post('arrier_max'))){
  // echo "here1";
   continue;
  }
$privacy_settings=array("privacy_profile_pic"=>$student["privacy_profile_pic"],
    "privacy_personal"=>$student["privacy_personal"],
    "privacy_academic"=>$student["privacy_academic"],
    "privacy_resume"=>$student["privacy_resume"]);
//print_r($privacy_settings);
$relation=find_relation($student,$session);

if($relation=="superuser" || isCoordinator($student,$session) || privacy_check($relation,$privacy_settings["privacy_profile_pic"]))
  $pic="<img class='profile_pic_table' src='".base_url()."profile_pics/".$student["pic"]."'>";
else
  $pic="protected";

$link="<div><a onclick='load_details(\"".$enc_usr."\",\"here\")'>View Profile</a></div><div><a onclick='load_details(\"".$enc_usr."\",\"newtab\")'>Open in a new tab</a></div>";

if($relation=="superuser" || isCoordinator($student,$session)  || privacy_check($relation,$privacy_settings["privacy_academic"]))
$name=humanize($student["name"]);
else{
$name="protected";
$link="protected";
$name="protected";
$pic="protected";
}
if($relation=="superuser" || isCoordinator($student,$session))
  $temp_array=array($pic,
                    $name,
                    humanize(branch_name($student["branch"],$branch_details)),
                    $student["year_pass"],$percent." %",$cgpa,$arrier,$link,$student["perm_addr"],$student["dob"],$student["email"],$student["mobno"],$student["admnno"],$student["regno"]);
else
$temp_array=array($pic,
                    $name,
                    humanize(branch_name($student["branch"],$branch_details)),
                    $student["year_pass"],$percent." %",$cgpa,$arrier,$link);
array_push($output, $temp_array);
}
echo '{ "data":'.json_encode($output)."}";

?>