<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\ObjToJsonReform;

class ObjToJsonReformTest extends TestCase {

  public function testObjToJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(["json" => "work"]) ,'{"json":"work"}');
  }
  public function testStringIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate('work'), NULL);
  }
  public function testIntIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(1884), NULL);
    $this->assertEquals( ObjToJsonReform::validate(-8454), NULL);
  }
  public function testFloatIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(1884.1), NULL);
    $this->assertEquals( ObjToJsonReform::validate(-8454.1), NULL);
  }
  public function testBooleanIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(true), NULL);
    $this->assertEquals( ObjToJsonReform::validate(false), NULL);
  }
  public function testNullIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(null), NULL);
  }
}
