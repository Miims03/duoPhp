<?php 
function age(DateTime $date): int{
    $today = new DateTime();
    $difference = $date->diff($today);
    return $difference->y; 
}
