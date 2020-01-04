<?php

class School {
	public $name;
	public $year_in;
	public $year_out;
	public $major;
	public function __construct($nm,$yi,$yo,$mj=NULL){
		$this->name = $nm;
		$this->year_in = $yi;
		$this->year_out = $yo;
		$this->major = $mj;
	}
};

class Skill {
	public $skill_name;
	public $level;
	public function __construct($s,$l){
		$this->skill_name = $s;
		$this->level = $l;
	}
};

class Biodata {
	public $name;
	public $age;
	public $address;
	public $hobbies;
	public $is_married;
	public $list_school;
	public $skills;
	public $interest_in_coding;
	public function __construct($nm,$ag,$ad,$ho,$ma,$sc,$sk,$iic){
		$this->name = $nm;
		$this->age = $ag;
		$this->address = $ad;
		$this->hobbies = $ho;
		$this->is_married = $ma;
		$this->list_school = $sc;
		$this->skills = $sk;
		$this->interest_in_coding = $iic;
	}
};

class Database {
	private $db = [];
	
	public function add($bio){
		array_push($this->db, $bio);
	}
	
	public function search($name,$age){
		$r = new stdClass;
		$r->count = 0;
		$r->data = [];
		foreach ($this->db as $i=>$v) {
			if($v->name == $name && $v->age == $age){
				$r->data []= $v;
				$r->count++;
			}
		}
		return json_encode($r);
	}
};

$db = new Database;
$db->add(new Biodata(
		"Irvan",
		23,
		"Blitar", 
		array(
			"Mancing",
			"Nulis",
			"Coding"
		), 
		false, 
		array(
			new School("SDN 1 Candirejo", 2001, 2007, NULL),
			new School("SMPN 1 Ponggok", 2007, 2009, NULL),
			new School("SMAN 1 Ponggok", 2010, 2013, "IPA"),
			new School("UB Malang", 2013, 2019, "THP")
		),
		array(
			new Skill("C",0),
			new Skill("Assembly",0),
			new Skill("PHP",1)
		),
		true
	)
);
$db->add(new Biodata(
		"Joko",
		12,
		"Malang", 
		array(
			"Hiking"
		), 
		false, 
		array(
			new School("SDN 1 Malang", 2001, 2007, NULL),
			new School("SMPN 1 Ngawi", 2007, 2009, NULL),
			new School("SMAN 1 Ponggok", 2010, 2013, "IPA"),
			new School("UM", 2013, 2019, "Elektro")
		),
		array(
			new Skill("C",1),
			new Skill("Python",1),
			new Skill("PHP",0)
		),
		true
	)
);
$db->add(new Biodata(
		"Genta",
		12,
		"Jombang", 
		array(
			"Membaca",
			"Menyanyi"
		), 
		false, 
		array(
			new School("SDN 1 Jombang", 2001, 2007, NULL),
			new School("SMPN 1 Jombang", 2007, 2009, NULL),
			new School("SMAN 1 Jombang", 2010, 2013, "IPS"),
			new School("UM", 2013, 2019, "Mesin")
		),
		array(
			new Skill("Go",1)
		),
		true
	)
);
print $db->search("Irvan",23);
