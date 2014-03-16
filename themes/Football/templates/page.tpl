{if $logo}
<header id="site_top">
	<h1>{$logo}</h1>
	<div id="clock-1"></div>
	<script>
		{literal}
			$('#clock-1').timeTo();

			function getRelativeDate(days, hours, minutes){
				var date = new Date((new Date()).getTime() + 60000 /* milisec */ * 60 /* minutes */ * 24 /* hours */ * days /* days */);

				date.setHours(hours || 0);
				date.setMinutes(minutes || 0);
				date.setSeconds(0);

				return date;
			}
		{/literal}
	</script>
</header>
{/if}

{if $menu}
<nav id="main_nav">
	<ul>
	{section=menu}
		<li{if $menu.selected} class="selected"{/if}>{$menu.sep}<a href="{$menu.link}"{if $menu.target} target="_blank"{/if}>{$menu.name}</a></li>
	{/section}
	</ul>
</nav>
{/if}

<section id="site_mid" >
	{if $LEFT}<aside id="s_left">{$LEFT}</aside>{/if}
	{if $RIGHT}<aside id="s_right">{$RIGHT}</aside>{/if}
	<section id="{if $LEFT && $RIGHT}s_center{/if}{if !$LEFT && !$RIGHT}no_both{/if}{if !$LEFT && $RIGHT}no_left{/if}{if !$RIGHT && $LEFT}no_right{/if}">
		{if $getTryLogin}
			<div class="error bold">
				Logowanie nie powiodło się. Sprawdź poprawność wprowadzanych danych i spróbuje jeszcze raz.
			</div>
		{/if}
		{$CONTENT}
	</section>
</section>

{if $footer}
<footer id="site_bot">
	<div class="left">
		{if $copyright}
			<address>{$copyright}</address>
		{/if}
		<p>{$footer}</p>
	</div>
	<div class="right">
		<address>Theme by <a href="http://extreme-fusion.pl/profile/24494/andrzejster.html" title="Andrzejster">Andrzejster</a></address>
		{if $admin_panel_link}<p>{$admin_panel_link}</p>{/if}
		{if $visits_count}<p>{i18n('Unique visits:')} {$visits_count}</p>{/if}
	</div>
</footer>
{/if}