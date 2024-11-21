<?php
define('EOL', "<br>");
abstract class AbsA {
    // Khai báo  định nghĩa hàm
    public function AFooA(){
        echo 'Declare'.EOL;
    }
    // Khai báo ko định nghĩa hàm
    abstract function BFooB();
}
interface IA {
    // Báo lỗi Interface must be public
    public function IFooA();
    
    }
  
interface IB{
    // Báo lỗi Interface must be public
    public function IFooB();
  
}
// Full OOP 
class Ex01 extends AbsA implements IA,IB {

   
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
$test = new Ex01();
$test->AFooA();
$test->BFooB();