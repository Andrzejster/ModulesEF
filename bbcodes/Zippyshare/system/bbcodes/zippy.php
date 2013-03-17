<?php defined('EF5_SYSTEM') || exit;
/***********************************************************
| eXtreme-Fusion 5.0 Beta 5
| Content Management System       
|
| Copyright (c) 2005-2013 eXtreme-Fusion Crew                	 
| http://extreme-fusion.org/                               		 
|
| This product is licensed under the BSD License.				 
| http://extreme-fusion.org/ef5/license/						 
***********************************************************/
$_locale->load('zippy');

$bbcode_info = array(
	'name' => __('Zippyshare Player'),
	'description' => __('Plays music files on the Zippyshare player'),
	'value' => 'zippy'
);

if($bbcode_used)
{
	$www = ''; $key = '';
	$zippy_link = strip_tags($text);
	@preg_match('#http://www(.+).zippyshare.com/v/(.+)/file.html#iU',$zippy_link,$m);
	if ($m != array())
	{
		$www = $m[1];
		$key = $m[2];
	}
	
	$text = preg_replace("#\[zippy\](.*?)\[/zippy\]#si", '<strong>'.__('Zippyshare Player').'</strong><br />
	<script type="text/javascript">var zippywww="'.$www.'";var zippyfile="'.$key.'";var zippytext="#000000";var zippyback="#e8e8e8";var zippyplay="#ff6600";var zippywidth=500;var zippyauto=false;var zippyvol=80;var zippywave = "#000000";var zippyborder = "#cccccc";</script><script type="text/javascript" src="http://api.zippyshare.com/api/embed_new.js"></script>', $text);
	
}