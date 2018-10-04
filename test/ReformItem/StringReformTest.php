<?php

namespace Oploshka\ReformItem;

use PHPUnit\Framework\TestCase;
use Oploshka\ReformItem\StringReform;

class StringReformTest extends TestCase {

  public function testStringWork() {
    $this->assertTrue( StringReform::validate('test string') === 'test string');
    $this->assertTrue( StringReform::validate(1884   ) === NULL);
    $this->assertTrue( StringReform::validate(-8454  ) === NULL);
    $this->assertTrue( StringReform::validate(1884.1 ) === NULL);
    $this->assertTrue( StringReform::validate(-8454.1) === NULL);
    $this->assertTrue( StringReform::validate(true   ) === NULL);
    $this->assertTrue( StringReform::validate(false  ) === NULL);
    $this->assertTrue( StringReform::validate(null   ) === NULL);
  }
}
