<?php

namespace Rpc\Utils\Validate\system;

/**
 * Class SimpleArrayValidate validate each item of array by validation scheme
 * 
 * Default type 'string'
 * 
 */
class SimpleArrayValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [
    'type'      => 'string',
    'validate'  => []
  ];

  public static function getSettings(){
    return self::$settings;
  }
  
  /**
   * Validate each item of array by validation scheme in $validate variable
   * 
   * <code>
   * SimpleArrayValidate::validate([0 => 12], ['type' => 'int', 'validate' => ['min' => 0, 'max' => 20]]);
   * </code>
   * 
   * @param array $items
   * @param array $validate
   * @return array|null
   */
  public static function validate($items, $validate = array()) {
    $value    = array();    
    
    foreach($items as $key => $item){
      $value[$key] = \Rpc\Utils\Validate::item($item, $validate);
      
      if( $value[$key] === NULL ) {
        return NULL;
      }
      
    }
    
    return $value;
  }
}
