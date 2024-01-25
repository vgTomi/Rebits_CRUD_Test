<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<h1 class="text-center p-3"> CRUD Rebits: Vista Usuarios </h1>
  @if (session("correcto"))
  <div class="alert alert-success">{{session("correcto")}}</div>
  @endif
  @if (session("incorrecto"))
  <div class="alert alert-danger">{{session("incorrecto")}}</div>
  @endif

   <!-- Modal Agregar Usuario-->
   <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("crud.usercreate")}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textonombre">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textoapellidos">

                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textocorreo">

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
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createUser">Crear Usuario</button>
  <a href="/" class="btn btn-danger">Volver Inicio</a>
    <table class="table table-hover table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDOS</th>
          <th scope="col">CORREO</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($data as $item)
        <tr>
          <th>{{$item->nombre}}</th>
          <td>{{$item->apellidos}}</td>
          <td>{{$item->correo}}</td>
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
                  <form action="{{route("crud.usermodify")}}" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">CODIGO USUARIO</label>
                      <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textoid" value="{{$item->id}}" readonly>

                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">NOMBRE</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textonombre">

                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">APELLIDO</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textoapellidos">

                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">CORREO</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="textocorreo">

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