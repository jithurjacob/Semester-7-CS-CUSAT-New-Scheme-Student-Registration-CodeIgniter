<div class="responsive-table">
                        <table id="student_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Year</th>
                                <th>Grant Permission</th>
                            </thead>

                            <?php 
                            $this->load->helper('inflector');
                            if(count($student_list_year_branch)==0){
                            	?>
                            	<tr>
                            	<td colspan="6">
                            	No students data found for selected branch and year of passing
                            	</td>
                            	</tr>
                            	<?php
                            }
                            ?>
                            <?php

                             foreach ($student_list_year_branch as $student): ?>
                            <tr id="<?php 
                            
                            //print_r($this);
                             $enc_usr=$this->encrypt->encode($student["username"]);
                               echo 'coordinator'.$student['student_id']; ?>">
                                <td>
                                    <?php     echo "<img class='profile_pic_table' src='".base_url()."profile_pics/".$student['pic']." '>"; ?>
                                </td>
                                <td>
                                    <?php     echo humanize($student['name']); ?>
                                </td>
                                <td>
                                    <?php     echo $student['email']; ?>
                                </td>
                                <td>
                                    <?php     echo $student['mobno']; ?>
                                </td>
                                                              
                                <td>
                                    <?php     echo $student['year_pass']; ?>
                                </td>
                                <td><a onclick="accept('<?php     echo $enc_usr ?>','coordinator',<?php echo 'coordinator'.$student['student_id']; ?>);">Grant</a></td>
                            
                            </tr>
                            <?php endforeach ?>
                        </table>
                    </div>