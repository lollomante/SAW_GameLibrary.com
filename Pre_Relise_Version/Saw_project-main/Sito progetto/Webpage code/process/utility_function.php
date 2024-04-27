<?php 
    //variable that keeps track if the file has already been included
    $utility_function = true;    

    function Validate_Input($input){
       return ((null != trim($input))&&(strlen($input) < 100));
    }
?>