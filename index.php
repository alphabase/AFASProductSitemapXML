<!DOCTYPE html>
<html lang="nl">

<head>

<title>AFAS Profit Productgroepen Sitemap</title>
<meta name="robots" content="index, follow" />
<meta name="description" content="Genereer een sitemap met productgroepen en producten in AFAS Profit OutSite om deze indexeerbaar te maken voor zoekmachines." />
<link type="image/x-icon" href="favicon.ico" rel="icon" />
<link type="image/x-icon" href="favicon.ico" rel="shortcut icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
	#footer { margin:1em 0; padding:1em 0; background:#EEE; }
	#footer p { margin:0; }
	label { cursor:pointer; }
</style>

</head>

<body>

<div class="container">
	<h1>AFAS Profit Productgroepen Sitemap</h1>
	<p class="lead">Genereer een sitemap met productgroepen en producten in AFAS Profit OutSite om deze indexeerbaar te maken voor zoekmachines.</p>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Stap 1: Installeren in Profit</h2>
				</div>
				<div class="panel-body">
					<ol>
						<li>Download de GetConnectoren <a href="GNR_Productgroepen.gcn" title="GetConnector GNR_Productgroepen">GNR_Productgroepen</a> en <a href="GNR_Producten.gcn" title="GetConnector GNR_Producten">GNR_Producten</a></li>
						<li>Importeer de GetConnectoren in Profit<br /><code>Startmenu F4 / Algemeen / Uitvoer / Beheer / GetConnector / Actieknop Importeren</code></li>
						<li>Maak een nieuwe AppConnector aan<br /><code>Startmenu F4 / Algemeen / Beheer / AppConnector / Nieuw</code></li>
						<li>Deblokkeer de AppConnector<br /><code>Eigenschappen AppConnector / Tabblad Algemeen / Veld Geblokkeerd</code></li>
						<li>Voeg de GetConnectoren toe aan de AppConnector<br /><code>Eigenschappen AppConnector / Tabblad GetConnectoren / Nieuw</code></li>
						<li>Maak een nieuwe Gebruikerstoken aan en sla deze op (bijvoorbeeld Kladblok)<br /><code>Eigenschappen AppConnector / Tabblad Gebruikerstokens / Nieuw</code></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Stap 2: Uitvoeren in webapplicatie</h2>
				</div>
				<div class="panel-body">
					<form method="post" action="run.php" id="execute">
						<div class="form-group">
							<label for="webservicesUrl">Profit REST Services URL <i class="glyphicon glyphicon-question-sign" data-tooltip title="De volledige URL waar de webservices van de Profit REST Services van de betreffende Profit-omgeving en -installatie op werken."></i></label>
							<input type="url" class="form-control" id="webservicesUrl" name="webservicesUrl" value="<?php echo isset($_COOKIE['webservicesUrl']) ? $_COOKIE['webservicesUrl'] : ''?>" placeholder="https://12345.afasonlineconnector.nl/ProfitRestServices/" />
						</div>
						<div class="form-group">
							<label for="appConnectorToken">AppConnector token <i class="glyphicon glyphicon-question-sign" data-tooltip title="De volledige Gebruikerstoken die in Stap 1.6 in de AppConnector aangemaakt is, inclusief &lt;token&gt;...&lt;/token&gt;."></i></label>
							<input type="text" class="form-control" id="appConnectorToken" name="appConnectorToken" value="<?php echo isset($_COOKIE['appConnectorToken']) ? $_COOKIE['appConnectorToken'] : ''?>" placeholder="<token><version>1</version><data>xxx</data></token>" />
						</div>
						<hr />
						<div class="form-group">
							<label for="templateUrlProductgroep">Template URL: Productgroep <i class="glyphicon glyphicon-question-sign" data-tooltip title="Een voorbeeld van de URL waar de Productgroeppagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Productgroep-ID."></i></label>
							<input type="url" class="form-control" id="templateUrlProductgroep" name="templateUrlProductgroep" value="<?php echo isset($_COOKIE['templateUrlProductgroep']) ? $_COOKIE['templateUrlProductgroep'] : ''?>" placeholder="https://www.voorbeeld.nl/productgroep-prs?PrGr=[ID]" />
						</div>
						<div class="form-group">
							<label for="templateUrlProduct">Template URL: Product <i class="glyphicon glyphicon-question-sign" data-tooltip title="Een voorbeeld van de URL waar de Productpagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Product-ID."></i></label>
							<input type="url" class="form-control" id="templateUrlProduct" name="templateUrlProduct" value="<?php echo isset($_COOKIE['templateUrlProduct']) ? $_COOKIE['templateUrlProduct'] : ''?>" placeholder="https://www.voorbeeld.nl/product-prs/artikel-prs?BiId=[ID]" />
						</div>
						<div class="form-group">
							<label for="templateUrlSamenstelling">Template URL: Samenstelling <i class="glyphicon glyphicon-question-sign" data-tooltip title="Een voorbeeld van de URL waar de Samenstellingspagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Samenstelling-ID."></i></label>
							<input type="url" class="form-control" id="templateUrlSamenstelling" name="templateUrlSamenstelling" value="<?php echo isset($_COOKIE['templateUrlSamenstelling']) ? $_COOKIE['templateUrlSamenstelling'] : ''?>" placeholder="https://www.voorbeeld.nl/product-prs/samenstelling-prs?BiId=[ID]" />
						</div>
						<hr />
						<button type="submit" class="btn btn-success btn-block">Opslaan en verzenden</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Stap 3: Implementeren in OutSite</h2>
				</div>
				<div class="panel-body">
					<ol>
						<li>Log in op OutSite en open sitebeheer</li>
						<li>Kies voor <code>Pagina / Nieuw / Downloadbaar bestand</code></li>
						<li>Upload het XML-bestand en klik op <code>Toevoegen</code></li>
						<li>Kies voor <code>Site / Menu / Nieuw / 5. Verwijzen naar bestaande pagina / Volgende</code></li>
						<li>Selecteer bij <code>Pagina</code> het downloadbaar bestand</li>
						<li>Klik met de rechtermuisknop op de hyperlink achter het veld <code>Pagina</code> en kopieer het linkadres naar het klembord</li>
						<li>Annuleer de wizard door op het kruisje te klikken</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2>Stap 4: Verzenden naar Google</h2>
				</div>
				<div class="panel-body">
					<ol>
						<li>Log in op <a href="https://www.google.com/webmasters/tools" title="Google Search Console">Google Search Console</a></li>
						<li>Indien je nog geen property hebt aangemaakt voor OutSite, <a href="https://support.google.com/webmasters/answer/34592" title="Een websiteproperty toevoegen">doe dat dan eerst</a></li>
						<li>Selecteer de property waar OutSite op draait</li>
						<li>Kies voor <code>Crawlen / Sitemaps</code> en klik op <code>Sitemap toevoegen/testen</code></li>
						<li>Plak de hyperlink die naar het klembord gekopieerd is en klik op <code>Test</code></li>
						<li>Als de testresultaten geen fouten bevatten, herhaal dan de vorige stap en klik op <code>Verzenden</code></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Optioneel: Sitemap bijwerken</h2>
				</div>
				<div class="panel-body">
					<ol>
						<li>Download een nieuw sitemapbestand zoals in <code>Stap 2</code> beschreven</li>
						<li>Log in op OutSite en open sitebeheer</li>
						<li>Kies voor <code>Site / Onderhouden pagina's</code> en open de eigenschappen van het downloadbaar bestand</li>
						<li>Verwijder de bijlage achter <code>Bestand</code> en upload de nieuwe sitemap</li>
						<li>Klik op <code>Aanpassen</code></li>
						<li>Log in op <a href="https://www.google.com/webmasters/tools" title="Google Search Console">Google Search Console</a></li>
						<li>Selecteer de property waar OutSite op draait</li>
						<li>Kies voor <code>Crawlen / Sitemaps</code></li>
						<li>Vink de sitemap aan en klik op <code>Opnieuw verzenden</code></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>GetConnectoren</h2>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<h3><a href="GNR_Productgroepen.gcn" title="GetConnector GNR_Productgroepen">GNR_Productgroepen</a></h3>
							<ul>
								<li>Productgroep.Geblokkeerd = N</li>
								<li>Productgroep.Actief vanaf <= [Vandaag]</li>
								<li>Productgroep.Zichtbaar in OutSite = J</li>
							</ul>
						</div>
						<div class="col-md-6">
							<h3><a href="GNR_Producten.gcn" title="GetConnector GNR_Producten">GNR_Producten</a></h3>
							<ul>
								<li>Productgroepregels.Geblokkeerd = N</li>
								<li>Productgroep.Geblokkeerd = N</li>
								<li>Productgroep.Actief vanaf <= [Vandaag]</li>
								<li>Productgroep.Zichtbaar in OutSite = J</li>
							</ul>
						</div>
					</div>
					<p><small>Omdat er voor de koppeling een nieuwe AppConnector is toegevoegd met enkel de voorgedefinieerde GetConnectoren <code>GNR_Productgroepen</code> en <code>GNR_Producten</code>, is er geen risico dat andere data via deze koppeling ontsloten kan worden.</small></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Broncode</h2>
				</div>
				<div class="panel-body">
					<p>De broncode van dit product is vrijblijvend beschikbaar via GitHub.</p>
					<a href="https://github.com/alphabase/AFASProductSitemapXML" class="btn btn-block btn-info">https://github.com/alphabase/AFASProductSitemapXML</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="footer">
	<div class="container">
		<div class="row-fluid text-right">
			<small class="text-muted">&copy; 2016&nbsp;<a href="http://gerardnijboer.com" title="Gerard Nijboer">Gerard Nijboer</a> | Aan de werking en uitvoer van dit product kunnen geen rechten ontleend worden | <a href="https://github.com/alphabase/AFASProductSitemapXML" title="Broncode op GitHub">Broncode</a></small>
		</div>
	</div>
</div>

<script src="//code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
	$("[data-tooltip]").tooltip();
</script>

</body>

</html>