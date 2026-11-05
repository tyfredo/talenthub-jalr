<?php
declare(strict_types=1);
namespace TalentHub;

final class Config{
    private static ?array $values = null;

    public static function get(string $key): mixed {
        if(self::$values===null){
            $file = dirname(__DIR__).'/config/local.php';
            self::$values = is_file($file) ? require $file : [];
        }
        $environment = getenv(strtoupper($key));
        return $environment !== false && $environment !== '' ? $environment : (self::$values[$key] ?? null);
    }

    public static function required(string $key): string {
        $value=self::get($key);
        if (!is_string($value) || $value === '' || str_contains($value, 'REEMPLAZAR') || str_starts_with($value, 'tu-proyecto')) {
            throw new ApiException('Configura '.$key.' en config/local.php',503);
        }
        return $value;
    }
}
?>