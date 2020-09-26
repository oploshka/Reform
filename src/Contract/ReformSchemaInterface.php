<?php

namespace Oploshka\Reform\Contract;

interface ReformSchemaInterface {
  
  /**
   * @return mixed|null
   */
  public function getDefaultValue(): ?mixed;

  /**
   * @return bool
   */
  public function getRequire(): bool;
  
  /**
   * @return array
   */
  public function getValidate(): array;
  
}
