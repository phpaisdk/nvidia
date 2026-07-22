<?php

declare(strict_types=1);

namespace AiSdk\Nvidia;

use AiSdk\Contracts\BaseProvider;
use AiSdk\Contracts\TextModelInterface;
use AiSdk\Contracts\TextProviderInterface;
use AiSdk\Nvidia\Models\NvidiaTextModel;

final class NvidiaProvider extends BaseProvider implements TextProviderInterface
{
    public function __construct(public readonly NvidiaOptions $options) {}
    public function name(): string
    {
        return NvidiaOptions::PROVIDER_NAME;
    }
    protected function textModel(string $modelId): TextModelInterface
    {
        return new NvidiaTextModel($modelId, $this->options);
    }
}
