<?php

class MessageService
{
    public function AddMessage( $msg )
    {
        $_SESSION['msg'][] = $msg ;
    }

    public function ShowMessages()
    {
        if ( ! $_SESSION["head_printed"] ) BasicHead();

        //weergeven messages
        if ( key_exists("msg", $_SESSION) AND is_array($_SESSION["msg"]) AND count($_SESSION["msg"]) > 0 )
        {
            foreach( $_SESSION["msg"] as $message )
            {
                $row = array( "message" => $message );
                $templ = LoadTemplate("messages");
                print ReplaceContentOneRow( $row, $templ );
            }

            unset($_SESSION['msg']);
        }
    }

}