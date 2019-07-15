<section class="content">
<div class="row"> 
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header witd-border">
                <i class="fa fa-plus"></i> Customer Tariff Detail
            </div>
            <div class="box-body" >
                <table id="example1" class="table table-bordered table-striped">
                <tr>
                    <td scope="row"><?= __('Customer') ?></td>
                    <td><?= $customerTariff->customer->name  ?></td>
               
                    <td scope="row"><?= __('Car Type') ?></td>
                    <td><?= $customerTariff->car_type->name  ?></td>
                </tr>
                <tr>
                    <td scope="row"><?= __('Service') ?></td>
                    <td><?= $customerTariff->service->name  ?></td>
                
                    <td scope="row"><?= __('Rate') ?></td>
                    <td><?= h($customerTariff->rate) ?></td>
                </tr>
                <tr>
                    <td scope="row"><?= __('Minimum Chg Km') ?></td>
                    <td><?= h($customerTariff->minimum_chg_km) ?></td>
                 
                    <td scope="row"><?= __('Extra Km Rate') ?></td>
                    <td><?= h($customerTariff->extra_km_rate) ?></td>
                </tr>
                <tr> 
                    <td scope="row"><?= __('Minimum Chg Hourly') ?></td>
                    <td><?= $this->Number->format($customerTariff->minimum_chg_hourly) ?></td>
                    <td scope="row"><?= __('Extra Hour Rate') ?></td>
                    <td><?= $this->Number->format($customerTariff->extra_hour_rate) ?></td>
                </tr> 
            </table>
            </div>
        </div>
    </div>
</div>
</section>
