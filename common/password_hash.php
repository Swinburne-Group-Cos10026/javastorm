<?php
if (!function_exists("password_hash")) {
	if (!isset($cost))
		$cost = 10;
	if (!defined(PASSWORD_BCRYPT))
		define('PASSWORD_BCRYPT', 1);

	function password_hash($input, $mode) {
    $salt = sprintf('$2a$%02d$', $GLOBALS['cost']);

    if (function_exists('openssl_random_pseudo_bytes')) {
			$salt .= substr(str_replace('+', '.', base64_encode(openssl_random_pseudo_bytes(16))), 0, 22);
    } elseif (defined('MCRYPT_DEV_URANDOM')) {
			$salt .= substr(str_replace('+', '.', base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM))), 0, 22);
    } else {
			$salt .= substr(str_replace('+', '.', base64_encode(mcrypt_create_iv(16, MCRYPT_RAND))), 0, 22);
    }

    return crypt($password, $salt);
	}

	function password_verify($input, $hash) {
    return crypt($input, $hash) == $hash;
	}
}
