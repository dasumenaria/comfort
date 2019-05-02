<!DOCTYPE html>
<html class="bg-black">
     <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php echo $this->Html->css('/assets/bootstrap/css/bootstrap.css'); ?> 
        <?php echo $this->Html->css('/assets/font-awesome/css/font-awesome.min.css'); ?> 
        <?php echo $this->Html->css('/assets/dist/css/AdminLTE.css'); ?>
    <style>
        .header{
            background: white !important;
        }
        img{
            border:none !important;
        }
        .form-box .body > .form-group > input, .form-box .footer > .form-group > input {
            background-color:#444 !important;
        }
        .form-box {
            margin: 0px auto 0 auto !important;
        }
         
        button[type="submit"]{
            background-color: #FF6468 !important;
            color:#FDFEFD !important;
            text-transform: uppercase;
            font-size: 15px;
             border-radius: 0px;
            font-weight: 700;
        }
        .form-box .body > .form-group > input, .form-box .footer > .form-group > input {
            background-color: #f5f5f5 !important;
        }
        a{
            color: #8a8a8a !important;
        }   
        body {
                background-image: url(<?php echo $this->Url->build(['controller' =>'/img/bg.jpg', '_full'=>true, '_ssl'=>false]); ?>);
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                padding-top:3px;
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-position: center center;
                position: fixed;
                top: 0;
                left: 0;
                z-index: -1;
                width: 100%;
                height: 100%;
                content: '';
            }
            .input-group-addon{
                float: left;
                position: absolute;
                padding-right: 25px;
                padding-top: 7px;
                margin: 2px;
            }
            .inputstyle{
                padding-left: 43px;
                height: 38px !important;

            }
            .inputstyle:focus{
              border :1px solid #695467b3 !important;
            }
            
        body{
           background-color:#444 !important; 
        
        }       
        .form-box .footer {
		    -webkit-border-top-left-radius: 0;
		    -webkit-border-top-right-radius: 0;
		    -webkit-border-bottom-right-radius: 0px;
		    -webkit-border-bottom-left-radius: 0px;
		    -moz-border-radius-topleft: 0;
		    -moz-border-radius-topright: 0;
		    -moz-border-radius-bottomright: 0px;
		    -moz-border-radius-bottomleft: 0px;
		    border-top-left-radius: 0;
		    border-top-right-radius: 0; 
		}
		.form-box .body, .form-box .footer {
		    padding: 10px 20px;
		    background: #fff;
		    color: #444;
		}
    </style>    
    <link rel="shortcut icon" href="<?php echo $this->Url->build('/img/favicon.png'); ?>"/>
    </head>
    <?php $url =  $this->Url->build('/img/bg.jpg'); ?>
    <body>
    	
        <div class="form-box text-center" id="login-box" style="margin-top:75px !important;">             
        </div>
        <div class="text-center">
            <?= $this->Html->image('logo.jpg',['style'=>'margin-bottom:20px;'])?>
        </div>
        <div class="form-box" id="login-box" style="width:400px !important;">
            
            <?= $this->Form->create('',['id'=>'form_sample_3','style'=>'background: #fff;color: #444;']) ?>

            <div class="text-center" style="padding-top: 20px;">
	            <h3 style="font-weight:100 !important">Login to your Account</h3>
	        </div>
	        <div class="text-center" style="padding-top: 0px;">
	            <?= $this->Flash->render() ?>
	        </div>
            <div class="body" style="padding: 26px 30px 12px 30px;">
                <div class="form-group">
	                <span class="input-group-addon form-control">
	                    <i class="fa fa-user" style="color: #C9CACB !important;"></i>
	                </span>
	                <?= $this->Form->control('username',['id'=>'username','class'=>'form-control inputstyle','placeholder'=>'Username','required'=>true,'label'=>false]); ?>
                </div>
                <div class="form-group">
	                <span class="input-group-addon form-control">
	                    <i class="fa fa-lock" style="color: #C9CACB !important;"></i>
	                </span>
                    <?= $this->Form->control('password',['id'=>'password','class'=>'form-control inputstyle','placeholder'=>'Password','required'=>true,'label'=>false]); ?>
                </div>
                <div class="form-group">
	                <span class="input-group-addon form-control">
	                    <i class="fa fa-list" style="color: #C9CACB !important;"></i>
	                </span>
                    <?= $this->Form->control('counter_id',['class'=>'form-control inputstyle','placeholder'=>'Password','required'=>true,'label'=>false,'options'=>$counterList,'empty'=>'Select Counter']); ?>
                </div>
            </div>
            
            <div class="footer" align="center"> 
                <?= $this->Form->button('LOGIN',['id'=>'submit','class'=>'btn','style'=>'margin-bottom: 20px; padding-left:20px; padding-right:20px']); ?> 
            </div>
            <?= $this->Form->end() ?>
        </div>
    </body>
        <?php echo $this->Html->script('/assets/plugins/jquery/jquery-2.2.3.min.js'); ?>
        <?php echo $this->Html->script('/assets/bootstrap/js/bootstrap.min.js'); ?>
        <?php echo $this->Html->script('/assets/dist/js/app.min.js'); ?>
        <?php echo $this->Html->script('/assets/plugins/jquery-validation/js/jquery.validate.min.js'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.alert').fadeOut(5000);
                var form3 = $('#form_sample_3');
			    var error3 = $('.alert-danger', form3);
			    var success3 = $('.alert-success', form3);
			    form3.validate({
			        errorElement: 'span', //default input error message container
			        errorClass: 'help-block help-block-error', // default input error message class
			        focusInvalid: true, // do not focus the last invalid input
			        rules: {
			               email : {
			                   required :true
			               },
			               password : {
			                   required :true
			               }
			            },
			        messages:{
			             email_id : {
			                   required :"Email / Username is required"
			               },
			               password : {
			                  required :"Password is required"
			               }
			        },
			        errorPlacement: function (error, element) { // render error placement for each input type
			            if (element.parent('.input-group').size() > 0) {
			                error.insertAfter(element.parent('.input-group'));
			            } else if (element.attr('data-error-container')) { 
			                error.appendTo(element.attr('data-error-container'));
			            } else if (element.parents('.radio-list').size() > 0) { 
			                error.appendTo(element.parents('.radio-list').attr('data-error-container'));
			            } else if (element.parents('.radio-inline').size() > 0) { 
			                error.appendTo(element.parents('.radio-inline').attr('data-error-container'));
			            } else if (element.parents('.checkbox-list').size() > 0) {
			                error.appendTo(element.parents('.checkbox-list').attr('data-error-container'));
			            } else if (element.parents('.checkbox-inline').size() > 0) { 
			                error.appendTo(element.parents('.checkbox-inline').attr('data-error-container'));
			            } else {
			                error.insertAfter(element); // for other inputs, just perform default behavior
			            }
			        },

			        invalidHandler: function (event, validator) { //display error alert on form submit   
			            success3.hide();
			            error3.show();
			        },

			        highlight: function (element) { // hightlight error inputs
			           $(element)
			                .closest('.form-group').addClass('has-error'); // set error class to the control group
			        },

			        unhighlight: function (element) { // revert the change done by hightlight
			            $(element)
			                .closest('.form-group').removeClass('has-error'); // set error class to the control group
			        },

			        success: function (label) {
			            label
			                .closest('.form-group').removeClass('has-error'); // set success class to the control group
			        },

			        submitHandler: function (form) {
			            $('#submitbtn').prop('disabled', true);
			            $('#submitbtn').text('Submitting.....');
			            success3.show();
			            error3.hide();
			            form3[0].submit(); // submit the form
			        }

			    });
    
            });
        </script>
</html>