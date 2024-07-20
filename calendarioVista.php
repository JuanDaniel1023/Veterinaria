<?php include "secciones/header.php" ?>


<div class="card mb-4">






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

                eventClick: function(info) {
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
                eventDrop: function(info) {
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

            $("#agregar").click(function() {
                recolectarDatosGUI();
                enviarInformacion('agregar', nuevoEvento)
            });

            $("#editar").click(function() {
                recolectarDatosGUI();
                enviarInformacion('editar', nuevoEvento)
            });

            $("#eliminar").click(function() {
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
                    success: function(msg) {
                        if (msg.success) {
                            calendar.refetchEvents();
                            if (!modal) {
                                $("#modalEventos").modal('toggle');
                            }
                        } else {
                            alert("Error al enviar la información...");
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error al enviar la información...", error);
                    }
                })
            };

        });
    </script>

    <!-- Modal (agregar, editar, borrar)-->
    <!-- Modal (agregar, editar, borrar) -->
    <div class="modal fade" id="modalEventos" tabindex="-1" aria-labelledby="tituloEventoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tituloEventoLabel">Evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>








    <!-- <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            DataTable Example
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">


                              


                                <script>
                                    function eliminar() {
                                        var respuesta = confirm("estas seguro de eliminar");
                                        return respuesta
                                    }
                                </script>

                                <div class="col-8 ">
                                    <table class="table">
                                        <p>vamos a romperla hpta</p>

                                        <thead>
                                            <tr>
                                                <th >id</th>
                                                <th >Nombre completo</th>
                                                <th >Correo</th>
                                                <th >Usuario</th>
                                                <th >password</th>
                                                <th ></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td><//?= $datos->id_usuario ?></td>
                                                    <td><//?= $datos->nombre_completo ?></td>
                                                    <td><//?= $datos->correo ?></td>
                                                    <td><//?= $datos->usuario ?></td>
                                                    <td><//?= $datos->password ?></td>
                                                    <td> -->
    <!-- <a href="../vista/modificarUsuario.php?id=<//?= $datos->id_usuario ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="return eliminar()" href="../vista/dashboardUsuario.php?id=<//?= $datos->id_usuario ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a> -->
    </td>
    </tr>


    </tbody>
    </table>
</div>
</div>
</div>

<?php include "secciones/footer.php" ?>