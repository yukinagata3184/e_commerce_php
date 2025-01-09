<?php
/**
 * @file test_get_param.php
 * @brief test get_param.php.
 * @author nagata
 */

require_once __DIR__ . '/../param/get_param.php';

/**
 * @brief Check to match the expected values at GetSalt().
 */
function testGetSalt(): void{
    $assertEqual = ((getSalt() === 'h2Xib8jENmQve4dVXDeQ') ? 'passed' : 'failed');
    echo 'testGetSalt : ' . $assertEqual . '<br>' . PHP_EOL;
}

/**
 * @brief Check to match the expected values at GetDbPassword().
 */
function testGetDbPassword(): void{
    $assertEqual = ((getDbPassword() === 'qpBSBwz4ac4wYUdznPRALaF2jygRZaTb') ? 'passed' : 'failed');
    echo 'getDbPassword : ' . $assertEqual . '<br>' . PHP_EOL;
}

testGetSalt();
testGetDbPassword();