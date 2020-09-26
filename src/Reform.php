<?php

namespace Oploshka\Reform;

use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\ReformSchema;

class Reform extends ReformCore implements \Oploshka\Reform\ReformInterface {
  
  //  public function setError($errorCode='', $message='', $data = []){}
  //  public function resetError(){}
  //  public function getError(){ return []; }
  

  public function item($item, ReformSchema $schema){
    
    // проверим данные на существование
    // if( $item === null ) {
    //   throw new ReformException('ITEM_NULL');
    // }
    if( !is_array($validate) ) {
      throw new ReformException(ReformException::VALIDATE_IS_NOT_ARRAY);
    }
    if( !isset($validate['type']) ) {
      throw new ReformException(ReformException::VALIDATE_TYPE_NO_ISSET);
    }
    if( !is_string($validate['type']) ) {
      throw new ReformException('VALIDATE_TYPE_NO_STRING');
    }
    if(!isset($this->reformMethods[ $validate['type'] ])){
      throw new ReformException('NO_CORRECT_VALIDATE_TYPE');
    }
    //
    $ValidateClassName = $this->reformMethods[ $validate['type'] ];
  
    // проверим реализует ли класс наш интерфейс
    $interfaces = class_implements( $ValidateClassName );
    if ( !isset( $interfaces['Oploshka\Reform\Contract\ReformItemInterface'] ) ) {
      throw new \RpcException('ERROR_NOT_INSTANCEOF_INTERFACE');
    }
    
    $useClass = new $ValidateClassName();
    // if ( !($useClass instanceof \Oploshka\Reform\Contract\ReformItemInterface ) ) {
    //   throw new ReformException('ITEM_INTERFACE');
    // }
  
    $_validate = $validate['validate'] ?? [];
    return $useClass::validate($item, $_validate, $this);
  }
  
}
