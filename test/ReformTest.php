<?php

namespace Oploshka\ReformTest;

use PHPUnit\Framework\TestCase;

use Oploshka\Reform\ReformSchema;
use Oploshka\Reform\Enum\ReformType;

class ReformTest extends TestCase {

  public function testReformWork() {

    $Reform = new \Oploshka\Reform\Reform();

    // test item string
    $this->assertTrue( 15           === $Reform->item(15, new ReformSchema(ReformType::INTEGER)) );
    
    $this->assertEquals( $Reform->item('string' , new ReformSchema(ReformType::STRING))   , 'string' );
    $this->assertEquals( $Reform->item(123456   , new ReformSchema(ReformType::INTEGER))  , 123456   );
    $this->assertEquals( $Reform->item(1234.56  , new ReformSchema(ReformType::FLOAT))    , 1234.56  );
    
    $hash = '3cb3f980f90f5336d4e6ef2aceeca619898f42ed946e423ce28fd4b830a47bee81a9b209eec048bc60b79207b305be7db6ba6e7e72c76430b53b8dccf63565cc';
    $this->assertEquals( $Reform->item('Pass_#1', new ReformSchema(ReformType::PASSWORD)) , $hash       );
  
    $this->assertEquals( $Reform->item('email@mail.ru', new ReformSchema(ReformType::EMAIL)), 'email@mail.ru'  );
    /*
    $this->assertTrue( $Reform->item('{"s":"a"}'    , ['type' => 'origin'] ) === '{"s":"a"}' );
    $this->assertTrue( $Reform->item('{"s":4}'      , ['type' => 'json'] ) !== null );
    $this->assertTrue( $Reform->item('{"s":4}'      , ['type' => 'json'] )['s'] === 4 );
    $this->assertEquals( $Reform->item(["s"=>4], ['type' => 'objToJson'] ), '{"s":4}' );

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
    $this->assertEquals($reformSimpleArray1Result, null);
    */
  }
}
