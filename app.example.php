<?php

require __DIR__ . '/vendor/autoload.php';

$reformTypes = array(
  'string'        => 'ReformItem\\StringRefoorm'       ,
//  'int'           => 'ReformItem\\IntRefoorm'          ,
//  'float'         => 'ReformItem\\FloatRefoorm'        ,
//  'json'          => 'ReformItem\\JsonRefoorm'         ,
//  'email'         => 'ReformItem\\EmailRefoorm'        ,
//  'password'      => 'ReformItem\\PasswordRefoorm'     ,
//  'origin'        => 'ReformItem\\OriginRefoorm'       ,
//  'datetime'      => 'ReformItem\\DateTimeRefoorm'     ,
);
$reform = new \Oploshka\Reform\Reform($reformTypes);

echo 'work';