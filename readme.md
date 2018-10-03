# Reform composer plugin

use example

<?php

$reformTypes = array(
    'string'        => 'ReformItem\\StringRefoorm'       ,
    'int'           => 'ReformItem\\IntRefoorm'          ,
    'float'         => 'ReformItem\\FloatRefoorm'        ,
    'json'          => 'ReformItem\\JsonRefoorm'         ,
    'email'         => 'ReformItem\\EmailRefoorm'        ,
    'password'      => 'ReformItem\\PasswordRefoorm'     ,
    'origin'        => 'ReformItem\\OriginRefoorm'       ,
    'datetime'      => 'ReformItem\\DateTimeRefoorm'     ,
);
$reform = new Reform($reformTypes);
?>