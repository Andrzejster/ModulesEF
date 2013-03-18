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

$mod_info = array(
	'title' => 'Facebook',
	'description' => 'Wtyczka dodająca panel z facebookowym okienkiem na stronie',
	'developer' => 'Andrzejster',
	'support' => 'http://extreme-fusion.org',
	'version' => '1.0',
	'dir' => 'facebook'
);

$new_table[1] = array(
	"facebook",
	"(
		`href` VARCHAR(200) NOT NULL,
		`width` SMALLINT NOT NULL DEFAULT '250',
		`height` SMALLINT NOT NULL DEFAULT '0',
		`faces` TINYINT NOT NULL DEFAULT '1',
		`colorscheme` TINYINT NOT NULL DEFAULT '0',
		`stream` TINYINT NOT NULL DEFAULT '1',
		`border_color` VARCHAR(6) NOT NULL,
		`header` TINYINT NOT NULL DEFAULT '1',
		PRIMARY KEY (`title`)
	) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;"
);

$drop_table[1] = "facebook";

$new_row[1] = array(
	"facebook", 
	"(`href`, `width`, `stream`) VALUES ('http://www.facebook.com/extreme.fusion', 200, 0)"
);

$menu_link[1] = array(
	'title' => __('Facebook'),
	'url' => 'facebook',
	'visibility' => '3'
);

$admin_page[1] = array(
	'title' => 'Facebook',
	'image' => 'images/facebook.png',
	'page' => 'admin/facebook.php',
	'perm' => 'admin'
);

$perm[1] = array(
	'name' => 'admin',
	'desc' => 'Zarządzanie modułem'
);