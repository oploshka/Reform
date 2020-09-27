<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class EmailReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN  = 'min';
  const FILTER_MAX  = 'max';
  const FILTER_TRIM = 'trim';
  
  const FILTER = [
    self::FILTER_MIN                    => 1,
    self::FILTER_MAX                    => 256,
    self::FILTER_TRIM                   => true,
  ];
  
  
  public static function validate($value) {
    if (!is_string($value)) {
      throw new ReformException(ReformException::NOT_STRING);
    }
    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
      throw new ReformException(ReformException::NOT_CORRECT_EMAIL);
    }
    return $value;
  }
  
  protected static function filterItem($value, $filter) {
    return $value;
  }
  
}
