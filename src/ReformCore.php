<?php

namespace Oploshka\Reform;

use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;

abstract class ReformCore {
  
  protected array $reformMethods = [];

  function  __construct(){
    $this->initDefaultReformMethod();
  }

  public function initDefaultReformMethod() {
    $this->addReformMethod(ReformType::STRING         , \Oploshka\Reform\ReformItem\StringReformItem::class);
    $this->addReformMethod(ReformType::INTEGER        , \Oploshka\Reform\ReformItem\IntegerReformItem::class);
    $this->addReformMethod(ReformType::FLOAT          , \Oploshka\Reform\ReformItem\FloatReformItem::class);
    $this->addReformMethod(ReformType::EMAIL          , \Oploshka\Reform\ReformItem\EmailReformItem::class);
    $this->addReformMethod(ReformType::PASSWORD       , \Oploshka\Reform\ReformItem\PasswordReformItem::class);
    $this->addReformMethod(ReformType::ORIGIN         , \Oploshka\Reform\ReformItem\OriginReformItem::class);
    
    $this->addReformMethod(ReformType::DATE_TIME      , \Oploshka\Reform\ReformItem\DateTimeReformItem::class);
    $this->addReformMethod(ReformType::JSON           , \Oploshka\Reform\ReformItem\JsonReformItem::class);
    $this->addReformMethod(ReformType::OBJECT_TO_JSON , \Oploshka\Reform\ReformItem\ObjectToJsonReformItem::class);

    // $this->addReformMethod(ReformType::ARRAY          );
    // $this->addReformMethod(ReformType::SIMPLE_ARRAY   );
  }
  
  /**
   * @param $name
   * @param $class
   * @return $this
   * @throws ReformException
   */
  public function addReformMethod($name, $class) {
    $interfaces = class_implements( $class );
    if ( !isset( $interfaces['Oploshka\Reform\Contract\ReformItemInterface'] ) ) {
      throw new ReformException(ReformException::IS_NOT_REFORM_ITEM_INTERFACE);
    }
    $this->reformMethods[$name] = $class;
    return $this;
  }
  public function deleteReformMethod($name) {
    unset( $this->reformMethods[$name] );
    return $this;
  }
  public function getReformMethodClass($name){
    if ( !isset( $this->reformMethods[$name] ) ) {
      throw new ReformException(ReformException::REFORM_METHOD_UNDEFINED);
    }
    $reformClassName = $this->reformMethods[$name];
    return new $reformClassName();
  }
  

  public function setError($errorCode='', $message='', $data = []){}
  public function resetError(){}
  public function getError(){ return []; }

  /*
   *
   * Функция валидации переменной
   *
   * @param $item
   * @param ReformSchema $schema
   * @return mixed
   * @throws ReformException
  abstract public function item($item, ReformSchema $schema);
   */
  
}
