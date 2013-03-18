{*
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
*}

<h3 class="ui-corner-all">{$SystemVersion} - {i18n('Facebook')}</h3>
{if $message}<div class="{$class}">{$message}</div>{/if}

<form id="This" action="{$FormAction}" method="post">
	<div class="tbl1">
		<div class="formLabel sep_1 grid_3">
			<label for="href">{i18n('Facebook address:')}</label>
			<small>
			{i18n('Complete address of the page on Facebook.')}
			</small>
		</div>
		<div class="formField grid_7"><input type="text" name="href" id="href" value="{$href}" /></div>
	</div>

	<div class="tbl2">
		<div class="formLabel sep_1 grid_3">
			<label for="width">{i18n('Width:')}</label>
			<small>{i18n('If 0 appears in the default value.')}</small>
		</div>
		<div class="formField grid_2"><input type="text" name="width" id="width" value="{$width}" /></div>
		<div class="formLabel grid_2">
			<label for="height">{i18n('Height:')}</label>
			<small>{i18n('If 0 appears in the default value.')}</small>
		</div>
		<div class="formField grid_2"><input type="text" name="height" id="height" value="{$height}" /></div>
	</div>
	
	<div class="tbl1">
		<div class="formLabel sep_1 grid_3">{i18n('Display people who like it?')}</div>
		<div class="formField grid_7">
			<label><input type="radio" name="faces" value="1"{if $faces == 1} checked="checked"{/if} /> {i18n('Yes')}</label>
			<label><input type="radio" name="faces" value="0"{if $faces == 0} checked="checked"{/if} /> {i18n('No')}</label>
		</div>
	</div>
	
	<div class="tbl2">
		<div class="formLabel sep_1 grid_3">{i18n('Background:')}</div>
		<div class="formField grid_7">
			<label><input type="radio" name="colorscheme" value="1"{if $colorscheme == 1} checked="checked"{/if} /> {i18n('dark')}</label>
			<label><input type="radio" name="colorscheme" value="0"{if $colorscheme == 0} checked="checked"{/if} /> {i18n('light')}</label>
		</div>
	</div>
	
	<div class="tbl1">
		<div class="formLabel sep_1 grid_3">{i18n('Display the latest posts?')}</div>
		<div class="formField grid_7">
			<label><input type="radio" name="stream" value="1"{if $stream == 1} checked="checked"{/if} /> {i18n('Yes')}</label>
			<label><input type="radio" name="stream" value="0"{if $stream == 0} checked="checked"{/if} /> {i18n('No')}</label>
		</div>
	</div>

	<div class="tbl2">
		<div class="formLabel sep_1 grid_3"><label for="border">{i18n('Border color:')}</label></div>
		<div class="formField grid_7"><input type="text" name="border" id="border" value="{$border}" /></div>
	</div>
	
	<div class="tbl1">
		<div class="formLabel sep_1 grid_3">{i18n('Display the header?')}</div>
		<div class="formField grid_7">
			<label><input type="radio" name="header" value="1"{if $header == 1} checked="checked"{/if} /> {i18n('Yes')}</label>
			<label><input type="radio" name="header" value="0"{if $header == 0} checked="checked"{/if} /> {i18n('No')}</label>
		</div>
	</div>

	<div class="tbl Buttons">
		<div class="center grid_2 button-l">
			<span class="Cancel"><strong>{i18n('Back')}<img src="{$ADDR_ADMIN_ICONS}pixel/undo.png" alt="{i18n('Back')}" /></strong></span>
		</div>

		<div class="center grid_2 button-r">
			<input type="hidden" name="save" value="yes" />
			<span class="save" id="SendForm_This"><strong>{i18n('Save')}<img src="{$ADDR_ADMIN_ICONS}pixel/diskette.png" alt="{i18n('Save')}" /></strong></span>
		</div>

	</div>
</form>