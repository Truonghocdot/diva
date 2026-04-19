<ul class="{{ $level === 0 ? 'space-y-3' : 'mt-3 space-y-2 border-l border-outline-variant pl-4' }}">
    @foreach($items as $item)
        @php
            $children = $item['children'] ?? [];
        @endphp
        <li>
            <a
                class="{{ $level === 0 ? 'text-[13px] font-medium tracking-[0.04em] text-on-surface hover:text-primary' : 'text-sm text-on-surface-variant hover:text-secondary' }} transition"
                href="{{ $item['url'] ?? '#' }}"
                @if(!empty($item['open_in_new_tab'])) target="_blank" rel="noreferrer" @endif
            >
                {{ $item['label'] ?? 'Mục menu' }}
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
