    var calendar;
    var hoy = ""
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        hoy = ""
    }
    else{
        hoy = " today"
    }
   
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.ped_id, title: row.user_nombre, start: row.pe_fecha_entrega, end: row.pe_estado });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            locale: 'es', //Idioma Español FullCalendar
            headerToolbar: {
                left: 'prev,next'+hoy,
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Eventos predeterminados aleatorios
            events: events,
            eventClick: function(info) {
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!scheds[id]) {
                    _details.find('#title').text(scheds[id].user_nombre)
                    _details.find('#description').text(scheds[id].detalle)
                    _details.find('#start').text(scheds[id].pe_fecha_entrega)
                    _details.find('#end').text(scheds[id].pe_estado)
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Event is undefined");
                }
            },
            eventDidMount: function(info) {
                // Hacer algo después de los eventos montados
            },
            editable: true
        });

        calendar.render();

        // Después de renderizar el calendario, busca los botones y agrega clases específicas
        $(document).ready(function() {
            // Encuentra los botones "prev", "next" y "today" y agrega las clases que desees
            $('.fc-dayGridMonth-button').addClass('mes');
            $('.fc-dayGridWeek-button ').addClass('semana');
            $('.fc-list-button').addClass('agenda');
            $('.fc-dayGridMonth-button').attr('id', 'mes');
            $('.fc-dayGridWeek-button').attr('id', 'semana');
            $('.fc-list-button').attr('id', 'agenda');

        });

        // Botón Editar
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _form = $('#schedule-form')
                
                
                location.href = "Html/ped_especifico.php?ped_id="+scheds[id].ped_id;
                
                
            } else {
                alert("Event is undefined");
            }
        })

        // Botón Eliminar / Eliminación de un evento
       
    })

