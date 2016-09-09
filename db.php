<?php
$cxn = new mysqli("localhost","root","<pass-word>","cs");
if($cxn->connect_error) {
    echo "Connection Error";
}
?>
