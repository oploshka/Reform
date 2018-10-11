<?php

namespace Oploshka\Reform;

class Reform implements \Oploshka\Reform\ReformInterface {
  
  private $reformMethods = [
    'string'        => 'Oploshka\\ReformItem\\StringReform'       ,
    'int'           => 'Oploshka\\ReformItem\\IntReform'          ,
    'float'         => 'Oploshka\\ReformItem\\FloatReform'        ,
    'email'         => 'Oploshka\\ReformItem\\EmailReform'        ,
    'password'      => 'Oploshka\\ReformItem\\PasswordReform'     ,
    'origin'        => 'Oploshka\\ReformItem\\OriginReform'       ,
    'datetime'      => 'Oploshka\\ReformItem\\DateTimeReform'     ,
    'json'          => 'Oploshka\\ReformItem\\JsonReform'         ,
    'objToJson'     => 'Oploshka\\ReformItem\\JsonStringReform'   ,
    
    'array'         => 'Oploshka\\ReformItem\\ArrayReform'        ,
    'simpleArray'   => 'Oploshka\\ReformItem\\SimpleArrayReform'  ,
  ];

  function  __construct($reformMethods = []){
    $this->reformMethods = array_merge($this->reformMethods, $reformMethods);
    foreach ($this->reformMethods as $key => $val){
      if($val === false){
        unset($this->reformMethods[$key]);
      }
    }
  }
  
  /*
   * Функция валидации переменной
   */
  public function item($item = NULL, $validate = array() ){
    // проверим данные на существование
    if( $item === NULL )                { return NULL; }
    if( !is_array($validate) )          { return NULL; }
    if( !isset($validate['type']) )     { return NULL; }
    if( !is_string($validate['type']) ) { return NULL; }
    if(!isset($this->reformMethods[ $validate['type'] ])){ return NULL; }
    //
    $ValidateClassName = $this->reformMethods[ $validate['type'] ];
    $useClass = new $ValidateClassName();
    // проверим реализует ли класс наш интерфейс
    if ( !($useClass instanceof \Oploshka\Reform\ReformItemInterface ) ) { return NULL; }
  
    $_validate = $validate['validate'] ?? [];
    return $useClass::validate($item, $_validate, $this);
  }
  
}
