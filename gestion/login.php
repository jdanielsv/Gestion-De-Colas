<html>
<head>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/propio.css" rel="stylesheet">
    <script src="js/index.js"></script>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
     <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="email" class="form-control" placeholder="Dirección email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" onclick="login()" type="button">Entrar</button>
      </form>
    </div> 
</body>
</html>