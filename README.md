# aisdk/nvidia

<a href="https://github.com/phpaisdk/nvidia/actions"><img alt="GitHub Workflow Status" src="https://img.shields.io/github/actions/workflow/status/phpaisdk/nvidia/tests.yml?branch=main&label=Tests"></a>
<a href="https://packagist.org/packages/aisdk/nvidia"><img alt="Latest Version" src="https://img.shields.io/packagist/v/aisdk/nvidia"></a>
<a href="https://packagist.org/packages/aisdk/nvidia"><img alt="License" src="https://img.shields.io/packagist/l/aisdk/nvidia"></a>

------

Official NVIDIA provider for the PHP AI SDK. Uses NVIDIA NIM's OpenAI-compatible API.

## Installation

```bash
composer require aisdk/nvidia
```

## Basic Usage

```php
use AiSdk\Generate;
use AiSdk\Nvidia;

Nvidia::create(['apiKey' => $_ENV['NVIDIA_API_KEY']]);

$result = Generate::text('Explain this code briefly.')
    ->model(Nvidia::model('nvidia/llama-3.3-nemotron-super-49b-v1.5'))
    ->run();
```

## Configuration

### Environment Variables

| Variable | Description | Default |
| --- | --- | --- |
| `NVIDIA_API_KEY` | API key for authentication | Required |
| `NVIDIA_BASE_URL` | Base URL for API requests | `https://integrate.api.nvidia.com/v1` |

### Programmatic Configuration

```php
Nvidia::create([
    'apiKey' => $_ENV['NVIDIA_API_KEY'],
    'baseUrl' => 'https://integrate.api.nvidia.com/v1',
]);
```

## Supported Capabilities

| Capability | Support |
| --- | --- |
| Text generation and streaming | Native OpenAI-compatible chat |
| Tool calling, structured output, reasoning | Passed through for supported NIM models |
| Image input | Passed through for compatible vision models |

## Provider Options

Use `providerOptions('nvidia', ['raw' => [...]])` for documented NIM chat-completions fields outside the portable SDK surface. Model IDs are opaque strings and are validated by NVIDIA.

## Documentation

- [NVIDIA NIM API documentation](https://docs.api.nvidia.com/nim/docs/text-generation-inference)
- [PHP AI SDK documentation](https://phpaisdk.com/docs/nvidia)
