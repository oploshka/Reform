<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\ObjToJsonReform;

class ObjToJsonReformTest extends TestCase {

  public function testObjToJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(["json" => "work"]) ,'{"json":"work"}');
  }
  public function testStringIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate('work'), null);
  }
  public function testIntIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(1884), null);
    $this->assertEquals( ObjToJsonReform::validate(-8454), null);
  }
  public function testFloatIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(1884.1), null);
    $this->assertEquals( ObjToJsonReform::validate(-8454.1), null);
  }
  public function testBooleanIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(true), null);
    $this->assertEquals( ObjToJsonReform::validate(false), null);
  }
  public function testNullIsNoJsonString() {
    $this->assertEquals( ObjToJsonReform::validate(null), null);
  }
}
