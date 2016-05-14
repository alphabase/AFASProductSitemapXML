<?php

/* --- CHECK FOR VALID REQUEST --- */

if (
		!isset($_POST['webservicesUrl']) ||
		!isset($_POST['appConnectorToken']) ||
		!isset($_POST['templateUrlProductgroep']) ||
		!isset($_POST['templateUrlProduct']) ||
		!isset($_POST['templateUrlSamenstelling'])
) {
	die(1);
} else {
	setcookie('webservicesUrl', $_POST['webservicesUrl'], time()+60*60*24*365);
	setcookie('appConnectorToken', $_POST['appConnectorToken'], time()+60*60*24*365);
	setcookie('templateUrlProductgroep', $_POST['templateUrlProductgroep'], time()+60*60*24*365);
	setcookie('templateUrlProduct', $_POST['templateUrlProduct'], time()+60*60*24*365);
	setcookie('templateUrlSamenstelling', $_POST['templateUrlSamenstelling'], time()+60*60*24*365);
}

/* --- INITIALIZE XML AND RESULTS ARRAY --- */

$xml = new SimpleXMLElement ( '<?xml version="1.0" encoding="UTF-8" ?><urlset />' );
$xml->addAttribute ( 'xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9' );

$urls = array ();

/* --- TOKEN HEADER --- */

$headers = array ();
$headers [] = 'Authorization: AfasToken ' . base64_encode ( $_POST['appConnectorToken'] );

/* --- GET PRODUCTEN --- */

$curl = curl_init ();

curl_setopt ( $curl, CURLOPT_URL, $_POST['webservicesUrl'] . 'connectors/GNR_Producten' );
curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt ( $curl, CURLOPT_HTTPHEADER, $headers );

$result = curl_exec ( $curl );

if (curl_errno ( $curl ) !== 0) {
	die ( 'cURL error (' . curl_errno ( $curl ) . '): ' . curl_error ( $curl ) );
} else {
	$result = json_decode ( $result, true );
	curl_close ( $curl );
	
	if (is_array ( $result ['rows'] )) {
		foreach ( $result ['rows'] as $row ) {
			$item = new stdClass ();
			if ($row ['type'] == '2') {
				// Artikel
				$item->loc = str_replace('[ID]', $row['id'], $_POST['templateUrlProduct']);
			} elseif ($row ['type'] == '7') {
				// Samenstelling
				$item->loc = str_replace('[ID]', $row['id'], $_POST['templateUrlSamenstelling']);
			} else {
				break;
			}
			$item->lastmod = date("Y-m-d", strtotime($row ['lastmod']));
			$item->changefreq = 'monthly';
			$urls [] = $item;
		}
	}
}

/* --- GET PRODUCTGROEPEN --- */

$curl = curl_init ();

curl_setopt ( $curl, CURLOPT_URL, $_POST['webservicesUrl'] . 'connectors/GNR_Productgroepen' );
curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true );
curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt ( $curl, CURLOPT_HTTPHEADER, $headers );

$result = curl_exec ( $curl );

if (curl_errno ( $curl ) !== 0) {
	die ( 'cURL error (' . curl_errno ( $curl ) . '): ' . curl_error ( $curl ) );
} else {
	$result = json_decode ( $result, true );
	curl_close ( $curl );
	
	if (is_array ( $result ['rows'] )) {
		foreach ( $result ['rows'] as $row ) {
			$item = new stdClass ();
			$item->loc = str_replace('[ID]', $row['id'], $_POST['templateUrlProductgroep']);
			$item->lastmod = date("Y-m-d", strtotime($row ['lastmod']));
			$item->changefreq = 'monthly';
			$urls [] = $item;
		}
	}
}

/* --- SET XML CHILDREN --- */

foreach ( $urls as $url ) {
	$child = $xml->addChild ( 'url' );
	$child->addChild ( 'loc', strtolower ( $url->loc ) );
	if (isset ( $url->lastmod ))
		$child->addChild ( 'lastmod', $url->lastmod );
	if (isset ( $url->changefreq ))
		$child->addChild ( 'changefreq', $url->changefreq );
	if (isset ( $url->priority ))
		$child->addChild ( 'priority', number_format ( $url->priority, 1 ) );
}

/* --- WRITE OUTPUT TO FILE --- */

header('Content-disposition: attachment; filename="sitemap.xml"');
header('Content-type: "text/xml"; charset="utf8"');
echo $xml->asXml();
