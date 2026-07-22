<?php

declare(strict_types=1);
use AiSdk\Generate;
use AiSdk\Nvidia;
use AiSdk\Nvidia\Tests\Fakes\FakeHttpClient;
use AiSdk\Support\Sdk;
use Nyholm\Psr7\Factory\Psr17Factory;

afterEach(function (): void {
    Generate::reset();
    Nvidia::reset();
});
it('uses Nvidia general OpenAI-compatible chat completions', function (): void {
    $client = new FakeHttpClient(200, json_encode(['id' => 'nvidia-chat', 'model' => 'nvidia/llama-3.3-nemotron-super-49b-v1.5', 'choices' => [['message' => ['content' => 'Hello from NVIDIA'], 'finish_reason' => 'stop']], 'usage' => ['prompt_tokens' => 3, 'completion_tokens' => 4]]));
    $factory = new Psr17Factory();
    Generate::configure(new Sdk($client, $factory, $factory));
    Nvidia::create(['apiKey' => 'nvidia-test']);
    $result = Generate::text('Hi')->model(Nvidia::model('nvidia/llama-3.3-nemotron-super-49b-v1.5'))->run();
    expect($result->text)->toBe('Hello from NVIDIA')->and((string) $client->lastRequest?->getUri())->toBe('https://integrate.api.nvidia.com/v1/chat/completions')->and($client->lastRequest?->getHeaderLine('Authorization'))->toBe('Bearer nvidia-test')->and($client->sentBody()['model'])->toBe('nvidia/llama-3.3-nemotron-super-49b-v1.5');
});
it('accepts opaque Nvidia model identifiers', function (): void {
    Nvidia::create(['apiKey' => 'nvidia-test']);
    expect(Nvidia::model('private-nvidia-model')->modelId())->toBe('private-nvidia-model');
});
