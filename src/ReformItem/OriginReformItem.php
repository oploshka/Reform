<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;

class OriginReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  public static function validate($value) {
    return $value;
  }
  protected static function filterItem($value, $filter) {
    return $value;
  }
}
