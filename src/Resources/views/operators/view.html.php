<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Easy4Pay Test</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha256-LA89z+k9fjgMKQ/kq4OO2Mrf8VltYml/VES+Rg0fh20=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
    <main class="body-wrapper">
        <section class="container">
            <div class="jumbotron"><h1 class="text-center"><i class="fa fa-users"></i> Cadastro de Operadores</h1></div>
            <div class="table-responsive clearfix">
                <button class="float-right btn btn-primary" data-toggle="modal" data-target="#register-operator">Adicionar operador</button><br><br>
                <table class="table table-striped" id="operators-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </section>
    </main>

    <?php require 'form.html.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha256-5+02zu5UULQkO7w1GIr6vftCgMfFdZcAHeDtFnKZsBs=" crossorigin="anonymous"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>