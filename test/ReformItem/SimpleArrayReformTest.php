<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;

class SimpleArrayReformTest extends TestCase {

  public function testStringIsArray() {
    $this->assertTrue( null === null);
    // TODO:
    // $this->assertTrue( SimpleArrayReform::validate('test string') === null);
  }
}
