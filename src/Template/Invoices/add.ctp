<style type="text/css">
.test label {
    padding:10px;
}
label{
    line-height: 35px;
}
</style>
<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <?php
            if($showRecord != 1)
            { ?>
            <div class="box-header with-border hide_print">
                <i class="fa fa-plus"></i> Billing
            </div>
                <?= $this->Form->create('',['class'=>'loadingshow','id'=>'CityForm']) ?>
                <div class="box-body hide_print" >
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Invoice Type</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('invoice_type_id',['label' => false,'class' => 'form-control','options'=>$invoiceTypes,'autocomplete'=>'off']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Customer Name</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('customer_id',['label' => false,'class' => 'form-control select2','empty'=>'Select Customer...','options'=>$customers,'autocomplete'=>'off']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Payment Type</label>
                        </div>
                        <div class="col-md-4 ">
                            <?php 
                            $opt['Cash']='Cash';
                            $opt['Credit']='Credit';
                            echo $this->Form->control('payment_type',['label' => false,'class' => 'form-control','options'=>$opt,'autocomplete'=>'off']); ?>
                        </div>
                    </div>
                    <span class="help-block"></span>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label"> Billed Complimenatry Charges</label>
                        </div>
                        <div class="col-md-4 test">
                         <?php
                            echo $this->Form->radio(
                            'complimenatry_status',
                            [
                                ['value' => 1, 'text' => ' Yes '],
                                ['value' => 0, 'text' => ' No ','checked'],   
                            ],
                            ['class'=>'']
                            ); ?>
                        </div>
                    </div>
                    <span class="help-block"></span> 
                    <div class="row">
                        <div class="col-md-3">
                            <label class="control-label">Remarks </label>
                        </div>
                        <div class="col-md-4">
                            <?php echo $this->Form->control('remarks',['label' => false,'class' => 'form-control','placeholder'=>'Remarks','autocomplete'=>'off']);?> 
                        </div>
                    </div>
                    <span class="help-block"></span>
                </div>
            
                <div class="box-footer">
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-offset-1 col-md-6">  
                                    <?php echo $this->Form->button('Process',['class'=>'btn btn-success','name'=>'searchDS','value'=>'1']); ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
                <?= $this->Form->end() ?>
            <?php 
            }
            else{ 
                    $date = date('d-m-Y');
                ?>
                <?= $this->Form->create($invoice,['class'=>'loadingshow','id'=>'CityForm']) ?>
                <div class="box-header with-border hide_print">
                    <i class="fa fa-plus"></i> Result of <?= $customerData->name;?>
                </div>
                <div class="box-body">
                   <table width="100%" class="table table-bordered table"  style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>Invoice Type</th>
                            <th colspan="3">Customer Name</th>
                            <th>Date</th>
                            <th>Payment Type</th>
                            <th colspan="3">Remarks</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><?php echo $invoiceTypeData->name; ?></td>
                            <td colspan="3"><?= $customerData->name;?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $payment_type; ?></td>
                            <td colspan="3"><?php echo $remarks; ?></td>
                        </tr>
                        <?php $k=0;
                        foreach ($dutySlipData as $dutySlip) { 
                            $k++;
                            ?>
                            <tr>
                                <td colspan="9" style="text-align: center;">-------------------------------Duty------------------------------------</td>
                            </tr>
                            <tr>
                                <th>DS No.</th>
                                <th>Guest Name</th>
                                <th>Car</th>
                                <th>Service</th>
                                <th>Car Number</th>
                                <th>Open. KM</th>
                                <th>Clos. KM</th>
                                <th>Total Ch.</th>
                                <th style="text-align:center;">Process ?</th>
                            </tr>
                            <tr id="fillme<?php echo $k; ?>">
                                <td><a class="tooltips" data-placement="bottom" title="Edit Duty Slip From Here" target="_blank"><?php echo $dutySlip->id; ?></a></td>
                                <td><?php echo $dutySlip->guest_name; ?></td>
                                <td><?php echo @$dutySlip->car_type->name; ?></td>
                                <td><?php echo @$dutySlip->service->name; ?></td> 
                                <td><?php echo @$dutySlip->car->name; ?></td> 
                                <td><?php echo $dutySlip->opening_km; ?></td>
                                <td><?php echo $dutySlip->closing_km; ?></td>
                                <td><?php echo $dutySlip->tot_amnt; ?></td>
                                <td style="text-align:center;"><label><input type="checkbox" class="roomselect" id="check<?php echo $k; ?>"  name="ds_idd<?php echo $k; ?>" onClick="amount_validation(this.id),cal_amount();" value="<?php echo $dutySlip->id; ?>"/></label></td>  
                            </tr>
                            <?php 
                            if(!empty($dutySlip->extra))
                            {
                                $extra_rate=ceil($dutySlip->extra_amnt/$dutySlip->extra_details);
                                ?>
                                <tr id="fillme_sub<?php echo $k; ?>">
                                    <td colspan="4">&nbsp;</td>
                                    <th>Extra <?php echo $dutySlip->extra; ?></th>
                                    <td>
                                        <?php echo $this->Form->control('extra'.$k,['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>$dutySlip->extra_details,'id'=>'extra'.$k,'onKeyUp'=>'GetExtraChargeKM(this.value,'.$k.')']); ?>  
                                    </td>
                                    <td>
                                        <?php echo $this->Form->control('extra_amnt'.$k,['label' => false,'class' => 'form-control  firstupercase','autocomplete'=>'off','type'=>'text','value'=>$dutySlip->extra_amnt,'id'=>'extra_amnt'.$k]); ?> 
                                    </td>
                                    <td colspan="2">
                                        <?php echo $this->Form->hidden('extrarate'.$k , ['label' => false,'value' => $extra_rate,'id'=>'extrarate'.$k]); ?> 
                                    </td>
                                </tr>
                            <?php
                            }
                            else
                            {
                                echo $this->Form->hidden('fillme_sub'.$k , ['label' => false]);
                                echo $this->Form->hidden('extra'.$k , ['label' => false,'value' => $dutySlip->extra_rate,'id'=>'extra'.$k,'onKeyUp'=>'GetExtraChargeKM(this.value,'.$k.')','value'=>$dutySlip->extra_details,]);

                                echo $this->Form->hidden('extra_amnt'.$k , ['label' => false,'value' => $dutySlip->extra_rate,'id'=>'extra_amnt'.$k]);

                                echo $this->Form->hidden('extrarate'.$k , ['label' => false,'value' => $dutySlip->extra_rate,'id'=>'extrarate'.$k]); 
                            }
                            echo $this->Form->hidden('main_amnt'.$k , ['label' => false,'value' => $dutySlip->tot_amnt,'id'=>'main_amnt'.$k]); 

                            echo $this->Form->hidden('extra_chg'.$k , ['label' => false,'value' => $dutySlip->extra_chg,'id'=>'extra_chg'.$k]);

                            echo $this->Form->hidden('permit_chg'.$k , ['label' => false,'value' => $dutySlip->permit_chg,'id'=>'permit_chg'.$k]);

                            echo $this->Form->hidden('parking_chg'.$k , ['label' => false,'value' => $dutySlip->parking_chg,'id'=>'parking_chg'.$k]);

                            echo $this->Form->hidden('otherstate_chg'.$k , ['label' => false,'value' => $dutySlip->otherstate_chg,'id'=>'otherstate_chg'.$k]); 

                            echo $this->Form->hidden('guide_chg'.$k , ['label' => false,'value' => $dutySlip->guide_chg,'id'=>'guide_chg'.$k]);

                            echo $this->Form->hidden('misc_chg'.$k , ['label' => false,'value' => $dutySlip->misc_chg,'id'=>'misc_chg'.$k]);

                            echo $this->Form->hidden('fuel_hike_chg'.$k , ['label' => false,'value' => $dutySlip->fuel_hike_chg,'id'=>'fuel_hike_chg'.$k]); 
                        }
                            ?> 
                            <!-- Tax Data -->
                            <?php 
                            echo $this->Form->hidden('count', ['label' => false,'value' => $k,'id'=>'count']);

                            echo $this->Form->hidden('discout_final', ['label' => false,'id'=>'discout_final']);
                            ?>

                            <tr>
                                <th colspan="8" class="centerme">Total</th>
                                <td>
                                    <?php echo $this->Form->control('total',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'total','readonly']); ?>  
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="centerme" style="padding-left: 17%;">Discount</th>
                                <td colspan="2" class="test">
                                    <?php
                                        echo $this->Form->radio(
                                        'discount',
                                        [
                                            ['value' => 1, 'text' => ' Per ','onClick'=>'cal_amount()'],
                                            ['value' => 0, 'text' => ' Amount ','checked','onClick'=>'cal_amount()'],   
                                        ],
                                        ['class'=>'']
                                        ); 
                                    ?>   
                                <td>
                                    <?php echo $this->Form->control('discount',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'discount','onClick'=>'cal_amount()','required']); ?> 
                                </td>
                            </tr>
                            <tr>
                                <th colspan="8" class="centerme">Other Charges</th>
                                <td>
                                    <?php echo $this->Form->control('other_charges',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'other_charges','readonly']); ?>  
                                </td>
                            </tr> 

                            <!-- Tax List and taxt box -->

                            <tr>
                                <th colspan="8" class="centerme">Grand Total</th>
                                <td>
                                    <?php echo $this->Form->control('grand_total',['label' => false,'class' => 'form-control','autocomplete'=>'off','type'=>'text','value'=>0,'id'=>'grand_total','readonly']); ?>   
                                </td>
                            </tr>
                            <tr>
                                <td colspan="9" style="text-align:center">
                                     <?php echo $this->Form->button('Submit',['class'=>'btn btn-success','name'=>'invoiceReg','value'=>'2']); ?>
                                </td>
                            </tr>
                        </table>

                </div>
                <?= $this->Form->end() ?>
            <?php
            }
            ?>
        </div> 
    </div>   
</section>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?> 
<script>
jQuery(".loadingshow").submit(function(){
    jQuery("#loader-1").show();
});   
</script> 