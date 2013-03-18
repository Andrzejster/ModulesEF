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
try
{
	require_once '../../../config.php';
	require DIR_SITE.'bootstrap.php';
	require_once DIR_SYSTEM.'admincore.php';
	$_locale->moduleLoad('admin', 'facebook');

	if ( ! $_user->hasPermission('module.facebook.admin'))
	{
		throw new userException(__('Access denied'));
	}

	$_tpl = new AdminModuleIframe('facebook');

	$row = $_pdo->getRow('SELECT * FROM [facebook]');

	if ($_request->get(array('status', 'act'))->show())
	{
		$_tpl->logAndShow($_request->get('status')->show(), $_request->get('act')->show(), array(
			'update' => array(__('Data has been saved.'), __('Error! Data has not been saved.'))
		));
	}

	if ($_request->post('save')->show())
	{
		$href = $_request->post('href')->filters('trim', 'strip');
		$border = $_request->post('border')->strip();

		$count = $_pdo->exec('UPDATE [facebook] SET `href` = :href, `width` = :width, `height` = :height, `faces` = :faces, `colorscheme` = :colorscheme, `stream` = :stream, `border_color` = :border, `header` = :header',
			array(
				array(':href', $href, PDO::PARAM_STR),
				array(':width', $_request->post('width')->isNum(TRUE), PDO::PARAM_INT),
				array(':height', $_request->post('height')->isNum(TRUE), PDO::PARAM_INT),
				array(':faces', $_request->post('faces')->isNum(TRUE), PDO::PARAM_INT),
				array(':colorscheme', $_request->post('colorscheme')->isNum(TRUE), PDO::PARAM_INT),
				array(':stream', $_request->post('stream')->isNum(TRUE), PDO::PARAM_INT),
				array(':border', $border, PDO::PARAM_STR),
				array(':header', $_request->post('header')->isNum(TRUE), PDO::PARAM_INT)
			)
		);

		if ($count)
		{
			HELP::redirect(FILE_SELF.'?act=update&status=ok');
		}

		HELP::redirect(FILE_SELF.'?act=update&status=error');
	}

	$_tpl->assignGroup(array
		(
			'href' => $row['href'],
			'width' => $row['width'],
			'height' => $row['height'],
			'faces' => $row['faces'],
			'colorscheme' => $row['colorscheme'],
			'stream' => $row['stream'],
			'border' => $row['border_color'],
			'header' => $row['header']
		)
	);

	$_tpl->template('admin.tpl');

}
catch(optException $exception)
{
    optErrorHandler($exception);
}
catch(systemException $exception)
{
    systemErrorHandler($exception);
}
catch(userException $exception)
{
    userErrorHandler($exception);
}
catch(PDOException $exception)
{
    PDOErrorHandler($exception);
}