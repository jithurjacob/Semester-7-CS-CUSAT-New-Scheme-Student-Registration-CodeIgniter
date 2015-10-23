<div class="middle">
    <div class="container">
<?php
function valid($v)
{
if ($v["valid"]==="1")
  {
  return true;
  }
return false;
}
function invalid($v)
{
if ($v["valid"]==="-1")
  {
  return true;
  }
return false;
} 
function pending($v)
{
if ($v["valid"]==="0")
  {
  return true;
  }
return false;
}
?>
        <div class="row about">
            <div id="container_id" class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2 class="text-center">Exam portal status</h2>
                    <br />
                    <br />
                    <h3>Colleges</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Registerd Colleges</td>
                              <td><?php echo count($colleges_status) ?></td>
                            </tr>
                          
                            </table>
                      </div>
                  
                    <br />
                    <br />

                    <br />
                    <br />
                    <h3>Students</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Registerd Students</td>
                              <td><?php echo count($student_status) ?></td>
                            </tr>
                             <tr>
                              <td>Accepted Students</td>
                              <td><?php echo count(array_filter($student_status,"valid")); ?></td>
                            </tr>
                             <tr>
                              <td>Rejected Students</td>
                              <td> <?php echo count(array_filter($student_status,"invalid")); ?></td>
                            </tr>
                             <tr>
                              <td><font color="red">Pending Students</font></td>
                              <td><font color="red"><?php echo count(array_filter($student_status,"pending")); ?>
                    <?php  if(count(array_filter($student_status,"pending"))!=0) {?>
                  <a href="<?php echo base_url()."index.php/exam/admin/verify" ?>">Verify Now</a>
                  <?php } ?>
                  </font></td>
                            </tr>
                            </table>
                      </div>
                    
                    <br />
                    <br />
                    
                   
                   
                    

                    <br />
                    <br />
                 
                    
                    <br />
                    <br />

                </div>
            </div>

        </div>


    </div>




</div>
