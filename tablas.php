<?php include "secciones/header.php"?>


                    <div class="card mb-4">
                        
                        <div class="card-body">
                            <table id="datatablesSimple">


                              


                                <!-- <script>
                                    function eliminar() {
                                        var respuesta = confirm("estas seguro de eliminar");
                                        return respuesta
                                    }
                                </script> -->

                                <div class="col-8 ">
                                    <table class="table">
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
                                                    <td>
                                                        <!-- <a href="../vista/modificarUsuario.php?id=<//?= $datos->id_usuario ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                                        <a onclick="return eliminar()" href="../vista/dashboardUsuario.php?id=<//?= $datos->id_usuario ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a> -->
                                                    </td>
                                                </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
          
                    <?php include "secciones/footer.php"?>