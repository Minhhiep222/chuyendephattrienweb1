<?php
define('EOL', "<br>");
abstract class AbsA {
    // Khai báo  định nghĩa hàm
    public function AFooA(){
        echo 'AFooA';
    }
}

interface IA {
    public function IFooA(); 
  }
  
interface IB{
    public function IFooB();
  
}
$dong = function(){
    return $this->Foo();
};
// Full OOP 
class Ex02 extends AbsA implements IA,IB {
  
    public function IFooA() {
        // Implementation of IFooA
    }

    public function NotDeclare() {
        // Implementation of NotDeclare
    }

    public function IFooAB() {
        // Implementation of IFooAB
    }

    public function SFooA() {
        // Implementation of SFooA
    }

    public function IFooB() {
        // Implementation of IFooB
    }

    protected function Foo() {
        // Implementation of Foo
    }

    public function BFooB() {
        // Implementation of BFooB
    }
   
}
$test = new Ex02();
$test->AFooA();

$test->IFooA();
$test->IFooB();
// AbsA::AFooA();