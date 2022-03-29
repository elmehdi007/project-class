<?php

class Msg
{
    public static function Msg_error($msg)
    {
        printf(file_get_contents('view/msg/msg_danger.html'),$msg);
    }

    public static function Msg_success($msg)
    {
        printf(file_get_contents('view/msg/msg_success.html'),$msg);
    }
}

?>