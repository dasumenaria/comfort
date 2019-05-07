<section class="content">
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <?php 
                        $updt_id=$supplierType->id;
                        if(!empty($updt_id)){ ?>
                            <i class="fa fa-pencil-square-o"></i> Edit Supplier Type
                        <?php }else{ ?>
                            <i class="fa fa-plus"></i> Add Supplier Type
                        <?php } ?>
            </div>
            <div class="box-body">
                <div class=" "> 
                <?= $this->Form->create($supplierType,['id'=>'CityForm']) ?> 
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="control-label">Supplier Type <span class="required" aria-required="true"> * </span></label>
                        </div>
                        <div class="col-md-8">
                            <?= $this->Form->control('name',['class'=>'form-control','placeholder'=>'Supplier Name','type'=>'text','label'=>false]) ?>
                        </div>
                    </div>
                    <span class="help-block"></span>  
                     
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
                View List
            </div> 
             
            <div class="box-body">
                <?php

                $page_no = $page_no*10;
                ?>
                <table class="table table-bordered table-condensed" id="main_tble">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sr.no') ?></th> 
                            <th><?=  ('Name') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($supplierTypeList as $city):
                            @$k++;
                        ?>
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->name) ?></td>
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
    // validate signup form on keyup and submit
   
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
            state_id: {
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