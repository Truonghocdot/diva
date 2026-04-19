<ul class="{{ $level === 0 ? 'space-y-3' : 'mt-3 space-y-2 border-l border-slate-200 pl-4' }}">
    @foreach($items as $item)
        @php
            $children = $item['children'] ?? [];
        @endphp
        <li>
            <a
                class="text-sm text-slate-600 transition hover:text-primary"
                href="{{ $item['url'] ?? '#' }}"
                @if(!empty($item['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
            >
                {{ $item['label'] ?? 'Menu item' }}
            </a>

            @if(!empty($children))
                @include('partials.footer-menu-tree', [
                    'items' => $children,
                    'level' => $level + 1,
                ])
            @endif
        </li>
    @endforeach
</ul>
