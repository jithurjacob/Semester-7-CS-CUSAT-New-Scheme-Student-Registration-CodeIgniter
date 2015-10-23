<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                 
                <div class="home_steps well text-justify noborder">
                    <h2>Offers</h2>
                    <br />
                    <br />
                    <?php if(count($offers_data)>0) {?>
                     <div class="responsive-table">
                    <table class="table table-striped table-condense table-hover table-bordere text-left verify_table">
                    <thead>
                       <th>Company Name</th>
                       <th>Message Body</th>
                      
                    </thead>
                    <?php foreach ($offers_data as $offer):?>
                    <tr>
<td><?php echo( $offer['company_username']); ?></td>
<td><?php echo( $offer['description']); ?></td>
 
                    </tr>
                <?php endforeach; ?>

                    </table>
                    </div>
                    <?php }else{?>
                    <h4>Sorry,you havn't received any offers yet.Please check again later.</h4>
                    <br>
                    <br>
                    <?php }?>
                    

                </div>
            </div>
            
        </div>


    </div>

</div>