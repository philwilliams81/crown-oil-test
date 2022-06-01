<?php

$string = "eyJsYXQiOjUwLCJsbmciOjUzLjMyNjMsInJlZ2lvbiI6Indlc3QiLCJiYXIiOiJBbGFiYW1hIiwiY3VycmVuY3kiOiJVU0QiLCJjb3VudHJ5IjoiVW5pdGVkIFN0YXRlcyIsInRlc3QiOnRydWV9==";

$base64decoded = base64_decode( $string );

var_dump( $base64decoded);