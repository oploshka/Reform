<?php

namespace Oploshka\Reform\Contract;

use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

abstract class ReformItemAbstract /* implements \Oploshka\Reform\ReformItemInterface */{
  
  /**
   * @param array
   */
  const FILTER = [];
  
  /**
   * @return array
   */
  public static function getFilter(): array {
    return static::FILTER;
  }
  
  /**
   * @param array $filter
   * @return array
   */
  public static function mergeFilter(array $filter): array {
    $newFilter = [];
    foreach (static::FILTER as $key => $value) {
      $newFilter[$key] = isset($filter[$key]) ? $filter[$key] : static::FILTER[$key];
    }
    return $newFilter;
  }
  
  /**
   * @param $value
   * @param ReformSchema $reformSchema
   * @param Reform $reform
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static function reformValidate($value, ReformSchema $reformSchema, Reform $reform) {
    $value = static::validate($value);
    $value = static::filter($value, $reformSchema->getFilter());
    return $value;
  }
  
  /**
   * @param $value
   * @param array $filter
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  public static final function filter($value, array $filter) {
    $filter = static::mergeFilter($filter);
    return static::filterItem($value, $filter);
  }
  
  /**
   * @param $value
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  abstract public static function validate($value);
  
  /**
   * @param $value
   * @return mixed|null
   * @throws \Oploshka\Reform\Exception\ReformException
   */
  abstract protected static function filterItem($value, $filter);
  
  
  //  abstract public static function getName():string;
  //  abstract public static function validate($value, $validate = []);
}
