<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center p-3"> CRUD Rebits: Vista Vehiculos  </h1>
    <h1 class="text-center p-2"> Para agregar vehiculos, debe existir un usuario/dueno  </h1>
    @if (session("correcto"))
    <div class="alert alert-success">{{session("correcto")}}</div>
    @endif
    @if (session("incorrecto"))
    <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif
    <!-- Modal Agregar Vehiculo-->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Vehiculo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.create")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textmarca">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Modelo</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textmodelo">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Anio</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textanio">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Dueno</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textdueno">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textprecio">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="sumbit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="p-5 table-responsive">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createModal">Agregar Vehiculo</button>
        <a href="{{ route("crud.usuario") }}" class="btn btn-warning">Vista Usuarios</a>
        <a href="{{ route("crud.historico") }}" class="btn btn-info">Vista Historico</a>
        <table class="table table-hover table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">MARCA</th>
                    <th scope="col">MODELO</th>
                    <th scope="col">ANIO</th>
                    <th scope="col">DUENO</th>
                    <th scope="col">PRECIO</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $item)
                <tr>
                    <th>{{$item->marca}}</th>
                    <td>{{$item->modelo}}</td>
                    <td>{{$item->anio}}</td>
                    <td>{{$item->nombre. ' ' .$item->apellidos}}</td>
                    <td>${{$item->precio}}</td>
                    <th>
                        <input data-bs-toggle="modal" data-bs-target="#editModal{{$item->id}}" class="btn btn-primary" type="button" value="Modificar">
                    </th>

                    <!-- Modal Modificar Vehiculo-->
                    <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar Vehiculo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route("crud.update")}}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">CODIGO VEHICULO</label>
                                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textoid" value="{{$item->id}}" readonly>

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">PRECIO</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textoprecio">

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">DUENO</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textodueno">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="sumbit" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>