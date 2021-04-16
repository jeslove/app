<?php
namespace core\Basecontroller;

use core\Views\Views;

use core\Usersession\Usersession;

use core\Router\Router;

abstract class Basecontroller extends Views
{
    public function __construct()
    {
       $this->load = new Views();
    }

    protected function passModel($name)
    {
        $path = 'models'.DS.$name;

        if (file_exists($path))
        {
            require 'models'.DS.$name;

            $modeName = $name;

           return $this->model = new $modeName();
        }
    }

    protected function timezomes()
    {
        date_default_timezone_set('Africa/Accra');

        $date = date('Y-m-d');

        $time = date('H:i:s');

        return $date . ' ' . $time;
    }

    protected static function datezome()
    {
        date_default_timezone_set('Africa/Accra');
        
        return date('Y-m-d');
    }
    #validate
    protected function validate($data)
    {
        $data = htmlspecialchars($data);

        $data = strip_tags($data);

        $data = trim($data);

        $data = ltrim($data);

        return $data;
    }

    protected function confirmIdentify($lnds)
    {
        if (empty(Usersession::get('userID')) && Usersession::get('permission') != $lnds)
        {
            session_unset();

            session_destroy();

            // Router::redirect(LOGIN,'login');
        }
    }

    #Random Numbers generator

    protected static function getRandomNumbers($getNewNumbers)
    {
        $upcoming_event_code = uniqid(md5(true));

        $upcoming_event_code = str_shuffle($upcoming_event_code);

        return $upcoming_event_code = substr($upcoming_event_code,25, $getNewNumbers);
    }

    protected function generate_color()
    {
        mt_srand((float) microtime() * 1000000);
        $color_code = '';
        while (strlen($color_code) < 6)
        {
            $color_code .= sprintf("%02X", mt_rand(0, 255));
        }
        return '#'.$color_code;
    }

    public static function milesToKilometers($miles)
    {
       return $miles * 1.60934;
    }


    protected static function agentVersion()
    {
        $agent = $_SERVER['HTTP_USER_AGENT'];

        $regx = '/\/[a-zA-Z0-9.]+/';
        
        return preg_replace($regx,'', $agent);
    }

    protected static function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
        return $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
        return $_SERVER['REMOTE_ADDR'];
        }
    }

    protected function tempnam_sfx($path, $suffix)
    {
        do {
            $file = $path . "/" . mt_rand() . $suffix;

            $fp = @fopen($file, 'x');
        } while (!$fp);

        fclose($fp);

        return $file;
	}

    /**
     * detect if request over secured connection(SSL)
     *
     * @return boolean
     *
    */

    public function isSSL()
    {
        return isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off";
    }

    /**
     * Gets the request's protocol.
     *
     * @return string
    */

    public function protocol()
    {
        return $this->isSSL() ? 'https' : 'http';
    }

    /**
     * Get the referer of this request.
     *
     * @return string|null
    */

    public function referer()
    {
        return isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']: null;
    }
}
