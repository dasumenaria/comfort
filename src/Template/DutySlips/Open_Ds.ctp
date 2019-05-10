
<section class="content">
    <?php
            if($RecordShow != 1)
            {
                ?>

            <?php
            }
            else
            {?>
         <div>
            <a href="" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            
            <button class="btn btn-warning" onclick="prints()"><i class="fa fa-print" aria-hidden="true"></i></button>
            
            <button class="btn btn-danger "><i class="fa fa-download " aria-hidden="true"></i></button>
        </div>
        <span class="help-block"></span>
        <?php
            }
            ?>
         
<div class="row">

    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i>Open DS
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
            <?= $this->Form->create('df',['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                        <div class="col-md-12">
                        <div class="col-md-12 space">
                            <div class="col-md-12 ">
                                <label class="control-label col-sm-4">Customer Name:</label>
                                <div class="col-sm-4">
                                   
                                <?php echo $this->Form->control('',['label' => false,'class' => 'select2 ','options'=>$opends,'empty'=>'Select...','autocomplete'=>'off']); ?> 
                                </div>
                            </div> 
                        </div>
                    </div>
                </div> 
            </div>
        <div class="box-footer">
            <div class="row">
                <center>
                    <div class="col-md-12">
                        <div class="col-md-offset-3 col-md-6">  
                            <?php echo $this->Form->button('Generate',['class'=>'btn btn-success','id'=>'submit_member']); ?>
                        </div>
                    </div>
                </center>       
            </div>
        </div>
        <?= $this->Form->end() ?>

        <?php 
            }
            else{ ?>
            
        <table class="table table-bordered table-striped">
            <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('DS No .') ?></th> 
                            <th><?=  ('Customer Name') ?></th>
                            <th><?=  ('Guest Name') ?></th>
                            <th><?=  ('Service') ?></th>
                            <th><?=  ('Car') ?></th>
                            <th><?=  ('Car No.') ?></th>
                            <th><?=  ('Opening KM') ?></th>
                            <th><?=  ('Closing KM') ?></th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($opends as $city):
                            
                        ?>  
                        <tr>
                            
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                            
                    
            </table>
        <?php
            }
            ?>
            </div> 
        </div>  
    </div>
</div>
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
}); 
$(document).ready(function() {
    
         
     $("#CityForm").validate({ 
        rules: {
            name: {
                required: true, 
            }, 
             
             
        },
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

});
</script>

<script type="text/javascript">
    function prints() {
        window.print();
    }
</script>