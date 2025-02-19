<?php
/**
 * @file test_login_check.php
 * @brief login_check.phpの単体テスト。
 * @author nagata
 */

require __DIR__ . '/../logic/login_check.php';

$_SESSION['login'] = true;

require __DIR__ . '/../logic/login_check.php';

$_SESSION = [];
session_destroy();

require __DIR__ . '/../logic/login_check.php';