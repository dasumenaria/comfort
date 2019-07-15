 
 <?= $this->Form->create(null, ['url' => [
        'controller' => 'Invoices',
        'action' => 'generatepdf'
    ]]); ?>  
<?php echo $this->Form->control('pdfData' , ['label' => false,'value' => $pdfData,'type'=>'textarea','id'=>'pdfData','style'=>'display:nones']); ?>
<?php echo $this->Form->control('colspan' , ['label' => false,'value' => $colspan,'type'=>'text','id'=>'colspan','style'=>'display:none']); ?> 
<?= $this->Form->end() ?>


<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>  
<script>  
$(document).ready(function() { 
    $('.auth').html('');  
    //$('#pdfData').html();

 }); 
</script>
