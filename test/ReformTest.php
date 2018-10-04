<?php

namespace Oploshka\Reform;

use PHPUnit\Framework\TestCase;

class ReformTest extends TestCase {

  public function testReformWork() {

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
    $Reform = new \Oploshka\Reform\Reform($reformTypes);

    // test item string
    $this->assertTrue( $Reform->item('string' , ['type' => 'string']) === 'string');

//    $this->assertTrue(Validate::item('123456'   , ['type' => 'int'     ] ) === 123456  );
//    $this->assertTrue(Validate::item(1234.56    , ['type' => 'float'   ] ) === 1234.56 );
//    $this->assertTrue(Validate::item('email@mail.ru', ['type' => 'email'   ] ) === 'email@mail.ru');
//    $this->assertTrue(Validate::item('Password_#1', ['type' => 'password'] ) !== NULL    );
//    $this->assertTrue(Validate::item('{"s":"a"}', ['type' => 'origin'  ] ) === '{"s":"a"}');
//
//    $data = Validate::item('{"s":4}', ['type' => 'json', 'validate' => [] ]);
//    $this->equalTo($data['s'], 4);
//
//    $data = Validate::item(
//      [
//        's' => 'test string',
//        'i' => 23,
//      ],
//      [
//        'type' => 'array',
//        'validate' => [
//          's' => ['type' => 'string' ],
//          'i' => ['type' => 'int'    ],
//        ],
//      ]
//    );
//
//    $this->assertTrue(23 === $data['i']);
//    $this->assertTrue('test string' === $data['s']);
//    // $this->assertTrue(Validate2::item('array' , ['type' => 'string'] ) === 'string');
//
//    $this->assertTrue(Validate::item('token' , ['type' => 'token'] ) === NULL);
//    $this->assertTrue(Validate::item('city'  , ['type' => 'city']  ) === NULL);
  }
}
