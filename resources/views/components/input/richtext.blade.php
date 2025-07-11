@props([
    'name' => null,
    'value' => null
])

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
@endpush

<div
    {{ $attributes }}
    x-data="{
        value: '{{ $value }}',
        quill: null,
        init() {
            this.quill = new Quill(this.$refs.editor, {
                theme: 'snow',
            });

            this.quill.root.innerHTML = this.value;

            this.quill.on('text-change', () => {
                this.value = this.quill.root.innerHTML;
            });
        }
    }"
>
    <input type="text" name="{{ $name }}" x-model="value" class="hidden" />
    <div x-ref="editor"></div>
</div>
