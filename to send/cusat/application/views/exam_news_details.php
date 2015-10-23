<div class="middle">
    <div class="container">

        <div class="row about">
            <div id="container_id" class="col-md-12">
                <div class="home_steps well text-justify noborder">
                    <h2>News</h2>
                    <br />
                    <br />
                    


                        <?php foreach ($news_data as $var): ?>
                        <div>
                        <h4>
                            
                                <?php echo $var[ 'title'];?>

                          
                        </h4>
                        <h5>
                            
                                <?php echo $var[ 'desc'];?>

                          
                        </h5>
                        </div>
                        <br>
                        <br>
                        <?php endforeach;?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
