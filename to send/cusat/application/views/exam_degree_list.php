
                    

<option class="form-control margin_bottom_10" value="select">Select Degree</option>
                        <?php foreach ($degree_data as $var): ?>
                        
                            
                        <option class="form-control margin_bottom_10" value="<?php echo $var['id'] ?>"> <?php echo $var['degree_name'] ?></option>

                          
                       
                        <?php endforeach;?>
                    
               