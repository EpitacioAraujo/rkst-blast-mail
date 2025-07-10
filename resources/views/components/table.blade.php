<div {{ $attributes->class(['overflow-x-auto rounded-box border border-base-content/5 bg-base-100']) }}>
    <table class="table">
        <!-- head -->
        @if($head)
            <thead>
                <tr>
                    {{ $head }}
                </tr>
            </thead>
        @endif

        <tbody>
            {{ $body }}
        </tbody>
    </table>
</div>
