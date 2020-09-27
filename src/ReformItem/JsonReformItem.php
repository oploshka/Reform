<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class JsonReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  public static function validate2($value, ReformSchema $reformSchema, Reform $reform) {
    
    // $filter = self::mergeFilter($reformSchema->getFilter());
    
    $value = $reform->item($value, new ReformSchema(ReformType::STRING, $filter) );
    
    $date = \DateTime::createFromFormat($filter[static::FILTER_FORMAT], $value);
    
    $error = \DateTime::getLastErrors();
    if ($error['warning_count'] != 0 || $error['error_count'] != 0) {
      throw new ReformException(ReformException::NOT_DATE_TIME);
    }
    
    if(!is_string($value)) {return null;}
    $value = (array) json_decode ($value, true);
    if (json_last_error() != 0){return null;}
    return $value;
  }
  public static function validate($value) {
    // TODO: Implement validate() method.
  }
  protected static function filterItem($value, $filter) {
    // TODO: Implement filterItem() method.
  }
}
