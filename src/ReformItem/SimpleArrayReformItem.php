<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class SimpleArrayReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  /**
   * @param $value
   * @param ReformSchema $reformSchema
   * @param Reform $reform
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static function reformValidate($value, ReformSchema $reformSchema, Reform $reform) {
    $returnValue = [];
    $filter = $reformSchema->getFilter();
    foreach ($value as $key => $item) {
      $returnValue[$key] = $reform->item($item, $filter['type']);
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
