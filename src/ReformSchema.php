<?php

namespace Oploshka\Reform;

class ReformSchema implements \Oploshka\Reform\Contract\ReformSchemaInterface {
  
  private $type;
  private $defaultValue;
  private bool $require;
  private array $validate;
  
  function  __construct($type, bool $require = true, array $validate = [], $defaultValue = null){
    $this->require      = $require;
    $this->validate     = $validate;
    $this->defaultValue = $defaultValue;
  }
  
  public function getDefaultValue(): ?mixed {
    return $this->defaultValue;
  }
  
  public function getRequire(): bool {
    return $this->require;
  }
  
  public function getValidate(): array {
    return $this->validate;
  }
  
}
