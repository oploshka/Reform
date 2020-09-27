<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class DateTimeReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_FORMAT = 'format';
  
  const FILTER = [
    self::FILTER_FORMAT => 'Y-m-d',
  ];
  
  public static function validate($value) {
    if (!is_string($value)) {
      throw new ReformException(ReformException::NOT_STRING);
    }
    return $value;
  }
  
  protected static function filterItem($value, $filter) {
    $date = \DateTime::createFromFormat($filter[static::FILTER_FORMAT], $value);
  
    $error = \DateTime::getLastErrors();
    if ($error['warning_count'] != 0 || $error['error_count'] != 0) {
      throw new ReformException(ReformException::NOT_DATE_TIME);
    }
  
    return $date;
  }
  
  
}
