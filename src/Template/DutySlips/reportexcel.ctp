<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Duty_Slip_Report_".date('d-m-Y').".xls");
header("Content-Type: application/force-download");
header("Cache-Control: post-check=0, pre-check=0", true); 
date_default_timezone_set('asia/kolkata');
?>
<table border ="1">
    <thead>
        <tr style="table-layout: fixed;">
            <th>SL.</th>
            <th>DS No.</th>
           	<th>Guest</th>
           	<th>Reporting Address</th>
            <th>Service</th>
            <th>Driver</th>
            <th>Car</th>
			<th>Car No.</th>
            <th>Date</th>                        
            <th>Open. KM</th>
            <th>Clos. KM</th>
			<th>Opening Timing</th>
			<th>Closing Timing</th>
			<th>Date From</th>
			<th>Date To</th>
			<th>Extra Charge</th>
			<th>Overtime</th>
			<th>Parking Charge</th>
			<th>Other state Charge</th>
			<th>Guide Charge</th>
			<th>Misc Charge</th>
			<th>Remarks</th>
			<th>Authorized Person</th>
        </tr>
    </thead>
    <tbody>
        <?php $page_no=0;$i=0; foreach ($waveoffds as $city): 
         
            $idd=$city->id;
			if(!empty($city->emp_car_no))
			$car_number=$city->temp_car_no;
			else
			$car_number=@$city->car->name;
			
			if(!empty($city->temp_driver_name))
			$driver_name=$city->temp_driver_name;
			else
			$driver_name=$city->driver_id; ?>
		
			<tr>
			<td><?php echo ++$i;?></td> 
			<td><?php echo $city->id;?></td> 
			<td><?php echo $city->guest_name;?></td>
			<td><?php echo $city->reporting_address;?></td>
			<td><?php echo @$city->service->name;?></td>
			<td><?php echo $driver_name;?></td>
			<td><?php echo @$city->car_type_id;?></td>
			<td><?php echo $car_number;?></td>
			<td><?php echo date('d-M-Y',strtotime($city->date)) ?></td>
			<td><?php echo $city->opening_km;?></td>
			<td><?php echo $city->closing_km;?></td> 
			<td><?php echo date('H:i:s',strtotime($city->opening_time));?></td>
			<td><?php echo date('H:i:s',strtotime($city->closing_time));?></td>
			<td><?php echo date('d-M-Y',strtotime($city->date_from));?></td>
			<td><?php echo date('d-M-Y',strtotime($city->date_to));?></td>
			<td><?php echo $city->extra_chg;?></td>
			<td><?php echo $city->permit_chg;?></td>
			<td><?php echo $city->parking_chg;?></td>
			<td><?php echo $city->otherstate_chg;?></td>
			<td><?php echo $city->guide_chg;?></td>
			<td><?php echo $city->misc_chg;?></td>
			<td><?php echo $city->remarks;?></td>
			<td><?php echo $city->authorized_person;?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>