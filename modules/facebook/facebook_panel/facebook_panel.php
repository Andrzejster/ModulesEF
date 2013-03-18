<?php
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
$_head->set('<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/'.__('xml_lang').'_'.strtoupper(__('xml_lang')).'/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>');

$row = $_pdo->getRow('SELECT * FROM [facebook]');

$faces = $row['faces'] == 0 ? 'false' :  'true';
$colorscheme = $row['colorscheme'] == 0 ? 'light' : 'dark';
$stream = $row['stream'] == 0 ? 'false' : 'true';
$header = $row['header'] == 0 ? 'false' : 'true';

$_panel->assignGroup(array
	(
		'href' => $row['href'],
		'width' => $row['width'],
		'height' => $row['height'],
		'faces' => $faces,
		'colorscheme' => $colorscheme,
		'stream' => $stream,
		'border' => $row['border_color'],
		'header' => $header
	)
);
