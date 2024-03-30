<?php

use Livewire\Volt\Component;
use App\Models\Url;
use App\Characters;
use Illuminate\Support\Str;

new class extends Component {
    public array $urls = [];

    public function createNewWebhook(): void
    {
        $characters = new Characters();

        $url = Url::query()->create([
            'endpoint' => Str::of($characters->getRandomCharacter())->slug(),
        ]);
        $this->urls[] = $url->endpoint;
    }
}; ?>

<div>
    <button wire:click="createNewWebhook">
        Novo Webhook
    </button>

    @foreach ($this->urls as $url)
        <li>{{ $url }}</li>
    @endforeach

</div>
