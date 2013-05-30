Name: Pochwa�y (Praises)
Author: Andrzejster
http://extreme-fusion.org

Nie zezwalam na rozpowszechnianie modu�u bez mojej zgody.
+++++++++++++++++++++++++++++
INSTALACJA:

Pliki po rozpakowaniu nale�y wgra� do katalogu modules/ i zainstalowa�. Podstrona z pochwa�ami danego u�ytkownika ma adres: /praises/{ID}.html

+++++++++++++++++++++++++++++
WY�WIETLANIE W PROFILU:

Aby pochwa�y liczba pochwa� by�a wy�wietlana w profilu nale�y wykona� poni�sze instrukcje:

plik PAGES/PROFILE.PHP:
Za lini� ~196 doda� nast�puj�cy fragment kodu:
if ($_pdo->tableExists('praises'))
	{
		$query = $_pdo->getData('SELECT `id` FROM [praises] WHERE `user_id` = :id',
			array(':id', $row['id'], PDO::PARAM_INT)
		);
		$praises = array(
			'praises' => $_pdo->getRowsCount($query),
			'link' => $_route->path(array('controller' => 'praises', 'action' => $row['id']))
		);
		
		$_tpl->assign('praises', $praises);
	}

plik TEMPLATES/PROFILE.TPL:
Za lini� ~49 doda� nast�puj�cy fragment:
{if $praises != 0}
                <p class="element light clearfix">
                    <strong class="text_other"><a href="{$praises.link}">Ostrze�enia</a></strong>
                    <span>{$praises.praises}</span>
                </p>
            {/if}