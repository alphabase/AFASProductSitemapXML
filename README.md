<h1>AFAS Product Sitemap XML</h1>
<p>Genereer een sitemap met productgroepen en producten in AFAS Profit OutSite om deze indexeerbaar te maken voor zoekmachines.</p>

<h2>Stap 1: Installeren in Profit</h2>
<ol>
	<li>Download de GetConnectoren <a href="GNR_Productgroepen.gcn" title="GetConnector GNR_Productgroepen">GNR_Productgroepen</a> en <a href="GNR_Producten.gcn" title="GetConnector GNR_Producten">GNR_Producten</a></li>
	<li>Importeer de GetConnectoren in Profit<br /><code>Startmenu F4 / Algemeen / Uitvoer / Beheer / GetConnector / Actieknop Importeren</code></li>
	<li>Maak een nieuwe AppConnector aan<br /><code>Startmenu F4 / Algemeen / Beheer / AppConnector / Nieuw</code></li>
	<li>Deblokkeer de AppConnector<br /><code>Eigenschappen AppConnector / Tabblad Algemeen / Veld Geblokkeerd</code></li>
	<li>Voeg de GetConnectoren toe aan de AppConnector<br /><code>Eigenschappen AppConnector / Tabblad GetConnectoren / Nieuw</code></li>
	<li>Maak een nieuwe Gebruikerstoken aan en sla deze op (bijvoorbeeld Kladblok)<br /><code>Eigenschappen AppConnector / Tabblad Gebruikerstokens / Nieuw</code></li>
</ol>

<h2>Stap 2: Uitvoeren in webapplicatie</h2>
<ul>
	<li>Profit REST Services URL<br /><small>De volledige URL waar de webservices van de Profit REST Services van de betreffende Profit-omgeving en -installatie op werken.</small></li>
	<li>AppConnector token<br /><small>De volledige Gebruikerstoken die in Stap 1.6 in de AppConnector aangemaakt is, inclusief &lt;token&gt;...&lt;/token&gt;.</small></li>
	<li>Template URL: Productgroep<br /><small>Een voorbeeld van de URL waar de Productgroeppagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Productgroep-ID.</small></li>
	<li>Template URL: Product<br /><small>Een voorbeeld van de URL waar de Productpagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Product-ID.</small></li>
	<li>Template URL: Samenstelling<br /><small>Een voorbeeld van de URL waar de Samenstellingspagina in OutSite zichtbaar is. De waarde [ID] zal vervangen worden met de Samenstelling-ID.</small></li>
</ul>

<h2>Stap 3: Implementeren in OutSite</h2>
<ol>
	<li>Log in op OutSite en open sitebeheer</li>
	<li>Kies voor <code>Pagina / Nieuw / Downloadbaar bestand</code></li>
	<li>Upload het XML-bestand en klik op <code>Toevoegen</code></li>
	<li>Kies voor <code>Site / Menu / Nieuw / 5. Verwijzen naar bestaande pagina / Volgende</code></li>
	<li>Selecteer bij <code>Pagina</code> het downloadbaar bestand</li>
	<li>Klik met de rechtermuisknop op de hyperlink achter het veld <code>Pagina</code> en kopieer het linkadres naar het klembord</li>
	<li>Annuleer de wizard door op het kruisje te klikken</li>
</ol>

<h2>Stap 4: Verzenden naar Google</h2>
<ol>
	<li>Log in op <a href="https://www.google.com/webmasters/tools" title="Google Search Console">Google Search Console</a></li>
	<li>Indien je nog geen property hebt aangemaakt voor OutSite, <a href="https://support.google.com/webmasters/answer/34592" title="Een websiteproperty toevoegen">doe dat dan eerst</a></li>
	<li>Selecteer de property waar OutSite op draait</li>
	<li>Kies voor <code>Crawlen / Sitemaps</code> en klik op <code>Sitemap toevoegen/testen</code></li>
	<li>Plak de hyperlink die naar het klembord gekopieerd is en klik op <code>Test</code></li>
	<li>Als de testresultaten geen fouten bevatten, herhaal dan de vorige stap en klik op <code>Verzenden</code></li>
</ol>

<h2>Optioneel: Sitemap bijwerken</h2>
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

<h2>GetConnectoren</h2>

<h3><a href="GNR_Productgroepen.gcn" title="GetConnector GNR_Productgroepen">GNR_Productgroepen</a></h3>
<ul>
	<li>Productgroep.Geblokkeerd = N</li>
	<li>Productgroep.Actief vanaf <= [Vandaag]</li>
	<li>Productgroep.Zichtbaar in OutSite = J</li>
</ul>

<h3><a href="GNR_Producten.gcn" title="GetConnector GNR_Producten">GNR_Producten</a></h3>
<ul>
	<li>Productgroepregels.Geblokkeerd = N</li>
	<li>Productgroep.Geblokkeerd = N</li>
	<li>Productgroep.Actief vanaf <= [Vandaag]</li>
	<li>Productgroep.Zichtbaar in OutSite = J</li>
</ul>

<p><small>Omdat er voor de koppeling een nieuwe AppConnector is toegevoegd met enkel de voorgedefinieerde GetConnectoren <code>GNR_Productgroepen</code> en <code>GNR_Producten</code>, is er geen risico dat andere data via deze koppeling ontsloten kan worden.</small></p>
