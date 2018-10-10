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
      
      'array'        => 'Oploshka\\ReformItem\\ArrayReform'         ,
      'simpleArray'  => 'Oploshka\\ReformItem\\SimpleArrayReform'   ,
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

    // test array
    $reformArray1 = [ 's' => 'test string', 'i' => 23, ];
    $reformArray1Schema = [
      'type' => 'array',
      'validate' => [
        's' => ['type' => 'string' ],
        'i' => ['type' => 'int'    ],
      ],
    ];
    $reformArray1Result = $Reform->item($reformArray1, $reformArray1Schema);
    $this->assertEquals($reformArray1Result, $reformArray1);
  
    $reformArray2 = [ 'a' => ['i'=> 24, 's' => 'string 2',], ];
    $reformArray2Schema = [
      'type' => 'array',
      'validate' => [
        'a' => [
          'type' => 'array',
          'validate' => [
            'i' => ['type' => 'int'    ],
            's' => ['type' => 'string' ],
          ],
        ],
      ],
    ];
    $reformArray2Result = $Reform->item($reformArray2, $reformArray2Schema);
    $this->assertEquals($reformArray2Result, $reformArray2);
  
    
    // test simple array
    $reformSimpleArray1 = [ 1, 85, '49', 76 ];
    $reformSimpleArray1Schema = [
      'type' => 'simpleArray',
      'validate' => [ 'type' => 'int' ],
    ];
    $reformSimpleArray1Result = $Reform->item($reformSimpleArray1, $reformSimpleArray1Schema);
    $this->assertEquals($reformSimpleArray1Result, $reformSimpleArray1);
    
    $reformSimpleArray1 = [ 1, 'string', 49, 76 ];
    $reformSimpleArray1Schema = [
      'type' => 'simpleArray',
      'validate' => [ 'type' => 'int' ],
    ];
    $reformSimpleArray1Result = $Reform->item($reformSimpleArray1, $reformSimpleArray1Schema);
    $this->assertEquals($reformSimpleArray1Result, NULL);
  }
}
