<?php defined('EF5_SYSTEM') || exit;
/***********************************************************
| eXtreme-Fusion 5.0
| Content Management System       
|
| Copyright (c) 2005-2012 eXtreme-Fusion Crew                	 
| http://extreme-fusion.org/                               		 
|
| This product is licensed under the BSD License.				 
| http://extreme-fusion.org/ef5/license/						 
***********************************************************/
$_locale->load('gg');

$bbcode_info = array(
	'name' => __('Gadu-Gadu'),
	'description' => __('Search text in the Google'),
	'value' => 'gg'
);

if($bbcode_used)
{
	$text = preg_replace('#\[gg\](.*?)\[/gg\]#si', '<img src="http://status.gadu-gadu.pl/users/status.asp?id=\1&styl=0"><a href="gg:\1" target="_blank"> \1</a>', $text);

}