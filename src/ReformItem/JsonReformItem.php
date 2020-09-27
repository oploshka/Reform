<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Exception\ReformException;

class JsonReformItem extends ReformItemAbstract implements ReformItemInterface {

  public static function validate($value) {
    if (!is_string($value)) {
      throw new ReformException(ReformException::NOT_STRING);
    }
    $value = (array) json_decode ($value, true);
    if (json_last_error() != 0){
      throw new ReformException(ReformException::NOT_STRING);
    }
    return $value;
  }
  protected static function filterItem($value, $filter) {
    return $value;
  }
}
