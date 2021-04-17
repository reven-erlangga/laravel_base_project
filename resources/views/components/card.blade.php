<div {{ $attributes->merge(['class' => 'card shadow overflow-hidden border-b border-gray-200 sm:rounded-lg ' . $type]) }}>
    <div class="text-capitalize card-header">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="card-title">{{ __($title) }}</h5>
            </div>
            <div class="col">
                <div class="float-right">
                    @isset($tools)
                        {{ $tools }}
                    @endisset
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        @isset($header)
            <div class="my-3">
                {{ $header }}
            </div>
        @endisset

        {{ $slot }}
    </div>

    <div class="card-footer">
        @isset($footer)
        <div class="float-right">
            {{ $footer }}
        </div>
        @else
            <footer class="blockquote-footer clearfix">{{ $title }}</footer>
        @endisset
    </div>
</div>