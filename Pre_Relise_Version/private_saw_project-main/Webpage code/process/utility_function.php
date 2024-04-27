<?php 
    //variable that keeps track if the file has already been included
    $utility_function = true;    

    function Validate_Input($input){
       return ((null != trim($input))&&(strlen($input) < 100));
    }
    
    function Validate_Description($input){
        return (null != $input && strlen($input)<2^16);
    }

    function Validate_Optional_input($input){
        return (null == $input||strlen($input)<100);
    }

?>
