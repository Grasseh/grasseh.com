<?php
  class Log{
    private static function Write($type,$type_message,$data){
      $t = microtime(true);
      $micro = sprintf("%06d",($t - floor($t)) * 1000000);
      $date = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
      $object = array("type" => $type,"type_message" => $type_message, "date" => $date->format("Y-m-d H:i:s.u e"));
      foreach($data as $key=>$value){
        $object[$key] = $value;
      }
      //Additionnal data
      $object["request_uri"] = $_SERVER["REQUEST_URI"];
      $object["remote_addr"] = $_SERVER["REMOTE_ADDR"];

      $data = json_encode($object);
      //Write to file TODO:Make a file per day. Blergh
      $file = 'logs/log.txt' ;
      file_put_contents($file, $data . "\n", FILE_APPEND | LOCK_EX);
    }


    public static function Critical($data){
      Log::Write(1,"critical",$data);
    }

    public static function Warn($data){
      Log::Write(2,"warn",$data);
    }

    public static function Info($data){
      Log::Write(3,"info",$data);
    }
  }
?>
