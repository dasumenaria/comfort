<?php
namespace App\Controller;

use App\Controller\AppController;
//use App\Controller\DateTime;

/**
 * DutySlips Controller
 *
 * @property \App\Model\Table\DutySlipsTable $DutySlips
 *
 * @method \App\Model\Entity\DutySlip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DutySlipsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
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
                        else if($key != 'date_to') {
                            $where['DutySlips.'.$key] = $value;
                        }
                       
                    }
                }
                if($type == 'edt'){
                    $where['DutySlips.billing_status'] = 'no'; 
                    $where['DutySlips.waveoff_status'] = 0; 
                } 
                $customerList = $this->DutySlips->find()->contain(['Services', 'CarTypes', 'Cars', 'Customers', 'Employees'])->where($where);

                if(!empty($this->request->getData('date_from'))){
                    $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                    $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                    $customerList->where(function($exp) use($date_from,$date_to) {
                        return $exp->between('date', $date_from, $date_to, 'date');
                    });
                }
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

        $services = $this->DutySlips->Services->find('list', ['limit' => 200]);
        $employees = $this->DutySlips->Employees->find('list', ['limit' => 200]);
        $customers = $this->DutySlips->Customers->find('list', ['limit' => 200]);
        $this->set(compact('customerList','displayName','type','RecordShow','services','employees','customers','requests'));  
    }

    /**
     * View method
     *
     * @param string|null $id Duty Slip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => ['Services', 'CarTypes', 'Cars', 'Customers', 'Employees', 'Logins', 'Counters']
        ]);

        $this->set('dutySlip', $dutySlip);
    }

    public function viewDutyslip($id = null)
    {
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => ['Services', 'CarTypes', 'Cars', 'Customers', 'Employees', 'Logins', 'Counters']
        ]);

        $this->set('dutySlip', $dutySlip);
    }

    public function pdf($id = null)
    {
        $this->viewBuilder()->setLayout(''); 
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => ['Services', 'CarTypes', 'Cars', 'Customers', 'Employees', 'Logins', 'Counters']
        ]);
        $this->set('dutySlip', $dutySlip);
    }

    public function downloadexcel()
    { 
        $this->viewBuilder()->setLayout('');
        $where=array();
        foreach ($this->request->getData() as $key => $value) {
            if(!empty($value))
            { 
                if($key == 'date_from'){} 
                else if($key == 'searchDS'){} 
                else if($key != 'date_to') {
                    $where['DutySlips.'.$key] = $value;
                }
            }
        } 
        $customerList = $this->DutySlips->find()->contain(['Services', 'CarTypes', 'Cars', 'Customers', 'Employees'])->where($where);

        if(!empty($this->request->getData('date_from'))){
            $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
            $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
            $customerList->where(function($exp) use($date_from,$date_to) {
                return $exp->between('date', $date_from, $date_to, 'date');
            });
        }
         $this->set('customerList', $customerList);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    function timeDifference($time_1, $time_2, $limit = null)
    {
        $val_1 = new \DateTime($time_1);
        $val_2 = new \DateTime($time_2);

        $interval = $val_1->diff($val_2);

        $output = array(
            "year" => $interval->y,
            "month" => $interval->m,
            "day" => $interval->d,
            "hour" => $interval->h,
            "minute" => $interval->i,
            "second" => $interval->s
        );
        $totalHH ="00";
        $totalMM ="00";
        $totalSS ="00";
        if($output['day']>0){
           $dayintohours = $interval->d*24;
           $totalHH+=$dayintohours;
        }
        if($output['hour']>0){
           $hours = $interval->h;
           $totalHH+=$hours;
        }
        
        if($output['minute']>0){
            $minit = $interval->i;

            if($minit<10){
                $minit ="0".$minit;
            }
            $totalMM=$minit;
        }
        if($output['second']>0){
            $sec = $interval->s;
            if($sec<10){
                $sec ="0".$sec;
            } 
            $totalSS=$sec;
        }  
        return $totalHH.':'.$totalMM.':'.$totalSS; 
    }
    
    function timetosec($datetime)
    {
       $timeArray = explode(':',$datetime);
       $hours = $timeArray[0]; 
       $minit = $timeArray[1];
       $sec = $timeArray[2];

        $totalTIme =0;
        if($hours>0){
           $dayintohours = $hours*(60*60);
           $totalTIme+=$dayintohours;
        }
        if($minit>0){
           $hours = $minit*60;
           $totalTIme+=$hours;
        }
        if($sec>0){
           $secs = $sec;
           $totalTIme+=$secs;
        }
        return $totalTIme;
    }
    public function add()
    {
            
        $login_id = $this->Auth->User('id'); 
        $counter_id = $this->Auth->User('counter_id'); 
        $financial_year_id = $this->activeFinancialYear();

        $dutySlip = $this->DutySlips->newEntity();
        if ($this->request->is('post')) {
            $dutySlip = $this->DutySlips->patchEntity($dutySlip, $this->request->getData());
            $dutySlip->counter_id = $counter_id;
            $dutySlip->login_id = $login_id;
            $dutySlip->financial_year_id = $financial_year_id;
            $dutySlip->billing_status = 'no';
            $dutySlip->date = date("Y-m-d");
            if(!empty($this->request->getData('date_from')))
            {
                $dutySlip->date_from = date('Y-m-d',strtotime($this->request->getData('date_from')));
            }
            else
            {
                $dutySlip->date_from='0000-00-00';
            }

            if(!empty($this->request->getData('date_to')))
            {
                $dutySlip->date_to = date('Y-m-d',strtotime($this->request->getData('date_to')));
            }
            else
            {
                $dutySlip->date_to='0000-00-00';
            }

            if(!empty($this->request->getData('service_date')))
            {
                $dutySlip->service_date = date('Y-m-d',strtotime($this->request->getData('service_date')));
            }
            else
            {
                $dutySlip->service_date='0000-00-00';
            }   
            
            //--Calcuation
            $opening_time = $this->request->getData('opening_time_hh').":".$this->request->getData('opening_time_mm').":00";
            $closing_time = $this->request->getData('closing_time_hh').":".$this->request->getData('closing_time_mm').":00";
            $dutySlip->closing_time = $closing_time;
            $dutySlip->opening_time = $opening_time;

            $opening_km = $this->request->getData('opening_km');
            $closing_km = $this->request->getData('closing_km');
            $total_km = $closing_km-$opening_km;

            $main1= strtotime($dutySlip->date_from);
            $main2 = strtotime($dutySlip->date_from);
            $days=(($main2-$main1)/86400);
 
            $customer_id = $this->request->getData('customer_id');
            $car_type_id = $this->request->getData('car_type_id');
            $service_id = $this->request->getData('service_id');
            
            $serviceCheck=array();
            $extra_hours=0;
            $extra_hours_charges=0;
            $extra_per_hour=0;
            $extra_km_charge=0;
            $extra_km=0;
            $extra_per_km=0;
            $extra_amnt=0;
            $extra_details='';
            if(!empty($service_id)) {
                $serviceCheck = $this->DutySlips->Services->get($service_id);
                if($serviceCheck->type == 'intercity'){
                    $days+=1;
                    $tariffrate = $this->DutySlips->CustomerTariffs->find()->select('minimum_chg_km','extra_km_rate')->where(['CustomerTariffs.customer_id'=>$customer_id,'CustomerTariffs.service_id'=>$service_id,'CustomerTariffs.car_type_id'=>$car_type_id])->first();
                    $extra_km_charge=0;
                    $extra_km=0;
                    $extra_per_km=0;
                    if(!empty($tariffrate)){
                        $minimum_chg_km = $tariffrate->minimum_chg_km;
                        $extra_km_rate = $tariffrate->extra_km_rate; 
                        $total_freerun = $minimum_chg_km*$days;
                        $extra_km=$total_km-($total_freerun);

                        $extra_km_charge=$extra_km*$extra_km_rate; 
                        $extra_per_km=$extra_km_rate;
                        if($extra_km>0)
                        {
                            $extra='Km';
                            $extra_details=$extra_km;
                            $extra_amnt=$extra_km_charge;
                        }
                    }
                }
                if($serviceCheck->type == 'incity'){
                    if($days==0)
                    $days++;
                    $tariffrate = $this->DutySlips->CustomerTariffs->find()->select('minimum_chg_hourly','extra_hour_rate')->where(['CustomerTariffs.customer_id'=>$customer_id,'CustomerTariffs.service_id'=>$service_id,'CustomerTariffs.car_type_id'=>$car_type_id])->first();
                    $extra_hours=0;
                    $extra_hours_charges=0;
                    $extra_per_hour=0;
                    if(!empty($tariffrate)){
                        $minimum_chg_hourly = $tariffrate->minimum_chg_hourly;
                        $extra_hour_rate = $tariffrate->extra_hour_rate;
                        
                        $var_first_stamp=$dutySlip->date_to." ".$closing_time;
                        $var_second_stamp=$dutySlip->date_from." ".$opening_time;
    
    
                        $row_time_diff=$this->timeDifference($var_first_stamp,$var_second_stamp); 
                        
                        $row_min_diff=$this->timetosec($row_time_diff)/(60*60);
                        $total_time_of_car=round($row_time_diff);
                          
                        $extra_hours=$total_time_of_car-(($minimum_chg_hourly)*$days);
                        $extra_hours_charges=$extra_hours*$extra_hour_rate;
                        $extra_per_hour=$extra_hour_rate;
                        if($extra_hours>0)
                        {
                            $extra='Hours';
                            $extra_details=$extra_hours;
                            $extra_amnt=$extra_hours_charges;
                        }
                    }
                }
            }
             
            $rate = $this->request->getData('rate');
            $extra_chg = $this->request->getData('extra_chg');
            $permit_chg = $this->request->getData('permit_chg');
            $parking_chg = $this->request->getData('parking_chg');
            $otherstate_chg = $this->request->getData('otherstate_chg');
            $guide_chg = $this->request->getData('guide_chg');
            $misc_chg = $this->request->getData('misc_chg');
            $fuel_hike_chg = $this->request->getData('fuel_hike_chg');

            $cop_amounts = $this->request->getData('cop_amounts');
            $billing_type = $this->request->getData('billing_type');
            if($billing_type=='Normal Billing'){
                $tot_amnt=($rate*$days)+$extra_chg+$permit_chg+$parking_chg+$otherstate_chg+$guide_chg+$misc_chg+$fuel_hike_chg;
            }
            else
            {
                $tot_amnt=$cop_amounts;
            }
            $dutySlip->tot_amnt= $tot_amnt;
            $dutySlip->extra_amnt= $extra_amnt;
            $dutySlip->amount= $tot_amnt;
            //pr($dutySlip);exit;
            if ($this->DutySlips->save($dutySlip)) {
                $employee_id = $dutySlip->employee_id;
                $car_id = $dutySlip->car_id;
                $car_type_id = $dutySlip->car_type_id; 

                $car_number='';
                if(!empty($car_id)){
                    $cars = $this->DutySlips->Cars->get($car_id);
                    $car_to=$cars->name;
                    $car_tp=explode(" ",$car_to);
                    
                    if($car_tp[0]=='Other') 
                        $car_number=$this->request->getData('temp_car_no');
                    else
                        $car_number=$car_to;
                } 

                // SMS
                $mobile_no=$this->request->getData('mobile_no');
                if(!empty($mobile_no)){
                    
                     $car_name='';
                    if(empty($car_type_id)){
                        $car_name = '';
                    }
                    else{
                        $carTypes = $this->DutySlips->CarTypes->get($car_type_id);
                        $car_name=$carTypes->name;
                    }
                    
                    $car_number='';
                    if(!empty($dutySlip->temp_car_no)){
                        $car_number = $dutySlip->temp_car_no;
                    }
                    else{
                        $car_Data = $this->DutySlips->Cars->get($car_id);
                        $car_number=$car_Data->name;
                    }

                    $employee_name='';
                    $employee_mobile_no='';
                    if(!empty($dutySlip->temp_driver_name)){
                        $employee_name = $dutySlip->temp_driver_name;
                    }
                    else{
                        $employees = $this->DutySlips->Employees->get($employee_id);
                        $employee_name=$employees->name;
                        $employee_mobile_no=$employees->mobile_no; 
                    }  

                    $sms_sender='COMFRT'; 
                    $guest_name=$this->request->getData('guest_name');
                                        
                    if(empty($employee_mobile_no))
                    {
                        $sms=str_replace(' ', '+', 'Dear '.$guest_name.',%0AGreetings from Comfort Travels and Tours, Udaipur. Your car is '.$car_name.' '.$car_number.' with chauffeur '.$employee_name.'. Have a pleasant journey.');
                    }
                    else
                    {
                        $sms=str_replace(' ', '+', 'Dear '.$guest_name.',%0AGreeting from Comfort Travels and Tours, Udaipur. Your car is '.$car_name.' '.$car_number.' with chauffeur '.$employee_name.' @ '.$employee_mobile_no.'. Have a pleasant journey.');
                    }
                    $this->sendSms($mobile_no,$sms,$sms_sender);
                }
                $this->Flash->success(__('The duty slip has been saved.'));

                return $this->redirect(['action' => 'view',$dutySlip->id]);
            } 
            $this->Flash->error(__('The duty slip could not be saved. Please, try again.'));
        }
          
        $services = $this->DutySlips->Services->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $carTypes = $this->DutySlips->CarTypes->find('list', ['limit' => 200]);
        $employees = $this->DutySlips->Employees->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $cars = $this->DutySlips->Cars->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $customersList = $this->DutySlips->Customers->find()->select(['id','name','gst_number'])->where(['is_deleted'=>0]);
        foreach ($customersList as $value) {
            $customers[]=array('value'=>$value->id,'text'=>$value->name,'gst_number'=>$value->gst_number);
        }
        //pr($customers->toArray());exit;
        $counters = $this->DutySlips->Counters->find('list', ['limit' => 200]); 
        $serviceCity = $this->DutySlips->ServiceCities->find('list', ['limit' => 200]); 
        $this->set(compact('dutySlip', 'services', 'carTypes', 'cars', 'customers', 'counters','employees','serviceCity'));
    }

    public function edit($id = null)
    {
        $dutySlip = $this->DutySlips->get($id, [
            'contain' => []
        ]);
        $login_id = $this->Auth->User('id'); 
        $counter_id = $this->Auth->User('counter_id');
        if ($this->request->is(['patch', 'post', 'put'])) { 
            $dutySlip = $this->DutySlips->patchEntity($dutySlip, $this->request->getData());
            $dutySlip->counter_id = $counter_id;
            $dutySlip->login_id = $login_id; 
            if(!empty($this->request->getData('date')))
            {
                $dutySlip->date = date('Y-m-d',strtotime($this->request->getData('date')));
            }
            else
            {
                $dutySlip->date_from='0000-00-00';
            } 
            if(!empty($this->request->getData('date_from')))
            {
                $dutySlip->date_from = date('Y-m-d',strtotime($this->request->getData('date_from')));
            }
            else
            {
                $dutySlip->date_from='0000-00-00';
            }

            if(!empty($this->request->getData('date_to')))
            {
                $dutySlip->date_to = date('Y-m-d',strtotime($this->request->getData('date_to')));
            }
            else
            {
                $dutySlip->date_to='0000-00-00';
            }

            if(!empty($this->request->getData('service_date')))
            {
                $dutySlip->service_date = date('Y-m-d',strtotime($this->request->getData('service_date')));
            }
            else
            {
                $dutySlip->service_date='0000-00-00';
            }   
            
            //--Calcuation
            $opening_time = $this->request->getData('opening_time_hh').":".$this->request->getData('opening_time_mm').":00";
            $closing_time = $this->request->getData('closing_time_hh').":".$this->request->getData('closing_time_mm').":00";
            $dutySlip->closing_time = $closing_time;
            $dutySlip->opening_time = $opening_time;
            $opening_km = $this->request->getData('opening_km');
            $closing_km = $this->request->getData('closing_km');
            $total_km = $closing_km-$opening_km;

            $main1= strtotime($dutySlip->date_from);
            $main2 = strtotime($dutySlip->date_from);
            $days=(($main2-$main1)/86400);
 
            $customer_id = $this->request->getData('customer_id');
            $car_type_id = $this->request->getData('car_type_id');
            $service_id = $this->request->getData('service_id');
            
            $serviceCheck=array();
            $extra_hours=0;
            $extra_hours_charges=0;
            $extra_per_hour=0;
            $extra_km_charge=0;
            $extra_km=0;
            $extra_per_km=0;
            $extra_amnt=0;
            $extra_details='';
            if(!empty($service_id)) {
                $serviceCheck = $this->DutySlips->Services->get($service_id);
                if($serviceCheck->type == 'intercity'){
                    $days+=1;
                    $tariffrate = $this->DutySlips->CustomerTariffs->find()->select('minimum_chg_km','extra_km_rate')->where(['CustomerTariffs.customer_id'=>$customer_id,'CustomerTariffs.service_id'=>$service_id,'CustomerTariffs.car_type_id'=>$car_type_id])->first();
                    $extra_km_charge=0;
                    $extra_km=0;
                    $extra_per_km=0;
                    if(!empty($tariffrate)){
                        $minimum_chg_km = $tariffrate->minimum_chg_km;
                        $extra_km_rate = $tariffrate->extra_km_rate; 
                        $total_freerun = $minimum_chg_km*$days;
                        $extra_km=$total_km-($total_freerun);

                        $extra_km_charge=$extra_km*$extra_km_rate; 
                        $extra_per_km=$extra_km_rate;
                        if($extra_km>0)
                        {
                            $extra='Km';
                            $extra_details=$extra_km;
                            $extra_amnt=$extra_km_charge;
                        }
                    }
                }
                if($serviceCheck->type == 'incity'){
                    if($days==0)
                    $days++;
                    $tariffrate = $this->DutySlips->CustomerTariffs->find()->select('minimum_chg_hourly','extra_hour_rate')->where(['CustomerTariffs.customer_id'=>$customer_id,'CustomerTariffs.service_id'=>$service_id,'CustomerTariffs.car_type_id'=>$car_type_id])->first();
                    $extra_hours=0;
                    $extra_hours_charges=0;
                    $extra_per_hour=0;
                    if(!empty($tariffrate)){
                        $minimum_chg_hourly = $tariffrate->minimum_chg_hourly;
                        $extra_hour_rate = $tariffrate->extra_hour_rate;
                        
                        $var_first_stamp=$dutySlip->date_to." ".$closing_time;
                        $var_second_stamp=$dutySlip->date_from." ".$opening_time;

                        $row_time_diff=$this->timeDifference($var_first_stamp,$var_second_stamp); 
                        
                        $row_min_diff=$this->timetosec($row_time_diff)/(60*60);
                        $total_time_of_car=round($row_time_diff);
                        
                        $extra_hours=$total_time_of_car-(($minimum_chg_hourly)*$days);
                        $extra_hours_charges=$extra_hours*$extra_hour_rate;
                        $extra_per_hour=$extra_hour_rate;
                        if($extra_hours>0)
                        {
                            $extra='Hours';
                            $extra_details=$extra_hours;
                            $extra_amnt=$extra_hours_charges;
                        }
                    }
                }
            }
             
            $rate = $this->request->getData('rate');
            $extra_chg = $this->request->getData('extra_chg');
            $permit_chg = $this->request->getData('permit_chg');
            $parking_chg = $this->request->getData('parking_chg');
            $otherstate_chg = $this->request->getData('otherstate_chg');
            $guide_chg = $this->request->getData('guide_chg');
            $misc_chg = $this->request->getData('misc_chg');
            $fuel_hike_chg = $this->request->getData('fuel_hike_chg');

            $cop_amounts = $this->request->getData('cop_amounts');
            $billing_type = $this->request->getData('billing_type');
            if($billing_type=='Normal Billing'){

                $tot_amnt=($rate*$days)+$extra_chg+$permit_chg+$parking_chg+$otherstate_chg+$guide_chg+$misc_chg+$fuel_hike_chg;
            }
            else
            {
                $tot_amnt=$cop_amounts;
            } 
            $dutySlip->tot_amnt= $tot_amnt;
            $dutySlip->amount= $tot_amnt;
            $dutySlip->extra_amnt= $extra_amnt;
            if ($this->DutySlips->save($dutySlip)) { 

                $this->Flash->success(__('The duty slip has been saved.'));

                return $this->redirect(['action' => 'index','edt']);
            }

            $this->Flash->error(__('The duty slip could not be saved. Please, try again.'));  
        }
        $services = $this->DutySlips->Services->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $carTypes = $this->DutySlips->CarTypes->find('list', ['limit' => 200]);
        $employees = $this->DutySlips->Employees->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $cars = $this->DutySlips->Cars->find('list', ['limit' => 200])->where(['is_deleted'=>0]);
        $customersList = $this->DutySlips->Customers->find()->select(['id','name','gst_number'])->where(['is_deleted'=>0]);
        foreach ($customersList as $value) {
            $customers[]=array('value'=>$value->id,'text'=>$value->name,'gst_number'=>$value->gst_number);
        }
        //pr($customers->toArray());exit;
        $counters = $this->DutySlips->Counters->find('list', ['limit' => 200]); 
        $serviceCity = $this->DutySlips->ServiceCities->find('list', ['limit' => 200]); 
        $this->set(compact('dutySlip', 'services', 'carTypes', 'cars', 'customers', 'counters','employees','serviceCity'));
    }
 
    public function getRate(){
        $identity = $this->request->getQuery('identity');
        if($identity == 'ratefix'){
            $customer_id = $this->request->getQuery('customer_id');
            $service_id = $this->request->getQuery('service_id');
            $car_type_id = $this->request->getQuery('car_type_id');

            $tariffrate = $this->DutySlips->CustomerTariffs->find()->select('rate')->where(['CustomerTariffs.customer_id'=>$customer_id,'CustomerTariffs.service_id'=>$service_id,'CustomerTariffs.car_type_id'=>$car_type_id])->first();
             
            $rate=0;
            if(!empty($tariffrate)){
                $rate=$tariffrate->rate;
            }
            echo $rate;

        }
        else if($identity == 'opening_km'){
            $car_id = $this->request->getQuery('car_id');
            $CloseingKM = $this->DutySlips->find()->select(['closing_km'])->where(['car_id'=>$car_id,'waveoff_status !='=>1])->order(['id'=>'DESC'])->first();
          
            $closing_km=0;
            if(!empty($CloseingKM)){
                $closing_km=$CloseingKM->closing_km;
            }
            echo $closing_km;
        }
        exit;
    }

    public function waveoffds()
    {
       $RecordShow = 0;

       $where=array();
       $date_from='';
       $date_to='';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['DutySlips.waveoff_status']=1;
            $waveoffds = $this->DutySlips->find()->contain(['Cars','CarTypes','Customers','Services'])->where($where);
            if(!empty($this->request->getData('date_from'))){
                $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                $waveoffds->where(function($exp) use($date_from,$date_to) {
                    return $exp->between('date', $date_from, $date_to, 'date');
                });
            } 
            $RecordShow=1;
        }
       $this->set(compact('RecordShow','waveoffds','date_from','date_to'));
    }

    public function reportexcel()
    {
        $this->viewBuilder()->setLayout(''); 
        $where=array();
        foreach ($this->request->getData() as $key => $value) {
            if($key == 'date_from'){}
            else if($key == 'date_to'){}
            else{
                $where['DutySlips.'.$key] = $value;
            } 
        } 
        $waveoffds = $this->DutySlips->find()->contain(['Cars','CarTypes','Customers','Services'])->where($where);
        if(!empty($this->request->getData('date_from'))){
            $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
            $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
            $waveoffds->where(function($exp) use($date_from,$date_to) {
                return $exp->between('date', $date_from, $date_to, 'date');
            });
        } 
        $this->set(compact('waveoffds'));
    }

    public function Unbilledds()
    {
        $RecordShow=0;
        $customer_id='';
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['DutySlips.waveoff_status']=0;
            $where['DutySlips.billing_status']='no';
            $customer_id = $this->request->getData('customer_id');
            foreach ($this->request->getData() as $key => $value) {
            
                if(!empty($value))
                { 
                     $where['DutySlips.'.$key] = $value;
                }
            }
            $opendsList = $this->DutySlips->find()->contain(['Cars','CarTypes','Customers','Services'])->where($where);
            $RecordShow = 1;
        } 
        $opends = $this->DutySlips->Customers->find('list');
        
        $this->set(compact('RecordShow','opends','opendsList','customer_id'));
    }

    public function openDs()
    {
        $RecordShow = 0;
        $where=array();
        $customer_id='';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $where['DutySlips.waveoff_status']=0;
            $where['DutySlips.billing_type']='Normal Billing';
            $where['DutySlips.closing_km']=0;
            $customer_id = $this->request->getData('customer_id');
            foreach ($this->request->getData() as $key => $value) {
                if(!empty($value))
                { 
                     $where['DutySlips.'.$key] = $value;
                }
            }
            $opendsList = $this->DutySlips->find()->contain(['Cars','CarTypes','Customers','Services'])->where($where)->order(['date'=>'DESC']); 
            $RecordShow = 1;
        } 
        $opends = $this->DutySlips->Customers->find('list'); 
        $this->set(compact('RecordShow','opends','opendsList','customer_id'));
    }

    public function records()
    {
        $RecordShow = 0;
        $counter_id = '';
        $login_id = '';
        $type = '';
        $auth_id = $this->Auth->User('id');
        $where=array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $counter_id = $this->request->getData('counter_id');
            $login_id = $this->request->getData('login_id'); 
            foreach ($this->request->getData() as $key => $value) {
                $type = $this->request->getData('type');
                if(!empty($value))
                {   
                    if($key == 'type'){} 
                    else{
                        if($type == '1'){
                            $where['DutySlips.'.$key] = $value;
                        }
                        else{
                            $where['Invoices.'.$key] = $value;
                        }
                    }
                }
            }
            if($type == '1'){ 
                $recordList = $this->DutySlips->find()->where($where);
            }
            else{
                $recordList = $this->DutySlips->Invoices->find()->where($where);
            }
            $RecordShow = 1;


        }
        $login = $this->DutySlips->Logins->find('list')->where(['id'=>$auth_id]);
        $counterList = $this->DutySlips->Counters->find('list');
        
        //pr($login->toArray()); die();
            
        $this->set(compact('RecordShow','login','counterList','type','recordList','counter_id','login_id'));    
    }

    public function recordexcel()
    {
        $this->viewBuilder()->setLayout('');  
        $where=array();  
        foreach ($this->request->getData() as $key => $value) {
            $type = $this->request->getData('type');

            if(!empty($value))
            {       
                if($key == 'type'){} 
                else{
                  if($type == '1'){
                    $where['DutySlips.'.$key] = $value;
                  }
                  else{
                    $where['Billings.'.$key] = $value;
                  }
                }
            }
        }
        $recordList = $this->DutySlips->find()->where($where); 
        $this->set(compact('recordList','type'));    
    }

    public function pendingdues()
    {
        $RecordShow = 0;
        $where=array();
        $billing_type='';
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billing_type = $this->request->getData('billing_type');
            if($billing_type == 'Invoices'){
                $recordList = $this->DutySlips->Invoices->find()->contain(['Customers'])->where(['Invoices.payment_status'=>'no']);
            }
            else{
                $recordList = $this->DutySlips->find()->contain(['Customers'])->where(['billing_status'=>'no']);
            } 
            $customer_id = $this->request->getData('customer_id');
            if(!empty($customer_id)){
                if($billing_type == 'Invoices'){
                    $recordList->where(['Invoices.customer_id'=>$customer_id]);
                }
                else{
                    $recordList->where(['DutySlips.customer_id'=>$customer_id]);
                } 
                
            }
            if(!empty($this->request->getData('date_from'))){
                $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));  
                $recordList->where(function($exp) use($date_from,$date_to) {
                    return $exp->between('date', $date_from, $date_to, 'date');
                });
            }  
            $RecordShow = 1; 
        } 
        
        $customerList = $this->DutySlips->Customers->find('list');

     $this->set(compact('RecordShow','customerList','billing_type','recordList'));   
    }

    public function salereg()
    {
        $RecordShow = 0;
        $where=array();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recordList = $this->DutySlips->Customers->find()->order(['Customers.name'=>'ASC']); 

            $customer_id = $this->request->getData('customer_id'); 
            if(!empty($customer_id)){ 
                $recordList->where(['Customers.id'=>$customer_id]);    
            }
            if(!empty($this->request->getData('date_from'))){
                $date_from=date('Y-m-d',strtotime($this->request->getData('date_from'))); 
                $date_to=date('Y-m-d',strtotime($this->request->getData('date_to')));
                $recordList->contain(['Invoices'=>function($q)use($date_from,$date_to){
                    return $q->where(function($exp) use($date_from,$date_to) {
                        return $exp->between('date', $date_from, $date_to, 'date');
                        })->contain(['InvoiceDetails'=>['DutySlips']]);
                }]); 
            }
            else{
                $recordList->contain(['Invoices'=>['InvoiceDetails'=>['DutySlips']]]);
            }
            $RecordShow=1;  
            //pr($recordList->toArray());exit;
        } 
        $customerList = $this->DutySlips->Customers->find('list'); 

        $this->set(compact('RecordShow','customerList','type','recordList'));   
    }

}
