<?php

namespace Oploshka\Reform;

class Reform implements \Oploshka\Reform\ReformInterface {
  
  private $reformMethods;

  function  __construct($reformMethods){
    $this->reformMethods = $reformMethods;
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
