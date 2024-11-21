<?php
define('EOL', "<br>");
abstract class AbsA {
    // final thì không thể ghi đc
    protected function AFooA(){
        echo 'Foo';
    }
    abstract protected function Foo();
  
}

interface IA {
    public function IFooA(); 
  }
  
interface IB{
    public function IFooB();
  
}
$dong = function(){
    return $this->AFooA();
};
$a = function(){
    return $this->Foo();
};

// Full OOP 
class Ex04 extends AbsA implements IA,IB {

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
$test = new Ex04();

$dong ->call($test);
$a->call($test);
$test->IFooA();
$test->IFooB();