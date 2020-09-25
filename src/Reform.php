<?php

namespace Oploshka\Reform;

use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;

class Reform implements \Oploshka\Reform\ReformInterface {
  
  private $reformMethods = [
    ReformType::STRING         => ReformType::STRING         ,
    ReformType::INTEGER        => ReformType::INTEGER        ,
    ReformType::FLOAT          => ReformType::FLOAT          ,
    ReformType::EMAIL          => ReformType::EMAIL          ,
    ReformType::PASSWORD       => ReformType::PASSWORD       ,
    ReformType::ORIGIN         => ReformType::ORIGIN         ,
    ReformType::DATE_TIME      => ReformType::DATE_TIME      ,
    ReformType::JSON           => ReformType::JSON           ,
    ReformType::OBJECT_TO_JSON => ReformType::OBJECT_TO_JSON ,
    ReformType::ARRAY          => ReformType::ARRAY          ,
    ReformType::SIMPLE_ARRAY   => ReformType::SIMPLE_ARRAY   ,
    /*
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
    */
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
    if( $item === null )                { throw new ReformException('ITEM_NULL'); }
    if( !is_array($validate) )          { throw new ReformException('VALIDATE_IS_NOT_ARRAY'); }
    if( !isset($validate['type']) )     { throw new ReformException('VALIDATE_TYPE_NO_ISSET'); }
    if( !is_string($validate['type']) ) { throw new ReformException('VALIDATE_TYPE_NO_STRING'); }
    if(!isset($this->reformMethods[ $validate['type'] ])){
      throw new ReformException('NO_CORRECT_VALIDATE_TYPE');
    }
    //
    $ValidateClassName = $this->reformMethods[ $validate['type'] ];
    $useClass = new $ValidateClassName();
    // проверим реализует ли класс наш интерфейс
    if ( !($useClass instanceof \Oploshka\Reform\ReformItemInterface ) ) {
      throw new ReformException('ITEM_INTERFACE');
    }
  
    $_validate = $validate['validate'] ?? [];
    return $useClass::validate($item, $_validate, $this);
  }
  
}
