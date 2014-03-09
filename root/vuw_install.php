<?php
/**
 *
 * @author Geolim4 (Georges.L) geolim4@gmail.com
 * @version $Id: vuw_install.php v1.0.0 01:40 14/06/2013 Geolim4 Exp $
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
 */
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();
//$user->add_lang('mods/info_acp_alert_for_login');
if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The name of the mod to be displayed during installation.
$mod_name = 'Verified User Website';//Universal Name...

/*
* The name of the config variable which will hold the currently installed version
* UMIL will handle checking, setting, and updating the version itself.
*/
$version_config_name = 'vuw_mod_version';


// The language file which will be included when installing
//$language_file = 'mods/info_acp_alert_for_login';


/*
* Optionally we may specify our own logo image to show in the upper corner instead of the default logo.
* $phpbb_root_path will get prepended to the path specified
* Image height should be 50px to prevent cut-off or stretching.
*/
$logo_img = 'images/vuw_umil.png';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/
$versions = array(
	'1.0.0' => array(
		'cache_purge' => array('', 'imageset', 'template', 'theme'),
	),
	'0.1.0' => array(
	//Collumn Users....
			'table_column_add' => array(
				array(USERS_TABLE, 'user_website_verified', array('UINT', 0)),
				array(USERS_TABLE, 'user_website_verify_key', array('VCHAR:32', '')),
				array(USERS_TABLE, 'user_website_verify', )
			),
		'cache_purge' => array('', 'imageset', 'template', 'theme'),
	),
);

// Include the UMIL Auto file, it handles the rest
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);