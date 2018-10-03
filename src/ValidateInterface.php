<?php

namespace Rpc\Utils;

interface ValidateInterface {
  
  public static function getSettings();
  
  public static function validate($value, $validate );
  
}
