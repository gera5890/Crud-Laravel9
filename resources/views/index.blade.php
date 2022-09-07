<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud usuarios</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    -{{ $error }} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('users.store') }}" method="post">
                            @csrf

                                <div class="row align-items-start">
                                    <div class="col-sm-3">
                                        <input type="text" name="name"
                                            class="form-control" placeholder="Nombre:"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email:" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password:">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Crear" class="btn btn-primary">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>NOMBRE</td>
                            <td>EMAIL</td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Desea Eliminar?...')">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    No hay usuarios registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>



</body>

</html>
