<?php
<<<<<<< HEAD

=======
>>>>>>> 9cb7c652b9ff7e6408fb744ae6398436770da5fe
define('BASE_URI', str_replace('\\','/', substr(__DIR__ , strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR , ['Core','autoload.php']));
$app = new Core\Core();
$app->run();

?>