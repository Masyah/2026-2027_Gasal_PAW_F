<?php
$matkul = ["PTI", "ALPRO", "DPW", "STRUKDAT", "JARKOM", "PAW", "PSBF", "RPL"];

foreach ($matkul as $nama_matkul) {
    switch ($nama_matkul) {
        case "PTI":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        case "ALPRO":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        case "DPW":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        case "STRUKDAT":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        case "JARKOM":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        case "PAW":
            echo "Saya suka " . $nama_matkul . "<br>";
            break;
        default:
            echo "Saya tidak mengambil matkul " . $nama_matkul . "<br>";
            break;
    }
}
?>