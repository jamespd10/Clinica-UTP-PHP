//CONTADOR PARA NOTIFICACIONES PUSH

// This is an example with default parameters

simplyCountdown('#hola', {
    year: 2020, // required
    month: 3, // required
    day: 17, // required
    hours: 20, // Default is 0 [0-23] integer
    minutes: 52, // Default is 0 [0-59] integer
    seconds: 0, // Default is 0 [0-59] integer
    words: { //words displayed into the countdown
        days: 'day',
        hours: 'hour',
        minutes: 'minute',
        seconds: 'second',
        pluralLetter: 's'
    },
    plural: true, //use plurals
    inline: false, //set to true to get an inline basic countdown like : 24 days, 4 hours, 2 minutes, 5 seconds
    inlineClass: 'simply-countdown-inline', //inline css span class in case of inline = true
    // in case of inline set to false
    enableUtc: false, //Use UTC as default
    onEnd: function() {
        //var resultado = "<?php llamarNotifiacion() ?>";
            //resultado;
       //$.post("<?php include 'php/db/android/enviarNotificacion.php' ?>");
       url="php/db/android/enviarNotificacion.php"
       fetch(url)
       return; 
    }, //Callback on countdown end, put your own function here
    refresh: 1000, // default refresh every 1s
    sectionClass: 'simply-section', //section css class
    amountClass: 'simply-amount', // amount css class
    wordClass: 'simply-word', // word css class
    zeroPad: false,
    countUp: true
 });