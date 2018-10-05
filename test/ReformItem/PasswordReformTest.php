<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;

class PasswordReformTest extends TestCase {

  public function testStringIsPassword() {
    $this->assertTrue( PasswordReform::validate('test string') !== NULL);
  }
}
