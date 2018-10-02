<?php

namespace Rpc\Utils\Validate\custom;

use \Database;

class TokenValidate implements \Rpc\Utils\ValidateInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    
    if(!is_string($value)) {return NULL;}
    // вытаскиваем данные пользователя по email
    $_sql = iwDatabase::getConnection();
  
    $userInfo = $_sql->fetchAssoc(
      'SELECT
      *
    FROM
      tbl_users
    WHERE
      api_token = :api_token
    ',
      [
        'api_token'    => $value,
      ]
    );
  
    if(!$userInfo){ return NULL; }
  
    return $userInfo;
  }
}
