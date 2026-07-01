<?php

declare(strict_types=1);

// require "./Person.php";

class Employee extends Person 
{
    public int $empId;
    public string $job;

    public float $bsalary = 0;

    public float $bounus;

    public float $totalSalary = 0;


  public function __construct(int $id, string $fn, string $ln, string $add, int $empId, string $job)
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
           $this->getEmpJob();

}


public function setBasicSalary(float $bsalary)
{
    $this->bsalary = $bsalary;

    return $this;
}

public function setBonus(float $bons)
{
    $this->bounus = $bons;

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





}