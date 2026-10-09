<?php
$arr1 = array("A");
array_push($arr1, "B");
echo "Hasil array_push: " . implode(" ", $arr1) . "<br>";

$arr2 = array("C");
$merged = array_merge($arr1, $arr2);
echo "Hasil array_merge: " . implode(" ", $merged) . "<br>";

$arr3 = array("x" => 1, "y" => 2);
$vals = array_values($arr3);
echo "Hasil array_values: " . implode("", $vals) . "<br>";

$searchResult = array_search("B", $merged);
echo "Hasil array_search: " . $searchResult . "<br>";

$arr4 = array(0, 1, false, 2, "", 3, "array");
$filtered = array_filter($arr4);
echo "Hasil array_filter: " . implode(" ", $filtered) . "<br>";

$arr5 = array(3, 1, 2);
sort($arr5);
echo "Hasil sort: " . implode("", $arr5) . "<br>";
rsort($arr5);
echo "Hasil rsort: " . implode("", $arr5) . "<br>";

function print_assoc($arr) {
    $temp = [];
    foreach($arr as $key => $val) { $temp[] = "$key=>$val"; }
    return implode(", ", $temp);
}

$arr6 = array("Peter" => 35, "Ben" => 37, "Joe" => 43);

$asort_arr = $arr6; asort($asort_arr); 
echo "Hasil asort: " . print_assoc($asort_arr) . "<br>";

$ksort_arr = $arr6; ksort($ksort_arr); 
echo "Hasil ksort: " . print_assoc($ksort_arr) . "<br>";

$arsort_arr = $arr6; arsort($arsort_arr); 
echo "Hasil arsort: " . print_assoc($arsort_arr) . "<br>";

$krsort_arr = $arr6; krsort($krsort_arr); 
echo "Hasil krsort: " . print_assoc($krsort_arr) . "<br>";
?>