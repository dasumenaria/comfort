<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Supplier View
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Supplier Type:') ?></th>
                        <td><?= h($supplier->supplier_type->name) ?></td> 
                        <th scope="row"><?= __('Supplier Category:') ?></th>
                        <td><?= h($supplier->mobile_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Supplier Name :') ?></th>
                        <td><?= h($supplier->name) ?></td> 
                        <th scope="row"><?= __('Address:') ?></th>
                        <td><?= h($supplier->address) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Contact Name:') ?></th>
                        <td><?= h($supplier->contact_name) ?></td> 
                        <th scope="row"><?= __('Office Number:') ?></th>
                        <td><?= h($supplier->office_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Residence Number:') ?></th>
                        <td><?= h($supplier->residence_no) ?></td> 
                        <th scope="row"><?= __('Mobile Number') ?></th>
                        <td><?= h($supplier->mobile_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Fax Number:') ?></th>
                        <td><?= h($supplier->fax_no) ?></td> 
                        <th scope="row"><?= __('Opening Balance:') ?></th>
                        <td><?= h($supplier->opening_bal) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Closing Balance:') ?></th>
                        <td><?= h($supplier->closing_bal) ?></td> 
                        <th scope="row"><?= __('Due Days:') ?></th>
                        <td><?= h($supplier->due_days) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Service Tax Number:') ?></th>
                        <td><?= h($supplier->servicetax_no) ?></td> 
                        <th scope="row"><?= __('Pan Number') ?></th>
                        <td><?= h($supplier->pan_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Bank Account Number:') ?></th>
                        <td><?= h($supplier->account_no) ?></td>  
                        <th scope="row"><?= __('Service Tax Applicable') ?></th>
                        <td><?= h($supplier->servicetax_status) ?></td> 
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
</div>
</section>
