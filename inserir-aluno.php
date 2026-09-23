<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:'.$databasePath);

$student = new Student(null, 'Giusephe Oliveira', new DateTimeImmutable('1998-01-18'));

$sqlInsert = "INSERT INTO students (name,birthDate) VALUES ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}');";

//echo $sqlInsert;

var_dump($pdo->exec($sqlInsert));