<?php

namespace Oploshka\ReformItem;

class PasswordReform implements \Oploshka\Reform\ReformItemInterface {
  
  private static $settings = [
    'min' => 6,
    'max' =>256,
    // TODO:
    'hash' => 'sha512',
    'intRequired'       => false,
    'lowerStringRequired' => false,
    'upperStringRequired' => false,
  ];

  public static function getSettings(){
    return self::$settings;
  }

  public static function validate($value, $validate = array()) {
    $min  = self::$settings['min'];
    $max  = self::$settings['max'];
    if(isset($validate['min']) )  { $min = $validate['min']; }
    if(isset($validate['max']) )  { $max = $validate['max']; }
    if(isset($validate['alg']) )  { $alg = $validate['alg']; }
  
    $value = StringReform::validate($value, ['trim' => false, 'min' => $min, 'max' => $max, ]);
    if( $value === NULL ) {return NULL;}
  
    // $alg  = self::$settings['alg'];
    // if($alg > 1){
    //   if(!preg_match('/\d/'   , $value)){ return NULL; }
    //   if(!preg_match('/[a-z]/', $value)){ return NULL; }
    //   if(!preg_match('/[A-Z]/', $value)){ return NULL; }
    // }
  
    //
    return hash('sha512', $value);
  }
}
