<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>

    <div class="container">
        <h1>Dados da API:</h1>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Options</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($paginator as $user)
                    <tr>
                        <!--p>ID: {{ $user['id'] }}</p-->
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['age'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>
                            <button class="btn btn-primary mr-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $user['id'] ?>">Show</button>
                        </td>
                    </tr>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop<?= $user['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">User Options</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    <form>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $user['name'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="age" class="form-label">Age</label>
                                            <input type="number" class="form-control" id="age" name="age" aria-describedby="ageHelp" value="<?= $user['age'] ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" value="<?= $user['email'] ?>">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Delete User</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>


        <div class="mb-4">
            {{ $paginator->links() }}
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
