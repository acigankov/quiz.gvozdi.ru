<?php

define('ROOT', $_SERVER['DOCUMENT_ROOT']);
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

require_once ROOT . '/components/db.php';
require_once ROOT . '/components/functions.php';

//headers
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

  //or, if you DO want a file to cache, use:
  //header("Cache-Control: max-age=2592000"); //30days (60sec * 60min * 24hours * 30days)

//vars
$data = [
    'site_title'        => 'Гвоздатый Квиз',
    'site_url'          => $actual_link,
    'head_keywords'     => 'Квиз, Интеллектуальные игры в пабе «Гвозди»',
    'head_description'  => 'Квиз - командная интеллектуальная игра с денежными призами, интересными вопросами и морем позитивных эмоций',
];

$limit = 3;
$games = getGames($limit);
$allGames = getAllGames();
$seasons = getSeason();
$gameResults = getGameResults(7);
$news = getNews();
$gamesGP = getGamesBySeason(1);
$gamesMarvel = getGamesBySeason(2);
$gamesGOT = getGamesBySeason(3);

?>
