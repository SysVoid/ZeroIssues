<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ config('broadcasting.connections.pusher.key') }}', {
        cluster: 'eu',
        encrypted: true
    });

    var channel = pusher.subscribe('test_channel');
        channel.bind('my_event', function(data) {
        alert(data.message);
    });
</script>