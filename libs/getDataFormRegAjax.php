<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if(isset($_POST['seasonId'])) {
    
    $season_id = (int)($_POST['seasonId']);
    
} else {
   echo json_encode('Ошибка! данные не переданы ',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK); 
}

if(isset($_POST['gameId'])) {
    
    $seleceted_game_id = (int)($_POST['gameId']);
    
} else {
   $seleceted_game_id = ''; 
}

$getGames = getGamesBySeason($season_id);


$result = [
    'season_title'          => getSeasonNameById($season_id),
    'games'                 => getGamesBySeason($season_id),
    'seleceted_game_id'     => $seleceted_game_id
];
        

echo json_encode($result);
        
?>
