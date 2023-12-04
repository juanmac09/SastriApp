document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        var mes = document.getElementById('mes');
        var semana = document.getElementById('semana');
        var agenda = document.getElementById('agenda');
        
        if (mes) {
            mes.addEventListener('click', function() {
                mes.classList.add("mes")
                semana.classList.add("semana")
                agenda.classList.add('agenda')
            });
        }
        
        if (semana) {
            semana.addEventListener('click', function() {
                mes.classList.add("mes")
                semana.classList.add("semana")
                agenda.classList.add('agenda')
            });
        }
        
        if (agenda) {
            agenda.addEventListener('click', function() {
                mes.classList.add("mes")
                semana.classList.add("semana")
                agenda.classList.add('agenda')
            });
        }
    }, 500);
});