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
    $this->assertEquals( $Reform->item('{"s":"a"}', new ReformSchema(ReformType::ORIGIN)), '{"s":"a"}'  );
  
    $res = $Reform->item('{"s":4}' , new ReformSchema(ReformType::JSON));
    $this->assertEquals( $res, [ 's' => 4 ] );
  
    $this->assertEquals('{"s":4}', $Reform->item(["s"=>4] , new ReformSchema(ReformType::OBJECT_TO_JSON)) );
    
    // test simple array
    $reformSchema = new ReformSchema(
      ReformType::SIMPLE_ARRAY,
      [
        'type' => new ReformSchema(ReformType::INTEGER)
      ]
    );
  
    $this->assertEquals($Reform->item([ 1, 85, '49', 76 ], $reformSchema), [ 1, 85, 49, 76 ]);
    // $this->assertEquals($Reform->item([ 1, 'string', 49, 76 ], $reformSchema), [ 1, null, 49, 76 ]);
  

    // test array
    $reformArray1 = [ 's' => 'test string', 'i' => 23, ];
    $reformArraySchema = new ReformSchema(
      ReformType::ARRAY,
      [
        's' => new ReformSchema(ReformType::STRING),
        'i' => new ReformSchema(ReformType::INTEGER),
      ]
    );
    
    $this->assertEquals($Reform->item([ 's' => 'test string', 'i' => 23 ], $reformArraySchema), [ 's' => 'test string', 'i' => 23 ]);
  
  
    $reformArray2 = [
      'a' => [
        'i'=> 24,
        's' => 'string 2',
      ],
    ];
    $reformArraySchema = new ReformSchema(ReformType::ARRAY,
      [
        'a' => new ReformSchema(ReformType::ARRAY,
          [
            's' => new ReformSchema(ReformType::STRING),
            'i' => new ReformSchema(ReformType::INTEGER),
          ]
        )
      ]
    );
    
    $this->assertEquals($Reform->item($reformArray2, $reformArraySchema), $reformArray2);
  }
}
