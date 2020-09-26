<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\ReformSchema;

class OriginReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  public static function validate($value) {
    return $value;
  }
}
