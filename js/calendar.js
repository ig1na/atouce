$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        defaultView: 'listMonth',

        events: [
        {
            title  : 'Concours Photo',
            start  : '2017-05-13'
        },
        {
            title  : 'Sortie d\'équipe',
            start  : '2017-05-15',
            end    : '2017-05-17'
        },
        {
            title  : 'Degustation de bières',
            start  : '2017-05-20',
        }
    ]
    })

});
