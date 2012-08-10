{php} openside(__('Last seen users')) {/php}
	<div id="last_seen_user_panel">
		{section=users}
			<div class="user">
				<div class="username">{$users.link} <small>({$users.role})</small></div>
				<div class="time">
					{if $users.lastvisit == 1}
						<span style="color:green">{i18n('Online')}</span>
					{elseif $users.lastvisit == 2}
						<span style="color:red">{i18n('Offline')}</span>
					{else}
						{$users.lastvisit}
					{/if}
				</div>
			</div>
		{/section}
		
		<div class="stats">
			<div class="left">{i18n('Guest online')}:</div>
			<div class="right">{$guest}</div>
			<div class="left">{i18n('Total Members')}:</div>
			<div class="right">{$register}</div>
		</div>
	</div>
{php} closeside() {/php}
