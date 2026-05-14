<?php

/**
 * Copier vers db_config.local.php (gitignored) ou définir les variables d'environnement :
 *   BATIMOD_DB_HOST, BATIMOD_DB_USER, BATIMOD_DB_PASSWORD, BATIMOD_DB_NAME
 * Mail (sendContact.php) : BATIMOD_MAIL_FROM, BATIMOD_MAIL_TO
 *
 * @return array{host:string,user:string,password:string,database:string}
 */
return [
    'host' => getenv('BATIMOD_DB_HOST') ?: 'batimodmain.mysql.db',
    'user' => getenv('BATIMOD_DB_USER') ?: 'batimodmain',
    'password' => getenv('BATIMOD_DB_PASSWORD') ?: 'MRJDk30CtSv4GIBDGoMI',
    'database' => getenv('BATIMOD_DB_NAME') ?: 'batimodmain',
];
