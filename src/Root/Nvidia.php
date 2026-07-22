<?php

declare(strict_types=1);

namespace AiSdk;

use AiSdk\Contracts\Model;
use AiSdk\Nvidia\NvidiaOptions;
use AiSdk\Nvidia\NvidiaProvider;

final class Nvidia
{
    private static ?NvidiaProvider $default = null;
    /** @param array<string, mixed> $config */
    public static function create(array $config = []): NvidiaProvider
    {
        return self::$default = new NvidiaProvider(NvidiaOptions::fromArray($config));
    }
    public static function default(): NvidiaProvider
    {
        return self::$default ??= self::create();
    }
    public static function reset(): void
    {
        self::$default = null;
    }
    public static function model(string $modelId): Model
    {
        return self::default()->model($modelId);
    }
}
