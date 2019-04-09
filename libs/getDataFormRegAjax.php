<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/config/config.php';

if(isset($_POST['seasonId'])) {
    
    $season_id = (int)($_POST['seasonId']);
    
} else {
   echo json_encode('Ошибка! данные не переданы ',  JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK); 
}

$getGames = getGamesBySeason($season_id);


$result = [
    'season_title' => getSeasonNameById($season_id),
    'games' => getGamesBySeason($season_id)
];
        

echo json_encode($result);
        
?>
