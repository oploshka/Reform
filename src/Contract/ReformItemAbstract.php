<?php

namespace Oploshka\Reform\Contract;

abstract class ReformItemAbstract implements \Oploshka\Reform\ReformItemInterface {
  
  protected static array $settings = [];
  public static function getSettings(): array{
    return self::$settings;
  }
  
  abstract public static function getName():string;
  abstract public static function validate($value, $validate = []);
}
