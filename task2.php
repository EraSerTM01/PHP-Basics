<?php

interface MyInterface {
    public function interfaceMethod();
}

trait MyTrait {
    public function traitMethod() {
        return "This is a method defined in MyTrait.\n";
    }
}

class ParentClass implements MyInterface {
    use MyTrait;

    public $publicVar;
    private $privateVar;

    public function __construct($publicVar, $privateVar) {
        $this->publicVar = $publicVar;
        $this->privateVar = $privateVar;
    }

    public function publicMethod() {
        return "This is a public method.\n";
    }

    private function privateMethod() {
        return "This is a private method.\n";
    }

    public function callPrivateMethod() {
        return $this->privateMethod();
    }

    public function interfaceMethod() {
        return "Method defined in MyInterface.\n";
    }
}

class ChildClass extends ParentClass {
    public function __construct($publicVar, $privateVar) {
        parent::__construct($publicVar, $privateVar);
    }

    public function childMethod() {
        return "This is a method in the child class.\n";
    }
}

class Singleton {
    private static $instance;

    private function __construct() {}

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}

$parentObj = new ParentClass("Public data", "Private data");
echo $parentObj->publicVar . "\n"; 

echo $parentObj->publicMethod();
echo $parentObj->callPrivateMethod(); 
echo $parentObj->traitMethod(); 

$childObj = new ChildClass("Child public data", "Child private data");
echo $childObj->publicVar . "\n"; 

echo $childObj->publicMethod();
echo $childObj->callPrivateMethod();
echo $childObj->childMethod();
echo $childObj->traitMethod(); 

$singleton1 = Singleton::getInstance();
$singleton2 = Singleton::getInstance();

echo ($singleton1 === $singleton2) ? "Singleton pattern works.\n" : "Singleton pattern doesn't work.\n";
?>