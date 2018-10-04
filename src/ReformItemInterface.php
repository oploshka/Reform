<?php

namespace Oploshka\Reform;

interface ReformItemInterface {
  public static function getSettings();
  public static function validate($value, $validate);
}
