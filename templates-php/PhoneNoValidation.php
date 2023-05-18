<?php
function isValidTel($phoneNumber)
{
    return preg_match('/^\d{11}$/', $phoneNumber);
}
?>