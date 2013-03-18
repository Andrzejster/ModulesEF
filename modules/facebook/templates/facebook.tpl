{*
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
*}

{php} opentable(__('Facebook')) {/php}
	<div class="fb-like-box" data-href="{$href}" data-width="710" data-colorscheme="{$colorscheme}" data-show-faces="true" data-stream="true" data-border-color="{$border}" data-header="{$header}"></div>
{php} closetable() {/php}