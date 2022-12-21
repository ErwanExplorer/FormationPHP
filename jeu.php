<?php
$parfums = [
    'Fraise' => 4,
    'Vanille' => 3,
    'Chocolat' => 5
];

$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];

$supplements = [
    'Pépites de chocolat' => 1,
    'Chantilly' => 0.5
];
$ingredients = [];
$total = 0;
if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
      if (isset($parfums[$parfum])) {
        $ingredients[] = $parfum;
        $total += $parfums[$parfum];
      }
    } 
}

// Vérifie si le paramètre "supplement" existe dans l'URL
if (isset($_GET['supplement'])) {
    // Si oui, itère sur chaque élément du tableau de suppléments sélectionnés
    foreach ($_GET['supplement'] as $supplement) {
      // Vérifie si le supplément sélectionné existe dans le tableau de suppléments disponibles
      if (isset($supplements[$supplement])) {
        // Si oui, ajoute le supplément aux ingrédients et ajoute son prix au total
        $ingredients[] = $supplement;
        $total += $supplements[$supplement];
      }
    } 
}

// Vérifie si le paramètre "cornet" existe dans l'URL
if (isset($_GET['cornet'])) {
    // Si oui, récupère la valeur du cornet sélectionné
    $cornet = $_GET['cornet'];
    // Vérifie si le cornet sélectionné existe dans le tableau de cornets disponibles
    if (isset($cornets[$cornet])) {
        // Si oui, ajoute le cornet aux ingrédients et ajoute son prix au total
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}

require "header.php";
?>

<div class="row">
    <div class="col-md-4">
        <pre>


        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre Glace</h5>
                <ul>
                    <li>
                        <?php foreach ($ingredients as $ingredient): ?>
                           <li><?= $ingredient?></li>
                        <?php endforeach; ?>
                         <p>
                            <strong>Prix: </strong> <?= $total ?> €
                         </p>
                    </li>
                </ul>

            </div>
        </div>
     

        </pre>
    </div>
    <div class="col-md-8">
    <Form action="/jeu.php" method="GET">
    <h1>Choisissez votre glace</h1>

    <h2>Choisissez votre parfums</h2>
    <?php foreach($parfums as $parfum => $prix): ?>
        <div class="checkbox">
        <label>
            <?=checkbox('parfum', $parfum, $_GET)?>
            <?= $parfum ?> - <?= $prix ?> €
        </label>
        </div>
    <?php endforeach; ?>

    <h2>Choisissez votre cornets</h2>
    <?php foreach($cornets as $cornets => $prix): ?>
        <div class="checkbox">
        <label>
            <?=radio('cornets', $cornets, $_GET)?>
            <?= $cornets ?> - <?= $prix ?> €
        </label>
        </div>
    <?php endforeach; ?>

    <h2>Choisissez votre supplements</h2>
    <?php foreach($supplements as $supplements => $prix): ?>
        <div class="checkbox">
        <label>
            <?=checkbox('supplements', $supplements, $_GET)?>
            <?= $supplements ?> - <?= $prix ?> €
        </label>
        </div>
    <?php endforeach; ?>
    <button class='btn btn-primary' type='submit'>Composer ma glace</button>
</Form>
    </div>

</div>


<div class="form-group">
    <Form action="/jeu.php" method="POST">


        <input type='text' name='demo' value='test'>
    </form>

</div>


<?php require "footer.php"; ?>