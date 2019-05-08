<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Car <?= $displayName;?>
            </div>
            <?php
            if($RecordShow != 1)
            {
                ?>
                <?= $this->Form->create('',['type'=>'file','id'=>'CityForm']) ?>
                <div class="box-body" >
                    <div class="row">
                        <div class="">
                            <div class="col-md-12">
                            <div class="form-group col-md-4">
                                <label class="control-label">Car</label>
                                <?php echo $this->Form->control('car_type_id' , ['label' => false,'class' => 'select2  supplierType','empty'=>'Select...','options'=>$carTypes,'autocomplete'=>'off']); ?>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Vehicle Number</label>
                                <?php echo $this->Form->control('name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Vehicle Number','autocomplete'=>'off']); ?> 
                            </div>

                            <div class="form-group col-md-4">
                                <label class="control-label">Supplier Name:</label>
                                <?php echo $this->Form->control('supplier_id',['label' => false,'class' => 'form-control select2  firstupercase','options' => $suppliers,'empty'=>'Select...','autocomplete'=>'off']); ?>
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
                                    <?php echo $this->Form->button('Submit',['class'=>'btn btn-primary','id'=>'submit_member']); ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
                <?= $this->Form->end() ?>
            <?php 
            }
            else{ ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr style="table-layout: fixed;">
                            <th><?=  ('Sl.') ?></th> 
                            <th><?=  ('Car') ?></th>
                            <th><?=  ('Vehicle Number') ?></th>
                            <th><?=  ('Supplier Name') ?></th>
                            <th><?=  ('Insurance Date Start') ?></th>
                            <th><?=  ('Insurance Date End') ?></th>
                            <th class="actions text-center"><?= __('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $page_no=0; foreach ($carsList as $city):
                            @$k++;
                        ?>
                        <tr>
                            <td><?= h(++$page_no) ?></td> 
                            <td><?= h($city->car_type->name) ?></td>
                            <td><?= h($city->name) ?></td>
                            <td><?= h($city->supplier->name) ?></td>
                            <td><?= h($city->insurance_date_from) ?></td>
                            <td><?= h($city->insurance_date_to) ?></td>
                            <td  class="actions text-center">
                                <?php if($type == 'edt') { ?>
                                <?php echo $this->Html->link('<i class="fa fa-pencil-square-o"></i>',['action' => 'edit', $city->id],array('escape'=>false,'class'=>'btn btn-xs btn-info')); ?>
                            <?php } if($type == 'del') {?>
                                <a class=" btn btn-danger btn-xs" data-target="#deletemodal<?php echo $city->id; ?>" data-toggle=modal><i class="fa fa-trash"></i></a>
                                
                            <?php } if($type == 'ser') {}?>

                            </td>
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
                                                        'controller' => 'Cars',
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
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div> 
    </div>   
</section>