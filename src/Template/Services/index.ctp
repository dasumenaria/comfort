<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php 
                $updt_id=$services->id;
                if(!empty($updt_id)){ ?>
                    <i class="fa fa-pencil-square-o"></i> Edit Service
                    <div class="pull-right">
                       <?php echo $this->Html->link('<i class="fa fa-plus"></i>',['action' => 'index'],array('escape'=>false,'class'=>'btn btn-xs btn-info')); ?>  
                    </div>
                <?php }else{ ?>
                    <i class="fa fa-plus"></i> Add Service
                <?php } ?>

            </div>
            <div class="box-body">
                <div class=" "> 
                <?= $this->Form->create($services,['id'=>'CityForm']) ?> 
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label"> Name <span class="required" aria-required="true"> * </span></label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('name',['class'=>'form-control','placeholder'=>'Name','type'=>'text','label'=>false]) ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label"> Service Type <span class="required" aria-required="true"> * </span></label>
                        </div>
                        <div class="col-md-8">
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
                                <div class="col-md-12">
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
    
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <b>View List</b> 
                <div class="box-tools pull-right">
                    <input type="text" class="form-control pull-right" placeholder="Search..." id="search3"  style="width: 200px;">
                </div> 
            </div> 
             
            <div class="box-body">
                <?php

                $page_no = $page_no*20;
                ?>
                <table class="table table-bordered table-condensed" id="main_tble">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sr.no') ?></th> 
                            <th><?=  ('Name') ?></th>
                            <th><?=  ('Type') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($servicesList as $city):
                            @$k++;
                        ?>
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->name) ?></td>
                            <td><?= h($city->type) ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'index', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info')); ?>
                                <!-- <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                <div id="deletemodal<?php echo $city->id; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md" >
                                        <form method="post" action="<?php echo $this->Url->build(array('controller'=>'Counters','action'=>'delete',$city->id)) ?>">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">
                                                    Are you sure you want to remove this Counter?
                                                    </h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn  btn-sm btn-info">Yes</button>
                                                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
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