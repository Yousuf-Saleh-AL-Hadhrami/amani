<?php 

trait Notification
{

     public function emailNotification(string $email)
     {
         return $email;
     }

      public function DatabaseNotification(string $database)
     {
         return $database;
     }

      public function SmsNotification(string $sms)
     {
         return $sms;
     }
}