<?php

namespace Oploshka\ReformItem;

class SimpleArrayReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [
    'type'      => 'string',
    'validate'  => []
  ];

  public static function getSettings(){
    return self::$settings;
  }
  
  public static function validate($items, $validate = array(), $Reform = NULL) {
    $value    = array();    
    
    foreach($items as $key => $item){
      $value[$key] = $Reform->item($item, $validate);
      
      if( $value[$key] === NULL ) {
        return NULL;
      }
      
    }
    
    return $value;
  }
}
