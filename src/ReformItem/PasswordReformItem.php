<?php

namespace Oploshka\Reform\ReformItem;

use Oploshka\Reform\Contract\ReformItemAbstract;
use Oploshka\Reform\Contract\ReformItemInterface;
use Oploshka\Reform\Enum\ReformType;
use Oploshka\Reform\Exception\ReformException;
use Oploshka\Reform\Reform;
use Oploshka\Reform\ReformSchema;

class PasswordReformItem extends ReformItemAbstract implements ReformItemInterface {
  
  const FILTER_MIN  = 'min';
  const FILTER_MAX  = 'max';
  const FILTER_TRIM = 'trim';
  const FILTER_HASH = 'hash';
  const FILTER_REQUIRE_STRING_INTEGER = 'requireStringInteger';
  const FILTER_REQUIRE_STRING_LOVER   = 'requireStringLover';
  const FILTER_REQUIRE_STRING_UPPER   = 'requireStringUpper';
  
  const FILTER = [
    self::FILTER_MIN                    => 6,
    self::FILTER_MAX                    => 256,
    self::FILTER_TRIM                   => false,
    self::FILTER_HASH                   => 'sha512',
    self::FILTER_REQUIRE_STRING_INTEGER => false,
    self::FILTER_REQUIRE_STRING_LOVER   => false,
    self::FILTER_REQUIRE_STRING_UPPER   => false,
  ];
  
  public static function validate($value, ReformSchema $reformSchema, Reform $reform) {

    $filter = self::mergeFilter($reformSchema->getFilter());
  
    $value = $reform->item($value, new ReformSchema(ReformType::STRING, $filter) );
    
    // TODO: FILTER_REQUIRE_STRING_INTEGER, FILTER_REQUIRE_STRING_LOVER, FILTER_REQUIRE_STRING_UPPER
    // $alg  = self::$settings['alg'];
    // if($alg > 1){
    //   if(!preg_match('/\d/'   , $value)){ return null; }
    //   if(!preg_match('/[a-z]/', $value)){ return null; }
    //   if(!preg_match('/[A-Z]/', $value)){ return null; }
    // }
  
    //
    return hash($filter[static::FILTER_HASH], $value);
  }
}
