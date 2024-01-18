<?php
function Validate_Input($input){
    return ((null != trim($input))&&(strlen($input) < 100));
}
function Validate_Description($input){
    return (null != $input && strlen($input)<2^16);
}
function Validate_Optional_input($input){
    return (null == $input||strlen($input)<100);
}
function Validate_Password($input){
    return ((null != trim($input))&&(strlen($input) < 100)&&(strlen($input)> 7));
}

function Validate_data($input) {
    $datetime = DateTime::createFromFormat('Y-m-d', $input);
    return ((null!=$datetime) && ($datetime->format('Y-m-d') === $input));
}

/*made on earth by humans*/
?>
