<?php
define('EOL', "<br>");
abstract class AbstractTest {
    // Have body
    public function FooA(){
        echo 'Foo'.EOL;
    }
    // No body
    public function FooB() {
        echo 'FooB';
    }
}
interface InterfaceTest {
    // interface Foo A the same Foo A in abstract
    public function FooA();
}

class Test extends AbstractTest implements InterfaceTest {

   // Overiding 
    public function FooA(){
        echo 'The Same FooA'.EOL;
    }
    public function FooB(){
    }
   
}
$test = new Test();
$test->FooA();// The Same FooA
$test->FooB();