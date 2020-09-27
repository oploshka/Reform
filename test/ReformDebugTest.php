<?php

namespace Oploshka\ReformTest;

use Oploshka\Reform\Exception\ReformException;
use PHPUnit\Framework\TestCase;

use Oploshka\Reform\ReformSchema;
use Oploshka\Reform\Enum\ReformType;

class ReformDebugTest extends TestCase {

  public function testReformWork() {
  
    $Reform = new \Oploshka\Reform\Reform();
    
    $reformArraySchema = new ReformSchema(ReformType::ARRAY, [
//      'level_1_integer' => new ReformSchema(ReformType::INTEGER),
//      'level_1_array'   => new ReformSchema( ReformType::ARRAY, [
//        'level_2_array' => new ReformSchema( ReformType::ARRAY, [
//          'level_3_string'  => new ReformSchema(ReformType::STRING),
//          'level_3_integer' => new ReformSchema(ReformType::INTEGER),
//        ]),
//      ]),
      'level_1_simple_array'   => new ReformSchema( ReformType::SIMPLE_ARRAY, [
        'type' => new ReformSchema(ReformType::INTEGER)
      ])
      
    ]);
  
  
    $testArray = [
      'level_1_string'  => [],
      'level_1_integer' => 23,
      'level_1_array'   => [
        'level_2_array' => [
          'level_3_string'  => '132',
          'level_3_integer' => '12as1',
        ],
      ],
      'level_1_simple_array' => [ 1, '123', 12]
    ];
    

    try {
      $res = $Reform->item($testArray, $reformArraySchema);
    } catch (ReformException $e) {
      $res = $e->getDetails();
    }
    
    echo json_encode($res, JSON_PRETTY_PRINT);
  
    $this->assertEquals($res, []);
  
  }
}
