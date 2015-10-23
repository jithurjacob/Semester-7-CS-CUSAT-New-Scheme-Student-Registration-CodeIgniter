 <marquee direction="up" scrollamount="2" onmouseover="javascript: this.stop();" onmouseout="javascript: this.start();">
                            <ul>
                            
                               
                                <?php foreach ($news_data as $var): ?>
                                	 <li>
                               <a href="<?php echo base_url();?>index.php/exam/home/news_details" target="_blank">
                                   <?php echo $var['title'];?>

                                </a>
                                </li>
                            <?php endforeach;?>
                            </ul>
 </marquee>