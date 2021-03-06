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
    'objToJson'     => 'Oploshka\\ReformItem\\ObjToJsonReform'   ,
    
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

  public function setError($errorCode='', $message='', $data = []){}
  public function resetError(){}
  public function getError(){ return []; }

  /*
   * Функция валидации переменной
   */
  public function item($item = null, $validate = array() ){
    // проверим данные на существование
    if( $item === null )                { return null; }
    if( !is_array($validate) )          { return null; }
    if( !isset($validate['type']) )     { return null; }
    if( !is_string($validate['type']) ) { return null; }
    if(!isset($this->reformMethods[ $validate['type'] ])){ return null; }
    //
    $ValidateClassName = $this->reformMethods[ $validate['type'] ];
    $useClass = new $ValidateClassName();
    // проверим реализует ли класс наш интерфейс
    if ( !($useClass instanceof \Oploshka\Reform\ReformItemInterface ) ) { return null; }
  
    $_validate = $validate['validate'] ?? [];
    return $useClass::validate($item, $_validate, $this);
  }
  
}
