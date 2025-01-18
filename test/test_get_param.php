<?php
/**
 * @file test_get_param.php
 * @brief get_param.php の単体テスト。
 * @author nagata
 */

require_once __DIR__ . '/../param/get_param.php';

/**
 * @brief GetSalt()の戻り値と期待値が一致しているかテスト。
 */
function testGetSaltTrue(): void {
    $assertEqual = ((getSalt() === 'h2Xib8jENmQve4dVXDeQ') ? 'passed' : 'failed');
    echo 'testGetSaltTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief GetSalt()の戻り値が期待値以外と一致しないことをテスト。
 */
function testGetSaltFalse(): void {
    $assertEqual = ((getSalt() === 'h2Xib8jENmQve4dVXDeA') ? 'failed' : 'passed');
    echo 'testGetSaltFalse : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief GetDbPassword()の戻り値と期待値が一致しているかテスト。
 */
function testGetDbPasswordTrue(): void {
    $assertEqual = ((getDbPassword() === 'qpBSBwz4ac4wYUdznPRALaF2jygRZaTb') ? 'passed' : 'failed');
    echo 'getDbPasswordTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief GetDbPassword()の戻り値が期待値以外と一致しないことをテスト。
 */
function testGetDbPasswordFalse(): void {
    $assertEqual = ((getDbPassword() === 'qpBSBwz4ac4wYUdznPRALaF2jygRZaTa') ? 'failed' : 'passed');
    echo 'getDbPasswordFalse : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief getDbUser()の戻り値と期待値が一致しているかテスト。
 */
function testGetDbUserTrue(): void {
    $assertEqual = ((getDbUser() === 'admin') ? 'passed' : 'failed');
    echo 'testGetSaltTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief getDbUser()の戻り値が期待値以外と一致しないことをテスト。
 */
function testGetDbUserFalse(): void {
    $assertEqual = ((getDbUser() === 'user') ? 'failed' : 'passed');
    echo 'testGetSaltTrue : ' . $assertEqual . '<br>' . PHP_EOL;
}

testGetSaltTrue();
testGetSaltFalse();
testGetDbPasswordTrue();
testGetDbPasswordFalse();
testGetDbUserTrue();
testGetDbUserFalse();