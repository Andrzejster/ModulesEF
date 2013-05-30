Name: Pochwa³y (Praises)
Author: Andrzejster
http://extreme-fusion.org

Nie zezwalam na rozpowszechnianie modu³u bez mojej zgody.
+++++++++++++++++++++++++++++
INSTALACJA:

Pliki po rozpakowaniu nale¿y wgraæ do katalogu modules/ i zainstalowaæ. Podstrona z pochwa³ami danego u¿ytkownika ma adres: /praises/{ID}.html

+++++++++++++++++++++++++++++
WYŒWIETLANIE W PROFILU:

Aby pochwa³y liczba pochwa³ by³a wyœwietlana w profilu nale¿y wykonaæ poni¿sze instrukcje:

plik PAGES/PROFILE.PHP:
Za lini¹ ~196 dodaæ nastêpuj¹cy fragment kodu:
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
Za lini¹ ~49 dodaæ nastêpuj¹cy fragment:
{if $praises != 0}
                <p class="element light clearfix">
                    <strong class="text_other"><a href="{$praises.link}">Ostrze¿enia</a></strong>
                    <span>{$praises.praises}</span>
                </p>
            {/if}