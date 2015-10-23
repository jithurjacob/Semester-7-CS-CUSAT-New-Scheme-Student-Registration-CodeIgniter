<div class="middle">
    <div class="container">
        <?php $this->load->helper('inflector'); ?>
        <div class="row about">
            <?php
            function student_name($value,$student_details)
            {
            foreach ($student_details as $student) {
            if($value==$student["username"])
            return $student["name"];
            }
            return $value;
            }
            ?>
            <div id="container_id" class="col-md-9">
                <div class="home_steps well text-justify noborder">
                    <h2>Our recruiters</h2>
                    <br />
                    
                    <!-- Slider -->
                    
                    <div id="our-clients" style="height:160px" class="slider2 flexslider">
                        
                            <ul class="slides" >
                                <li>
                                   
                                <img width="270" class="lazy" height="160" data-original="<?php echo base_url();?>js/images/1-270x160.png" class="attachment-client wp-post-image" alt="1.png">
                                </li>
                                 <li><img width="270" class="lazy" height="160" data-original="<?php echo base_url();?>js/images/2-270x160.png" class="attachment-client wp-post-image" alt="4.png"></li>
                                  <li><img width="270" class="lazy" height="160" data-original="<?php echo base_url();?>js/images/3-270x160.png" class="attachment-client wp-post-image" alt="3.png"></li>
                                        <li><img width="270" class="lazy" height="160" data-original="<?php echo base_url();?>js/images/4-270x160.png" class="attachment-client wp-post-image" alt="2.png"></li>
                                   
                               
                               
                            </ul>
                        
                       
                    </div>
                    <br />
                    <!-- Slider End -->
                    <h2>exam Details</h2>
                    <br />
                    <br />
                    <div class="panel-group" id="accordion">
                        <?php  foreach ($year_data as $year): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ($year['year_pass']); ?>">
                                <?php  echo($year['year_pass']); ?>      </a>
                                </h4>
                            </div>
                            <div id="collapse<?php  echo($year['year_pass']); ?>" class="panel-collapse collapse" >
                                <div class="panel-body">
                                    
                                    
                                    <div class="responsive-table">
                                        <table id="exam_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                                            <thead>
                                            <tr>
                                                <th style="width:50%">Company</th>
                                                <th>Number of students placed</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($exam_data as $row): ?>
                                            <?php if($row['year_pass']!=$year['year_pass']) continue;
                                            else{
                                            if(!isset($history[$row['year_pass']][$row['company']])){
                                            $history[$row['year_pass']][$row['company']]['count']=1;
                                            $history[$row['year_pass']][$row['company']]['name']=$row['company'];
                                            }
                                            else{
                                            $history[$row['year_pass']][$row['company']]['count']+=1;
                                            }
                                            }
                                            ?>
                                            <?php endforeach ?>
                                            <?php //var_dump($history); foreach ($exam_data as $row): ?>
                                            <?php  foreach ($history[$year['year_pass']] as $row):  ?>
                                            <tr>
                                                <td><?php echo humanize($row['name']); ?></td>
                                                <td><?php echo humanize($row['count']); ?></td>
                                                
                                            </tr>
                                            <?php endforeach ?>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <div class="col-md-12 events well text-justify home_steps" id="events">
                        <?php $this->view('exam_news'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login_sidebar events well text-justify home_steps" id="login_sidebar">
                        <?php $this->view('exam_login_sidebar'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>