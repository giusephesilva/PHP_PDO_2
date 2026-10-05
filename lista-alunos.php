<?php

use Alura\Pdo\Domain\Model\Student;
require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:'.$databasePath);

$statement = $pdo->query('SELECT * FROM students');
//var_dump($statement->fetchAll(PDO::FETCH_ASSOC));
//var_dump($statement->fetchAll(PDO::FETCH_CLASS,Student::class));
//$studentDataList = $statement->fetch(PDO::FETCH_ASSOC);
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

//var_dump($statement->fetchColumn(1)); exit();
/*while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student(
        $studentData["id"],
        $studentData["name"],
        new \DateTimeImmutable($studentData["birthDate"])
        );

    echo $student->age() . PHP_EOL;
} 
exit();*/


//var_dump($studentDataList); exit();

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData["id"],
        $studentData["name"],
        new \DateTimeImmutable($studentData["birthDate"])
        );
}

var_dump($studentList);