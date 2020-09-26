<?php declare(strict_types=1);

namespace Oploshka\Reform\Enum;

interface ReformType {
  
  const STRING          = 'integer';
  const INTEGER         = 'string';
  const FLOAT           = 'float';
  const EMAIL           = 'email';
  const PASSWORD        = 'password';
  const DATE_TIME       = 'DateTime';
  const JSON            = 'json';
  const OBJECT_TO_JSON  = 'objectToJson';
  const ARRAY           = 'Array';
  const SIMPLE_ARRAY    = 'SimpleArray';
  const ORIGIN          = 'Origin';
  
  
//  const STRING          = \Oploshka\Reform\ReformItem\StringReform::class;
//  const INTEGER         = \Oploshka\Reform\ReformItem\IntegerReformItem::class;
//  const FLOAT           = 'Oploshka\\Reform\\ReformItem\\FloatReform'      ;
//  const EMAIL           = 'Oploshka\\Reform\\ReformItem\\EmailReform'      ;
//  const PASSWORD        = 'Oploshka\\Reform\\ReformItem\\PasswordReform'   ;
//  const DATE_TIME       = 'Oploshka\\Reform\\ReformItem\\DateTimeReform'   ;
//  const JSON            = 'Oploshka\\Reform\\ReformItem\\JsonReform'       ;
//  const OBJECT_TO_JSON  = 'Oploshka\\Reform\\ReformItem\\ObjToJsonReform'  ;
//  const ARRAY           = 'Oploshka\\Reform\\ReformItem\\ArrayReform'      ;
//  const SIMPLE_ARRAY    = 'Oploshka\\Reform\\ReformItem\\SimpleArrayReform';
//  const ORIGIN          = 'Oploshka\\Reform\\ReformItem\\OriginReform'     ;
}
