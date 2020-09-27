<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class ArrayReformItemDebug extends ReformItemAbstract implements ReformItemInterface {
  
  /**
   * @param $items
   * @param ReformSchema $reformSchema
   * @param Reform $reform
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static function reformValidate($items, ReformSchema $reformSchema, Reform $reform) {
    $exception = [];
    
    $returnValue = [];
    $filter = $reformSchema->getFilter();
    foreach ($filter as $key => $reformItemSchema) {
      /** @var $reformItemSchema \Oploshka\Reform\ReformSchema */
      $isRequire = $reformItemSchema->getRequire();
      
      // если обязательное поле отсутствует или равно null, пустая строка
      if(!isset($items[$key]) || $items[$key] === null /*|| $items[$key] === ''*/ ) {
        // обязательно ли поле?
        if($isRequire){
          // TODO: fix
          // throw new ReformException(ReformException::NOT_REQUIRE_FIELD);
          $exception[$key] = (object) [ 'name' =>  $key, 'type' => $reformItemSchema->getType(), 'error' => ReformException::NOT_REQUIRE_FIELD ];
          continue;
        }
        // поле необязательно
        $returnValue[$key] = $reformItemSchema->getDefaultValue();
        continue;
      }
      // если поле есть то проверим его
      try {
        $returnValue[$key] = $reform->item($items[$key], $reformItemSchema);
      } catch (ReformException $e) {
        $errorDetails = $e->getDetails();
        if(empty($errorDetails)) {
          $exception[$key] = (object) [ 'name' =>  $key, 'type' => $reformItemSchema->getType(), 'error' => $e->getMessage() ];
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
