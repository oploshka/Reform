<?php

namespace Oploshka\Reform;

use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;

abstract class ReformCore implements \Oploshka\Reform\ReformInterface {
  
  protected array $reformMethods = [];

  function  __construct(){
    $this->initDefaultReformMethod();
  }

  public function initDefaultReformMethod() {
    $this->addReformMethod(ReformType::STRING         );
    $this->addReformMethod(ReformType::INTEGER        );
    // $this->addReformMethod(ReformType::FLOAT          );
    // $this->addReformMethod(ReformType::EMAIL          );
    // $this->addReformMethod(ReformType::PASSWORD       );
    // $this->addReformMethod(ReformType::ORIGIN         );
    // $this->addReformMethod(ReformType::DATE_TIME      );
    // $this->addReformMethod(ReformType::JSON           );
    // $this->addReformMethod(ReformType::OBJECT_TO_JSON );
    // $this->addReformMethod(ReformType::ARRAY          );
    // $this->addReformMethod(ReformType::SIMPLE_ARRAY   );
  }
  public function addReformMethod($class) {
    // TODO: test $class to string
    $this->reformMethods[$class] = $class;
    return $this;
  }
  public function deleteReformMethod($class) {
    // TODO: test $class to string
    unset( $this->reformMethods[$class] );
    return $this;
  }
  

  public function setError($errorCode='', $message='', $data = []){}
  public function resetError(){}
  public function getError(){ return []; }

  /**
   *
   * Функция валидации переменной
   *
   * @param $item
   * @param ReformSchema $schema
   * @return mixed
   * @throws ReformException
   */
  abstract public function item($item, ReformSchema $schema);
  
}
