<?php
define('EOL', "<br>");
abstract class AbsA {
    // final thì không thể ghi đc
    final public function AFooA(){
        echo 'Foo';
    }
    
   
}


interface IA {
    public function IFooA(); 
}
  
interface IB{
    public function IFooB();

}
// Full OOP 
class Ex03 extends AbsA implements IA,IB {

    
    public function IFooA(){
        echo 'Interface FooA'.EOL;
    }
    public function IFooB(){
        echo 'Interface FooB'.EOL;
    }
    public function IFooAB() {
        // Implementation of IFooAB
    }

    public function SFooA() {
        // Implementation of SFooA
    }

    public function NotDeclare() {
        // Implementation of NotDeclare
    }

    protected function Foo() {
        // Implementation of Foo
    }
   
}
$test = new Ex03();
$test->AFooA();
// $test->IFooA();
// $test->IFooB();