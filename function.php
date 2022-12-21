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
?>