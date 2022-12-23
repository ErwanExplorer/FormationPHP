<footer class="footer mt-auto py-3 bg-light">
  <hr>
  <div class="container">
    <span class="text-muted">Copyright 2022 FormationPHP.</span>
  </div>

  <div class="row">

<div class="col-md-4"></div>
<div class="col-md-4">
<form action="/newletter.php" method="post" class="form-inline">
    <div class="form-group">
        <input type="email" name="email" placeholder="Entrer votre email" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>
</div>
<div class="col-md-4">
    <h5>Navigation</h5>

    <ul class='list-untyled text-small'>
    <?php 
    require "nav.php"; ?>
    </ul>

</div>
</div>
  
</footer>
    

    </div>


    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      
  </body>