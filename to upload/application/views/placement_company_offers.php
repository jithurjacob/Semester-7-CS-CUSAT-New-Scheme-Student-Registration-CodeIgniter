<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                 <?php $this->load->helper('inflector'); ?>
                <div class="home_steps well text-justify noborder">
                    <h2>Offers</h2>
                    <br />
                    <br />
                     <div class="responsive-table">
                    <table class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                    <thead>
                       <th>Student Name</th>
                       <th>Message Body</th>
                       <th>Status</th>
                    </thead>
                    <?php foreach ($offers_data as $offer):?>
                    <tr>
<td><a onclick='load_details("<?php echo $this->encrypt->encode($offer["students_username"]."@#$");?>","newtab")'><?php echo humanize( $offer['name']); ?></a></td>
<td><?php echo( $offer['description']); ?></td>
 <td><?php echo status( $offer['valid']); ?></td>
                    </tr>
                <?php endforeach; ?>
<?php function status($value)
{
    switch ($value) {
        case '0':
            return "Pending admin verification";
            break;
        case '1':
            return "Offer sent";
            break;
            case '-1':
            return "Offer rejected by admin";
            break;
        default:
            # code...
            break;
    }
}?>
                    </table>
                    </div>
                    
                </div>
            </div>
            
        </div>


    </div>



<?php            $this->load->helper('form');
                 $this->load->helper('url');
                  echo form_open('/exam/viewprofile', array('class' => 'form-register ', 'role' => 'form','method'=>'post','target'=>'_blank' ,  'id'=>'invisible_form' )); ?>

    <input id="target" name="target" type="hidden" value="newtab">
  <input id="id" name="id" type="hidden" value="default">
</form>
</div>
<script type="text/javascript">
    function load_details (argument,target) {
if(target=="newtab"){
   $('#id').val(argument);
    $('#invisible_form').submit();
    return true;
}
}
</script>