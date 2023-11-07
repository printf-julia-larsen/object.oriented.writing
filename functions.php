<?php
function getAuth()
{
  if(!isSignedIn() && isset($_SESSION['error_message']))
  {
    return $_SESSION['error_message'];

  }else{
    unset($_SESSION['auth']);
  }
}

function isSignedIn()
{
  return isset($_SESSION['auth']) && $_SESSION['auth'] !== false;
}