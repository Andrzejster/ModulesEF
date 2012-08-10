<?php defined('EF5_SYSTEM') || exit;
/***********************************************************
| eXtreme-Fusion 5.0 Beta 5
| Content Management System       
|
| Copyright (c) 2005-2012 eXtreme-Fusion Crew                	 
| http://extreme-fusion.org/                               		 
|
| This product is licensed under the BSD License.				 
| http://extreme-fusion.org/ef5/license/						 
***********************************************************/
$_locale->load('google');

$bbcode_info = array(
	'name' => __('Google Search'),
	'description' => __('Search text in the Google'),
	'value' => 'google'
);

if($bbcode_used)
{
	$text = preg_replace('#\[google\](.*?)\[/google\]#si', '<img src="http://www.google.com/logos/Logo_25wht.gif" width="38" height="18" alt="'.__('Google Search').'" style="vertical-align:middle;"> <a href="http://www.google.com/search?hl=&amp;lr=&amp;q=\1" target="_blank">\1</a>', $text);

}