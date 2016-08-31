<?php
	class Person{
		protected $name;
		protected $sex;
		public function __construct($name,$sex){
			$this->name = $name;
			$this->sex = $sex;
		}
		public function say(){
			echo "hello , I am Only Attacker!";
		}
	}


	$class = "Person";
	$function = "say1";
	$gao = new $class("gaos","female");
	$gao->$function();
?>