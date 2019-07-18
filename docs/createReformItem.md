# Example create :
```php
<?php

namespace Oploshka\ReformItem;

class ExampleName implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    return null;
  }
}
```

# Real example create user token reform item:
```php
<?php

namespace Oploshka\ReformItem;

use Database; 

class TokenReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return null;}
    $_sql = Database::getConnection();
    // DBAL SQL example:
    $userInfo = $_sql->fetchAssoc(
      'SELECT
      *
    FROM
      users
    WHERE
      token = :token
    ',
      [
        'token'    => $value,
      ]
    );
  
    if(!$userInfo){ return null; }
  
    return $userInfo;
  }
}
```

# Real example create city reform item:
```php
<?php

namespace Oploshka\ReformItem;

use Database; 

class CityReform implements \Oploshka\Reform\ReformItemInterface {

  private static $settings = [];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    if(!is_string($value)) {return null;}
    $_sql = Database::getConnection();
    // DBAL SQL example:
    $cityInfo = $_sql->fetchAssoc(
      'SELECT
      *
    FROM
      city
    WHERE
      LOWER(name) = :cityName
    ',
      [
        'cityName'    => strtolower($value),
      ]
    );
  
    if(!$cityInfo){ return null; }
  
    return $cityInfo;
  }
}
```