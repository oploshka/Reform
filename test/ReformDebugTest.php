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


    $res = $Reform->item([
      'stringTemp1' => [],
      'stringTemp2' => [],

      'stringField' => [],
    ] , [
      'type' => 'array', 'validate' => [
        'stringField' => ['type' => 'string']
      ]]);
    $this->assertEquals($res, null);
    $error = $Reform->getError();
    $this->assertEquals($error, [
      [ 'code' => 'ERROR_VALIDATE_FIELD', 'message' => '', 'data' => [ 'fieldName' => []] ],
    ]);
  }
}
