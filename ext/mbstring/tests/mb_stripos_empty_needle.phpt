--TEST--
Test mb_stripos() function :  with empty needle
--SKIPIF--
<?php
extension_loaded('mbstring') or die('skip');
function_exists('mb_stripos') or die("skip mb_stripos() is not available in this build");
?>
--FILE--
<?php

mb_internal_encoding('UTF-8');

$string_ascii = 'abc def';
// Japanese string in UTF-8
$string_mb = "日本語テキストです。01234５６７８９。";

echo "\n-- ASCII string without offset --\n";
var_dump(mb_stripos($string_ascii, ''));

echo "\n-- ASCII string with in range positive offset --\n";
var_dump(mb_stripos($string_ascii, '', 2));

echo "\n-- ASCII string with in range negative offset --\n";
var_dump(mb_stripos($string_ascii, '', -2));

echo "\n-- ASCII string with out of bound positive offset --\n";
try {
    var_dump(mb_stripos($string_ascii, '', 150));
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

echo "\n-- ASCII string with out of bound negative offset --\n";
try {
    var_dump(mb_stripos($string_ascii, '', -150));
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}


echo "\n-- Multi-byte string without offset --\n";
var_dump(mb_stripos($string_mb, ''));

echo "\n-- Multi-byte string with in range positive offset --\n";
var_dump(mb_stripos($string_mb, '', 2));

echo "\n-- Multi-byte string with in range negative offset --\n";
var_dump(mb_stripos($string_mb, '', -2));

echo "\n-- Multi-byte string with out of bound positive offset --\n";
try {
    var_dump(mb_stripos($string_mb, '', 150));
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

echo "\n-- Multi-byte string with out of bound negative offset --\n";
try {
    var_dump(mb_stripos($string_mb, '', -150));
} catch (\ValueError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

?>
--EXPECT--
-- ASCII string without offset --
int(0)

-- ASCII string with in range positive offset --
int(2)

-- ASCII string with in range negative offset --
int(5)

-- ASCII string with out of bound positive offset --
Offset not contained in string

-- ASCII string with out of bound negative offset --
Offset not contained in string

-- Multi-byte string without offset --
int(0)

-- Multi-byte string with in range positive offset --
int(2)

-- Multi-byte string with in range negative offset --
int(19)

-- Multi-byte string with out of bound positive offset --
Offset not contained in string

-- Multi-byte string with out of bound negative offset --
Offset not contained in string
