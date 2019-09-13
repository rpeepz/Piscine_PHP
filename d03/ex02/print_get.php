<?PHP
    foreach ($_GET as $key => $value) {
        $str .= $key.": ".$value.'<br>';
    }
    print $str;
?>