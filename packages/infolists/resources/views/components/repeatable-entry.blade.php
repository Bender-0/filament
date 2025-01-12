@php
    $isContained = $isContained();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        {{
            $attributes
                ->merge([
                    'id' => $getId(),
                ], escape: false)
                ->merge($getExtraAttributes(), escape: false)
                ->class([
                    'fi-in-repeatable',
                    'fi-contained' => $isContained,
                ])
        }}
    >
        @if (count($childComponentContainers = $getChildComponentContainers()))
            <ul>
                <div
                    {{ (new \Illuminate\View\ComponentAttributeBag)->grid($getGridColumns())->class(['gap-4']) }}
                >
                    @foreach ($childComponentContainers as $container)
                        <li
                            @class([
                                'fi-in-repeatable-item block',
                                'rounded-xl bg-white p-4 shadow-sm ring-1 ring-gray-950/5 dark:bg-white/5 dark:ring-white/10' => $isContained,
                            ])
                        >
                            {{ $container }}
                        </li>
                    @endforeach
                </div>
            </ul>
        @elseif (($placeholder = $getPlaceholder()) !== null)
            <x-filament-infolists::entries.placeholder>
                {{ $placeholder }}
            </x-filament-infolists::entries.placeholder>
        @endif
    </div>
</x-dynamic-component>
