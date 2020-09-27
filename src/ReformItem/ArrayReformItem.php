<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class ArrayReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  /**
   * @param $items
   * @param ReformSchema $reformSchema
   * @param Reform $reform
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static function reformValidate($items, ReformSchema $reformSchema, Reform $reform) {
    $returnValue = [];
    $filter = $reformSchema->getFilter();
    foreach ($filter as $key => $reformItemSchema) {
      /** @var $reformItemSchema \Oploshka\Reform\ReformSchema */
      $isRequire = $reformItemSchema->getRequire();
      
      // если обязательное поле отсутствует или равно null, пустая строка
      if(!isset($items[$key]) || $items[$key] === null /*|| $items[$key] === ''*/ ) {
        // обязательно ли поле?
        if($isRequire){
          throw new ReformException(ReformException::NOT_REQUIRE_FIELD);
        }
        // поле необязательно
        $returnValue[$key] = $reformItemSchema->getDefaultValue();
        continue;
      }
      // если поле есть то проверим его
      $returnValue[$key] = $reform->item($items[$key], $reformItemSchema);
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
