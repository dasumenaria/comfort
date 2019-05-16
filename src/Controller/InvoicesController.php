<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 *
 * @method \App\Model\Entity\Invoice[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesController extends AppController
{
    public function index($type = null)
    {
        $RecordShow = 0; 
        $where=array();
        $requests = $this->request->getData();
        if ($this->request->is(['patch', 'post', 'put'])) {  
            if(!empty($this->request->getData('searchDS'))){ 
                foreach ($this->request->getData() as $key => $value) {
                    if(!empty($value))
                    { 
                        if($key == 'date_from'){} 
                        else if($key == 'searchDS'){} 
                        else if($key == 'date_to') {}
                        else if($key == 'date') {}
                        else if($key == 'guest_name') {}
                        else if($key == 'dutyslip_id') {}
                        else
                        {
                            $where['Invoices.'.$key] = $value;
                        }
                    }
                }
                if($type == 'edt'){
                    $where['Invoices.payment_status'] = 'no'; 
                    $where['Invoices.waveoff_status'] = 0; 
                } 
                //pr($where);exit;
                $customerList = $this->Invoices->find()->contain(['InvoiceTypes', 'Customers','InvoiceDetails'=>['DutySlips']])->where($where);

                if(!empty($this->request->getData('date_from'))){
                    $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                    $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                    $customerList->where(function($exp) use($date_from,$date_to) {
                        return $exp->between('date', $date_from, $date_to, 'date');
                    });
                } 
                if(!empty($this->request->getData('date'))){
                    $date_from=date('Y-m-d',strtotime($this->request->getData('date')));    
                    $customerList->where(function($exp) use($date_from,$date_from) {
                        return $exp->between('current_date', $date_from, $date_from, 'date');
                    });
                }
                if(!empty($this->request->getData('dutyslip_id'))){
                    $customerList->where(['invoiceDetails.dutyslip_id'=>$this->request->getData('dutyslip_id')]);
                }
                 
                //-- Guest Name

                $RecordShow=1;
            }
            if(!empty($this->request->getData('deleteDS'))){
                $login_id = $this->Auth->User('id'); 
                $counter_id = $this->Auth->User('counter_id');

                $id = $this->request->getData('dsid');
                $reason = $this->request->getData('reason');
                $query = $this->DutySlips->query(); 
                $query->update()->set(['waveoff_reason'=>$reason,'waveoff_status'=>1,'waveoff_login_id'=>$login_id,'waveoff_counter_id'=>$counter_id,])
                    ->where(['id' => $id])
                    ->execute();
                $this->Flash->success(__('Dutyslip Waveoff Successfully'));
                return $this->redirect(['action' => 'index',$type]);
            } 
        } 
        if($type == 'edt'){ $displayName = 'Edit';}
        if($type == 'del'){ $displayName = 'Waveoff';}
        if($type == 'ser'){ $displayName = 'Search';}
 
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]);
        $this->set(compact('customerList','displayName','type','RecordShow','customers'));  
    }

    public function index2()
    {
        $this->paginate = [
            'contain' => ['InvoiceTypes', 'Customers']
        ];
        $invoices = $this->paginate($this->Invoices);

        $this->set(compact('invoices'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['InvoiceTypes', 'Customers', 'Logins', 'Counters', 'WaveoffLogins', 'WaveoffCounters', 'FinancialYears', 'GstFigures', 'InvoiceDetails']
        ]);

        $this->set('invoice', $invoice);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $showRecord = 0;
        $login_id = $this->Auth->User('id'); 
        $counter_id = $this->Auth->User('counter_id'); 
        $ldrview = $this->Auth->User('ldrview'); 
        $invoice = $this->Invoices->newEntity();
        $financial_year_id = $this->activeFinancialYear();
        if ($this->request->is('post')) {
            
            if(!empty($this->request->getData('searchDS'))){
                $customer_id = $this->request->getData('customer_id');
                $invoice_type_id = $this->request->getData('invoice_type_id');
                $payment_type = $this->request->getData('payment_type');
                $complimenatry_status = $this->request->getData('complimenatry_status');
                $remarks = $this->request->getData('remarks');
                $showRecord = 1;
                $tax_type=1;
                //-- Check Tax Rate
                $customerData = $this->Invoices->Customers->get($customer_id);
                $servicetax_status = $customerData->servicetax_status;
                $state = $customerData->state;
                if($state=='rajasthan' || $state=='Rajasthan' || $state=='RAJASTHAN')
                {
                    $tax_type=0;
                }
                $invoiceTypeData = $this->Invoices->InvoiceTypes->get($invoice_type_id);
                $dutySlipData = $this->Invoices->DutySlips->find()->where(['DutySlips.customer_id'=>$customer_id,'DutySlips.waveoff_status'=>0 ,'DutySlips.billing_status'=>'no'])->contain(['CarTypes','Services','Cars']); 

                //pr($dutySlipData->toArray());exit;
                $gstData = $this->Invoices->GstFigures->get(3);

                $this->set(compact('customer_id', 'invoice_type_id', 'payment_type','complimenatry_status','remarks','invoiceTypeData','customerData','dutySlipData','tax_type','gstData'));      
            }
            if(!empty($this->request->getData('invoiceReg'))){  

                $count=$this->request->getData('count');  
                $payment_type=$this->request->getData('payment_type');
                $remarks=$this->request->getData('remarks');
                $customer_id=$this->request->getData('customer_id');
                $invoice_type_id=$this->request->getData('invoice_type_id');
                $total=$this->request->getData('total');
                $discount=$this->request->getData('discout_final');
                $tax_type=$this->request->getData('tax_type'); 

                for($i=1;$i<=$count;$i++)
                {
                    $dutyslip_id[]=$this->request->getData('ds_idd'.$i); 
                }
                $tax=0;
                if($tax_type==0){
                    $tax+=$this->request->getData('taxation1');
                    $tax+=$this->request->getData('taxation2');
                }
                else{
                    $tax+=$this->request->getData('taxation1');
                }

                $grand_total=$this->request->getData('grand_total');
                $complimenatry_status=$this->request->getData('complimenatry_status');
                $invoice_date= $this->request->getData('invoice_date');
                //--
                $findCount = $this->Invoices->InvoiceDetails->find()->where(['InvoiceDetails.duty_slip_id IN'=>$dutyslip_id])->count();
                if($findCount==0){
                     
                    $CheckInvoiceNo = $this->Invoices->find()->where(['financial_year_id'=>$financial_year_id])->order(['id'=>'DESC'])->first();
                    $financialYearsData = $this->Invoices->FinancialYears->get($financial_year_id); 
                    $str = $financialYearsData->alias_name; 
                    if(!empty($CheckInvoiceNo)){
                        $max_invoice_no = $CheckInvoiceNo->invoice_no; 
                        $old_invoice_no = str_replace($str,"",$max_invoice_no);
                        $old_invoice_no = $old_invoice_no + 1;  
                        $invoice_no = $str.'/'.$old_invoice_no;
                    }
                    else{
                        $invoice_no = $str.'/1';
                    }
                 
                    $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
                    $invoice->invoice_no = $invoice_no;
                    $invoice->date = $invoice_date;
                    $invoice->payment_status = 'no';
                    $invoice->tax = $tax;
                    $invoice->remarks = $remarks;
                    $invoice->login_id = $login_id;
                    $invoice->counter_id = $counter_id;
                    $invoice->financial_year_id = $financial_year_id;
                    $invoice->current_date = date("Y-m-d");
                    //pr($invoice); exit; 
                    if ($this->Invoices->save($invoice)) {
                        for($i=1;$i<=$count;$i++)
                        {
                            $extra_amnt = $this->request->getData('extra_amnt'.$i);
                            $main_amnt = $this->request->getData('main_amnt'.$i);
                            $ds_idd = $this->request->getData('ds_idd'.$i);
                            $extra_details = $this->request->getData('extra'.$i);
                            $amount=$extra_amnt+$main_amnt;
                            if(!empty($ds_idd) && $findCount==0)
                            {
                                $query = $this->Invoices->DutySlips->query(); 
                                $query->update()->set(['billing_status'=>'yes','extra_details'=>$extra_details,'extra_amnt'=>$extra_amnt])
                                    ->where(['id' => $ds_idd])
                                    ->execute();

                                $invoiceDetails = $this->Invoices->InvoiceDetails->newEntity();
                                $invoiceDetails = $this->Invoices->InvoiceDetails->patchEntity($invoiceDetails, $this->request->getData());
                                $invoiceDetails->invoice_id = $invoice->id;
                                $invoiceDetails->duty_slip_id = $ds_idd;
                                $invoiceDetails->amount = $amount;

                                $this->Invoices->InvoiceDetails->save($invoiceDetails); 
                            }
                        }
                        /*for($i=1;$i<=$count;$i++)
                        {
                            $ds_idd=$_POST['ds_idd'.$i]; 
                            $extra_amnt=$_POST['extra_amnt'.$i];
                            $extra_details=$_POST['extra'.$i];
                            $main_amnt=$_POST['main_amnt'.$i];

                            $rs_dss=mysql_query("select `date_from`,`date_to`,`opening_time`,`closing_time`,`service_id`,`car_id`,`car_type_id`,`total_km` from `duty_slip` where `id`='".$ds_idd."'");
                            $row_ds=mysql_fetch_array($rs_dss);

                            $date_from=$row_ds['date_from'];
                            $date_to=$row_ds['date_to'];
                            $service_id=$row_ds['service_id'];
                            $car_id=$row_ds['car_id'];
                            $car_type_id=$row_ds['car_type_id'];
                            $total_km=$row_ds['total_km'];

                            $main1= strtotime($date_from);
                            $main2 = strtotime($date_to);
                            $days=(($main2-$main1)/86400);
                            $closing_time=$row_ds['opening_time'];
                            $opening_time=$row_ds['closing_time']; 

                            $car_number=fetchcarno($car_id);
                            $amount=$extra_amnt+$main_amnt;
                            if(!empty($ds_idd) && $findCount==0)
                            {
                                $rs_ds=@mysql_query("update `duty_slip` set `extra_details`='".$extra_details."',`extra_amnt`='".$extra_amnt."',`billing_status`='yes' where `id`='".$ds_idd."'");
                                $rs_invoice_detail=@mysql_query("insert into `invoice_detail` set `invoice_id`='".$max_invoice_id."',`duty_slip_id`='".$ds_idd."',`amount`='".$amount."'");
                            }

                            $result_tarrif=mysql_query("select `rate` from `customer_tariff` where customer_id='".$customer_id."' and car_type_id='".$car_type_id."' and service_id='".$service_id."'");
                            if(mysql_num_rows($result_tarrif)==0)   
                            $result_tarrif=mysql_query("select `rate` from `tariff_rate` where service_id='".$service_id."' and car_type_id='".$car_type_id."'");
                            $row_tariff = mysql_fetch_array($result_tarrif);
                            if($row_tariff['rate']>0)

                            if($com==1)
                            {
                                echo "<script>
                                window.open('billing_view.php?id=".$max_invoice_id."','_newtab');
                                alert('Entry Updated Successfully.');
                                location='billing_menu.php';        
                                </script>"; 
                            }
                            else
                            {

                                if(!empty($ds_idd)&&($row_tariff['rate']>0))
                                {
                                    $res_supplier_id=mysql_query("select `supplier_id`,`car_type_id` from `car_reg` where `id`='".$car_id."'");
                                    $row_supplier_id=mysql_fetch_array($res_supplier_id);
                                    $supplier_id=$row_supplier_id['supplier_id'];
                                    $car_type_id=$row_supplier_id['car_type_id'];

                                    $result_supplier_tariff=mysql_query("select * from `supplier_tariff` where  `supplier_id`='".$supplier_id."'  &&  `service_id`='".$service_id."' && `car_type_id`='".$car_type_id."' ");
                                    $num_supplier_tariff=mysql_num_rows($result_supplier_tariff);
                                    if($num_supplier_tariff==0)
                                    $result_supplier_tariff=mysql_query("select * from `supplier_tariff` where  `service_id`='".$service_id."' && `car_type_id`='".$car_type_id."' ");

                                    $row_supplier_tariff=mysql_fetch_array($result_supplier_tariff);
                                    $supplier_rate = $row_supplier_tariff['rate'];
                                    $minimum_chg_km = $row_supplier_tariff['minimum_chg_km'];
                                    $extra_km_rate = $row_supplier_tariff['extra_km_rate'];
                                    $extra_hour_rate = $row_supplier_tariff['extra_hour_rate'];
                                    $minimum_chg_hourly = $row_supplier_tariff['minimum_chg_hourly'];

                                    ///////////////////////////////////////////-----------calculate supplier amount------------------///////////////////////////////////////

                                    $result_service=mysql_query("select `type` from `service` where `id`='".$service_id."'");
                                    $row_service=mysql_fetch_array($result_service);
                                    if($row_service['type']=="intercity")
                                    {   
                                        $days+=1;
                                        $total_freerun = $minimum_chg_km*$days;
                                        $extra_km=$total_km-($total_freerun);
                                        if($extra_km>0)
                                        $extra_charge=$extra_km*$extra_km_rate;
                                        $supp_main_amnt=$supplier_rate*$days;
                                    }
                                    else
                                    {
                                        if($days==0)
                                        $days++;
                                        $var_first_stamp=($date_to)." ".$closing_time;
                                        $var_second_stamp=($date_from)." ".$opening_time;
                                        $result_time_diff=mysql_query("select timediff('".$var_first_stamp."','".$var_second_stamp."')");
                                        $row_time_diff =mysql_fetch_array($result_time_diff);
                                        $result_min=mysql_query("select time_to_sec('".$row_time_diff[0]."')/(60*60)");
                                        $row_min_diff =mysql_fetch_array($result_min);
                                        $total_time_of_car= round($row_min_diff[0]);
                                        $total_freerun = $minimum_chg_hourly*$days;
                                        $extra_hours=$total_time_of_car-($total_freerun);
                                        if($extra_hours>0)
                                        $extra_charge=$extra_hours*$extra_hour_rate;
                                        $supp_main_amnt=$supplier_rate*$days;
                                    }
                                    $amount_supplier = $supp_main_amnt+$extra_charge;
                                    $amount_to_cars+=$amount_supplier;  

                                    ///////////////////////////////////////////-----------end of supplier amount------------------///////////////////////////////////////   

                                    if($ldrview=='yes')
                                    {   
                                        echo "<tr>
                                        <td>Car</td>
                                        <td>".$car_number."</td>
                                        <td>".$amount_supplier."</td>
                                        <td>0</td>
                                        </tr>";
                                    }
                                    $ledger_master=mysql_query("select `id` from `ledger_master` where `name`='".fetchcarno($car_id)."' && `ledger_type_id`='4'");
                                    $row_ledger_master=mysql_fetch_array($ledger_master);

                                    @mysql_query("insert into `ledger` set `date`='".date("Y-m-d")."',`ledger_master_id`='".$x['id']."',`invoice_id`='".$max_invoice_id."',`name`='".fetchcarno($car_id)."',`credit`='".$amount_supplier."',`debit`='0',`narration`='".$remarks."',`current_date`='".date("Y-m-d")."'");    

                                }

                            }  // end of else
                        }*/
                        $this->Flash->success(__('The invoice has been saved.'));
                        return $this->redirect(['action' => 'add']);
                    } 
                    $this->Flash->error(__('The invoice could not be saved. Please, try again.')); 
                }
            } 
        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 
        $this->set(compact('invoice', 'invoiceTypes', 'customers','showRecord'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $invoiceTypes = $this->Invoices->InvoiceTypes->find('list', ['limit' => 200]);
        $customers = $this->Invoices->Customers->find('list', ['limit' => 200]); 
         
        $this->set(compact('invoice', 'invoiceTypes', 'customers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
