<!doctype html>
<html lang="es">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">

    <link href='https://unpkg.com/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://unpkg.com/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://unpkg.com/fullcalendar@5.10.1/locales/es.js'></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>

    <style>
        .form-control-color {
            height: 36px;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="col-md-8 offset-md-2 ">
            <div id="calendar">
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: "es",
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                dateClick: function (info) {
                    // Limpiar los campos del formulario
                    $("#txtFecha").val(info.dateStr);
                    $("#txtTitulo").val('');
                    $("#txtHora").val('10:00'); // Puedes ajustar el valor inicial de la hora según tus necesidades
                    $("#txtDescripcion").val('');
                    $("#txtColor").val('#FF0000'); // Puedes ajustar el color inicial según tus necesidades
                    $("#txtID").val(''); // Limpiar el ID

                    $("#modalEventos").modal("show");
                },

                events: 'http://localhost/empresa/nueva.php',

                eventClick: function (info) {
                    $("#tituloEvento").text(info.event.title);
                    $("#txtDescripcion").val(info.event.extendedProps.description || 'Sin descripción');
                    $("#txtID").val(info.event.id || '');
                    $("#txtTitulo").val(info.event.title || '');
                    $("#txtColor").val(info.event.color || '');

                    // Formatear la fecha y la hora correctamente
                    var fechaHora = info.event.start.toISOString().split("T");
                    var fecha = fechaHora[0];
                    var hora = fechaHora[1].substring(0, 5); // Obtener solo HH:MM

                    $("#txtFecha").val(fecha);
                    $("#txtHora").val(hora);

                    $("#modalEventos").modal("show");
                },
                editable: true,
                eventDrop: function (info) {
                    $("#txtID").val(info.event.id || '');
                    $("#txtTitulo").val(info.event.title || '');
                    $("#txtColor").val(info.event.color || '');
                    $("#txtDescripcion").val(info.event.extendedProps.description || 'Sin descripción');

                    var fechaHora = info.event.start.toISOString().split("T");
                    var fecha = fechaHora[0];
                    var hora = fechaHora[1].substring(0, 5); // Obtener solo HH:MM


                    $("#txtFecha").val(fecha);
                    $("#txtHora").val(hora);

                    recolectarDatosGUI();
                    enviarInformacion('editar', nuevoEvento, true)
                }

            });

            calendar.render();

            var nuevoEvento;

            $("#agregar").click(function () {
                recolectarDatosGUI();
                enviarInformacion('agregar', nuevoEvento)
            });

            $("#editar").click(function () {
                recolectarDatosGUI();
                enviarInformacion('editar', nuevoEvento)
            });

            $("#eliminar").click(function () {
                recolectarDatosGUI();
                enviarInformacion('eliminar', nuevoEvento)
            });

            function recolectarDatosGUI() {
                nuevoEvento = {
                    id: $("#txtID").val(),
                    title: $("#txtTitulo").val(),
                    start: $("#txtFecha").val() + " " + $("#txtHora").val(),
                    color: $("#txtColor").val(),
                    description: $("#txtDescripcion").val(),
                    texColor: "#FFFFFF",
                    end: $("#txtFecha").val() + " " + $("#txtHora").val()
                }
            };

            function enviarInformacion(accion, objEvento, modal) {
                $.ajax({
                    type: 'POST',
                    url: 'nueva.php?accion=' + accion, // 'nueva.php' es el archivo que procesa la información 
                    data: objEvento,
                    success: function (msg) {
                        if (msg.success) {
                            calendar.refetchEvents();
                            if (!modal) {
                                $("#modalEventos").modal('toggle');
                            }
                        } else {
                            alert("Error al enviar la información...");
                        }
                    },
                    error: function (xhr, status, error) {
                        alert("Error al enviar la información...", error);
                    }
                })
            };

        });


    </script>

    <!-- Modal (agregar, editar, borrar)-->
    <div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="tituloEventoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEventoLabel">Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
    
                <div class="modal-body">
                    <input type="hidden" id="txtID" name="txtID" readonly>
                    <input type="hidden" id="txtFecha" name="txtFecha" readonly>
    
                    <div class="form-group">
                        <label for="txtTitulo">Título:</label>
                        <input type="text" id="txtTitulo" name="txtTitulo" class="form-control" placeholder="Título del evento">
                    </div>
    
                    <div class="form-group">
                        <label for="txtHora">Hora del evento:</label>
                        <input type="time" id="txtHora" name="txtHora" class="form-control" value="10:50">
                    </div>
    
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción:</label>
                        <textarea id="txtDescripcion" name="txtDescripcion" rows="3" class="form-control"></textarea>
                    </div>
    
                    <div class="form-group">
                        <label for="txtColor">Color:</label>
                        <input type="color" id="txtColor" name="txtColor" class="form-control form-control-color" value="#FF0000">
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                    <button type="button" id="editar" class="btn btn-primary">Modificar</button>
                    <button type="button" id="eliminar" class="btn btn-danger">Borrar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/locales/es.js'></script>

   
</body>

</html>