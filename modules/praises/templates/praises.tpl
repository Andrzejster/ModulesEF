{php} opentable(__('Praises')) {/php}
	<div class="tbl">
		<div class="grid_10 green">{i18n('You have :how praises', array(':how' => $rows))}</div>
	</div>
	{if $praise}
		<div class="tbl2">
			<div class="grid_2 bold">{i18n('Date')}</div>
			<div class="grid_2 bold">{i18n('Added by')}</div>
			<div class="grid_4 bold">{i18n('Reason')}</div>
			{if $permission}
				<div class="grid_2 bold">{i18n('Management')}</div>
			{/if}
		</div>
		{section=praise}
			<div class="{$praise.row_color}">
				<div class="grid_2">{$praise.date}</div>
				<div class="grid_2">{if $praise.donor}{$praise.donor}{else}{i18n('No data')}{/if}</div>
				<div class="grid_4">{$praise.content}</div>
				{if $permission}
					<div class="grid_2">
						<a href="javascript:void(0);" class="tip admin-box" rel="{$ADDR_MODULES}praises/admin/praises.php?user={$praise.user_id}&action=edit&praise_id={$praise.ID}&fromPage=true" title="{i18n('Edit')}">
							<img src="{$ADDR_ADMIN_ICONS}edit.png" alt="{i18n('Edit')}" />
						</a>
						<a href="javascript:void(0);" class="tip admin-box" rel="{$ADDR_MODULES}praises/admin/praises.php?action=delete&praise_id={$praise.ID}&fromPage=true" title="{i18n('Delete')}">
							<img src="{$ADDR_ADMIN_ICONS}delete.png" alt="{i18n('Delete')}" />
						</a>
					</div>
				{/if}
			</div>
		{/section}
		<div class="right"><< {i18n('Back to profile')} {$profile}</div>
	{/if}
{php} closetable() {/php}