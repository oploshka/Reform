# Use example

```php
<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/vendor/autoload.php';

// select the desired reform scheme
$reformTypes = [
  'string'        => 'Oploshka\\ReformItem\\StringReform'       ,
  'int'           => 'Oploshka\\ReformItem\\IntReform'          ,
  'float'         => 'Oploshka\\ReformItem\\FloatReform'        ,
  'json'          => 'Oploshka\\ReformItem\\JsonReform'         ,
  'email'         => 'Oploshka\\ReformItem\\EmailReform'        ,
  'password'      => 'Oploshka\\ReformItem\\PasswordReform'     ,
  'origin'        => 'Oploshka\\ReformItem\\OriginReform'       ,
  'datetime'      => 'Oploshka\\ReformItem\\DateTimeReform'     ,
];
// Init reform class
$Reform = new \Oploshka\Reform\Reform($reformTypes);

$result = $Reform->item('string', ['type' => 'string']);
echo $result;

```
