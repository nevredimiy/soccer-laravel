<div class="request__time" x-data="{
    expiresAt: new Date('{{ $expiresAt }}').getTime(),
    now: new Date().getTime(),
    timer: '',
    timeLeft: '',

    init() {
        this.update();
        this.timer = setInterval(() => this.update(), 1000);
    },

    update() {
        let diff = this.expiresAt - new Date().getTime();
        if (diff <= 0) {
            this.timeLeft = 'Час вичерпано';
            clearInterval(this.timer);
            return;
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((diff % (1000 * 60)) / 1000);

        this.timeLeft = `${days}д ${hours}г ${minutes}хв ${seconds}с`;
    }
}"
x-init="init()"
>
<button wire:click="$refresh" class="">Оновити</button>
    <div class="request__time text-sm text-gray-700 font-semibold">
        <span x-text="timeLeft"></span>
    </div>
</div>
