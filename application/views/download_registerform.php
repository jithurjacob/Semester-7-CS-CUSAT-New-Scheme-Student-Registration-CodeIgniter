<?php
$std=$student_details[0];
   

 function college_name($value='',$college_details)
{	
	
	foreach ($college_details as $college) {
		if($college['id']==$value)
			return $college['name'];
	}
}
 function branch_name($value='',$branch_details)
{
	foreach ( $branch_details as $branch) {
		if($branch['id']==$value)
			return $branch['branch_name'];
	}
}
 function degree_name($value='',$degree_details)
{
	foreach ($degree_details as $degree) {
		if($degree['id']==$value)
			return $degree['degree_name'];
	}
}
    
?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        <script> function printpage() {
                window.print();
            }</script>
        <style type="text/css">
            #main{ 
                margin: 12px;
                border:2px solid #a1a1a1;
                padding:10px;
                width:1100px;
                height:600px;

            }

        </style>
        <style type="text/css"></style></head><body>

        <div id="main">
            <img src="<?php echo base_url();?>css/images/copy_of_form5_files/cusat-university-logo.jpg" align="left"><center>
                <h2>Cochin University Of Science And Technology </h2>
                <h3>Form-1(Student Registration Form)</h3></center>
            <br><hr>
            <div width="1050px">
                <div width="750px" style="float:left">




                    <table border="5" class="gridtable" width="900px">

                        <tbody><tr>
                                <td width="400px">
                                    <label><b><font color="red"><b>Student Form Number</b></font></b></label>
                                </td>
                                <td width="600px"><?php echo $std["print_hash"]; ?>
                                </td></tr>
                            <tr><td width="100px">
                                    <label><b>Student Name</b></label></td> 
                                <td width="400px"><?php echo $std["name"]; ?><br></td></tr>


                            <tr><td width="100px">
                                    <label><b>Date Of Birth</b></label></td> 
                                <td width="400px"><?php echo $std["dob"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Age</b></label></td> 
                                <td width="400px"><?php echo $std["age"]; ?><br></td></tr>  
                            

                            <tr>
                                <td width="100px">
                                    <label><b>Admission Number</b></label>
                                </td>
                                <td width="400px"><?php echo $std["admnno"]; ?></td></tr>

                            <tr>
                                <td width="100px">

                                    <label><b>Academic Month &amp; Year</b></label>
                                </td>
                                <td width="400px"><?php echo $std["academic_month"]; ?>&nbsp;<?php echo $std["academic_year"]; ?></td></tr>
                            <tr><td width="100px">
                                    <label><b>College/Department Name</b></label></td> 
                                <td width="400px"><?php echo college_name($std['college'],$college_details); ?><br></td></tr>

                            <tr><td width="100px">
                                    <label><b>Degree Name</b></label></td> 
                                <td width="400px"><?php echo degree_name($std['degree'],$degree_details); ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Course Name</b></label></td> 
                                <td width="400px"><?php echo branch_name($std['branch'],$branch_details); ?><br></td></tr>
                          



                            <tr><td width="100px">
                                    <label><b>Gender</b></label></td> 
                                <td width="400px"><?php echo $std["gender"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Nationality</b></label></td> 
                                <td width="400px"><?php echo $std["nationality"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Current Address</b></label></td> 
                                <td width="400px"><?php echo $std["curraddr"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Permanent Address</b></label></td> 
                                <td width="400px"><?php echo $std["permaddr"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Mobile Number</b></label></td> 
                                <td width="400px"><?php echo $std["mobno"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Email Address</b></label></td>
                                <td width="400px"><?php echo $std["email"]; ?><br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Father/Guardian Name</b></label></td> 
                                <td width="400px"><?php echo $std["guardname"]; ?> <br></td></tr>
                            <tr><td width="100px">
                                    <label><b>Caste</b></label></td> 
                                <td width="400px"><?php echo $std["caste"]; ?><br></td></tr>
                            

                        </tbody></table>
                </div>

                <div width="130px" style="float:right">
                    <img style="width:145px;height:200px" src="<?php echo base_url().$std['pic'];?>" border="2px"><br>
                    <img style="width:145px;height:80px" src="<?php echo base_url().$std['sign'];?>" border="2px"><br>

                </div>
            </div>


        </div>

        <table>
            <tbody><tr><td><font color="red">Note:</font></td></tr><tr><td>
                        1. Submit this Acknowledgement to College/Department<br> 
                        2. Check your Mail Account for Student Registration Form Number in inbox or spam </td></tr>
            </tbody></table>


        <br>
        <input style="margin-left: 413px;" type="button" value="print" onclick="printpage()">

    </body></html>

  