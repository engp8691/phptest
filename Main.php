<?php
	require 'Employee.php';
	require 'Student.php';
	require './com/abc/SplQueue.php';
	require './com/abc/SplStack.php';
	require './com/abc/Multiton.php';
	require './Singleton.php';
	require './Factory.php';

	use com\abc\SplQueue;

	$employee = new Employee();
	$student = new Student("Yonglin");

	// It is already defined in the base class
	$employee->setLanguage();
	$employee->write_info();
	echo $employee->getLanguage() . "\n";
	$employee->liveWithFamily();
	// This method is protected, it can only be used in the class or its sub classes.
	// $employee->doSomething("It is accessible only in the class or its extended classes");
	$employee->callDoSomething();

	$student->setLanguage("Chinese");
	$student->write_info();
	$student->addGas(87);
	$student->igniteIt("Remote Controler");
	$student->liveWithFamily();
	echo $student->getLanguage() . "\n";

	// It is using the use statement
	$q = new SplQueue(); // this is to use com\abc\SplQueue
	// $q = new com\abc\SplQueue();

	$q->enqueue(1);
	$q->enqueue("b");
	$q->enqueue(3);
	$q->print();
	print_r($q);

	$queue = new \SplQueue();
	$queue->push("Tom");
	$queue->push("Gary");
	$queue->push("Dan");
	$queue->push("Jack");
	print_r($queue);
	$queue->pop(); // remove the last one
	print_r($queue);

	// Test Stack
	$s = new com\abc\SplStack();
	$s->push("One");
	$s->push("Two");
	$s->push("Three");
	$s->push("Four");
	print_r($s);
	$s->pop();
	print_r($s);

	$stack = new SplStack();
	$stack->push("Cat");
	$stack->push("Cow");
	$stack->add(0,"Chicken");
	$stack->push("Rat");
	print_r($stack);
	$stack->pop(); // remove the last one
	print_r($stack);

	// this is not doable. It is private now
	// $connectionInstance = new ConnectDb();
	$connectionInstance = ConnectDb::getInstance();
	$conn = $connectionInstance->getConnection();
	var_dump($conn);

	// the connection is the same	
	$connectionInstance = ConnectDb::getInstance();
	$conn2 = $connectionInstance->getConnection();
	var_dump($conn2);

	// The factory pattern
	$mycar = AutomobileFactory::create('Honda', 'CRV');
	print_r($mycar->getMakeAndModel());
	print "\n";

	$instance1 = com\abc\Multiton::getInstance("intance_one");
	var_dump($instance1);
	$instance2 = com\abc\Multiton::getInstance("intance_two");
	var_dump($instance2);
	$instance3 = com\abc\Multiton::getInstance("intance_two");
	var_dump($instance3);
	

