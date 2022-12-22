<?php

function nav_item (string $lien, string $titre, string $class = ' '): string 
{
    $classe = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = $classe . ' active';
    }
   return <<<HTML
    <li class="'.$class.'">
        <a class="$classe"aria-current="page" href="$lien">$titre</a> 
    </li>
HTML;


}

function checkbox(string $name, string $value, array $data) {
    
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }
   


    return <<<HTML
    <input type='checkbox' name="{$name}[]" value='$value' $attributes>
HTML;
}

function radio(string $name, string $value, array $data) {
    
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }
   
    return <<<HTML
    <input type='radio' name="{$name}" value='$value' $attributes>
HTML;
}

function creneaux_html (array $creneaux) {
    if (empty($creneaux)) {
        return 'Fermé';
    }
    $phrase = [];
    foreach ($creneaux as $creneaux) {
        $phrase[] = "de <strong>{$creneaux[0]}h</strong> à <strong>{$creneaux[1]}h</strong>";
    }
    return 'Ouvert ' .  implode(' et ', $phrase);
}

function in_creneaux (int $heure, array $creneaux): bool
{

    foreach ($creneaux as $creneau) {
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;

}

function select (string $name, $value, array $options): string {
    $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k == $value ? ' selected' : "";
        $html_options[] = "<option value='$k' $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'" . implode($html_options) . '</select>';
}

?>