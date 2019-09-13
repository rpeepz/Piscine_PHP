<?PHP
    $name = $_GET['name'];
    $type = $_GET['action'];
    if ($type == "set") {
        $val = $_GET['value'];
        if (isset($_COOKIE[$name])) {
            print "ERROR<br>cannot ".$type." cookie<br>";
            print "'".$name."' already in use!";
            return;
        } else {
            setcookie($name, $val, time()+3600); // expire in 1 hour
        }
    }
    else if ($type == "del") {
        unset($_COOKIE[$name]);
        setcookie($name, "", time() - 3600);
    }
    else if (!isset($_COOKIE[$name])) {
        print "ERROR<br>cannot ".$type." cookie<br>";
        print "'".$name."' not in use!\n";
        return;
    }
    else if ($type == "get") {
        print "cookie value: ".$_COOKIE[$name]."\n";
    }
?>