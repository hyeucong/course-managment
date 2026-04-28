<div id="livewire-request-loader" class="pointer-events-none fixed inset-x-0 top-0 z-9999 hidden h-1">
    <div class="h-full origin-left scale-x-0 bg-stone-900"></div>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        const loader = document.getElementById('livewire-request-loader');

        if (!loader) {
            return;
        }

        const bar = loader.firstElementChild;
        let activeRequests = 0;
        let progress = 0;
        let trickleTimer = null;
        let hideTimer = null;

        const setProgress = (value, duration = 200) => {
            progress = value;
            bar.style.transition = `transform ${duration}ms ease-out`;
            bar.style.transform = `scaleX(${value})`;
        };

        const start = () => {
            activeRequests += 1;

            if (activeRequests > 1) {
                return;
            }

            clearTimeout(hideTimer);
            clearInterval(trickleTimer);

            loader.classList.remove('hidden');
            bar.style.transition = 'none';
            bar.style.transform = 'scaleX(0)';

            requestAnimationFrame(() => {
                setProgress(0.35, 250);
            });

            trickleTimer = window.setInterval(() => {
                if (progress >= 0.9) {
                    return;
                }

                setProgress(Math.min(progress + 0.12, 0.9), 180);
            }, 180);
        };

        const finish = () => {
            if (activeRequests === 0) {
                return;
            }

            activeRequests = Math.max(0, activeRequests - 1);

            if (activeRequests > 0) {
                return;
            }

            clearInterval(trickleTimer);
            setProgress(1, 180);

            hideTimer = window.setTimeout(() => {
                loader.classList.add('hidden');
                bar.style.transition = 'none';
                bar.style.transform = 'scaleX(0)';
                progress = 0;
            }, 220);
        };

        document.addEventListener('livewire:navigate', start);
        document.addEventListener('livewire:navigated', finish);

        Livewire.hook('request', ({ succeed, fail }) => {
            start();
            succeed(finish);
            fail(finish);
        });
    });
</script>
