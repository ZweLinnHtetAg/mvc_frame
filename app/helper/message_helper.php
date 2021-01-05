<?php


function setMessage($name,$description)
{
    // check session has already started or not
    if(session_id() == '')
        //if session has not started
        session_start();
    
    $_SESSION[$name] = $description; 
}

function unsetMessage($name)
{
    unset($_SESSION[$name]); 
}

?>