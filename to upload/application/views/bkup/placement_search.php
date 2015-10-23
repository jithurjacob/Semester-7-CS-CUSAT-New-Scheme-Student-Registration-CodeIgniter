<div class="middle">
    <div class="container">

        <div class="row about">
            <div class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>Search Results</h2>
                    <br>
                    <br>
                    <div class="responsive-table">
                        <table id="options_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <tr>
                                <td>
                                    <label for="branch">Branch</label>
                                </td>
                                <td>
                                     <select class="form-control margin_bottom_10" onchange="load_data()" name="branch" required>
                                        <option class="form-control margin_bottom_10" value="ALL">Any Branch</option>              
                                    <?php  foreach ( $branch_details as $branch_): ?>
                                        <option class="form-control margin_bottom_10" value="<?php  echo $branch_['id'];?>"  ><?php  echo $branch_['name'];?></option>
                                        <?php endforeach ?>
                                </select>
                                </td>
                                <td>
                                    <label for="year">Year of Passing</label>
                                </td>
                                <td style="width:50%">
                                 <div id="year_min"  class="inline"></div> 
                                 <div class="slider" id="year_slider"></div>
                                 <div id="year_max"  class="inline"></div>

                                
                                </td>
                            </tr>
                            <tr>
                               <td>
                                    <label for="arrier">Arriers</label>
                                </td>
                                <td style="width:50%">
                                 <div id="arrier_min"  class="inline"></div> 
                                 <div class="slider" id="arrier_slider"></div>
                                 <div id="arrier_max"  class="inline"></div>

                                
                                </td>
                                <td>
                                    <label for="percent">Percentage</label>
                                </td>
                                <td style="width:50%">
                                 <div id="percent_min"  class="inline"></div> 
                                 <div class="slider" id="percent_slider"></div>
                                 <div id="percent_max"  class="inline"></div>

                                
                                </td>
                            </tr>
                            <tr>
                                 <td>
                                    <label for="name">Name</label>
                                </td>
                                <td>
                                    <input class="form-control margin_bottom_10" onkeyup ="load_data();" name="name" placeholder="Student Name"  required>
                                </td>
                                <td>
                                    <label for="cgpa">CGPA</label>
                                </td>
                                <td style="width:50%">
                                 <div id="cgpa_min"  class="inline"></div> 
                                 <div class="slider" id="cgpa_slider"></div>
                                 <div id="cgpa_max"  class="inline"></div>

                                
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="responsive-table">
                        <table id="students_table" class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                            <thead>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Year of Passing</th>
                                <th>Percent</th>
                                <th>Search</th>
                                <th>Arriers</th>
                                 <th>View Profile</th>  
                            </thead>

                            <tfoot>
                                <th>Profile Picture</th>
                                <th>Name</th>
                                <th>Branch</th>
                                <th>Year of Passing</th>
                                <th>Percent</th>
                                <th>Search</th>
                                <th>Arriers</th>
                                <th>View Profile</th> 
                            </tfoot>
                        </table>
                    </div>
                    <div id="result"></div>
                    <br />
                    <br />
                </div>
               
                    
                
               
            </div>

        </div>
        
            

    </div>




</div>
<br />
                    <br />
<div id="profile_div">
                    

             </div>
 <?php $this->load->helper('form');
                 $this->load->helper('url');
                  echo form_open('/exam/viewprofile', array('class' => 'form-register ', 'role' => 'form','method'=>'post','target'=>'_blank' ,  'id'=>'invisible_form' )); ?>

    <input id="target" name="target" type="hidden" value="newtab">
  <input id="id" name="id" type="hidden" value="default">
</form>

<script type="text/javascript">

function load_details (argument,target) {
if(target=="newtab"){
   $('#id').val(argument);
    $('#invisible_form').submit();
    return true;
}
var url="<?php echo base_url();?>index.php/exam/viewprofile";
$.ajax({


             data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>','id':argument,'target':'same'},
              type:'POST',
            url:url,
            success:function(result){
                $('#profile_div').html(result);
            },
            error:function(result){
                $('#profile_div').html(result);
            }
});

}

$(document).ready(function(){
$("#year_slider , #percent_slider , #arrier_slider").on({
    change: function(){
       load_data();
    }
});
});

function load_data(){
var url="<?php echo base_url();?>index.php/exam/search_results";
var name=$('input[name=name]').val();
var branch=$('select[name=branch]').val();
var year_pass_min=$('#year_slider').val()[0];
var year_pass_max=$('#year_slider').val()[1];
var arrier_min=$('#arrier_slider').val()[0];
var arrier_max=$('#arrier_slider').val()[1];
var percent_min=$('#percent_slider').val()[0];
var percent_max=$('#percent_slider').val()[1];

//alert(0);
table = $('#students_table').DataTable();

//here

    table.destroy();
    $('#students_table').dataTable( {
        "dom": 'Rlfrtip',
        
          columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1,2,3,4,5 ]
        } ,
        {
            targets: [ 1 ],
            orderData: [  1 ]
        },
        {
            targets: [ 2 ],
            orderData: [ 2 ]
        },
        {
            targets: [ 3 ],
            orderData: [3 ]
         }//,
        // {
        //     targets: [ 4 ],
        //     orderData: [ 4]
        //  },
        // {
        //     targets: [ 5 ],
        //     orderData: [ 5]
        // }
        ],//<?php echo base_url();?>index.php/exam/search_results
        "ajax": {

             data:{'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',  'branch':branch,'year_pass_min':year_pass_min,'year_pass_max':year_pass_max,'arrier_min':arrier_min,'arrier_max':arrier_max,'percent_min':percent_min,'percent_max':percent_max,'name':name},
            type:'POST',
            url:url
        }
    } );

//here
}


</script>







<script src="<?php echo base_url();?>js/search/jquery.nouislider.all.min.js"></script>
<script>
$("#year_slider").noUiSlider({
    start: [2011, 2015],
    step: 1,
    connect: true,
    format: wNumb({
        mark: ',',
        decimals: 0
    }),
    range: {
        'min': <?php echo $year_minmax[0]["min"]-6 ?>,
        'max': <?php echo $year_minmax[0]["max"] ?>
    }
    
});
$('#year_slider').Link('upper').to($('#year_max'), 'html');
$('#year_slider').Link('lower').to($('#year_min'), 'html');
</script>
<script>
$("#percent_slider").noUiSlider({
    start: [45, 85],
    step:0.10,
    connect: true,
    format: wNumb({
        mark: '.',
        postfix:' %',
        decimals: 2
    }),
    range: {
        'min': 0,
        'max': 100
    }
    
});
$('#percent_slider').Link('upper').to($('#percent_max'), 'html');
$('#percent_slider').Link('lower').to($('#percent_min'), 'html');
</script>
<script>
$("#arrier_slider").noUiSlider({
    start: [0, 5],
    step:1,
    connect: true,
    format: wNumb({
        mark: '.',
        decimals: 0
    }),
    range: {
        'min': 0,
        'max': 30
    }
    
});
$('#arrier_slider').Link('upper').to($('#arrier_max'), 'html');
$('#arrier_slider').Link('lower').to($('#arrier_min'), 'html');
</script>