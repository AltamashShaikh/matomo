let localTimeZoneName = Intl.DateTimeFormat().resolvedOptions().timeZone;

function clockLoaded() {
    document.getElementById('local-timezone').innerHTML =  '(' + localTimeZoneName + ')';
    document.getElementById('clock-widget-time-local').dataset.timezone = localTimeZoneName;

    setInterval(updateClocks, 60000);
    updateClocks();
}

const clocks = document.getElementsByClassName("clock");

function updateClocks() {
    for (let clock of clocks) {
        let timezone = clock.dataset.timezone;
        let time = new Date().toLocaleTimeString("en-US", {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute:'2-digit',
            timeZone: timezone
        });
        clock.textContent = time;
    }
}
