<?php
define('EOL', "<br>");
abstract class AbsA {
    // Khai báo  định nghĩa hàm
    public function AFooA(){
        echo 'AFooA'.EOL;
    }
    // Khai báo ko định nghĩa hàm
    abstract function BFooB();
}
interface IA {
    public function IFooA();
    
  }
  
interface IB{
    public function IFooB();
  
}
// Full OOP 
class Ex01 extends AbsA implements IA,IB {

    public function IFooAB() {
        // Implementation of IFooAB
    }

    public function SFooA() {
        // Implementation of SFooA
    }
    public function IFooA() {
        // Implementation of IFooAB
    }

    public function IFooB() {
        // Implementation of IFooAB
    }

    public function NotDeclare() {
        // Implementation of NotDeclare
    }

    protected function Foo() {
        // Implementation of Foo
    }

    public function BFooB() {
        // Implementation of BFooB
    }
}
$test = new Ex01();
$test->AFooA();
$test->BFooB();
$test->IFooA();
$test->IFooB();