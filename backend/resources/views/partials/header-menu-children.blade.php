@foreach($items as $child)
    @php
        $childUrl = $child['url'] ?? '#';
        $nested = $child['children'] ?? [];
    @endphp
    <div class="{{ $level > 0 ? 'mt-2 border-l border-slate-200 pl-4' : '' }}">
        <a
            href="{{ $childUrl }}"
            @if(!empty($child['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
            class="block rounded-xl px-4 py-3 text-sm text-slate-600 transition hover:bg-blue-50 hover:text-primary"
        >
            {{ $child['label'] ?? 'Menu con' }}
        </a>

        @if(!empty($nested))
            @include('partials.header-menu-children', [
                'items' => $nested,
                'level' => $level + 1,
            ])
        @endif
    </div>
@endforeach
