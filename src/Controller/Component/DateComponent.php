<?php
namespace App\Controller\Component;
use App\Controller\AppController;
use Cake\Controller\Component;
use Cake\Utility\Security;
use Cake\ORM\TableRegistry;
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

    function tariffData($service_id,$customer_id,$car_type_id){
        $this->CustomerTariffs = TableRegistry::get('CustomerTariffs'); 
        return $this->CustomerTariffs->find()->where(['service_id'=>$service_id,'customer_id'=>$customer_id,'car_type_id'=>$car_type_id,'is_deleted'=>0])->first();
    }
    function taxData($invoice_id){
        $this->AccountingEntries = TableRegistry::get('AccountingEntries'); 
        return $this->AccountingEntries->find()->contain(['Ledgers'])->where(['AccountingEntries.invoice_id'=>$invoice_id,'AccountingEntries.ledger_id IN '=>array('16','17','18')]);
    }
    function refDetailDue($invoice_id){
        $this->ReferenceDetails = TableRegistry::get('ReferenceDetails'); 
        $refDetail = $this->ReferenceDetails->find()->where(['ReferenceDetails.invoice_id'=>$invoice_id])->first();
        $total_amount=0;
        if(!empty($refDetail)){
            $ref_name = $refDetail->ref_name; 
            $allData = $this->ReferenceDetails->find()->where(['ref_name'=>$ref_name,'debit !='=>0]);
            $total_amount=0;
            foreach ($allData as $onebyone) {
                $total_amount+=$onebyone->debit;
            }
        }
        return $total_amount;
    }
    function refDetailReceive($invoice_id){
        $this->ReferenceDetails = TableRegistry::get('ReferenceDetails'); 
        $refDetail = $this->ReferenceDetails->find()->where(['invoice_id'=>$invoice_id])->first();
        $total_amount=0;
        if(!empty($refDetail)){
            $ref_name = $refDetail->ref_name; 
            $allData = $this->ReferenceDetails->find()->where(['ref_name'=>$ref_name,'credit !='=>0]);
            $total_amount=0;
            foreach ($allData as $onebyone) {
                $total_amount+=$onebyone->credit;
            }
        }
        return $total_amount;
    }
    function dsDetails($id){
        $this->DutySlips = TableRegistry::get('DutySlips'); 
        return $this->DutySlips->find()->where(['DutySlips.id'=>$id]);
    }
}
?>