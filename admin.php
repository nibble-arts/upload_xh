<?php

/**
 * Member access  -- admin.php
 *
 * @category  CMSimple_XH
 * @package   Upload
 * @author    Thomas Winkler <thomas.winkler@iggmp.net>
 * @copyright 2019 nibble-arts <http://www.nibble-arts.org>
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link      http://cmsimple-xh.org/
 */

/*
 * Prevent direct access.
 */
if (!defined('CMSIMPLE_XH_VERSION')) {
    header('HTTP/1.0 403 Forbidden');
    exit;
}


/*
 * Register the plugin menu items.
 */
if (function_exists('XH_registerStandardPluginMenuItems')) {
    XH_registerStandardPluginMenuItems(true);
}

if (function_exists('upload') 
    && XH_wantsPluginAdministration('upload') 
    || isset($memberaccess) && $memberaccess == 'true')
{


    $o .= print_plugin_admin('off');

    switch ($admin) {

	    case '':
	        $o .= '<h1>Upload</h1>';
    		$o .= '<p>Version 1.0</p>';
            $o .= '<p>Copyright 2020</p>';
    		$o .= '<p><a href="http://www.nibble-arts.org" target="_blank">Thomas Winkler</a></p>';
            $o .= '<p>Das Plugin erlaubt es von beliebigen Seiten Dateien in ein definiertes Verzeichnis hochzuladen. Die Berechtigung kann über das Memberaccess-Plugin gesteuert werden.</p>';

	        break;

        case 'plugin_main':
            break;

	    default:
	        $o .= plugin_admin_common($action, $admin, $plugin);
            break;
    }

}
?>
