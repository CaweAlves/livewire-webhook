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

<div class="grid grid-cols-2 gap-4 h-full p-10">
    <div class="bg-slate-900 rounded-lg p-4">
        <button class="bg-yellow-500 rounded-lg shadow px-4 text-slate-900 hover:bg-opacity-80 m-4"
            wire:click="createNewWebhook">
            Novo Webhook
        </button>

        <ul class="overflow-y-auto">
            @foreach ($this->urls as $url)
                <li>{{ $url }}</li>
            @endforeach
        </ul>
    </div>

    <div class="bg-slate-900 rounded-lg p-4 h-screen overflow-y-auto">

    </div>


</div>
