<?php

use apps\models\Contacts\Contacts;
use core\Basecontroller\Basecontroller;
use core\Csrf\Csrf;
use core\Forms\Forms;

class Home extends Basecontroller
{
    function __construct()
    {
        parent:: __construct();
    }

    public function index()
    {
        $data =['title'=>'ASASE BUSINESSS'];

        $this->render('pages/index', 'header', $data);
    }

    public function processcontact()
    {
        if(Forms::isPost())
        {
            $dates = $this->datezome();
            $ips = $this->getRealIpAddr();
            $browser = $this->agentVersion();
            $name = Csrf::anticsrf(Forms::get('name'));
            $email = Csrf::anticsrf(Forms::get('email'));
            $subject = Csrf::anticsrf(Forms::get('subject'));
            $message = Csrf::anticsrf(Forms::get('message'));
            $cont_id = strtoupper($this->getRandomNumbers(10));

            $data =['fname'=>$name, 'email'=>$email, 'subject'=>$subject, 
                    'message'=>$message, 'cont_id'=>$cont_id, 'created_at'=>$dates, 
                    'hostAddre'=>$browser, 'hostIp'=>$ips];
            							
            if(Contacts::createpost($data))
            {
                echo json_encode(['succ'=>'submitted', 'mesg'=>'Form Submitted Successfully.']);
            }
            else
            {
                echo json_encode(['error'=>'err', 'mesg'=>'Oops! Something want wrong.']);
            }
        }
    }
}