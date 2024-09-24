<?php
define('EOL', "<br>");
class Person 
{
	static  $salary = 100000;

	public function __construct()
	{
	//Your logic for constructor
	}
  function __call($nameMethod,$hour){
    if($nameMethod == 'caculateSalary')// Tên phương khi gọi
        switch(count($hour))
	{
            case 0 : return self::$salary ;	// Không truyền tham số cho hàm		
            case 1 : return self::$salary * $hour[0] ;//Truyền 1 tham số
            
        }
    }
 
} 

Person::$salary = 130000;
 $per = new Person();
 echo "".$per->caculateSalary();			
 $per1 = new Person();
 echo "".$per1->caculateSalary(5);