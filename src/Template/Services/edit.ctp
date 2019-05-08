<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php 
                $updt_id=$service->id;
                if(!empty($updt_id)){ ?>
                    <i class="fa fa-pencil-square-o"></i> Edit Service
                    <!-- <div class="pull-right">
                       <?php echo $this->Html->link('<i class="fa fa-plus"></i>',['action' => 'add'],array('escape'=>false,'class'=>'btn btn-xs btn-info')); ?>  
                    </div> -->
                <?php }else{ ?>
                    <i class="fa fa-plus"></i> Add Service
                <?php } ?>

            </div>
            <div class="box-body">
                <div class=" "> 
                <?= $this->Form->create($service,['id'=>'CityForm']) ?> 
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label"> Name <span class="required" aria-required="true"> * </span></label>
                        </div>
                        <div class="col-md-4">
                            <?= $this->Form->control('name',['class'=>'form-control','placeholder'=>'Name','type'=>'text','label'=>false]) ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-2">
                            <label class="control-label"> Service Type <span class="required" aria-required="true"> * </span></label>
                        </div>
                        <div class="col-md-4">
                            <?php 
                            $option['intercity']='Intercity';
                            $option['incity']='Incity';
                            ?>
                            <?= $this->Form->control('type',['class'=>'form-control serviceType','label'=>false,'empty'=>'Select...','options'=>$option]) ?>
                        </div>
                    </div>
                    <span class="help-block"></span> 
                    <?= $this->Form->hidden('sac_code',['id'=>'sac_code','type'=>'text','label'=>false]) ?>
                    <div class="box-footer">
                        <div class="row">
                            <center>
                                <div class="col-md-10">
                                    <div class="col-md-offset-3 col-md-6">  
                                        <?php echo $this->Form->button('Submit',['class'=>'btn btn-primary','id'=>'submit_member']); ?>
                                    </div>
                                </div>
                            </center>       
                        </div>
                    </div>
                <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div> 
</div>
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
$(document).ready(function() {
        var $rows = $('#main_tble tbody tr');
    $('#search3').on('keyup',function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
        var v = $(this).val();
        if(v){ 
            $rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
    
                return !~text.indexOf(val);
            }).hide();
        }else{
            $rows.show();
        }
    });
});
</script>
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
}); 
$(document).ready(function() {
    $(document).on('change','.serviceType',function(){
        var selected = $('option:selected', this).val();
        var newVal = '996412';
        if(selected == 'intercity'){
            newVal = '996423';
        } 
        $('#sac_code').val(newVal); 
    });
    $.validator.addMethod("specialChars", function( value, element ) {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = value;

        if (!regex.test(key)) {
           return false;
        }
        return true;
    }, "please use only alphabetic characters");
    $("#CityForm").validate({ 
        rules: {
            name: {
                required: true,
                specialChars: true
            },
            type: {
                required: true
            } 
        },
        
        submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
        }
    }); 

});
</script>