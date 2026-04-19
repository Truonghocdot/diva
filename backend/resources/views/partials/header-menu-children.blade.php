@foreach($items as $child)
    @php
        $childUrl = $child['url'] ?? '#';
        $nested = $child['children'] ?? [];
    @endphp
    <div class="{{ $level > 0 ? 'mt-2 border-l border-outline-variant pl-4' : '' }}">
        <a
            href="{{ $childUrl }}"
            @if(!empty($child['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
            class="{{ $level === 0 ? 'rounded-[1.5rem] border border-outline-variant/80 bg-surface-container-low p-5' : 'rounded-xl px-0 py-2' }} block text-sm transition hover:text-secondary"
        >
            <span class="{{ $level === 0 ? 'font-semibold uppercase tracking-[0.12em] text-primary' : 'text-on-surface-variant' }}">
                {{ $child['label'] ?? 'Menu con' }}
            </span>
        </a>

        @if(!empty($nested))
            <div class="{{ $level === 0 ? 'mt-3 space-y-2' : '' }}">
                @include('partials.header-menu-children', [
                    'items' => $nested,
                    'level' => $level + 1,
                ])
            </div>
        @endif
    </div>
@endforeach
