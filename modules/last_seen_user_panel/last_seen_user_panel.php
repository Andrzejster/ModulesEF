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
$_locale->moduleLoad('lang', 'last_seen_user_panel');

$_head->set('<link href="'.ADDR_MODULES.'last_seen_user_panel/templates/stylesheet/panel.css" media="screen" rel="stylesheet">');

$query = $_pdo->getData("SELECT `id`, `username`, `lastvisit`, `role` FROM [users] ORDER BY `lastvisit` DESC LIMIT 0,12");

$users = array();
foreach($query as $row)
{
	$lastseen = time()-$row['lastvisit'];
	$iW = sprintf('%2d',floor($lastseen/604800));
	$iD = sprintf('%2d',floor($lastseen/(60*60*24)));
	$iH = sprintf('%02d',floor((($lastseen%604800)%86400)/3600));
	$iM = sprintf('%02d',floor(((($lastseen%604800)%86400)%3600)/60));
	$iS = sprintf('%02d',floor((((($lastseen%604800)%86400)%3600)%60)));

	if ($lastseen <= 60)
	{
		$lastvisit = 1;
	}
	elseif ($lastseen > 60 && $lastseen <= 180)
	{
		$lastvisit = 2;
	}
	elseif ($iW>0)
	{
		if($iW==1)
		{
			$text = __('week');
		}
		else
		{
			$text= __('weeks');
		}
		
		$lastvisit = $iW.'&nbsp;'.$text;
	}
	elseif ($iD>0)
	{
		if ($iD==1)
		{
			$text = __('day');
		}
		else
		{
			$text = __('days');
		}
		
		$lastvisit = $iD.'&nbsp;'.$text;
	}
	else
	{
		$lastvisit = $iH.':'.$iM.':'.$iS;
	}
	
	$users[] = array(
		'id' => $row['id'],
		'link' => HELP::profileLink($row['username'], $row['id']),
		'lastvisit' => $lastvisit,
		'role' => $_user->getRoleName($row['role'])
	);
}

$_panel->assign('users', $users);
$_panel->assign('guest', $_user->getGuests());
$_panel->assign('register', number_format($_pdo->getMatchRowsCount('SELECT `id` FROM [users] WHERE status = 0')));