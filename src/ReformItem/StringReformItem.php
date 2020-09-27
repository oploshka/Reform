<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class StringReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN  = 'min';
  const FILTER_MAX  = 'max';
  const FILTER_TRIM = 'trim';
  const FILTER = [
    self::FILTER_MIN => 0,
    self::FILTER_MAX => 1000000000,
    self::FILTER_TRIM => true,
  ];
  
  public static function validate($value) {
    switch (gettype($value)) {
      // case 'integer':
      //   $value = (string) $value;
      //   break;
      case 'string':
        break;
      default:
        throw new ReformException(ReformException::NOT_STRING);
    }
    return $value;
  }
  
  protected static function filterItem($value, $filter) {
    if ($filter[self::FILTER_TRIM]) {
      $value = trim ($value);
    }
    $len = strlen ( $value );
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
    return $value;
  }
  
}
