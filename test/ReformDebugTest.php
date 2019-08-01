<?php

namespace Oploshka\Reform;

use PHPUnit\Framework\TestCase;

class ReformDebugTestTest extends TestCase {

  public function testReformWork() {

    $Reform = new \Oploshka\Reform\ReformDebug();

    //$res = $Reform->item('string' , ['type' => 'string']);
    //$this->assertTrue($res  === 'string');
    //$error = $Reform->getError();
    //$this->assertEquals($error, []);


    $res = $Reform->item(
      [
        'notActualDataString' => 'notActualString',
        'notActualDataInt_1' => -8451,
        'notActualDataInt_2' => 0,
        'notActualDataInt_3' => 846,
        'notActualDataFloat' => 1.54,
        'notActualDataArray' => ['tempKey' => 'tempValue'],

        'stringNotValid_1' => [],
        'stringNotValid_2' => null,

        'arrayNotValidArg' => [
          'childArrayNotValidArg' => [
            'intChildArrayNotValidArg'    => 'not valid int',
            'floatChildArrayNotValidArg'  => 'not valid float',
          ]
        ],
      ] , [
      'type' => 'array', 'validate' => [
        //'stringNotValid_1' => [ 'type' => 'string' ],
        //'stringNotValid_2' => [ 'type' => 'string' ],
        'arrayNotValidArg' => [ 'type' => 'array', 'req' => false, 'validate' => [
          'childArrayNotValidArg' => [ 'type' => 'array', 'req' => false, 'validate' => [
            'intChildArrayNotValidArg'    => ['type' => 'int'   , 'req' => false, ],
            'floatChildArrayNotValidArg'  => ['type' => 'float' , 'req' => false, ],
          ]],
        ]],
      ]]
    );
    $this->assertEquals($res, null);
    $error = $Reform->getError();
    $this->assertEquals($error[0]['data']['fieldName'], 'intChildArrayNotValidArg');

    // TODO: 
    //[ 'code' => 'ERROR_VALIDATE_FIELD', 'message' => '', 'data' => [ 'fieldName' => []] ],

  }
}
