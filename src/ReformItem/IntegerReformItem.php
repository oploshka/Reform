<?php

namespace Oploshka\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class IntegerReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  public static function getName(): string {
    return 'integer';
  }
  protected static array $settings = [
    'min' => 0,
    'max'=>1000000000,
  ];

  public static function validate($value, $validate = array()) {
    $valueType = gettype ($value);
    if($valueType === 'integer'){
      //
    } else if($valueType === 'string'){
      if($value === ''){
        throw new \RpcException('ERROR_NOT_INSTANCEOF_INTERFACE');
        return null;
      }
      if(!is_numeric($value) ){return null;}
      $_v = intval($value);
      if($value !== (string) $_v ){return null;}
      $value = $_v;
    } else {
      return null;
    }
    
    // установки по умолчанию
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    //
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
  
    if($value < $min ){ return null; }
    if($value > $max ){ return null; }
    return (int) $value;
  }
  
}
