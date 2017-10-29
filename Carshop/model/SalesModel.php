<?php
class SalesModel extends Model{

	private $make;
	private $model;
	private $year;
	private $firstName;
	private $secondName;
	private $date_time;
	private $amount;
	private $car_id;
	private $customer_id;

	/**
	 * @return mixed
	 */
	public function getMake() {
		return $this->make;
	}

	/**
	 * @param mixed $make
	 */
	public function setMake( $make ) {
		$this->make = $make;
	}

	/**
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}

	/**
	 * @param mixed $model
	 */
	public function setModel( $model ) {
		$this->model = $model;
	}

	/**
	 * @return mixed
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param mixed $year
	 */
	public function setYear( $year ) {
		$this->year = $year;
	}

	/**
	 * @return mixed
	 */
	public function getFirstName() {
		return $this->firstName;
	}

	/**
	 * @param mixed $firstName
	 */
	public function setFirstName( $firstName ) {
		$this->firstName = $firstName;
	}

	/**
	 * @return mixed
	 */
	public function getSecondName() {
		return $this->secondName;
	}

	/**
	 * @param mixed $secondName
	 */
	public function setSecondName( $secondName ) {
		$this->secondName = $secondName;
	}


	/**
	 * @return mixed
	 */
	public function getDateTime() {
		return $this->date_time;
	}

	public function __construct( $db ) {
		parent::__construct( $db );
		$this->date_time = date('l jS \of F Y h:i:s A');
	}

	/**
	 * @return mixed
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param mixed $amount
	 */
	public function setAmount( $amount ) {
		$this->amount = $amount;
	}

	/**
	 * @return mixed
	 */
	public function getCarId() {
		return $this->car_id;
	}

	/**
	 * @param mixed $car_id
	 */
	public function setCarId( $car_id ) {
		$this->car_id = $car_id;
	}

	/**
	 * @return mixed
	 */
	public function getCustomerId() {
		return $this->customer_id;
	}

	/**
	 * @param mixed $customer_id
	 */
	public function setCustomerId( $customer_id ) {
		$this->customer_id = $customer_id;
	}



	public function create()
	{
        // Insert into sales
		try{
			$this->db->beginTransaction();
			$stmt = $this->db->prepare("
				INSERT INTO `cars`(`make`,`model`,`year`)
				VALUES (?,?,?)
				");
			$stmt->bindParam(1,$this->make);
			$stmt->bindParam(2,$this->model);
			$stmt->bindParam(3,$this->year);
			$stmt->execute();
			$this->setCarId($this->db->lastInsertId());

			$stmt = $this->db->prepare("
			   INSERT INTO `customers`(`first_name`,`last_name`)
			   VALUES (?,?)
			");
			$stmt->bindParam(1,$this->firstName);
			$stmt->bindParam(2,$this->secondName);
			$stmt->execute();
			$this->setCustomerId($this->db->lastInsertId());

            $stmt = $this->db->prepare("
                INSERT INTO `sales`
                  (`date_of_deal`,`amount`,`car_id`,`customer_id`)
                VALUES 
                   (NOW(), ?, ?, ?)");
            $stmt->bindParam(1, $this->amount);
            $stmt->bindParam(2, $this->car_id);
            $stmt->bindParam(3, $this->customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
			$this->db->commit();
            return($sale_id);
        } catch (PDOException $e) {
			$this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
			include "view/errorPage.php";
			exit;
        }
        return false;
	}
	// Todo - problem 1
    // Modifications to create()
	
	public function readAll()
	{
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `deal`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
		    print "Error!: " . $e->getMessage() . "<br/>";
	        include "view/errorPage.php";
	        exit;
        }
	}
	
	public function readTotal()
	{
		try {
			$stmt = $this->db->prepare( "
            SELECT SUM(`amount`) as `total_amount`
              FROM `sales`" );
			$stmt->execute();
			$row = $stmt->fetch( PDO::FETCH_ASSOC );
			if ( $row['total_amount'] ) {
				return $row['total_amount'];
			} else {
				return false;
			}
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			include "view/errorPage.php";
			exit;
		}
	}

	public function readCarMake(){
		try {
			$stmt = $this->db->prepare( "
			SELECT `cr`.make,`cr`.model,`cr`.`year`,`sl`.car_id,`cu`.`first_name`,`cu`.`last_name`,`sl`.customer_id 
			FROM `sales` as `sl`
			INNER JOIN `customers` as `cu` ON `cu`.id=`sl`.customer_id 
			INNER JOIN `cars` as `cr` ON `cr`.car_id=`sl`.car_id AND `cr`.make = :make
		" );
			$stmt->bindParam( 'make', $this->make );
			$stmt->execute();
			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $result;
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			include "view/errorPage.php";
			exit;
		}
	}

	public function updateInfo($fName,$lName,$make,$model,$year,$amount,$id){
		try{
			 $stmt = $this->db->prepare("
			       UPDATE `sales` as `sl`
			  		INNER JOIN `customers` as `cu` ON `cu`.id=`sl`.customer_id 
					INNER JOIN `cars` as `cr` ON `cr`.car_id=`sl`.car_id 
					SET `cu`.`first_name`= :firstn,`cu`.`last_name`=:lastn,
						`cr`.`make`= :make,`cr`.`model`=:model,`cr`.`year`=:year,
						`sl`.`date_of_deal`=NOW(),`sl`.`amount`=:amount
					WHERE `sl`.`customer_id` = :id
			 ");
			$stmt->bindParam('firstn',$fName);
			$stmt->bindParam('lastn',$lName);
			$stmt->bindParam('make',$make);
			$stmt->bindParam('model',$model);
			$stmt->bindParam('year',$year);
			$stmt->bindParam('amount',$amount);
			$stmt->bindParam('id',$id);
			$stmt->execute();
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			include "view/errorPage.php";
			exit;
		}
	}

	public function updateForm($id){
		try{
			$stmt = $this->db->prepare( "
			SELECT `cr`.make,`cr`.model,`cr`.`year`,`sl`.car_id,`cu`.`first_name`,`cu`.`last_name`,`sl`.customer_id,`sl`.amount 
			FROM `sales` as `sl`
			INNER JOIN `customers` as `cu` ON `cu`.id=`sl`.customer_id 
			INNER JOIN `cars` as `cr` ON `cr`.car_id=`sl`.car_id AND `sl`.customer_id = :id
		" );
			$stmt->bindParam( 'id', $id );
			$stmt->execute();
			$result = $stmt->fetchAll( PDO::FETCH_ASSOC );

			return $result;
		} catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			include "view/errorPage.php";
			exit;
		}
	}

	protected function setProperty(){

	}

}