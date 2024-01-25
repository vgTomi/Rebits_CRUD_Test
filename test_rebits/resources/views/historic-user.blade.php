<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="p-5 table-responsive">
  <a href="/" class="btn btn-danger">Volver Inicio</a>
    <table class="table table-hover table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">NOMBRE</th>
          <th scope="col">APELLIDOS</th>
          <th scope="col">MARCA</th>
          <th scope="col">MODELO</th>
          <th scope="col">FECHA INSERCION</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        @foreach ($data as $item)
        <tr>
          <th>{{$item->nombre}}</th>
          <td>{{$item->apellidos}}</td>
          <td>{{$item->marca}}</td>
          <td>{{$item->modelo}}</td>
          <td>{{$item->fecha_cambio}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>