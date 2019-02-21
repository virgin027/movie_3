<?php
// function debug($array)
// {
//  echo '<pre>';
//  print_r($array);
//  echo '</pre>';
// }
function imageMovie($movie)
{
return '<img src="posters' .
$movie['id'].'.jpg" alt="'. $movie['title']. '">';
}
?>
