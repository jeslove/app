<?php
namespace core\Views;
class Views
{
    public function __construct(){}

    private static function filepath($name)
    {
        return ROOT . DS . 'public' . DS . 'includes' . DS . $name . '.phtml';
    }

    public static function footer($name)
    {
        if (file_exists(self::filepath($name)))
        {
            require_once(self::filepath($name));
        }
        else
        {
            die('The file ' . $name . ' not found');
        }
    }


    public static function navigation($name)
    {
        if (file_exists(self::filepath($name)))
        {
            require_once(self::filepath($name));
        }
        else
        {
            die('The file ' . $name . ' not found');
        }
    }


    private function set_header($head, $data = [])
    {
        if (file_exists($this->filepath($head)))
        {
            require_once(self::filepath($head));
        }
        else
        {
            die('The file ' . $head . ' not found');
        }
    }


    private function view($name, $data = [])
    {
        require_once(ROOT . DS . 'public' . DS . $name . '.phtml');
    }


    protected function render($name, $head, $data = [])
    {
        if (file_exists('public/' . $name . '.phtml'))
        {
            $this->set_header($head, $data);

            $this->view($name, $data);
        }
        else
        {
            die('The file ' . $name . ' not found');
        }
    }
}
