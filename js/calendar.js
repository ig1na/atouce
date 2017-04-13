$(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        defaultView: 'listMonth',

        events: [
        {
            title  : 'Concours de moustache',
            start  : '2017-04-13'
        },
        {
            title  : 'Meeting tuning',
            start  : '2017-04-15',
            end    : '2017-04-17'
        },
        {
            title  : 'Degustation de bières',
            start  : '2017-04-20',
            allDay : false // will make the time show
        }
    ]
    })

});
