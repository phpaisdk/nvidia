# Nvidia provider for PHP AI SDK

```bash
composer require aisdk/nvidia
```

```php
use AiSdk\Generate;
use AiSdk\Nvidia;

Nvidia::create(['apiKey' => $_ENV['NVIDIA_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Nvidia::model('nvidia/llama-3.3-nemotron-super-49b-v1.5'))
    ->run();
```

This package uses NVIDIA NIM's official OpenAI-compatible API at `https://integrate.api.nvidia.com/v1`. It supports text and streaming generation; tool calling, structured output, reasoning, and image input are passed through for NIM models that expose those capabilities. See [NVIDIA API documentation](https://build.nvidia.com/nvidia/llama-3_3-nemotron-super-49b-v1_5/deploy) and [PHP AI SDK documentation](https://phpaisdk.com/docs/nvidia).
