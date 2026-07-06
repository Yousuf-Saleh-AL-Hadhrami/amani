<?php

declare(strict_types=1);

namespace Person;

use Moe\Oop\Person\Person;
use Notification;

// require "./Person.php";

class Employee extends Person implements \Rule , \Certificate
{
     use Notification;
    public ?int $empId = null;
    public string $job;

    public float $bsalary = 0;

    public float $bounus =0;

    public float $totalSalary = 0;

    private float $ejadaReward;

    protected string $certificate;



  public function __construct(int $id, string $fn, string $ln, string $add, ?int $empId = null, string $job = '')
{
    parent::__construct($id, $fn, $ln, $add);

    $this->empId = $empId;
    $this->job = $job;
}

public function setId(int $id)
{
    $this->id = $id;

    return $this;
}


public function getEmpId()
{
    return $this->empId;
}

public function getEmpJob()
{
    return $this->job;
}


// Method Overriding
public function showDetails()
{
    return
      parent::showDetails() . " ".
           $this->getEmpId() . " ".
           $this->getEmpJob(). " ". 
           $this->emailNotification("السلام عليكم هذا إميل من الشركة");

}


public function setBasicSalary(float $bsalary)
{
    $this->bsalary = $bsalary;

    return $this;
}

public function setBonus(float $bons)
{
    $this->bounus += $bons;

    return $this;
}


public function setTotalSalary()

{
    $this->totalSalary = $this->bsalary += $this->bsalary * $this->bounus;

    return $this;
}

public function deduction(float $deduction)
{
    $this->totalSalary -= $this->totalSalary * $deduction;

    return $this;
}


public function getTotalSalary()
{
    return $this->totalSalary;
}


public function getEjadaReward(array $credentials): bool|float
{
    $storedCredentials = ["username" => "test", "password" => "test"];

    // التأكد من وجود المفاتيح المطلوبة أولاً لتجنب الأخطاء
    if (!isset($credentials['username']) || !isset($credentials['password'])) {
        return false;
    }

    // التحقق من تطابق المدخلات مع البيانات المخزنة
    if($credentials['username'] === $storedCredentials['username'] 
        && $credentials['password'] === $storedCredentials['password'])
        {
            $this->ejadaReward = 500;

            return $this->ejadaReward;
        }
}


	public function attendence()
    {
       return 'Attendant';
    }

  
    public function leave()
    {
        return 'Leave';
    }



    public function itPolicy()
    {
        return 'Followed your It Policy';
    }


    #[Override]
    public function approveCertificate()
    {
       $this->certificate = 'Bachelors';
    }


    public static function who()
    {
        return __CLASS__;
    }



}