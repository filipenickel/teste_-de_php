<header>
  <script src="../utils/maskcpf.js"></script>
  <!-- CDN JQUERY para mask -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" crossorigin="anonymous">
  </script>
  <script src="../utils/maskcpf.js"></script>
  <link rel="stylesheet" href="../styles/global.css">
</header>

<div class="container-form">
  <h1>Cadastro de novos Clientes</h1>
  <form class="form" action="../actions/insert_cliente.php" method="POST">

    <input type="text" placeholder="Nome/Razão Social" name="nome"><br>

    <input class="cpfcnpj" placeholder="CPF/CNPJ" type="text" name="cpf_cnpj"><br>

    <input type="phone" placeholder="Telefone" name="telefone"><br>

    <input type="phone" placeholder="Endereço" name="endereco"><br>

    <input type="email" name="email" placeholder="Email"><br>

    <button type="submit" value="Salvar">Salvar</button>
  </form>
</div>