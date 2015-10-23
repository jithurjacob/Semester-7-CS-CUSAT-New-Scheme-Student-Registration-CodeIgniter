
                    

<option class="form-control margin_bottom_10" value="select">Select Branch</option>
                        <?php foreach ($branch_data as $var): ?>
                        
                            
                        <option class="form-control margin_bottom_10" value="<?php echo $var['id'] ?>"> <?php echo $var['branch_name'] ?></option>

                          
                       
                        <?php endforeach;?>
                    
               