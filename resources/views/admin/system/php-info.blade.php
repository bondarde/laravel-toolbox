<x-filament-panels::page>

    <script>
        function onIframeLoad(iframe) {
            const contentHeight = iframe.contentWindow.document.body.scrollHeight;
            iframe.style.height = (contentHeight + 100) + 'px';
        }
    </script>

    <iframe
        class="mb-16 shadow-lg rounded"
        srcdoc="{{ $phpInfoContents }}"
        width="100%"
        onload="onIframeLoad(this)"
    ></iframe>

</x-filament-panels::page>
