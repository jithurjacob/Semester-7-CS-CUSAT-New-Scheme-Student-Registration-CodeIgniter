<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                 <div class="home_steps well text-justify noborder">
                    <h2>Add news</h2>
                    <br />
                    <br />
                     <?php $this->load->helper('form'); $this->load->helper('url');
                      echo form_open('/exam/add_news', array('class' => 'form-register ', 'role' => 'form')); ?>

                <div class="responsive-table">
                    <table class="table table-condensed text-left">
                        
                        
                        <tr>
                            <td>
                                <label for="title">Title</label>
                            </td>
                            <td><input class="form-control margin_bottom_10" name="title" placeholder="News Title" value="<?php echo set_value('title'); ?>" required>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <label for="desc">Description</label>
                            </td>
                            <td><textarea class="form-control margin_bottom_10" name="desc" placeholder="News Description"  required><?php echo set_value('title'); ?></textarea>
                            </td>

                        </tr>

                         <?php if (isset($news_form_error_msg)) if ($news_form_error_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-danger  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $news_form_error_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <?php if (isset($news_form_success_msg)) if ($news_form_success_msg !="" ) { ?>
                        <tr >
                        <td colspan="2">
                            <div class="alert   alert-success  alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $news_form_success_msg; ?>
                            </div>
                       </td> </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Add News</button>
                                <br>
                            </td>
                        </tr>

                        </table>
                        </div>
                        </form>
                </div>
                <div class="home_steps well text-justify noborder">
                    <h2>News</h2>
                    <br />
                    <br />
                     <div class="responsive-table">
                    <table class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                    <thead>
                       <th> Title</th>
                       <th>Description</th>
                       <th>Delete</th>
                    </thead>
                    <?php foreach ($news_data as $news):?>
                    <tr id="<?php echo 'tr_'.$news['id']; ?>">
<td><?php echo( $news['title']) ?></td>
<td><?php echo( $news['desc']) ?></td>
 <td><a onclick="delete_('<?php echo  $this->encrypt->encode($news["id"]); ?>','<?php echo  'tr_'.$news["id"]; ?>');">Delete</a></td>
                    </tr>
                <?php endforeach; ?>

                    </table>
                    </div>
                    <div id="result"></div>
                </div>
            </div>
            
        </div>


    </div>




</div>

<script type="text/javascript">
    function delete_(id_,id1){
     var ok='<div class="alert   alert-success  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>News deleted Successfully</div>';
var fail='<div class="alert   alert-danger  alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>News deletion failed    </div>';
   
    var url='<?php echo base_url(); ?>index.php/exam/news_delete';
  $.ajax({
  data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','id':id_},
  type:'POST',
  url:url,
  success: function(result){
    if(result=="ok"){
        $('#'+id1).remove();
        
        $('#result').html(ok);
    }
    else{
    $('#result').html(fail);
    }
    },error: function(result){
      $('#result').html(result);
      
    }
  });
}
</script>
