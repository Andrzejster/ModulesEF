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

<div id="FacebookPanel">
	{php} openside(__('Facebook')) {/php}
		<div class="fb-like-box" data-href="{$href}" data-width="{$width}" {if $height != 0}data-height="{$height}"{/if} data-colorscheme="{$colorscheme}" data-show-faces="{$faces}" data-stream="{$stream}" data-border-color="{$border}" data-header="{$header}"></div>
	{php} closeside() {/php}
</div>