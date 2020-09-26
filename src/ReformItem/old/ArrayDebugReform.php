<?php

namespace Oploshka\ReformItem;

class ArrayDebugReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($items, $validates = array(), $Reform = null, $parentPath = []) {
    $error = false;
    $value = array();
  
    foreach($validates as $key => $validate){

      if( !isset($validate['parentPath']) ){ $validate['parentPath'] = $parentPath; }
      $validate['parentPath'][] = $key;

      // если обязательное поле отсутствует или равно null, пустая строка
      if(!isset($items[$key]) || $items[$key] === null ) {
        // обязательно ли поле?
        if(!(isset($validate['req']) && $validate['req']==false)){
          $Reform->setError('FIELD', '', [ 'name' =>  $key, 'type' => $validate['type'] ?? '', 'path' => $validate['parentPath'] ]);
          $error = true;
        }
        // поле необязательно
        $value[$key] = null;
        continue;
      }
      // если поле есть то проверим его

      $value[$key] = $Reform->item($items[$key], $validate);
    
      if( $value[$key] === null ) {
        $Reform->setError('FIELD', '', [ 'name' =>  $key, 'type' => $validate['type'] ?? '', 'path' => $validate['parentPath'] ]);
        $error = true;
      }
    }

    if($error){
      return null;
    }
    return $value;
  }

}
