<?php
$this->load->helper('inflector');
$sem_=array("2","3","4","5","6","7","8");
$final=array();
$data=array();
$per=0;
$count=0;
$avg=0;
$found=false;
//print_r($list);
//  print_r($marks_details);
//print_r($student_name_regno);
foreach ($sem_ as $sem) {
	$data=array();
	foreach ($marks_details as $mark) { // class avg
		if($mark["sem"]==$sem){
			$per+=$mark["percent"];
			$count++;
		}
	}
	if($count==0){
		$avg=0;
		continue;
	}
	else
		$avg=$per/$count;
	
	$data["Class Average"]=$avg;

	foreach ($list as $student_regno){$found=FALSE;
		foreach ($marks_details as $mark) { // std
			//echo "etf";
			if($mark["sem"]==$sem && $mark["regno"]==$student_regno){
				$data[student_name($student_regno,$student_name_regno)]=round($mark["percent"],2);
				//echo "found perc of".student_name($student_regno,$student_name_regno)."in ".$sem." as ".round($mark["percent"],2)."\n";
				$found=TRUE;
				break;
			}
		}

		if ($found==FALSE) {
			if($sem==2)
			$data[student_name($student_regno,$student_name_regno)]=$avg;
			//echo "found perc of".student_name($student_regno,$student_name_regno)."in ".$sem." as 0\n";
		}
	}
$data["Semester"]=semname($sem);
array_push($final, $data);
$per=0;
$count=0;
$avg=0;
$found=false;
}

echo json_encode($final);


function student_name($regno,$details)
{
	foreach ($details as $std){
		if($std["regno"]==$regno)
			return humanize($std["name"]);
	}
}

function semname($sem_)
{
	 switch ($sem_) {
                         case '2':  return "I & II"; break;
                          case '3': return  "III";  break;
                           case '4': return "IV";  break;
                            case '5': return "V";  break;
                             case '6': return "VI";  break;
                              case '7': return "VII";  break;
                               case '8': return "VIII";  break;
                                default:  break; 
                            }
}
?>