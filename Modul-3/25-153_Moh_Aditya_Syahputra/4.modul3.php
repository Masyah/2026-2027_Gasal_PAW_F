<?php
$height = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170", "David"=>"180", "Ethan"=>"172", "Frank"=>"168", "George"=>"175", "Harry"=>"182");

foreach($height as $name => $h) {
    echo $name . " is " . $h . " cm tall.<br>";
}


// 4.2
$weight = array("Andy"=>"70", "Barry"=>"65", "Charlie"=>"75");
$keys = array_keys($weight);
$jumlah = count($keys);

for($i = 0; $i < $jumlah; $i++) {
    echo $keys[$i] . " is " . $weight[$keys[$i]] . " kg.<br>";
}
?>