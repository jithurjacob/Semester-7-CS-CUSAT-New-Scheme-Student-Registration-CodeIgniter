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
                    <h2 class="text-center">exam portal status</h2>
                    <br />
                    <br />
                    <h3>Companies</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Registerd Companies</td>
                              <td><?php echo count($company_status) ?></td>
                            </tr>
                             <tr>
                              <td>Accepted Companies</td>
                              <td><?php echo count(array_filter($company_status,"valid")); ?></td>
                            </tr>
                             <tr>
                              <td>Rejected Companies</td>
                              <td><?php echo count(array_filter($company_status,"invalid")); ?></td>
                            </tr>
                             <tr>
                              <td><font color="red">Pending Companies</font></td>
                              <td><font color="red"><?php echo count(array_filter($company_status,"pending"));?>
                  <?php  if(count(array_filter($company_status,"pending"))!=0) {?>
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
                    
                    <h3>Offers</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Total offers</td>
                              <td><?php echo count($offers_status) ?></td>
                            </tr>
                             <tr>
                              <td>Accepted Offers</td>
                              <td><?php echo count(array_filter($offers_status,"valid")); ?></td>
                            </tr>
                             <tr>
                              <td>Rejected Offers</td>
                              <td><?php echo count(array_filter($offers_status,"invalid")); ?></td>
                            </tr>
                             <tr>
                              <td><font color="red">Pending Offers</font></td>
                              <td><font color="red"><?php echo count(array_filter($offers_status,"pending")); ?>
                              <?php  if(count(array_filter($offers_status,"pending"))!=0) {?>
                  <a href="<?php echo base_url()."index.php/exam/admin/exam_details" ?>">Verify Now</a>
                  <?php } ?>
                              </font></td>
                            </tr>
                            </table>
                      </div>
                   
                    

                    <br />
                    <br />
                    <h3>Marks</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Mark Records</td>
                              <td><?php echo count($mark_status) ?></td>
                            </tr>
                             <tr>
                              <td>Verified Marklist</td>
                              <td><?php echo count(array_filter($mark_status,"valid")); ?></td>
                            </tr>
                             <tr>
                              <td>UnVerified Marklist</td>
                              <td><?php echo count(array_filter($mark_status,"invalid")); ?></td>
                            </tr>
                             <tr>
                              <td><font color="red">Pending Mark records</font></td>
                              <td><font color="red"> <?php echo count(array_filter($mark_status,"pending")); ?></font></td>
                            </tr>
                            </table>
                      </div>
                    
                    <br />
                    <br />

                </div>
            </div>

        </div>


    </div>




</div>
