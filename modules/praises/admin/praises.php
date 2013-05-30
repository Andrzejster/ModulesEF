<?php
/*********************************************************
| eXtreme-Fusion 5
| Content Management System
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
	
	$_locale->moduleLoad('admin', 'praises');

	if ( ! $_user->hasPermission('module.praises.admin'))
	{
		throw new userException(__('Access denied'));
	}

    $_tpl = new AdminModuleIframe('praises');

	// Wyœwietlenie komunikatów
	if ($_request->get(array('status', 'act'))->show())
	{
		// Wyœwietli komunikat
		$_tpl->getMessage($_request->get('status')->show(), $_request->get('act')->show(), 
			array(
				'add' => array(
					__('Added praise'), __('Fails to add praise')
				),
				'edit' => array(
					__('Edited praise'), __('Error when editing praise')
				),
				'delete' => array(
					__('Deleted praise'), __('Crash deleting praise')
				)
			)
		);
	}

    if ($_request->get('action')->show() === 'delete' && $_request->get('praise_id')->isNum())
    {
		$count = $_pdo->exec('DELETE FROM [praises] WHERE `id` = :id',
			array(
				array(':id', $_request->get('praise_id')->show(), PDO::PARAM_INT)
			)
		);
	
		if ($count)
		{
			$_log->insertSuccess('delete', __('Praise has been removed'));
			$_request->redirect(FILE_PATH, array('act' => 'delete', 'status' => 'ok'));
		}
	
		$_log->insertFail('delete', __('Crash when removing a praise'));
		$_request->redirect(FILE_PATH, array('act' => 'delete', 'status' => 'error'));
    }
	
	if($_request->get('user')->show())
	{
		$user = TRUE;
		if ($_request->post('save')->show())
		{
			$content = $_request->post('praises')->filters('trim', 'strip');
		
			if ($_request->get('action')->show() === 'edit' && $_request->get('praise_id')->isNum())
			{
				$count = $_pdo->exec('UPDATE [praises] SET `date` = '.time().', `content` = :content WHERE `id` = :id',
					array(
						array(':id', $_request->get('praise_id')->isNum(), PDO::PARAM_INT),
						array(':content', $content, PDO::PARAM_STR)
					)
				);

				if ($count)
				{
					$_request->redirect(FILE_PATH, array('act' => 'edit', 'status' => 'ok'));
				}
		
				$_request->redirect(FILE_PATH, array('act' => 'edit', 'status' => 'error'));
			}
			else
			{
				$count = $_pdo->exec('INSERT INTO [praises] (`user_id`, `admin_id`, `content`, `date`) VALUES (:user, :admin, :content, '.time().')',
					array(
						array(':user', $_request->get('user')->show(), PDO::PARAM_INT),
						array(':admin', $_user->get('id'), PDO::PARAM_INT),
						array(':content', $content, PDO::PARAM_STR)
					)
				);

				if ($_request->post('send_pm')->show())
				{
					$subject = __('Received Praise');
					$message = __('Administrator has given you praise as follows: :praise', array(':praise' => $content));
					$item_id = $_pdo->getField('SELECT max(`item_id`) FROM [messages]') + 1;

					$count = $_pdo->exec('INSERT INTO [messages] (`item_id`, `to`, `from`, `subject`, `message`, `datestamp`) VALUES (:item, :user, :admin, :subject, :message, '.time().')',
						array(
							array(':item', $item_id, PDO::PARAM_INT),
							array(':user', $_request->get('user')->show(), PDO::PARAM_INT),
							array(':admin', $_user->get('id'), PDO::PARAM_INT),
							array(':subject', $subject, PDO::PARAM_STR),
							array(':message', $message, PDO::PARAM_STR)
						)
					);
				}
		
				if ($count)
				{
					$_log->insertSuccess('add', __('Praise has been added'));
					$_request->redirect(FILE_PATH, array('act' => 'add', 'status' => 'ok'));
				}	
		
				$_log->insertFail('add', __('Crash when adding a praise'));
				$_request->redirect(FILE_PATH, array('act' => 'add', 'status' => 'error'));
			}
		}
		elseif ($_request->get('action')->show() === 'edit' && $_request->get('praise_id')->isNum())
		{
			$data = $_pdo->getRow('
				SELECT c.`id`, c.`user_id`, c.`content`, u.`id`, u.`username`
				FROM [praises] c
				LEFT JOIN [users] u ON c.`user_id` = u.`id`
				WHERE c.`id` = :id',
				array(':id', $_request->get('praise_id')->isNum(), PDO::PARAM_INT)
			);
			
			if($data)
			{
				$user_list = $_user->getUsername($data['user_id']);
				$user_id = $data['user_id'];
				$praises = $data['content'];
				$edit = TRUE;
			}
			else
			{
				throw new userException(__('No ID :id for the table praises.', array(':id' => $_request->get('praise_id')->isNum())));
			}
		}
		else
		{
			$user_id = '';
			$user_list = $_user->getByID($_request->get('user')->show(), 'username');
			$praises = '';
			$edit = FALSE;
		
		}
		
		$_tpl->assignGroup(
			array(
				'praises' => $praises,
				'username' => $user_list,
				'user_id' => $user_id,
				'edit' => $edit
			)
		);
	}
	else
	{
		$user = FALSE;
	}
	
	$_tpl->assign('user', $user);

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