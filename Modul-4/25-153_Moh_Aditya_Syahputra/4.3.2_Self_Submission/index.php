<?php
$errors = array();

if (isset($_POST['submit'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    
    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        foreach ($errors as $field => $error) {
            echo "$field $error</br>";
        }
        include 'form.inc';
    } else {
        echo '<h1>Form submitted successfully with no errors</h1>';
        echo '<h3>Posted data:</h3>';
        foreach ($_POST as $key => $value) {
            if($key !== 'submit' && $key !== 'passwd') {
                echo htmlspecialchars($key) . " => " . htmlspecialchars($value) . "<br/>";
            }
        }
    }
} else {
    include 'form.inc';
}
?>