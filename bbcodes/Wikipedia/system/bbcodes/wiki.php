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
$_locale->load('wiki');

$bbcode_info = array(
	'name' => __('Wikipedia'),
	'description' => __('Search text in Wikipedia'),
	'value' => 'wiki'
);

if($bbcode_used)
{
	$text = preg_replace('#\[wiki\](.*?)\[/wiki\]#si', '<a href="http://'.$_system->detectBrowserLanguage().'.wikipedia.org/wiki/\1" target="_blank" title="'._('Wikipedia').'">\1</a>', $text);

}