<?php

require_once 'helpers.php';
require_once 'config/db.php';
require_once 'config/queries.php';

$content_type = $_GET['type'] ?? null;

// Подключаем шаблоны

echo $content_type;