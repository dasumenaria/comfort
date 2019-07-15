<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Car View
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Car Name') ?></th>
                        <td><?= h($car->car_type->name) ?></td> 
                        <th scope="row"><?= __('Car Number') ?></th>
                        <td><?= h($car->car_type->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Supplier Name :') ?></th>
                        <td><?= h($car->supplier->name) ?></td> 
                        <th scope="row"><?= __('Engine Number') ?></th>
                        <td><?= h($car->engine_no) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Chasis No') ?></th>
                        <td><?= h($car->chasis_no) ?></td> 
                        <th scope="row"><?= __('RTO Tax Date') ?></th>
                        <td><?= h($car->rto_tax_date) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Insurance Starting Date') ?></th>
                        <td><?= h($car->insurance_date_from) ?></td> 
                        <th scope="row"><?= __('Insurance Ending Date') ?></th>
                        <td><?= h($car->insurance_date_to) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Authorization Date') ?></th>
                        <td><?= h($car->authorization_date) ?></td> 
                        <th scope="row"><?= __('Permit Date') ?></th>
                        <td><?= h($car->permit_date) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Fitness Date') ?></th>
                        <td><?= h($car->fitness_date) ?></td> 
                        <th scope="row"><?= __('PUC Date') ?></th>
                        <td><?= h($car->puc_date) ?></td>
                    </tr>
              </table>
            </div>
        </div>
    </div>
</div>
</section>
