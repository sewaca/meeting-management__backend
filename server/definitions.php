<?php

// 
define('JWT_SECRET', 'secret_key_');
define('JWT_ISS', 'http://example.com');
define('JWT_AUD', 'http://example.com');
define('JWT_ALG', 'HS256');

// DB params : 
define('DB_HOST', ($_ENV['IS_BUILD'] ? 'database' : 'localhost')); 
define('DB_USER', 'root');
define('DB_PASSWORD', ($_ENV['IS_BUILD'] ? 'root' : '233215Sb')); 
define('DB_NAME', 'meetings');
