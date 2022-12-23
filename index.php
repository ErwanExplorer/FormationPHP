<?php
session_start();
$_SESSION['user'] = [
    'name' => 'John',
    'passworld' => '0000'
];
$title = "Page d'accueil";
?>

<?php require 'elements/header.php'; ?>

<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">FormationPHP</h1>
    <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
    <p>Back to <a href="/docs/5.2/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
  </div>
</main>

<?php require 'elements/footer.php'; ?>

</html>
