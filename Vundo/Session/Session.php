<?php

namespace Vundo;

class Session {

    public static function exists($session_name)
    {
        return (isset($_SESSION[$session_name])) ? true : false;
    }

    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function get($session_name)
    {
        return $_SESSION[$session_name];
    }

    public static function delete($session_name)
    {
        if(self::exists($session_name)) {
            unset($_SESSION[$session_name]);
        }
    }

    public static function flash($session_name, $string = '')
    {
        if(self::exists($session_name)) {
            $session = self::get($session_name);
            self::delete($session_name);
            return $session;
        }
        else {
            self::put($session_name, $string);
        }
    }
}