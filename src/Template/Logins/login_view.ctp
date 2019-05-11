<section class="content">
<div class="row"> 
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                View Rights 
                <!-- <div class="box-tools pull-right">
                    <input type="text" class="form-control pull-right" placeholder="Search..." id="search3"  style="width: 200px;">
                </div> --> 
            </div> 
             
            <div class="box-body">
                 <table class="table table-bordered table-condensed" id="main_tble">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sr.no') ?></th> 
                            <th><?=  ('Username') ?></th>
                            <th><?=  ('Login-Id') ?></th>
                            <th><?=  ('Designation') ?></th>
                            <th><?=  ('Ledger View') ?></th>
                            <th><?=  ('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($loginList as $city):
                            @$k++;
                        ?>
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->username) ?></td>
                            <td><?= h($city->name) ?></td>
                            <td><?= h($city->counter->name) ?></td>
                            <td><?= h($city->ldrview) ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'edit', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info')); ?>
                                <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                <div id="deletemodal<?php echo $city->id; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md" > 
                                        <div class="modal-content">
                                          <div class="modal-header" style=" background-color: #5ea3af;color:#fff;">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title" >
                                                    &nbsp; Stay Attention
                                                </h4>
                                            </div>
                                            <div class="modal-body">
                                                <h4>
                                                &nbsp; Are you sure you want to remove this Record ?
                                                </h4>
                                            </div>
                                            <div class="modal-footer">
                                                <?= $this->Form->postLink('Yes', array(
                                                        'controller' => 'Logins',
                                                        'action' => 'delete',$city->id
                                                    ), array(
                                                       'class' => 'btn btn-sm btn-info'
                                                    ));
                                                ?>
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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