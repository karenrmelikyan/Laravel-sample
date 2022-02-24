<div>
    {{ $currentTime }}
</div>

<script>

        setInterval(function() {
            Livewire.emit('clockEvent');
        }, 1000);

</script>
