<?php

namespace Rpc\Utils\Validate\system;

use Rpc\Utils\ValidateInterface;
use Rpc\Utils\Validate\system\StringValidate;

/**
 * Class DateTimeValidate convert string value to DateTime object
 * 
 * Default format='Y-m-d'
 * 
 */
class DateTimeValidate implements ValidateInterface {

  private static $settings = ['format' => 'Y-m-d']; // ISO8601

  public static function getSettings() {
    return self::$settings;
  }
  
  /**
   * Validate input string $value. Convert and return DateTime object
   * 
   * <code>
   * DateTimeValidate::validate('2018-05-30', ['format' => 'Y-m-d']);
   * </code>
   * 
   * @param string $value
   * @param array $validate 
   * @return \DateTime|null Return NULL on error during validation
   */
  public static function validate($value, $validate = array()) {

    $str_value = StringValidate::validate($value);

    if ($str_value === NULL) {
      return NULL;
    }

    $format = self::$settings['format'];

    if (isset($validate['format'])) {
      $format = $validate['format'];
    }
    
    $date = \DateTime::createFromFormat($format, $str_value);

    $error = \DateTime::getLastErrors();

    if ($error['warning_count'] != 0 || $error['error_count'] != 0) {
      return NULL;
    }

    return $date;
  }

}
