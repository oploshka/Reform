<?php

namespace Oploshka\Reform;

use PHPUnit\Framework\TestCase;

class ReformTest extends TestCase {

  public function testReformWork() {

    $reformTypes = array(
      'string'        => 'Oploshka\\ReformItem\\StringReform'       ,
      'int'           => 'Oploshka\\ReformItem\\IntReform'          ,
      'float'         => 'Oploshka\\ReformItem\\FloatReform'        ,
      'email'         => 'Oploshka\\ReformItem\\EmailReform'        ,
      'password'      => 'Oploshka\\ReformItem\\PasswordReform'     ,
      'origin'        => 'Oploshka\\ReformItem\\OriginReform'       ,
      'datetime'      => 'Oploshka\\ReformItem\\DateTimeReform'     ,
      'json'          => 'Oploshka\\ReformItem\\JsonReform'         ,
    );
    $Reform = new \Oploshka\Reform\Reform($reformTypes);

    // test item string
    $this->assertTrue( $Reform->item('string' , ['type' => 'string']) === 'string');
    $this->assertTrue( $Reform->item(123456   , ['type' => 'int']   ) === 123456  );
    $this->assertTrue( $Reform->item(1234.56  , ['type' => 'float'] ) === 1234.56 );
    $this->assertTrue( $Reform->item(1234.56  , ['type' => 'float'] ) === 1234.56 );
    $this->assertTrue( $Reform->item('email@mail.ru', ['type' => 'email'] ) === 'email@mail.ru' );
    $this->assertTrue( $Reform->item('Password_#1'  , ['type' => 'password'] ) !== NULL  );
    $this->assertTrue( $Reform->item('{"s":"a"}'    , ['type' => 'origin'] ) === '{"s":"a"}' );
    $this->assertTrue( $Reform->item('{"s":4}'      , ['type' => 'json'] ) !== NULL );
    $this->assertTrue( $Reform->item('{"s":4}'      , ['type' => 'json'] )['s'] === 4 );

    // TODO: add test array
    // $data = $Reform->item(
    //  [
    //    's' => 'test string',
    //    'i' => 23,
    //  ],
    //  [
    //    'type' => 'array',
    //    'validate' => [
    //      's' => ['type' => 'string' ],
    //      'i' => ['type' => 'int'    ],
    //    ],
    //  ]
    // );
    //
    // $this->assertTrue(23 === $data['i']);
    // $this->assertTrue('test string' === $data['s']);
    
  }
}
