<?php

namespace Rpc\Utils\Validate\custom;

use Database;

class CityValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return NULL;}
    $_sql = iwDatabase::getConnection();
  
    $cityInfo = $_sql->fetchAssoc(
      'SELECT
      *
    FROM
      tbl_city
    WHERE
      LOWER(name) = :cityName
    ',
      [
        'cityName'    => strtolower($value),
      ]
    );
  
    if(!$cityInfo){ return NULL; }
  
    return $cityInfo;
  }
}
