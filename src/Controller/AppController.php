<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $DateConvert = $this->loadComponent('Date');
        $NumbersComponent = $this->loadComponent('Numbers');
        $auth = $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [ 
                    'fields' => [
                        'username' => 'username',
                        'password' => 'password' 
                    ],
                    'userModel' => 'Logins'
                ]
            ],
            'loginAction' => [
                'controller' => 'Logins',
                'action' => 'login' 
            ],
            'logoutRedirect'=>[
                'controller'=>'Logins',
                'action'=>'login'
            ],
            'unauthorizedRedirect' => $this->referer() // If unauthorized, return them to page they were just on
        ]);

        // Allow the display action so our pages controller
        // continues to work.
        $this->Auth->allow(['display']);
        $this->set(compact('auth','DateConvert','NumbersComponent'));
         
    }
    public function sendSms($mobileNo=null,$sms=null,$sender=null){
        file_get_contents("http://103.39.134.40/api/mt/SendSMS?user=phppoetsit&password=9829041695&senderid=".$sender."&channel=Trans&DCS=0&flashsms=0&number=".$mobileNo."&text=".$sms."&route=7");
    }
    
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $user_id=$this->Auth->User('id');  
        
        /////////////// UserRights /////////////
        $menus=[];  
        $controller=$this->request->getParam('controller');
        $action=$this->request->getParam('action');
        $this->loadModel('UserRights');
        $userRights = $this->UserRights;
        
        $userRights = $userRights->find()->where(['login_id'=>$user_id]);
        $menu_ids=[];
        $userRightsIds=[];
        foreach ($userRights as $userRight) {
            $menu_ids[]=explode(',',$userRight->menu_ids);
        }
        foreach ($menu_ids as $key => $value) {

            foreach ($value as $key1 => $value1) {
                $userRightsIds[]=$value1;
            }
        }  
        $this->set(compact('userRightsIds')); 
        /////////////// Menus /////////////
        $this->loadModel('Menus');
        $menuFind = $this->Menus->find()->where(['controller'=>$controller,'action'=>$action])->first();

        if(!empty($userRightsIds))
        {
            $menus =  $this->Menus->find('threaded')->where(['id IN'=>$userRightsIds,'is_hidden'=>'N'])->order(['is_order'=>'ASC']);
        }
        
        $this->set(compact('menus','menuFind'));
        
        /////////////////// End Menus/////////////
        if ($this->request->getParam('_ext') == 'json') 
        {
            $this->Security->setConfig('unlockedActions', [$this->request->getParam('action')]);
        }
    }
    public function activeFinancialYear(){
        $this->loadModel('FinancialYears');
        $CurrentSession = $this->FinancialYears->find()->where(['status'=>'open'])->first();
        return $CurrentSession->id;

    }

}
