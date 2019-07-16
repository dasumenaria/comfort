<section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary"> 
            <div class="box-header with-border">
                <i class="fa fa-plus"></i> Download Database Backup
            </div>
            <div class="box-body" >
                <div class="box-footer">
                    <div class="row">
                        <center>
                            <div class="col-md-12">
                                <div class="col-md-6">   
                                     <?php
                                     echo $this->Html->link(
                                            '<i class="fa fa-download"></i> Download Backup',
                                            '/'.$fileUrl,
                                            ['class' => 'btn btn-info','escape'=>false]
                                        );
                                     ?>
                                </div>
                            </div>
                        </center>       
                    </div>
                </div>
            </div> 
        </div>  
    </div>
</div>
</section> 
