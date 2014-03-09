<?php
//
//	file: adm/mods/vuw_version.php
//	author: Geolim4
//	begin: 21/01/2013
//	version: 0.1.0 - 14/06/2013
//	licence: http://opensource.org/licenses/gpl-license.php GNU Public License
//

// ignore
if ( !defined('IN_PHPBB') )
{
	exit;
}

class vuw_version
{
	function version()
	{
		return array(
			'author' => 'Geolim4',
			'title' => 'Verified User Website',
			'tag' => 'vuw',
			'version' => '1.0.0',
			'file' => array('geolim4.com', 'buildversion', 'vuw_version.xml'), //Direct link: http://geolim4.com/buildversion/vuw_version.xml
		);
	}
}
