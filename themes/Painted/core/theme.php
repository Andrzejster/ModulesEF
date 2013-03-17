<?php defined('EF5_SYSTEM') || exit;
/***********************************************************
| eXtreme-Fusion 5.0
| Content Management System       
|
| Theme name: Painted
| Theme author: Andrzejster
|
| Copyright (c) 2005-2013 eXtreme-Fusion Crew                	 
| http://extreme-fusion.org/                               		 
|
| This product is licensed under the BSD License.				 
| http://extreme-fusion.org/ef5/license/						 
***********************************************************/
function render_page()
{
	// Header
	TPL::this()->assign('Sitename', TPL::this()->_sett->get('site_name'));
	TPL::this()->assign('Menu', TPL::this()->showSubLinks('', 'menu'));

	// Panels
	if (LEFT)    TPL::this()->assign('LEFT', LEFT);
	if (RIGHT)   TPL::this()->assign('RIGHT', RIGHT);

	TPL::this()->assign('CONTENT', TOP_CENTER.CONTENT.BOTTOM_CENTER);

	// Footer Desc
	TPL::this()->assign('Footer', stripslashes(TPL::this()->_sett->get('footer')));

	TPL::this()->assign('Copyright', TPL::this()->showCopyright(FALSE));

	TPL::this()->assign('AdminLinks', TPL::this()->showAdminLinks());

	TPL::this()->template('page.tpl');
}


function render_news()
{
	// News plugins
}

function opentable($title)
{
	TPL::this()->assign('Begin', TRUE);
	TPL::this()->assign('Title', $title);

	TPL::this()->template('content.tpl');
}

function closetable()
{
	TPL::this()->template('content.tpl');
}

function openside($title)
{
	TPL::this()->assign('Begin', 'begin');
	TPL::this()->assign('Title', $title);

	TPL::this()->template('panels.tpl');
}

function closeside()
{
	TPL::this()->template('panels.tpl');
}