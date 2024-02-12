<?php 
function age(DateTime $date): int{
    $today = new DateTime();
    $difference = $date->diff($today);
    //y signifie year donc il donnera la difference en année
    return $difference->y; 
}
