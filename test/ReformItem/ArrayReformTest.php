<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;

class ArrayReformTest extends TestCase {

  public function testStringIsArray() {
    $this->assertTrue( null === NULL);
    // TODO:
    // $this->assertTrue( ArrayReform::validate('test string') === NULL);
  }
}
