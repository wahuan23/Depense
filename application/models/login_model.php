<?php 
    if(! defined('BASEPATH')) exit('No direct script acces allowed');

    class Model extends CI_Model 
    {
      

        public function checkLogin($mail,$pass)
        {
            $valiny = false;
            if($mail == 'user@gmail.com' && $pass == '123')
            {
                $valiny = true;
            }
            return $valiny;
        }
    }
?>