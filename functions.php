

<?php
function get_title($_title) {
    return('<title>' . $_title . '</title>');
}

function open_page($_title) {
    echo('<!DOCTYPE html><head>' 
    	. get_title($_title)
        . '<meta charset="utf-8" />'
        . '<meta http-equiv="X-UA-Compatible" content="IE=edge">'
    	. '<meta name="viewport" content="width=device-width, initial-scale=1">'
    	. '<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />'
    	. '<script src="js/bootstrap.js"></script>' 
    	. '</head><body>');
}

function close_page() {
    echo('</body></html>');
}

function redirect($_location) {
    header('Location: ' . $_location);
}

function get_session($_key){
    $value = ((isset($_SESSION[$_key])) ? $_SESSION[$_key] : NULL);
    return ($value);
}

function set_session($_key, $_value){
    $_SESSION[$_key] = $_value;
}

function destroy_session($_key){
    unset($_SESSION[$_key]);
}

?>