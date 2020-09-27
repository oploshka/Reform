<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class SimpleArrayReformItemDebug extends ReformItemAbstract implements ReformItemInterface {
  
  /**
   * @param $value
   * @param ReformSchema $reformSchema
   * @param Reform $reform
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static function reformValidate($value, ReformSchema $reformSchema, Reform $reform) {
    $errorDetails = [];
    
    $returnValue = [];
    $filter = $reformSchema->getFilter();
    foreach ($value as $key => $item) {
      try {
        $returnValue[$key] = $reform->item($item, $filter['type']);
      } catch (ReformException $e) {
        $errorDetails = $e->getDetails();
        if(empty($errorDetails)) {
          $exception[$key] = (object) [ 'name' =>  $key, 'type' => $reformSchema->getType(), 'error' => $e->getMessage() ];
        } else {
          $exception[$key] = $e->getDetails();
        }
        // $exception[$key] = (object) [ 'name' =>  $key, 'type' => $reformItemSchema->getType(), 'error' => $e->getMessage(), 'details' => $e->getDetails() ];
      }
      
    }
  
    if(!empty($exception)){
      throw new ReformException(ReformException::NOT_CORRECT_ARRAY, 0, null, $exception);
    }
    return $returnValue;
  }
  
  public static function validate($value) {
    return $value;
  }
  protected static function filterItem($value, $filter) {
    return $value;
  }
}
