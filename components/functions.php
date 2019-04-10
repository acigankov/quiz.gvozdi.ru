<?php

/**
 * Переводит месяц на русский язык
 * @param int $month номер месяца
 * @return array or false
 */

function getMonthRus($month) {
    
    $monthRus = [
        1   => 'Января',
        2   => 'Февраля',
        3   => 'Марта',
        4   => 'Апреля',
        5   => 'Мая',
        6   => 'Июня',
        7   => 'Июля',
        8   => 'Августа',
        9   => 'Сентября',
        10  => 'Октября',
        11  => 'Ноября',
        12  => 'Декабря'
    ];

    if (isset($month)) {
        return $monthRus[$month];
    }
    return false;
}

function getDayRus($day) {
    $days = array(
        // в формате w возвращает порядковый номер дня недели от 0 до 6. 0 -вс 
        'Воскресенье',
        'Понедельник',
        'Вторник', 
        'Среда',
        'Четверг',
        'Пятница',
        'Суббота'
    );
    return $days[$day];
}

function getShortDayRus($day) {
    $days = array(
        // в формате w возвращает порядковый номер дня недели от 0 до 6. 0 -вс 
        'Вс',
        'Пн',
        'Вт', 
        'Ср',
        'Чт',
        'Пт',
        'сб'
    );
    return $days[$day];
}





/**
 * Достает сезоны из базы 
 * @param null
 * @return array or false
 */
function getSeason() {
    
    $db = DB::getConnection();
    $sql = "SELECT id, name, season_banner as banner, season_logo as logo
            FROM seasons";
    $result = $db->prepare($sql); 
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $seasons = $result->fetchAll();
    
    if($seasons){
        return $seasons;
    }
    
    return false;
}


/**
 * Достает игры из базы 
 * @param int $limit row limt
 * @return array or false
 */

function getGames($limit) {

    
    if ($limit) {

        $db = DB::getConnection();

        $sql = "SELECT 
            g.id,
            g.name as name,
            g.start_date as date,
            g.description as description,
            g.game_logo as logo,
            g.game_banner as banner,
            g.season_id as season_id,
            l.name as bar,
            l.adress
            FROM games g  
            LEFT JOIN location l on l.id = g.locationID 
            WHERE g.active = 1  
            GROUP BY g.season_id 
            ORDER BY g.start_date LIMIT :limit";
        
        
        
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();       
        $games = $result->fetchAll();

        if($games){
            return $games;
        }
    }
    return false;
}

/**
 * Достает игры из базы 
 * @param int $limit row limt
 * @return array or false
 */

function getAllGames() {

    

        $db = DB::getConnection();

        $sql = "SELECT 
            g.id,
            g.name as name,
            g.start_date as date,
            g.description as description,
            g.game_logo as logo,
            g.game_banner as banner,
            g.season_id as season_id,
            l.name as bar,
            l.adress
            FROM games g  
            LEFT JOIN location l on l.id = g.locationID 
            WHERE g.active = 1  
            ORDER BY g.start_date";
        
        
        
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();       
        $games = $result->fetchAll();

        if($games){
            return $games;
        }
        
    return false;
}


/**
 * Достает игры из базы по сезону
 * @param int $id row game id
 * @return array or false
 */

function getGamesBySeason($season) {

    if ($season) {

        $db = DB::getConnection();

        $sql = "SELECT 
            g.id,
            g.name as name,
            g.start_date as date,
            g.description as description,
            g.game_logo as logo,
            g.game_banner as banner,
            l.name as bar,
            l.adress
            FROM games g  
            LEFT JOIN location l on l.id = g.locationID 
            WHERE g.active = 1 
            AND g.season_id = :season
            ORDER BY g.start_date";
        
        $result = $db->prepare($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->bindParam(':season', $season, PDO::PARAM_INT);
        $result->execute();       
        $games = $result->fetchAll();

        if($games){
            return $games;
        }
    }
    return false;
}


/**
 * Достает игры из базы название по id
 * @param int $id row game id
 * @return string or false
 */


function getGameNameById ($id) {
    
    if ($id) {

        $db = DB::getConnection();
        $sql = "SELECT name FROM games WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $gameName = $result->fetchColumn();
        
        if($gameName){
            return $gameName;
        }
    }
    return false;
}

/**
 * Достает имя сезона из базы название по id
 * @param int $id 
 * @return string or false
 */


function getSeasonNameById ($id) {
    
    if ($id) {

        $db = DB::getConnection();
        $sql = "SELECT name FROM seasons WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $seasonName = $result->fetchColumn();
        
        if($seasonName){
            return $seasonName;
        }
    }
    return false;
}

/**
 * Достает лого сезона из базы по id
 * @param int $id 
 * @return string or false
 */


function getSeasonLogoById ($id) {
    
    if ($id) {

        $db = DB::getConnection();
        $sql = "SELECT season_logo FROM seasons WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $seasonName = $result->fetchColumn();
        
        if($seasonName){
            return $seasonName;
        }
    }
    return false;
}

/**
 * Достает игры из базы данные для отправки уведомления о регистарции
 * @param int $id gameid
 * @return array or false
 */

function getGameForMail ($id) {
    $db = DB::getConnection();
    
    $sql = "SELECT name, start_date FROM games WHERE id = :id";
    $result = $db->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();       
    $game = $result->fetch();
    
    if ($game) {
        return $game;
    }
    return false;
}

/**
 * Сохраняет в базу чувака и команду из формы регистрации
 * @params mixed 
 * @return bool
 */

function saveTeam ($team,$captain,$gamers,$tel,$email,$gameId) {
    
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO users (name, tel, email) VALUES (:captain, :tel, :email); 
            SET @lastID := LAST_INSERT_ID(); 
            INSERT INTO teams (name, captainID, gamers, gameId) VALUES (:team, @lastID, :gamers, :gameId );';
    
    $result = $db->prepare($sql);
    $result->bindParam(':captain', $captain, PDO::PARAM_INT);
    $result->bindParam(':tel', $tel, PDO::PARAM_STR);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':team', $team, PDO::PARAM_STR);
    $result->bindParam(':gamers', $gamers, PDO::PARAM_INT);
    $result->bindParam(':gameId', $gameId, PDO::PARAM_INT);
    
    if($result->execute()) {
        return true;
    }
    return false;
}

/**
 * Сохраняет в базу чувака из формы звонка
 * @param string $name, string $tel
 * @return bool
 */
function saveUser($name, $tel) {
    
    $db = DB::getConnection();
    
    $sql = 'INSERT INTO users (name, tel) VALUES (:name, :tel)';
    
    $result = $db->prepare($sql);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':tel', $tel, PDO::PARAM_STR);
    
    if($result->execute()) {
        return true;
    }
    return false;
    
}