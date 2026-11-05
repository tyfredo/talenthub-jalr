<?php
declare(strict_types=1);
require dirname(__DIR__) . '/src/bootstrap.php';
if (!class_exists(\TalentHub\Application::class)) {
    fwrite(STDERR, 'No se pudo cargar la aplicacion');
    exit(1);
}
echo "SMOKE PHP OK\n"
?>