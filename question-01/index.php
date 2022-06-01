<?php

$string = 'O:3:"Foo":7:{s:3:"lat";i:50;s:3:"lng";i:53;s:6:"region";s:4:"west";s:3:"bar";s:7:"Alabama";s:8:"currency";s:3:"USD";s:7:"country";s:13:"United States";s:4:"test";b:1;}';
$object = unserialize( $string );

var_dump( $object );