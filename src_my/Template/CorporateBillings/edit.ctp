<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary"> 
                <div class="box-header with-border">
                    <i class="fa fa-plus"></i> Edit Corporate Billing
                </div>
            <?= $this->Form->create($corporateBilling,['type'=>'file','id'=>'CityForm']) ?>
            <div class="box-body" >
                <div class="row">
                    <div class="">
                         <div class="col-md-12">
                            <div class="col-md-12 space">
                                <div>
                                    <b>CUSTOMER DETAIL:</b>
                                </div>
                                    <div class="col-md-6 space">
                                        <label class="control-label col-sm-4">Customer Name</label>
                                        <div class="col-sm-8">
                                            <?php echo $this->Form->control('customer_name' , ['label' => false,'class' => 'form-control ','empty'=>'Select...','options'=>$customerList,'autocomplete'=>'off']); ?>
                                        </div>
                                    </div> 

                                    <div class="col-md-6 space">
                                        <label class="control-label col-sm-4">  Name of Guest</label>
                                        <div class="col-sm-8">
                                        
                                       <?php echo $this->Form->control('guest_name',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Name of Guest','autocomplete'=>'off']); ?> 
                                        
                                        </div>
                                    </div>
                            </div> 
                <div class="col-md-12 space">
                    <div class="col-md-6 ">
                        <label class="control-label col-sm-4">REF. </label>
                        <div class="col-sm-8">
                            <?php echo $this->Form->control('ref',['label' => false,'class' => 'form-control firstupercase','autocomplete'=>'off','type'=>'text']); ?> 
                        </div>
                    </div> 
                    <div class="col-md-6 ">
                        <label class="control-label col-sm-4">  Date</label>
                        <div class="col-sm-8">
                        <?php echo $this->Form->control('date',['label' => false,'class' => 'form-control datepickers firstupercase','placeholder'=>'dd-mm-yy','type'=>'text','autocomplete'=>'off','data-date-format'=>'dd-mm-yyyy']); ?> 
                        </div>
                    </div>
                </div> 

                <div class="col-md-12 space">
                    <b>SERVICES DETAIL:</b>
                </div>

                <div class="col-md-12">
                    <table id="parant_table2" class="table table-bordered table-hover table-condensed ">
                     <thead>
                        <tr style="table-layout: fixed;">
                            <th style="width: 12%"><?=  ('DATE') ?></th> 
                            <th><?=  ('SERVICE NAME/HOURS') ?></th>
                            <th style="width: 13%;"><?=  ('RATE (RS)') ?></th>
                            <th style="width: 12%;"> <?=  ('NO. OF DAYS') ?></th>
                            <th><?=  (' TAXI No. / GUIDE Tkt. No.') ?></th>
                            <th><?=  ('Amount') ?></th>
                            <th class="actions text-center"><?= __('Action') ?></th>
                        </tr>
                    </thead>
                    <tbody class="parant_table2">
                        <tr>
                            <td>
                            <?php echo $this->Form->control('service_date[]',['label' => false,'class' => 'form-control datepickers firstupercase','placeholder'=>'dd-mm-yy','type'=>'text','data-date-format'=>'dd-mm-yyyy','autocomplete'=>'off']); ?> 
                            </td>
                            <td>
                            <?php echo $this->Form->control('service[]',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Service Name','autocomplete'=>'off']); ?> 
                            </td>
                            <td>
                             <?php echo $this->Form->control('rate[]',['label' => false,'class' => 'form-control rate colamount','placeholder'=>'Rate','autocomplete'=>'off']); ?> 
                            </td>
                            <td>
                             <?php echo $this->Form->control('no_of_days[]',['label' => false,'class' => 'form-control nod colamount','placeholder'=>'No. of Days','autocomplete'=>'off']); ?> 
                            </td>
                            <td>
                            
                            <?php echo $this->Form->control('taxi_no[]',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'TAXI/Guide No.','autocomplete'=>'off']); ?> 
                            </td>
                            <td>
                                <?php echo $this->Form->control('amount[]',['label' => false,'class' => 'form-control amt firstupercase','placeholder'=>'Amount','autocomplete'=>'off','id'=>'output','readonly']); ?> 
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                           <td colspan="4"></td>
                           <th>TOTAL AMOUNT</th>
                           <td>
                            <?php echo $this->Form->control('tot_amnt',['label' => false,'class' => 'form-control total_amt firstupercase','autocomplete'=>'off','placeholder'=>'Total Amount','readonly']); ?> 
                           </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <th>DISCOUNT</th>
                            <td>
                                <?php echo $this->Form->control('discount',['label' => false,'class' => 'form-control discount colamount firstupercase','autocomplete'=>'off','placeholder'=>'₹']); ?> 
                           </td>
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <td>
                                <b style="float: left;">SERVICE TAX</b>
                                <?php echo $this->Form->control('tax',['label' => false,'class' => 'form-control tax colamount','autocomplete'=>'off','style'=>'width:27%; float:right','placeholder'=>'%']); ?> 
                            </td>
                            <td>
                                <?php echo $this->Form->control('service_tax',['label' => false,'class' => 'form-control service_tax firstupercase','autocomplete'=>'off','placeholder'=>'Service Tax','readonly']); ?> 
                           </td>    
                        </tr>

                        <tr>
                            <td colspan="4"></td>
                            <th>NET AMOUNT</th>
                            <td>
                                <?php echo $this->Form->control('net_amnt',['label' => false,'class' => 'form-control net_amnt colamount','autocomplete'=>'off','placeholder'=>'Net Amount','readonly']); ?> 
                           </td>
                            
                        </tr>

                        <tr>
                            <td colspan="7">
                                
                                <?php echo $this->Form->button('Save Changes',['class'=>'btn btn-primary','id'=>'submit_member']); ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
</div> 
</div>
        <div class="box-footer">
            <div class="row">

            </div>
        </div>
            <?= $this->Form->end() ?>
            <table id="sample2" style="display: none;">
                <tbody>
                    <?php
                    foreach ($corporateBilling  as $data) {?>
                    <tr>
                        <td>
                        <?php echo $this->Form->control('service_date[]',['label' => false,'class' => 'form-control datepickers firstupercase','placeholder'=>'dd-mm-yy','type'=>'text','data-date-format'=>'dd-mm-yyyy','autocomplete'=>'off']); ?> 
                        </td>
                        <td>
                        <?php echo $this->Form->control('service[]',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'Service Name','autocomplete'=>'off']); ?> 
                        </td>
                        <td>
                         <?php echo $this->Form->control('rate[]',['label' => false,'class' => 'form-control colamount rate','placeholder'=>'Rate','autocomplete'=>'off']); ?> 
                        </td>
                        <td>
                         <?php echo $this->Form->control('no_of_days[]',['label' => false,'class' => 'form-control colamount nod','placeholder'=>'No. of Days','autocomplete'=>'off']); ?> 
                        </td>
                        <td>
                        
                        <?php echo $this->Form->control('taxi_no[]',['label' => false,'class' => 'form-control  firstupercase','placeholder'=>'TAXI/Guide No.','autocomplete'=>'off']); ?> 
                        </td>
                        <td>
                            <?php echo $this->Form->control('amount[]',['label' => false,'class' => 'form-control amt ','placeholder'=>'Amount','autocomplete'=>'off','readonly']); ?> 
                        </td>

                        <td>
                            <?php echo $this->Form->button('',['class'=>'btn btn-danger btn-xs fa fa-trash  remove_row2','id'=>'submit_member','type'=>'button']); ?>
                        </td>
                    </tr>
                    <?php
                    }
                     ?>
                 </tbody>
                        </table>
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

        $(document).on('click','.add_row2',function(){

        var new_line=$("#sample2 tbody").html();
        $("#parant_table2 tbody.parant_table2").append(new_line); 
        $(".datepickers").datepicker();     
        });

        $(document).on("click", ".remove_row2", function(){
            $(this).closest("#parant_table2 tr").remove();
        });

        $(document).on("keyup", ".colamount", function() {
            colAmountCalc();
        });
        $(document).on("click", ".remove_row2", function() {
            colAmountCalc();
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
            }, 


            },

            submitHandler: function () {
            $("#submit_member").attr('disabled','disabled');
            $("#loader-1").show();
            form.submit();
            }
        }); 



});
function colAmountCalc(){
    var sum = 0; 
    $('tbody.parant_table2 tr').each(function(){

        var rate = $(this).closest("tr").find('.rate').val();
        var nod = $(this).closest("tr").find('.nod').val();
        var amt = rate * nod;
        $(this).closest("tr").find('.amt').val(amt);
        sum += amt;
    });
    $(".total_amt").val(sum);


    var amount =  sum;
    var discount = $('.discount').val();
    var tax = $('#tax').val();

    var total_amt = parseInt(sum);
    var service_tax = parseInt($('.service_tax').val());
    
    var calc_discount = amount - discount;
    
    var percentage =  calc_discount*tax/100;

    var net_amnt = calc_discount + percentage;
    
    if (percentage == Number.POSITIVE_INFINITY || percentage == Number.NEGATIVE_INFINITY || isNaN(percentage))
        percentage = "N/A"; // OR 0
        $('.service_tax').val(percentage);           
        $('.net_amnt').val(net_amnt);

    
}
</script>
