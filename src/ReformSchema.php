<?php

namespace Oploshka\Reform;

class ReformSchema implements \Oploshka\Reform\Contract\ReformSchemaInterface {
  
  private string $type;
  private array $filter;
  private bool $require;
  private $defaultValue;
  
  /**
   * ReformSchema constructor.
   * @param string $type
   * @param array $filter
   * @param bool $require
   * @param null $defaultValue
   */
  function  __construct(string $type, array $filter = [],  bool $require = true, $defaultValue = null){
    $this->type         = $type;
    $this->require      = $require;
    $this->filter       = $filter;
    $this->defaultValue = $defaultValue;
  }
  
  /////////////////////////////////////////
  /// getters
  public function getType(): string {
    return $this->type;
  }
  public function getFilter(): array {
    return $this->filter;
  }
  public function getRequire(): bool {
    return $this->require;
  }
  public function getDefaultValue(): ?mixed {
    return $this->defaultValue;
  }
  
}
