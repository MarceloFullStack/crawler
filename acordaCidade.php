<?php
require_once 'vendor/autoload.php';

use GuzzleHttp\Client;
//use Sunra\PhpSimple\HtmlDomParser;

use KubAT\PhpSimple\HtmlDomParser;
$client = new Client([

    'headers' => ['user-agent:'=> 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36']
]);

$URL = "http://www.policiaeviola.jornalfolhadoestado.com/";

$html = $client->request('GET', $URL)->getBody();
$dom = HtmlDomParser::str_get_html($html);



foreach ($dom->find('#blog > ul > li:nth-child(1) > h2 > a') as $key=>$link){

    $urlEmpresa = $link->plaintext;
    echo $urlEmpresa;
//    echo "<a href='http://www.policiaeviola.jornalfolhadoestado.com/'.$link->href'>$link</a> <hr>";

}