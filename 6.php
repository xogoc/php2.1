<?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); // 1 т.к. ++$x увеличил на 1 до вывода
$b1->foo(); // 1 т.к. в этом экземпляре статическая переменная принадлежит его классу B, а не А
$a1->foo(); // 2 т.к. переменная $x статическая и принадлежит классу А, а не его экземпляру
$b1->foo(); // 2 т.к. в этом экземпляре статическая переменная принадлежит его классу B, а не А