<?php

require_once 'config/api-config.php';
require_once 'classes/GiphApi.php';

$search = trim($_GET['search'] ?? 'programming');

$giphyApi = new GiphyApi(GIPHY_API_KEY);
$gifs = $giphyApi->getGifs($search);

require_once 'views/home.php';