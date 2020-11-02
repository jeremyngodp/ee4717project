
<?php
function redirect_to($location) {
    header("Location: " . $location);
    exit;
}

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function get_and_clear_session_message() {
    if(isset($_SESSION['errormessage']) && $_SESSION['errormessage'] != '') {
        $msg = $_SESSION['errormessage'];
        unset($_SESSION['errormessage']);
        return $msg;
    }
}

function display_session_message() {
    $msg = get_and_clear_session_message();
    
    return '<div id="errormessage">' . $msg . '</div>';
    
}
?>