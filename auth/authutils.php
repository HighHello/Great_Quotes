<?php
include 'config.php';
include 'encryption.php';
    function email_check($email){
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }return true;
    }
    function redirect($message,$href){
		$_POST =array();
        echo '<script>confirm("'.$message.'");window.location.href="'.$href.'";</script>';
    }
    function reload($message){//function has changed to warn instead, no reload 
		redirect($message,basename($_SERVER['PHP_SELF']));
	}

    $password='My secret password';

    function encrypt($message){
        return UnsafeCrypto::encrypt($message, KEY);
    }
    function decrypt($message){
        return UnsafeCrypto::decrypt($message, KEY);
    }
    //counts special characters
    function matchStr($str){
        $special = 0;
        for ($i = 0; $i < strlen($str); $i++)
        {
            if ($str[$i] >= 'A' &&
                $str[$i] <= 'Z')
                continue;
            else if ($str[$i] >= 'a' &&
                     $str[$i] <= 'z')
                     continue;
            else if ($str[$i]>= '0' &&
                     $str[$i]<= '9')
                     continue;
            else
                $special++;
        }
        return $special ;
    
    }
 

?>