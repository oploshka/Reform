<?php

namespace Oploshka\Reform;

interface ReformInterface {
  
    public static function getSettings();
    
    public static function validate($value, $validate );
    
  }