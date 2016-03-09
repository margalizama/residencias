<?php
class EventData {
	public static $tablename = "event";


	public function EventData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->category_id = "NULL";
		$this->password = "";
		$this->created_at = "NOW()";

	}

	public function getProject(){ return ProjectData::getById($this->project_id); }
	public function getCategory(){ return CategoryData::getById($this->category_id); }
	//public function getContact(){ return ContactData::getById(); }

	public function add(){

		/**/
			$fecha=$this->date_at;
			$va = $this->time_at;
			$v2 = '00:20:00';//minutos a agregar
			$v2 = strtotime($v2) - strtotime('today');//convertir los minutos a agregar en segundos
			$v1 = strtotime('+'.$v2.' seconds', strtotime($va));//agregar los segundos
			$v=date('H:i:s', $v1);//la hora con7 los 20 min7utos
			$vs = strtotime('+'.$v2.' seconds', strtotime($v));//agregar los segundos
			$ti_f=date('H:i:s', $vs);//la hora con7 los 20 min7utos
		/*
		$sql="select * from ".self::$tablename."WHERE time_at BETWEEN \"$this->time_at\" AND $v";
		$sql .="OR $fecha_fin BETWEEN [campo_fecha_inicio] AND [campo_fecha_fin]";
		$sql .="OR campo_fecha_inicio BETWEEN $fecha_inicio AND $fecha_fin";
		$sql="select * from event where  date_at='2016-02-16' and time_at='14:00:00' between '14:00:00' and '14:20:00'";
		*/
		$sql="select * from ".self::$tablename." where  date_at='$fecha' and time_at between '$va' and '$v' and time_fin between '$v' and '$ti_f'";
		//$sql = "select * from ".self::$tablename." where time_at=\"$this->time_at\" and date_at=\"$this->date_at\"";
		$c=EventData::getBySQL($sql);
		 if(count($c)>0){
		 	$va = $this->time_at;
			$v2 = '00:20:00';//minutos a agregar
			$v2 = strtotime($v2) - strtotime('today');//convertir los minutos a agregar en segundos
			$v1 = strtotime('+'.$v2.' seconds', strtotime($va));//agregar los segundos
			$v=date('H:i:s', $v1);//la hora con7 los 20 min7utos
			$vs = strtotime('+'.$v2.' seconds', strtotime($v));//agregar los segundos
			$ti_f=date('H:i:s', $vs);//la hora con7 los 20 min7utos
			/*$sql = "insert into ".self::$tablename."(title,description,project_id,date_at,time_at,time_fin,category_id,user_id,created_at,presidente,secre,vocal) ";
			 $sql .= "value (\"$this->title\",\"$this->description\",$this->project_id,\"$this->date_at\",\"$v\",\"$ti_f\",$this->category_id,$this->user_id,$this->created_at,$this->presidente,$this->secre,$this->vocal)";*/
		 	echo "<script> alert('Ya hay un evento registrado a las $va este evento se recorrera a las $v del dia selecionado $ti_f');</script>";
		 	$sql = "insert into ".self::$tablename."(title,project_id,date_at,time_at,time_fin,category_id,user_id,created_at,presidente,secre,vocal) ";
			 $sql .= "value (\"$this->title\",$this->project_id,\"$this->date_at\",\"$v\",\"$ti_f\",$this->category_id,$this->user_id,$this->created_at,$this->presidente,$this->secre,$this->vocal)";
		return Executor::doit($sql);	 		
			
		 }
		 else{
		 	$va = $this->time_at;
			$v2 = '00:20:00';//minutos a agregar
			$v2 = strtotime($v2) - strtotime('today');//convertir los minutos a agregar en segundos
			$v1 = strtotime('+'.$v2.' seconds', strtotime($va));//agregar los segundos
			$v=date('H:i:s', $v1);//la hora con7 los 20 min7utos
			echo "<script> alert('cosa');</script>";
			$sql = "insert into ".self::$tablename."(title,project_id,date_at,time_at,time_fin,category_id,user_id,created_at,presidente,secre,vocal) ";
			 $sql .= "value (\"$this->title\",$this->project_id,\"$this->date_at\",\"$v\",\"$ti_f\",$this->category_id,$this->user_id,$this->created_at,$this->presidente,$this->secre,$this->vocal)";
			 return Executor::doit($sql);
			
		}
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto EventData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set title=\"$this->title\",project_id=$this->project_id,category_id=$this->category_id,date_at=\"$this->date_at\",time_at=\"$this->time_at\",description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EventData());
	}

	public static function getByMail($mail){
		$sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new EventData());
	}

	public static function getEvery(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." where date(date_at)>=date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getAllByProjectId($id){
		$sql = "select * from ".self::$tablename." where project_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getAllByMedicId($id){
		$sql = "select * from ".self::$tablename." where medic_id=$id order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tablename." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where title like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new EventData());
	}


}

?>