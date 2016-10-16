<?php

define('INTERNAL', 1);

require('../init.php');

global $USER, $SESSION, $THEME;

$viewthemes = array();

// SQL
$usrtheme = get_records_sql_array('SELECT CONCAT(i.theme, \'/\', i.name) usrtheme, i.theme tname
                                   FROM usr_institution ui
                                   LEFT JOIN institution i
                                   ON ui.institution = i.name
                                   WHERE ui.usr = ?', array($USER->id));

// Filters
foreach($usrtheme as $viewtheme) {
    if(!empty($viewtheme->usrtheme) && !empty($viewtheme->tname)) {
        $viewthemes[$viewtheme->usrtheme] = $viewtheme->tname;
    }
}

// Verif
if (isset($viewthemes[$_POST['viewtheme']])) {
    $USER->set_account_preference('theme', $_POST['viewtheme']);
}
redirect();
