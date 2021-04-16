<?php 
namespace core\Forms;
class Forms
{
    public static function sanitize($data)
    {
        $data = htmlentities($data, ENT_QUOTES, 'UTF-8');

        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');

        return $data;
    }

    public static function get($input)
    {
        if(isset($_POST[$input]))
        {
            return self::sanitize($_POST[$input]);
        }
        else if(isset($_GET[$input]))
        {
            return self::sanitize($_GET[$input]);
        }
    }

    private static function getmethod()
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public static function isPost()
    {
        return self::getmethod() === 'POST';
    }

    public static function isGet()
    {
        return self::getmethod() === 'GET';
    }

    static public function htmlToPlainText($str)
    {
        $str = str_replace('&nbsp;', ' ', $str);

        $str = html_entity_decode($str, ENT_QUOTES | ENT_COMPAT, 'UTF-8');

        $str = html_entity_decode($str, ENT_HTML5, 'UTF-8');

        $str = html_entity_decode($str);

        $str = htmlspecialchars_decode($str);

        $str = strip_tags($str);
        
        return $str;
    }

    public function truncate($str, $len){

        if(empty($str)) {
            return "";
        }else if(mb_strlen($str, 'UTF-8') > $len){
            return mb_substr($str, 0, $len, "UTF-8") . " ...";
        }else{
            return mb_substr($str, 0, $len, "UTF-8");
        }
    }
}