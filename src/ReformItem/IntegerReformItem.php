<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\ReformSchema;

class IntegerReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN = 'min';
  const FILTER_MAX = 'max';
  const FILTER = [
    self::FILTER_MIN => 0,
    self::FILTER_MAX => 1000000000,
  ];
  
  /**
   * @param $value
   * @param ReformSchema $reformSchema
   * @return int
   * @throws ReformException
   */
  public static function validate($value, ReformSchema $reformSchema) {
    switch (gettype ($value)) {
      case 'integer': break;
      case 'string':
        if($value === ''){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        if(!is_numeric($value) ){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        $_v = intval($value);
        if($value !== (string) $_v ){
          throw new ReformException(ReformException::NOT_INTEGER);
        }
        $value = $_v;
        break;
      default:
        throw new ReformException(ReformException::NOT_INTEGER);
        break;
    }
    $value = (int) $value;
    
    $filter = self::mergeFilter($reformSchema->getFilter());
    //
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
