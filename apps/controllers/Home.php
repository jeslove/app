<?php
class Home extends Controller
{
    private $response;

    function __construct()
    {
        parent:: __construct();

        $this->response = $this->renderModel('Homes');
    }

    function indexPent()
    {
        $data =['title'=>'PENTIT HOME'];

        $this->render('pages/index', 'header', $data);
    }

    function processcontactPent()
    {
        if(Inputing::isPost())
        {
            $dates = $this->get_date();
            $ips = $this->getRealIpAddr();
            $browser = $this->agentVersion();
            $name = $this->validate(Inputing::get('name'));
            $email = $this->validate(Inputing::get('email'));
            $subject = $this->validate(Inputing::get('subject'));
            $message = $this->validate(Inputing::get('message'));
            $cont_id = strtoupper($this->generateRandomNumber(10));

            $data =['fname'=>$name, 'email'=>$email, 'subject'=>$subject, 
                    'message'=>$message, 'cont_id'=>$cont_id, 'created_at'=>$dates, 
                    'hostAddre'=>$browser, 'hostIp'=>$ips];
            							
            if(Inputing::getinput($data))
            {
                if($this->response->create_contact($data))
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
}