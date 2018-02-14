<?php
session_start();

if ($_POST['username'] && $_POST['password']) {
    if (is_valid($_POST['username'], $_POST['password'])) {
        $_SESSION['utilizator'] = $_POST['username'];
        $_SESSION['cos'] = array();
    } else {
        $_SESSION['eroare'] = "Username sau password incorect!";
    }
} else {
    $_SESSION['eroare'] = "Trebuie sa introduceti datele de logare!";
}

function is_valid($input_username, $input_passward) {
    $ret = false;
    $Path = fopen("../Resurse/utilizatori.txt", "r");
    if ($Path) {
        $print = '';
        // for each line
        while (($line = fgets($Path)) !== false) {
            $infos = explode("=", $line);
            if ($input_username == $infos[0] && sha1($input_passward) == $infos[1]) {
                $ret = true;
                break;
            }
        }
        // close file
        fclose($Path);
    } else {
        $ret = false;
    }
    return $ret;
}
header("Location:../index.php");
?>