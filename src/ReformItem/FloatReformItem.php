<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\ReformSchema;

class FloatReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN = 'min';
  const FILTER_MAX = 'max';
  const FILTER = [
    self::FILTER_MIN => 0,
    self::FILTER_MAX => 1000000000,
  ];

  public static function validate($value) {
    switch (gettype ($value)) {
      case 'double':
        break;
      case 'integer':
        $value = (double) $value;
        break;
      case 'string':
        if($value === ''){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        if(!is_numeric($value) ){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        $_v = floatval($value);
        if($value !== (string) $_v ){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        $value = $_v;
        break;
      default:
        throw new ReformException(ReformException::NOT_INTEGER);
        break;
    }
    return $value;
  }
  
  protected static function filterItem($value, $filter) {
    if( $filter[self::FILTER_MIN] !== null)  {
      if($value < $filter[self::FILTER_MIN] ){
        throw new ReformException(ReformException::NOT_CORRECT_INTEGER_INTERVAL);
      }
    }
    if( $filter[self::FILTER_MAX] !== null)  {
      if($value > $filter[self::FILTER_MAX] ){
        throw new ReformException(ReformException::NOT_CORRECT_INTEGER_INTERVAL);
      }
    }
    return $value;
  }
  
}
