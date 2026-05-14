<?php

/**
 * Copy to db_config.local.php (gitignored) or set env vars:
 *   BATIMOD_DB_HOST, BATIMOD_DB_USER, BATIMOD_DB_PASSWORD, BATIMOD_DB_NAME
 * Optional mail (sendContact.php uses PHP mail(); configure sendmail / php.ini on the server):
 *   BATIMOD_MAIL_FROM, BATIMOD_MAIL_TO
 *
 * @return array{host:string,user:string,password:string,database:string}
 */
return [
    'host' => getenv('BATIMOD_DB_HOST') ?: 'localhost',
    'user' => getenv('BATIMOD_DB_USER') ?: 'root',
    'password' => getenv('BATIMOD_DB_PASSWORD') ?: '',
    'database' => getenv('BATIMOD_DB_NAME') ?: 'batimod',
];
