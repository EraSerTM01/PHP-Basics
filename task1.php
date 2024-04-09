<?php

//робота зі змінними, з рядками 

$name = "Oleksandr";
$age = 23;
echo "Hello, World! My name is $name and I'am $age years old.\n";

//конкатенація 

$greeting = "Hello, ";
$place = "world!";
print $greeting . $place . "\n";

//масиви, асоціативні масиви

$fruits = array("Apple", "Banana", "Orange");
print "I like " . $fruits[0] . "\n";

$person = array("name" => "Alice", "age" => 22);
echo $person["name"] . " is " . $person["age"] . " years old.\n";


//explode, implode

$date = "2024-04-08";
$date_parts = explode("-", $date);
print_r($date_parts);


$words = array("Hello", "world", "!");
$sentence = implode(" ", $words);
echo $sentence . "\n";

//розіменування змінних

$var_name = "age";
$$var_name = 25;
print "Now \$age is $age\n";


//порівняння

$a = 10;
$b = "10";
if ($a == $b) {
    echo "Values are equal.\n";
} else {
    echo "Values are not equal.\n";
}


//приведення типів

$num_str = "17,6";
$num_int = (int)$num_str;
echo $num_int . "\n";






?>