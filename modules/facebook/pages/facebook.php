<?php defined('EF5_SYSTEM') || exit;
/*********************************************************
| eXtreme-Fusion 5
| Content Management System
| 
| Module name: Facebook
| Module author: Andrzejster
|
| Copyright (c) 2005-2013 eXtreme-Fusion Crew
| http://extreme-fusion.org/
|
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
*********************************************************/
$_locale->moduleLoad('lang', 'facebook');

#*********** Settings
$theme = array(
	'Title' => __('Facebook'),
	'Keys' => 'facebook, box, panel, stats, like it',
	'Desc' => __('Statistics fanpage of the social networking site Facebook.')
);

$_tpl->assign('Theme', $theme);

// Blokuje wykonywanie pliku TPL z katalogu szablonu
define('THIS', TRUE);

$panel = $_pdo->getMatchRowsCount("SELECT `status` FROM [panels] WHERE `name` = 'Facebook'");
if (!$panel)
{
	$_head->set('<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/'.__('xml_lang').'_'.strtoupper(__('xml_lang')).'/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, \'script\', \'facebook-jssdk\'));</script>
	');
}

$row = $_pdo->getRow('SELECT `href`, `colorscheme`, `border_color`, `header` FROM [facebook]');

$colorscheme = $row['colorscheme'] == 0 ? 'light' : 'dark';
$header = $row['header'] == 0 ? 'false' : 'true';

$_tpl->assignGroup(array
	(
		'href' => $row['href'],
		'colorscheme' => $colorscheme,
		'border' => $row['border_color'],
		'header' => $header
	)
);

// Definiowanie katalogu templatek modu³u
$_tpl->setPageCompileDir(DIR_MODULES.'facebook'.DS.'templates'.DS);
#***********
