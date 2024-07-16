<?php
include("./conexion.php");
include "secciones/header.php";
header('Content-Type:application/json');

$sentencia = $conexion->prepare("SELECT * FROM eventos");
$sentencia ->execute();
$resultado = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>






<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    



</head>

<body>

    <div class="container">

        <div class="col-md-8 offset-md-2 ">
            <div id="calendar">

            </div>


        </div>

    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                dateClick: function(info) {
                     alert('Clicked on: ' + info.dateStr);
                    
                },

                eventClick: function(info) {
                    $("#tituloEvento").text(info.event.title);
                    $("#descriptionEvento").text(info.event.extendedProps.description || 'Sin descripción');
                    $("#exampleModal").modal("show");
                },

                events: [{
                        title: 'Hola Phia',
                        description: 'Sere un buen programnador',
                        start: '2024-07-01'
                    },
                    {
                        title: 'Hola Lili',
                        start: '2024-07-05',
                        end: '2010-01-07'
                    },
                    {
                        title: 'Hola Daniel',
                        description: 'Sere un buen programnador y conseguire un buen empleo',
                        start: '2024-07-09T12:30:00',
                        allDay: false // will make the time show
                    }
                ],             

            });

            calendar.render()

        });
    </script>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloEvento"></h1>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="descriptionEvento"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success">Agregar</button>
                    <button type="button" class="btn btn-success">Modificar</button>
                    <button type="button" class="btn btn-danger">Borrar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>

<?php include "secciones/footer.php"?>