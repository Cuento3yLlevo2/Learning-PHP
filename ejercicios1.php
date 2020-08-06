<?php 


// Ejercicio 1:
$arreglo = [

	'keyStr1' => 'lado',
	0 => 'ledo',

	'keyStr2' => 'lido',
	1 => 'lodo',
	2 => 'ludo'

];
// codigo ejercicio 1
echo '<p> Ejercicio 1: </p>';
for($i = 0; $i < 3; $i++) { 
  if ($i == 0) {
    echo ucfirst($arreglo['keyStr1']) . ', ';
    echo $arreglo[$i] . ', ';
    echo $arreglo['keyStr2'] . ', ';
  } else {
    echo $arreglo[$i] . ', ';
  }
}
echo '</br> decirlo al revés lo dudo </br>';
for($e = 2; $e >= 0; $e--) { 
  if ($e == 0) {
    echo $arreglo['keyStr2'] . ', ';
    echo $arreglo[$e] . ', ';
    echo $arreglo['keyStr1'] . ', ';
  } elseif ($e == 2){
    echo ucfirst($arreglo[$e]) . ', ';
  } else {
    echo $arreglo[$e] . ', ';
  }
}
echo '</br> ¡Qué trabajo me ha costado! </br>';

// Ejercicio 2:
$paises = [
  'Venezuela' => ['Caracas', 'San Cristóbal', 'Puerto la Cruz'], 
  'España' => ['Barcelona', 'Mallorca', 'Madrid'],
  'Mexico' => ['Cancun', 'Mexico City','Oaxaca'],
  'Estados Unidos' => ['Austin', 'Virginia', 'NY'],
  'Italia' => ['Roma', 'Venecia', 'Florencia']
];

// recorrer areglo 2 
echo '</br> <p> Ejercicio 2: </p>';
foreach($paises as $pais => $value) {
  echo "<b>$pais:</b> ";
  foreach($paises[$pais] as $city) {
    echo $city . ', ';
  }
  echo '</br>';
}

/* Ejecicio 3: 
Escribe el código necesario para encontrar los 3 números más grandes 
y los 3 números más bajos de la siguiente lista:
*/ 
$valores = [23, 54, 32, 67, 34, 78, 98, 56, 21, 34, 57, 92, 12, 5, 61];
sort($valores);
$valoresGrandes = [];
$valoresBajos = [];
$sizeList = count($valores); // tamaño lista
echo '</br> <p> Ejercicio 3: </p>';
echo 'Lista Ordenada: ';
foreach($valores as $key => $val) {
  echo $val . ', ';
  if($key > $sizeList - 4) {
    array_push($valoresGrandes, $val); 
  } elseif ($key < 3) {
    array_push($valoresBajos, $val); 
  }
}
echo '</br>3 números más grandes: ';
foreach($valoresGrandes as $key => $val) {
  echo $val . ', ';
}
echo '</br>3 números más bajos: ';
foreach($valoresBajos as $key => $val) {
  echo $val . ', ';
}

?>