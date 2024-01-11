<?php


// 1.Write a php class called Animal with a method called makeSound(). Create a subclass called Cat that overrides the makeSound() method to bark.
class Animal {
    public function makeSound() {
        echo "Animal sound<br>";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Bark<br>";
    }
}

    $animal = new Animal();
    $cat = new Cat();
    $animal->makeSound().'<br>';  
    $cat->makeSound().'<br>'; 

// 2.Write a php class called Vehicle with a method called drive(). Create a subclass called Car that overrides the drive() method to print "Repairing a car".
class Vehicle {
    public function drive() {
        echo "Driving a vehicle<br>";
    }
}

class Car extends Vehicle {
    public function drive() {
        echo "Reparing a car<br>";
    }
}

// Example usage:
    $vehicle = new Vehicle();
    $car = new Car();
    $vehicle->drive().'<br>';  
    $car->drive().'<br>'; 

// 3.Write a php class called Shape with a method called getArea(). 
//Create a subclass called Rectangle that overrides the getArea() method to calculate the area of a rectangle.
class Shape {
    public function getArea() {
        echo "Calculating area<br>";
    }
}

class Rectangle extends Shape {
    public $width;
    public $height;

    public function getArea() {
        $area = $this->width * $this->height;
        echo "Area of Rectangle: $area<br>";
    }
}

// Example usage:
$shape = new Shape();
$rectangle = new Rectangle();
$rectangle->width = 10;
$rectangle->height = 5;
$shape->getArea();
$rectangle->getArea();

// 4.Write a php class called Employee with methods called work() and getSalary(). Create a subclass called HRManager that overrides the work() method and adds a new method called addEmployee().
class Employee {
    protected $salary;

    public function work() {
        echo "Employee is working<br>";
    }

    // Add a method to set the salary
    public function setSalary($salary) {
        $this->salary = $salary;
    }
    
    public function getSalary() {
        return $this->salary;
    }

}   

class HRManager extends Employee {
    public function work() {
        echo "Managing HR tasks".'<br>';
    }

    public function addEmployee() {
        echo "Managing HR tasks.'<br>'";
    }
}

$employee = new Employee();
$hrManager = new HRManager();
$employee->setSalary(10000);
$hrManager->setSalary(15000);
$employee->work();
$hrManager->work();
$hrManager->addEmployee();
echo "Employee Salary: " . $employee->getSalary() . "<br>";
echo "HR Manager Salary: " . $hrManager->getSalary() . "<br>";

// 5.Write a php class known as "BankAccount" with methods called deposit() and withdraw(). Create a subclass called SavingsAccount that overrides the withdraw() method to prevent withdrawals if the account balance falls below one hundred.
class BankAccount {
    protected $balance = 0;

    public function deposit($amount) {
        $this->balance += $amount;
    }

    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Withdrawal successful.New balance: $this->balance<br>";
        } else {
            echo "Not enough balance for withdrawal<br>";
        }
    }
}

class SavingsAccount extends BankAccount {
    public function withdraw($amount) {
        if ($this->balance - $amount >= 100) {
            parent::withdraw($amount);
        } else {
            echo "Cannot withdraw to keep minimum balance of 100<br>";
        }
    }
}

$savingsAccount = new SavingsAccount();
$savingsAccount->deposit(200);
$savingsAccount->withdraw(50);
$savingsAccount->withdraw(100);

//6. Write a php class called Animal1 with a method named move(). Create a subclass called Cheetah that overrides the move() method to run.
class Animal1 {
    public function move() {
        echo "Moving";
    }
}

class Cheetah extends Animal1 {
    public function move() {
        echo "Running fast";
    }
}

$animal1 = new Animal1();
$cheetah = new Cheetah();
$animal1->move();
$cheetah->move();

// 7.Write a php class known as Person with methods called getFirstName() and getLastName(). Create a subclass called Employee that adds a new method named getEmployeeId() and overrides the getLastName() method to include the employee's job title.
class Person1 {
    protected $firstName;
    protected $lastName;

    
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }
    public function getFirstName() {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    public function getLastName() {
        return $this->lastName;
    }
}

class Employee1 extends Person1 {
    protected $employeeId;
    protected $jobTitle;

    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }
    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function setJobTitle($jobTitle) {
        $this->jobTitle = $jobTitle;
    }
    public function getLastName() {
        // Override to include job title
        return parent::getLastName() . " (" . $this->jobTitle . ")";
    }
}

// Example usage:
$employee1 = new Employee1();
$employee1->setFirstName("John");
$employee1->setLastName("Doe");
$employee1->setJobTitle("Developer");
$employee1->setEmployeeId("E12345");
echo "Employee: {$employee1->getFirstName()} {$employee1->getLastName()} (ID: {$employee1->getEmployeeId()})<br>";



//8. Write a php class called Shape with methods called getPerimeter() and getArea(). Create a subclass called Circle that overrides the getPerimeter() and getArea() methods to calculate the area and perimeter of a circle.
class Shape1 {
    public function getPerimeter() {
        // Default implementation
        return  "Calculating perimeter<br>";
    }

    public function getArea() {
        // Default implementation
        return "Calculating area<br>";
    }
}

class Circle extends Shape1 {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function getPerimeter() {
        // Calculate the perimeter of the circle: 2 * π * radius
        return 2 * pi() * $this->radius;
    }

    public function getArea() {
        // Calculate the area of the circle: π * radius^2
        return pi() * pow($this->radius, 2);
    }
}

$circle = new Circle(5);
echo "Circle Perimeter: " . $circle->getPerimeter() . "<br>";
echo "Circle Area: " . $circle->getArea() . "<br>";

//9.Write a php cehicle class hierarchy. The base class should be Vehicle, with subclasses Truck, Car and Motorcycle. Each subclass should have properties such as make, model, year, and fuel type. Implement methods for calculating fuel efficiency, distance traveled, and maximum speed.

class Vehicle1 {
    protected $make;
    protected $model;
    protected $year;
    protected $fuelType;

    // Constructor
    public function __construct($make, $model, $year, $fuelType) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
        $this->fuelType = $fuelType;
    }

    // Methods for details
    public function getDetails() {
        return "{$this->make} {$this->model}, Year: {$this->year}, Fuel Type: {$this->fuelType}<br>";
    }
}

class Truck extends Vehicle1 {
    // Truck specific details
}

class Car1 extends Vehicle1 {
    // Car specific details
}

class Motorcycle extends Vehicle1 {
    // Motorcycle specific details
}

$truck = new Truck("Ford", "F-150", 2020, "Diesel");
$car = new Car1("Toyota", "Corolla", 2021, "Petrol");
$motorcycle = new Motorcycle("Harley-Davidson", "Street 750", 2022, "Petrol");

echo $truck->getDetails();
echo $car->getDetails();
echo $motorcycle->getDetails();



// 10.Write a php ca class hierarchy for employees of a company. The base class should be Employee, with subclasses Manager, Developer, and Programmer. Each subclass should have properties such as name, address, salary, and job title. Implement methods for calculating bonuses, generating performance reports, and managing projects.
class Employee2 {
    protected $name;
    protected $address;
    protected $salary;
    protected $jobTitle;

    public function __construct($name, $address, $salary, $jobTitle) {
        $this->name = $name;
        $this->address = $address;
        $this->salary = $salary;
        $this->jobTitle = $jobTitle;
    }

    public function getDetails() {
        return "{$this->name}, {$this->address}, Salary: {$this->salary}, Job Title: {$this->jobTitle}<br>";
    }
}

class Manager extends Employee2 {
    // Manager specific methods
}

class Developer extends Employee2 {
    // Developer specific methods
}

class Programmer extends Employee2 {
    // Programmer specific methods
}

$manager = new Manager("Alice", "123 Street", 50000, "Project Manager");
$developer = new Developer("Bob", "456 Avenue", 40000, "Software Developer");
$programmer = new Programmer("Charlie", "789 Road", 35000, "Programmer");

echo $manager->getDetails();
echo $developer->getDetails();
echo $programmer->get


?>