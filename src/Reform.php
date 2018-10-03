<?php

namespace Oploshka\Reform;

class Reform implements \Oploshka\Reform\ReformInterface {
  
  private $reformMethods;

  function  __construct($reformMethods){
    $this->reformMethods = $reformMethods;
  }
  /*
  // TODO: delete
  private static $validateMethods = [
    // system
    'string'        => '\\Rpc\\Utils\\Validate\\system\\StringValidate'       ,
    'int'           => '\\Rpc\\Utils\\Validate\\system\\IntValidate'          ,
    'float'         => '\\Rpc\\Utils\\Validate\\system\\FloatValidate'        ,
    'json'          => '\\Rpc\\Utils\\Validate\\system\\JsonValidate'         ,
    'email'         => '\\Rpc\\Utils\\Validate\\system\\EmailValidate'        ,
    'password'      => '\\Rpc\\Utils\\Validate\\system\\PasswordValidate'     ,
    'origin'        => '\\Rpc\\Utils\\Validate\\system\\OriginValidate'       ,
    'datetime'      => '\\Rpc\\Utils\\Validate\\system\\DateTimeValidate'     ,
    
    'array'         => '\\Rpc\\Utils\\Validate\\system\\ArrayValidate'        ,
    'simple_array'  => '\\Rpc\\Utils\\Validate\\system\\SimpleArrayValidate'  ,
    
    // custom
    'token'         => '\\Rpc\\Utils\\Validate\\custom\\TokenValidate'        ,
    'city'          => '\\Rpc\\Utils\\Validate\\custom\\CityValidate'         ,    
  ];
  */
  
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
    if ( !($useClass instanceof \Oploshka\ReformItemInterface ) ) { return NULL; }
  
    $_validate = $validate['validate'] ?? [];
    return $useClass::validate($item, $_validate);
  }
  
}
