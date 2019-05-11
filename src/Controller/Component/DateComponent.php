<?php
namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\Utility\Security;
class DateComponent extends Component
{
	function encryptData($data=null){
		$pass_key = $_SESSION['Auth']['User']['pass_key'];
		$cipher = Security::encrypt($data, $pass_key);
		return str_replace(array('+','/'), array('-','_'), base64_encode($cipher));
		
	}
	function decryptData($cipher=null){
		$pass_key = $_SESSION['Auth']['User']['pass_key'];
		$data = base64_decode(str_replace(array('-','_'),array('+','/'), $cipher));
		return Security::decrypt($data, $pass_key);
	}

	function datefordb($date)
    {
        $date_new=date("Y-m-d",strtotime($date));return($date_new);
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    function dateforview($date)
    {
    	
        if($date=='1970-01-01' || $date=='0000-00-00')
        {
            $date_no='N/A';
        }
        else
        {  
            $date_no=date("d-m-Y",strtotime($date));
        }
        return $date_no;
    }
}
?>