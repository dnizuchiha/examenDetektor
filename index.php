<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prueba Técnica</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <center>
            <h1>Listado De Empleados</h1>
            <button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#crearEmpleado' >Agregar <i>
        </center>
        
        <table id="tablapublicaciones" class="display table" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Des_motivo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Des_motivo</th>
                    <th>Opciones</th>
                </tr>
            </tfoot>
        </table> 
    </div>

    <!-- Modal crear-->
    <div class="modal fade" id="crearEmpleado" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Crear empleado</h4>
                </div>
                <div class="modal-body">
                    <form class="form" id="formulario" method="POST" action="php/crear.php">
                        <div class="row">           
                            <div class="col-md-12 col-xs12">
                                <label for="cNombre" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="cNombre" placeholder="Nombre" name="cNombre">
                            </div>

                            <div class="col-md-6 col-xs12">
                                <label for="cApellido" class="control-label">Apellido</label>
                                <input type="text" class="form-control" id="cApellido" placeholder="Apellido" name="cApellido">
                            </div>
                
                            <div class="col-md-6 col-xs12">
                                <label for="cTelefono" class="control-label">Telefono</label>
                                <input type="text" class="form-control" id="cTelefono" placeholder="Telefono" name="cTelefono">
                            </div>

                            <div class="col-md-6 col-xs12">
                                <label for="cDes_Motivo" class="control-label">Des_Motivo</label>
                                <input type="text" class="form-control" id="cDes_Motivo" placeholder="Des_Motivo" name="cDes_Motivo">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" data-toggle='modal'>Crear</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>      
        </div>
    </div>

    <!-- Modal modificar-->
    <div class="modal fade" id="modificarEmpleado" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form" id="formulario" method="POST" action="php/actualizar.php">
                        <div class="row">
                            <input type="hidden" name="verId" id="verId">  

                            <div class="col-md-12 col-xs12">
                                <label for="VerNombre" class="control-label">Nombre</label>
                                <input type="text" class="form-control" id="VerNombre" placeholder="Nombre" name="VerNombre">
                            </div>
                                                    
                            <div class="col-md-6 col-xs12">
                                <label for="VerApellido" class="control-label">Apellido</label>
                                <input type="text" class="form-control" id="VerApellido" placeholder="Apellido" name="VerApellido">
                            </div>
                                                    
                            <div class="col-md-6 col-xs12">
                                <label for="VerTelefono" class="control-label">Telefono</label>
                                <input type="text" class="form-control" id="VerTelefono" placeholder="Telefono" name="VerTelefono">
                            </div>

                            <div class="col-md-6 col-xs12">
                                <label for="VerDes_Motivo" class="control-label">Des_Motivo</label>
                                <input type="text" class="form-control" id="VerDes_Motivo" placeholder="Des_Motivo" name="VerDes_Motivo">
                            </div>
                        </div>   
                        <button type="submit" class="btn btn-primary" data-toggle='modal' >Modificar</button>
                    </form>
                    <form method="POST" action="php/eliminar.php">
                        <input type="hidden" name="idEliminar" id="idEliminar">
                        <button type="submit" class="btn btn-danger" data-toggle='modal' >Eliminar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
                
        </div>
    </div>

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.15/datatables.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 

    <script>
        $(document).ready(function() {
        listar();
        } );

        var listar = function(){
        var tablapublicaciones = $("#tablapublicaciones").DataTable({
            "destroy": "true",
            "ajax": "php/cargarEmpleados.php",
            "columns": [
                { "data": "id" },
                { "data": "nombre" },
                { "data": "apellido" },
                { "data": "telefono" },
                { "data": "des_motivo" },
                { "defaultContent": "<button type='button' class='editar btn btn-success' data-toggle='modal' data-target='#modificarEmpleado' >Ver <i class='fa fa-pencil-square-o'></i></button>" }
            ]
        });
        obtener_data_editar("#tablapublicaciones tbody", tablapublicaciones);
        }

        var obtener_data_editar = function(tbody, tablapublicaciones){
        $(tbody).on("click", "button.editar", function(){
            var data = tablapublicaciones.row( $(this).parents("tr")).data();
            console.log(data);
            var id = $('#verId').val( data.id ),
                id = $('#idEliminar').val( data.id ),
                nombre = $('#VerNombre').val( data.nombre ),
                apellido = $('#VerApellido').val( data.apellido ),
                apellido = $('#VerDes_Motivo').val( data.des_motivo ),
                telefono = $('#VerTelefono').val( data.telefono );
        });
        }
    </script>
</body>
</html>