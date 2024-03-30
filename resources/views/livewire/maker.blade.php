<?php

use Livewire\Volt\Component;
use App\Models\Url;
use App\Characters;
use Illuminate\Support\Str;

new class extends Component {
    public array $urls = [];

    public function mount(): void
    {
        Url::truncate();
    }

    public function createNewWebhook(): void
    {
        $url = Url::query()->create([
            'endpoint' => $this->getSlug(),
        ]);
        $this->urls[] = $url->endpoint;
    }

    private function getSlug(): string
    {
        $character = new Characters();
        $character = $character->getRandomCharacter();

        $slug = Str::of($character)->slug();

        return Url::query()->whereEndpoint($slug)->exists() ? $this->getSlug() : $slug;
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
