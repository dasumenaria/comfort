<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Supplier Tariff View
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                    <tr>
                        <th scope="row"><?= __('Service Name') ?></th>
                        <td><?= h($supplierTariff->service->name) ?></td> 
                        <th scope="row"><?= __('Car Name') ?></th>
                        <td><?= h($supplierTariff->car_type->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Supplier Name :') ?></th>
                        <td><?= h($supplierTariff->supplier->name) ?></td> 
                        <th scope="row"><?= __('Minimum Charge km.:') ?></th>
                        <td><?= h($supplierTariff->minimum_chg_km) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Extra km rate') ?></th>
                        <td><?= h($supplierTariff->extra_km_rate) ?></td> 
                        <th scope="row"><?= __('Minimum Charge Hourly') ?></th>
                        <td><?= h($supplierTariff->minimum_chg_hourly) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Rate') ?></th>
                        <td><?= h($supplierTariff->rate) ?></td> 
                        <th scope="row"><?= __('Extra Hour Rate') ?></th>
                        <td><?= h($supplierTariff->extra_hour_rate) ?></td>
                    </tr>
              </table>
            </div>
        </div>
    </div>
</div>
</section>
