<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class PasswordReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN  = 'min';
  const FILTER_MAX  = 'max';
  const FILTER_REQUIRE_STRING_INTEGER = 'requireStringInteger';
  const FILTER_REQUIRE_STRING_LOVER   = 'requireStringLover';
  const FILTER_REQUIRE_STRING_UPPER   = 'requireStringUpper';
  const FILTER_HASH = 'hash';
  
  const FILTER = [
    self::FILTER_MIN                    => 6,
    self::FILTER_MAX                    => 256,
    self::FILTER_REQUIRE_STRING_INTEGER => false,
    self::FILTER_REQUIRE_STRING_LOVER   => false,
    self::FILTER_REQUIRE_STRING_UPPER   => false,
    self::FILTER_HASH                   => 'sha512',
  ];
  
  public static function validate($value) {
    if (!is_string($value)) {
      throw new ReformException(ReformException::NOT_STRING);
    }
    return $value;
  }
  
  protected static function filterItem($value, $filter) {
    
    $len = strlen($value);
    if ($filter[self::FILTER_MIN] !== null) {
      if ($len < $filter[self::FILTER_MIN]) {
        throw new ReformException(ReformException::NOT_CORRECT_STRING_LENGTH);
      }
    }
    if ($filter[self::FILTER_MAX] !== null) {
      if ($len > $filter[self::FILTER_MAX]) {
        throw new ReformException(ReformException::NOT_CORRECT_STRING_LENGTH);
      }
    }
    
    if ($filter[self::FILTER_REQUIRE_STRING_INTEGER]) {
      if (!preg_match('/\d/', $value)) {
        throw new ReformException(ReformException::NOT_CORRECT_STRING);
      }
    }
    if ($filter[self::FILTER_REQUIRE_STRING_LOVER]) {
      if (!preg_match('/[a-z]/', $value)) {
        throw new ReformException(ReformException::NOT_CORRECT_STRING);
      }
    }
    if ($filter[self::FILTER_REQUIRE_STRING_UPPER]) {
      if (!preg_match('/[A-Z]/', $value)) {
        throw new ReformException(ReformException::NOT_CORRECT_STRING);
      }
    }
    
    return hash($filter[static::FILTER_HASH], $value);
  }
}
