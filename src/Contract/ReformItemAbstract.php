<?php

namespace Oploshka\Reform\Contract;

use Oploshka\Reform\ReformSchema;

abstract class ReformItemAbstract /* implements \Oploshka\Reform\ReformItemInterface */ {
  
  const FILTER = [];
  public static function getFilter(): array{
    return static::FILTER;
  }
  
  public static function mergeFilter(array $filter) {
    $newFilter = [];
    foreach (static::FILTER as $key => $value) {
      $newFilter[$key] = isset($filter[$key]) ? $filter[$key] : static::FILTER[$key];
    }
    return $newFilter;
  }
  
//  abstract public static function getName():string;
//  abstract public static function validate($value, $validate = []);
}
