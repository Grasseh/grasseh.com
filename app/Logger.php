<?php
  class Log{
    private static function Write($type,$type_message,$data){
      $time = microtime(true);
      $micro = sprintf("%06d",($time - floor($time)) * 1000000);
      $date = new DateTime( date('Y-m-d H:i:s.'.$micro, $time) );
      $object = array("type" => $type,"type_message" => $type_message, "date" => $date->format("Y-m-d H:i:s.u e"));
      foreach($data as $key=>$value){
        $object[$key] = $value;
      }
      //Additionnal data
      $object["request_uri"] = $_SERVER["REQUEST_URI"];
      $object["remote_addr"] = $_SERVER["REMOTE_ADDR"];

      $data = json_encode($object);
      //Write to file TODO: Make a folder per month.
      $file = 'logs/' . $date->format("Ymd") . '.txt' ;
      file_put_contents($file, $data . "\n", FILE_APPEND | LOCK_EX);
    }


    public static function Critical($data){
      Log::Write(1,"Critical",$data);
    }

    public static function Error($data){
      Log::Write(2,"Error",$data);
    }

    public static function Warn($data){
      Log::Write(3,"Warn",$data);
    }

    public static function Info($data){
      Log::Write(4,"Info",$data);
    }

    public static function Debug($data){
      Log::Write(5,"Debug",$data);
    }
  }
?>
