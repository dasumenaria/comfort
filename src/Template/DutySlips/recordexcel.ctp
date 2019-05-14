<?php
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=Records_".date('d-m-Y').".xls");
header("Content-Type: application/force-download");
header("Cache-Control: post-check=0, pre-check=0", true); 
date_default_timezone_set('asia/kolkata');
if($type == 1){
?> 
<table border ="1">
    <thead>
        <tr style="table-layout: fixed;">
            <th><?=  ('Sl.') ?></th> 
            <th><?=  ('DS No .') ?></th> 
            <th><?=  ('Waveoff Status') ?></th>
            <th><?=  ('Billing Status') ?></th> 
        </tr>
    </thead>
    <tbody>
        <?php $page_no=0; foreach ($recordList as $city):
            
        ?>  
        <tr>
            <td><?= h(++$page_no) ?></td> 
            <td><?= h($city->id) ?></td> 
            <td>
            	<?php 
                if ($city->waveoff_status=='0') {?>
                    <span class="badge bg-green">Yes</span>
	                 <?php   
	                    }
	                    else
	                    {?>
	                        <span class="badge bg-red">No</span>
	                    <?php    
	                    }
	            ?>
	        </td> 
            <td>
                <?php 
                    if ($city->billing_status=='yes') {?>
                     <span class="badge bg-green">Yes</span>
                    <?php   
                    }
                    else
                    {?>
                        <span class="badge bg-red">No</span>
                     <?php    
                    }
            	?>
            </td>  
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php }
else 
{
?>
	<table class="table table-bordered table-striped">
	    <thead>
		    <tr style="table-layout: fixed;">
		        <th><?=  ('Sl.') ?></th> 
		        <th><?=  ('Invoice No.') ?></th> 
		        <th><?=  ('Waveoff Status') ?></th>
		        <th><?=  ('Payment Status') ?></th> 
		    </tr>
		</thead>
		<tbody>
		    <?php $page_no=0; foreach ($recordList as $city):
		    ?>  
		    <tr>
		        <td><?= h(++$page_no) ?></td> 
		        <td>0</td> 
		        <td>
		            <?php 
		                if ($city->waveoff_status=='0') {?>
		                <span class="badge bg-green">Yes</span>
		             <?php   
		                }
		                else
		                {?>
		                    <span class="badge bg-red">No</span>
		                <?php    
		                }
		        ?>
		        </td>  
		    </tr>
		    <?php endforeach; ?>
		</tbody>
	</table>
<?php } ?>