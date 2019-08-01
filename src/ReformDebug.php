<?php

namespace Oploshka\Reform;

class ReformDebug implements \Oploshka\Reform\ReformInterface {

  private $reformMethods = [
    'string'        => 'Oploshka\\ReformItem\\StringReform'       ,
    'int'           => 'Oploshka\\ReformItem\\IntReform'          ,
    'float'         => 'Oploshka\\ReformItem\\FloatReform'        ,
    'email'         => 'Oploshka\\ReformItem\\EmailReform'        ,
    'password'      => 'Oploshka\\ReformItem\\PasswordReform'     ,
    'origin'        => 'Oploshka\\ReformItem\\OriginReform'       ,
    'datetime'      => 'Oploshka\\ReformItem\\DateTimeReform'     ,
    'json'          => 'Oploshka\\ReformItem\\JsonReform'         ,
    'objToJson'     => 'Oploshka\\ReformItem\\ObjToJsonReform'    ,
    
    'array'         => 'Oploshka\\ReformItem\\ArrayDebugReform'   ,
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

  private $error = [];
  public function setError($errorCode='', $message='', $data = []){
    $this->error[] = [
      'code'    => 'ERROR_VALIDATE_'.$errorCode ,
      'message' => $message,
      'data'    => $data,
    ];
  }
  public function resetError(){
    $this->error = [];
  }
  public function getError(){
    return $this->error;
  }

  /*
   * Функция валидации переменной
   */
  public function item($item = null, $validate = array() ){
    // проверим данные на существование
    if( $item === null )                { $this->setError('ITEM_NULL');       return null; }
    if( !is_array($validate) )          { $this->setError('NO_ARRAY');        return null; }
    if( !isset($validate['type']) )     { $this->setError('NO_TYPE');         return null; }
    if( !is_string($validate['type']) ) { $this->setError('TYPE_NOT_STRING'); return null; }
    if(!isset($this->reformMethods[ $validate['type'] ])){
      $this->setError('NO_REFORM_TYPE');
      return null;
    }
    //
    $ValidateClassName = $this->reformMethods[ $validate['type'] ];
    $useClass = new $ValidateClassName();
    // проверим реализует ли класс наш интерфейс
    if ( !($useClass instanceof \Oploshka\Reform\ReformItemInterface ) ) {
      $this->setError('REFORM_CLASS');
      return null;
    }
  
    $_validate = $validate['validate'] ?? [];
    $_parentPath = $validate['parentPath'] ?? [];
    $data = $useClass::validate($item, $_validate, $this, $_parentPath);
    //if($data === null) {
    //  $this->setError('FIELD', '', ['fieldName' => $item]);
    //}
    return $data;
  }
  
}
