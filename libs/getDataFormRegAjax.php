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

//заморочка с перефоратированием даты для селекта в форме. УФФ прям.
foreach ($getGames as $item) {
    $gamesDate[] = [
                'gameDate' => getShortDayRus(date("w", strtotime($item['date']))) 
                . ' ' . date('d.m.Y H:i' , strtotime($item['date'])) 
                . ' #' . $item['description'],
                'gameId' => $item['id']
            ];
}

$result = [
    'season_logo'           => getSeasonLogoById($season_id),
    'gamesDate'             => $gamesDate,
    'seleceted_game_id'     => $seleceted_game_id
];

echo json_encode($result);
        
?>
