<div align="center">
  <h1>Introducción a PHP</h1>
  <p>Apuntes Basados en el <a href="https://platzi.com/clases/php/">Curso de introducción a PHP</a> de Platzi</p>
</div>

## ¿Qué es PHP?

- Es un lenguaje de propósito general, de alto nivel. 

- Fue pensado desde el inicio para hacer aplicaciones web. 

- Se considera un lenguaje interpretado. (no compilado).

- Es un lenguaje multiplataforma (Windows, Linux, MacOS).

- Lenguaje Open source (Tiene repositorio público) https://github.com/php

## ¿Qué no es PHP?

- No está pensado para diseñar aplicaciones de escritorio o aplicaciones móviles. 

- No es un lenguaje compilado como Java. 

## Variables en PHP
 
Para declarar una variable usaremos el símbolo de $ y en seguida el nombre, este puede ser un _ o una letra.
 
PHP **no es estáticamente tipado**, es decir que no tenemos que decirle qué tipo de dato es esa variable (como Python). Además, **es débilmente tipado** porque podemos fácilmente cambiar el tipo de dato, es decir PHP ejecuta una conversión de datos interna.

Al momento de trabajar con PHP una cosa muy importante es hacer debugging a nuestras variables, para ello utilizamos la función `var_dump();` pasándole por parámetro la variable a revisar.

En PHP tenemos dos tipos de cadenas, las que son con ***comillas simples y las de comillas dobles***. La diferencia entre estas dos cadenas es que la de comillas simples recibe de forma literal lo que le escribas mientras que la de comillas dobles intenta interpretar cualquier variable dentro de ella.

    <?php 
    $relleno = 'queso';
    $comida = "Arepa con $relleno";
    ?>
    
     // Output: Arepa con queso

### Tipos de datos simples en PHP
 
Boolean:


    <?php
    $a = true; 
    $b = false; 
    ?>
 
Integer:

    <?php
    $a = -123;
    $b = 0;
    $c = 7763;
    ?>
 
Float:

    <?php
    $a = 12.24; 
    $b = 1.5e3; 
    $c = 7E-10;
    ?> 
 
String:

    <?php
    $a = "Hola"; 
    $b = 'Mundo'; 
    ?>
 
 
### Tipos de dato compuesto: 
 
Array:

Representa una colección de valores, aunque por defecto PHP usará índices numéricos, la realidad es que la estructura se representa como un mapa que colecciona pares llave-valor. 

La sintaxis para definir un arreglo será a partir de corchetes cuadrados, aunque en versiones anteriores de PHP era necesario usar la función array().

Las llaves pueden ser enteros o cadenas y los valores pueden ser de cualquier tipo de PHP, incluso de tipo array.

    <?php
    $array = array(
        "curso1" => "php",
        "curso2" => "js",
    );
    
    // a partir de PHP 5.4
    $array = [
        "curso1" => "php",
        "curso2" => "js",
    ];
    
    // índices numéricos
    $array = [
        "php",
        "js",
    ];
    ?>

Object:

Representa una instancia de una clase.

    <?php
    class Car
    {
        function move()
        {
            echo "Going forward..."; 
        }
    }
    
    $myCar = new Car();
    $myCar->move();
    ?>

Callable: 

Es un tipo de dato especial que representa a algo que puede ser "llamado", por ejemplo una función o un método.

    <?php
    // Variable que guarda un callable
    $firstOfArray = function(array $array) {
        if (count($array) == 0) { return null; }
        return $array[0];
    };
    
    // Este es nuestro arreglo
    $values = [3, 2, 1];
    
    // Usamos nuestro callable y se imprime el valor 3
    echo $firstOfArray($values);
    ?>

iterable: 

A partir de PHP 7.1 iterable es un pseudo tipo de datos que puede ser recorrido.

    <?php
    
    function foo(iterable $iterable) {
        foreach ($iterable as $valor) {
            // ...
        } 
    }
    
    ?>

### Tipos de Dato Especiales:

resource:

Es un tipo de dato especial que representa un recurso externo, por ejemplo un archivo externo a tu aplicación.

    <?php
    $res = fopen("c:\\dir\\file.txt", "r");
    ?>

NULL: 

Es un valor especial que se usa para representar una variable sin valor.

	<?php
    $a = null; 
    ?>

