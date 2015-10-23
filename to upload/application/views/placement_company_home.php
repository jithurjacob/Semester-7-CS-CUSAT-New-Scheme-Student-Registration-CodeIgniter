<div class="middle">
    <div class="container">
<?php

function valid($v,$filter="valid"){

if ($v[$filter]==="1")
  {
  return true;
  } 
return false;
}
function invalid($v,$filter="valid")
{
if ($v[$filter]==="-1")
  {
  return true;
  }
return false;
}
function pending($v,$filter="valid")
{
if ($v[$filter]==="0")
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
                    <h3>Offers</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Total offers sent </td>
                              <td><?php  echo count(array_filter($offer_status,"valid")); ?></td>
                            </tr>
                            <tr>
                              <td>Total offers rejected</td>
                              <td><?php  echo count(array_filter($offer_status,"valid")); ?></td>
                            </tr>
                            </table>
                            </div>
                    
                    <br />
                    <br />

                    <h3>Students</h3>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                              <td>Total Students registerd</td>
                              <td><?php echo count(array_filter($student_status,"valid")); ?></td>
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
