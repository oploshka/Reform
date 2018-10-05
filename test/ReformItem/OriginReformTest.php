<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;

class OriginReformTest extends TestCase {

  public function testStringIsOrigin() {
    $this->assertTrue( OriginReform::validate('test string') === 'test string');
  }
}
