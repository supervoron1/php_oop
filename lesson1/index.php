<?php

class Train
{
	public $number;
	public $wagons;
	public $maxWagons;
	public $curr_speed;

	public function __construct($number, $wagons = null, $maxWagons = null, $curr_speed = 0)
	{
		$this->number = $number;
		$this->wagons = $wagons;
		$this->maxWagons = $maxWagons;
		$this->curr_speed = $curr_speed;
	}


	public function speedUp($speed)
	{
		return $this->curr_speed += $speed;
	}

	public function slowDown($speed)
	{
		return $this->curr_speed -= $speed;
	}

	public function addWagon($number)
	{
		return (($this->wagons + $number) <= $this->maxWagons) ? $this->wagons += $number : $this->wagons = "{$number} is overload";
	}

	public function showTrain()
	{
		$type = get_class($this);
		return "Поезд номер: {$this->number} <br>
				Тип: {$type}<br>
				Текущая скорость: {$this->curr_speed}<br>
				Кол-во вагонов: {$this->wagons}<br>
				Максимум вагонов: {$this->maxWagons}<br>";
	}

}

class PassengerTrain extends Train
{
	public $conductorsNumber;

	public function __construct($number, $maxWagons = 30, $conductorsNumber = 5)
	{
		parent::__construct($number);
		$this->maxWagons = $maxWagons;
		$this->conductorsNumber = $conductorsNumber;
	}

	public function showTrain()
	{
		return parent::showTrain() . "Кол-во проводников: {$this->conductorsNumber}<br>";
	}

}

class CargoTrain extends Train
{

	public function __construct($number, $maxWagons = 50)
	{
		parent::__construct($number);
		$this->maxWagons = $maxWagons;

	}
}

$train1 = new CargoTrain(111);
$train2 = new PassengerTrain(999);

$train2->addWagon(33);
$train2->speedUp(15);
var_dump($train2);
echo $train2->showTrain() . '<hr>';

$train1->addWagon(48);
$train1->speedUp(35);
$train1->slowDown(10);
var_dump($train1);
echo $train1->showTrain() . '<hr>';


// ------------------------
echo '<br>';
//class A
//{
//	public function foo()
//	{
//		static $x = 0;
//		echo ++$x;
//	}
//}
//
//$a1 = new A();
//$a2 = new A();
//$a1->foo();
//$a2->foo();
//$a1->foo();
//$a2->foo();

// На кадом шаге получаем число, увеличенное на 1. Это происходит потому, что переменная $x принадлежит
// не созданным объектам а классу, в котором она создана (слово static);
// Поэтому при каждом вызове функции из любого объекта, принадлежащего классу будет увеличение на 1.

class A
{
	public function foo()
	{
		static $x = 0;
		echo ++$x;
	}
}

class B extends A{}

$a1 = new A();
$b1 = new B();
$a2 = new A();
$b2 = new B();

$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

$a2->foo();
$b2->foo();

// Здесь создается дочерний класс. Соответственно, для каждого дочернего класса будет действовать такое же правило,
// что и для родительского, только уже для каждого класса по отдельности.
// Создал еще один объект класса A, чтобы было видно, что у нового объекта static $x продолжает дальше инкрементироваться.
// Аналогично, если создать другие объекты для класса B, поведение будет таким же, но уже внутри класса B.
