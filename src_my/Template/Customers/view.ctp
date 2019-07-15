<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Customer View
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($customer->name) ?></td> 
                        <th scope="row"><?= __('Address') ?></th>
                        <td><?= h($customer->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact Person') ?></th>
                        <td><?= h($customer->Contact_person) ?></td> 
                        <th scope="row"><?= __('Office No.') ?></th>
                        <td><?= h($customer->office_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Residence No.') ?></th>
                        <td><?= h($customer->Residence_no) ?></td> 
                        <th scope="row"><?= __('Email Id') ?></th>
                        <td><?= h($customer->email_id) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Fax No.') ?></th>
                        <td><?= h($customer->fax_no) ?></td> 
                        <th scope="row"><?= __('Srvctaxregno') ?></th>
                        <td><?= h($customer->srvctaxregno) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Pan No.') ?></th>
                        <td><?= h($customer->panno) ?></td> 
                        <th scope="row"><?= __('Creditlimit') ?></th>
                        <td><?= h($customer->creditlimit) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Block Status') ?></th>
                        <td><?= h($customer->block_status) ?></td> 
                        <th scope="row"><?= __('Service Tax Status') ?></th>
                        <td><?= h($customer->servicetax_status) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Gst Number') ?></th>
                        <td><?= h($customer->gst_number) ?></td> 
                        <th scope="row"><?= __('State') ?></th>
                        <td><?= h($customer->state) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('City') ?></th>
                        <td><?= h($customer->city) ?></td>  
                        <th scope="row"><?= __('Mobile No') ?></th>
                        <td><?= h($customer->mobile_no) ?></td> 
                    </tr>
                    <tr> 
                        <th scope="row"><?= __('Opening Bal') ?></th>
                        <td><?= $this->Number->format($customer->opening_bal) ?></td>
                        <th scope="row"><?= __('Credit Debit') ?></th>
                        <td><?= $customer->credit_debit?></td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
</div>
</section>
