<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$reformTypes = array(
  'string'        => 'Oploshka\\ReformItem\\StringReform'       ,
//  'int'           => 'Oploshka\\ReformItem\\IntReform'          ,
//  'float'         => 'Oploshka\\ReformItem\\FloatReform'        ,
//  'json'          => 'Oploshka\\ReformItem\\JsonReform'         ,
//  'email'         => 'Oploshka\\ReformItem\\EmailReform'        ,
//  'password'      => 'Oploshka\\ReformItem\\PasswordReform'     ,
//  'origin'        => 'Oploshka\\ReformItem\\OriginReform'       ,
//  'datetime'      => 'Oploshka\\ReformItem\\DateTimeReform'     ,
);

//
$Reform = new \Oploshka\Reform\Reform($reformTypes);
$result = $Reform->item('string', ['type' => 'string']);
echo $result;

$result = \Oploshka\ReformItem\StringReform::validate('test string');
echo $result;

$result = \Oploshka\ReformItem\StringReform::validate(456546);
var_dump(['asd' => $result]);


//
//    $this->assertTrue(Validate::item('string'   , ['type' => 'string'  ] ) === 'string');
//    $this->assertTrue(Validate::item('123456'   , ['type' => 'int'     ] ) === 123456  );
//    $this->assertTrue(Validate::item(1234.56    , ['type' => 'float'   ] ) === 1234.56 );
//    $this->assertTrue(Validate::item('email@mail.ru', ['type' => 'email'   ] ) === 'email@mail.ru');
//    $this->assertTrue(Validate::item('Password_#1', ['type' => 'password'] ) !== NULL    );
//    $this->assertTrue(Validate::item('{"s":"a"}', ['type' => 'origin'  ] ) === '{"s":"a"}');
echo 'work';