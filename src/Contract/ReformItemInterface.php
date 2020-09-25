<?php

namespace Oploshka\Reform\Contract;

interface ReformItemInterface {
  public static function getSettings();
  public static function validate($value, $validate);
}
