<?php 

namespace Person;

class DailyEmployee extends Employee
{
   public int $days;

   public float $rate;


   public function setDays(int $days)
   {
    $this->days = $days;

    return $this;
   }

    public function setRate(float $rate)
   {
    $this->rate = $rate;

    return $this;
   }


   /// Method Overriding the Employee class method

   public function getTotalSalary()

{
    return $this->days * $this->rate;
}


public function showDetails()
{
    return
      parent::showDetails() . " ".
           $this->getEmpId() . " ".
           $this->getEmpJob() . " ". 
           $this->getTotalSalary();

}


public static function who()
{
    return  __CLASS__;
}

}