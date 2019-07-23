<?php

namespace Oploshka\ReformItem;

class SimpleArrayReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }
  
  public static function validate($items, $validate = array(), $Reform = null) {
    $value    = array();    
    
    foreach($items as $key => $item){
      $value[$key] = $Reform->item($item, $validate);
      
      if( $value[$key] === null ) {
        return null;
      }
      
    }
    
    return $value;
  }
}
