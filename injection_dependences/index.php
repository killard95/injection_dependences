<?php

class Address {

    private $number ;
    private $street ;
    private $zipcode ;
    private $city ;
    private $country ;


    public function __construct($number, $street, $zipcode, $city, $country) {

        $this->number = $number ;
        $this->street = $street ;
        $this->zipcode = $zipcode ;
        $this->city = $city ;
        $this->country = $country ;
    }
}

class Car {

    private $marque ;
    private $model ;

        public function __construct($ma, $mo) {

            $this->marque = $ma ;
            $this->model = $mo ;
    }
}

class Person {

    private $address ;
    // On rajoute le nom de la classe pour préciser qu'il s'agit d'un nouvel objet de cette clase (injection de dépendances => TYPE HINTING)
    // Exemple ci dessous (Address $address) afin que si l'on modifie la classe du dessus (Address) ces changements sont repercutés dans la class Person
    // Exemple si on rajoute un attribut.

    public function __construct(Address $address, Car $car){

        $this->address = $address ;
        $this->car = $car ;
    }    
}



// Design pattern factory pour creer de nouvelles personnes
class PersonFactory
{
    public function createPerson($number,$street, $zipcode, $city, $country, $marque, $model)
    {
        $address = new Address($number,$street, $zipcode, $city, $country) ;
        $car = new Car($marque, $model) ;

        // return new Person($address);
        return new Person($address, $car);
    }
}



echo '<pre>' ;
$toto = PersonFactory::createPerson(5, 'Rue de Toulouse', 34001, 'Montpellier', 'France', "PEUGEOT", "307 CC") ;
var_dump($toto) ;
// $person = new Person(new Address (5, 'Rue de Toulouse', 34001, 'Montpellier', 'France'),
// new Car("BMW", 346)) ;

// $moi = new Person(new Address (14, 'Rue Barbés', 34120, 'Pezenas', 'France'),
// new Car("PEUGEOT", "307 CC")) ;
// var_dump($person) ;
// var_dump($moi) ;