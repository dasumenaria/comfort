<style type="text/css">
    .box .overlay > .fa, .overlay-wrapper .overlay > .fa {
    top: 79%;
    left: 49%;
}
</style>
<style type="text/css">
#bread{
    width: 50%;
    margin-left: 23%;
}
#bread ul.treeview-menu{
    margin-right: 5px;
}
#bread ul{
    margin-bottom: 5px;
    margin-top: 5px;
}
#bread ul li label a.toggle{
    transition: background .3s ease;
    color: #fff !important;
}
#bread ul li label {
    width: 100%;
    display: block;
    background: rgb(44, 59, 65);
    color: #fefefe;
    padding: 0.75em;
    margin-bottom: 0px;
    border-radius: 0.15em;
    transition: background 0.3s ease;
}
#bread ul li.treeview{
    border: 1px solid #383838;
    margin-top: 5px;
    border-radius: 4px;
}
</style>
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border no-print">
            <h3 class="box-title">Assign Module</h3>
        </div>
        <div class="box-body" >
                <div class="row">
                    <div class="col-md-12 "> 
                        <div class="col-md-12 space">
                        <?php echo $this->Form->create($userRight, ['url'=>['action'=>'addEmployeeRights'],'type' => 'post','class'=>'form-horizontal']); ?>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">User Login</label>
                                <div class="col-sm-4">
                                    <?php echo $this->Form->control('login_id', ['empty'=> '--Select--','data-placeholder'=>'Select Login...','label' => false,'class'=>'select2 login_id','options'=>$logins,'id'=>'login_id']); ?>
                                </div>
                            </div>
                            <div class="" id="user_data"></div>
                        <?= $this->Form->unlockField('menu_id') ?>
                        <?php echo $this->Form->end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>

<script>
$(document).ready(function(){
    $(document).on('change','#login_id',function(){
         
        url = '<?php echo $this->Url->build(['action'=>'employeeUserRight']) ?>'; 
        $('input:checkbox').removeAttr('checked');
        $('#user_data').html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
        
        $.ajax({
            url: url,
            type: 'post',
            data: $('form').serialize(),
            contentType: 'application/x-www-form-urlencoded',
            success: function(result)
            {
                $('#user_data').html(result);
                $('#role_data').html('');
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              
            }
        }); 
    });
    $(document).on('change','.menu_check',function(){
        var now= $(this);
        $(this).closest('li').find('label input[type=checkbox]').prop('checked', $(this).is(':checked'));
        var sibs = false;
        $(this).closest('ul').children('li').each(function () {
            if($(this).find('input[type=checkbox]').is(':checked')) sibs=true;
        });
        $(this).parents('ul').prev().find('input[type=checkbox]').prop('checked', sibs);
    });
    $(document).on('click','.toggle',function(e){
        var now = $(this);
        if (now.parent().next().hasClass('show')) {
            now.parent().next().slideUp(350);
            now.parent().next().removeClass('show');
        } else {
            now.parent().parent().parent().find('.inner').removeClass('show');
            now.parent().parent().find('.inner').slideUp(350);
            now.parent().next().toggleClass('show');
            now.parent().next().slideToggle(350);
        }
    });
});

</script>

