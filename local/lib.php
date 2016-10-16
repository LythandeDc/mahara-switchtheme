<?php
/**
 *
 * @package    mahara
 * @author     De Chiara Antonella - http://develop4fun.com
 * @param type $SIDEBLOCKS
 */

/*
 * Theme Institution Update 
 */
function local_sideblocks_update(&$SIDEBLOCKS) {
    // User
    global $USER;

    $viewthemes = array();
    
    // Sql
    $usrtheme = get_records_sql_array('SELECT CONCAT(i.theme, \'/\', i.name) usrtheme, i.displayname dname, i.theme tname
                                       FROM usr_institution ui
                                       LEFT JOIN institution i
                                       ON ui.institution = i.name
                                       WHERE ui.usr = ?', array($USER->id));
    
    // Filters
    foreach($usrtheme as $viewtheme) {
        if(!empty($viewtheme->usrtheme) && !empty($viewtheme->dname)) {
            $viewthemes[$viewtheme->usrtheme] = $viewtheme->dname;
        }
    }

    // Getting Started
    if (defined('MENUITEM') && MENUITEM != '') {

        $SIDEBLOCKS[] = array(
            'name'  => 'switchtheme',
            'id'    => 'sb-switchtheme',
            'weight' => -10,
            'data'  => array('viewthemes' => $viewthemes)
        );

    }
    
}
