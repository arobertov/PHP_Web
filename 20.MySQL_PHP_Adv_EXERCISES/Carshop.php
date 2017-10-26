<?php
class Carshop
{
    private $db = false;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function main()
    {
        do{
            $input_str = trim(fgets(STDIN));
            $input_arr = explode(",", $input_str);
            //Sample: Audi, A4, 2004, Ivan, Ivanov, BGN 7000
            if(count($input_arr)  == 6){
                $car = [
                    'make' => $input_arr[0],
                    'model'=> $input_arr[1],
                    'year' => $input_arr[2],
                ];
                $person = [
                    'name' =>  $input_arr[3],
                    'family' => $input_arr[4]
                ];
                $amount = [
                    'amount' => $input_arr[5]
                ];
                $this->setSale($car, $person, $amount);
            }
        }
        while($input_str != "Bye");
    }

    protected function setSale($car, $person, $amount)
    {
        try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `cars`
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $car['make']);
            $stmt->bindParam(2, $car['model']);
            $stmt->bindParam(3, $car['year']);
            $stmt->execute();
	        $carId = $this->db->lastInsertId();

	        // Insert into customers
            $stmt = $this->db->prepare("
                INSERT INTO `customers`
                (`first_name`,`last_name`)
                VALUES 
                (?,?)
            ");
            $stmt->bindParam(1, $person['name']);
            $stmt->bindParam(2,$person['family']);
	        $stmt->execute();
	        $costumerId = $this->db->lastInsertId();

	        // Insert into sales
	        $this->db->query("SET @sum = 0");
	        $stmt = $this->db->prepare("
	            INSERT INTO `sales`
	            (`car_id`,`customer_id`,`time_sales`,`amount`)
	            VALUES
	            ($carId,$costumerId,NOW(),?)
	        ");
	        $stmt->bindParam(1,$amount['amount']);
	        $stmt->execute();
            $this->db->commit();
            echo "New sale entered ".(new \DateTime())->format('Y-m-d H:i:s').PHP_EOL;
	        $this->getTotalTrigger();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . PHP_EOL;
        }
    }

    private function getTotalTrigger(){
        $stmt = $this->db->prepare("SELECT @sum AS 'total_sales'");
        $stmt->execute();
	    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    foreach ($result as $row){
	    	echo "Total: {$row['total_sales']} \n";
	    }

    }

    public function getSales(){
    	try{
    		$stmt = $this->db->prepare("
    		    SELECT `cr`.`make`,`cr`.`model`,`sl`.`time_sales`,`sl`.`amount`
				FROM `cars` as `cr`
				INNER JOIN `sales` as `sl` USING (`car_id`)
    		");
    		$stmt->execute();
    		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    		foreach ($result as $row){
    			echo "{$row['make']},{$row['model']},{$row['time_sales']},{$row['amount']} \n";
		    }
		    echo '--------------------'.PHP_EOL;
		    $this->getTotalSales();
	    }  catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . PHP_EOL;
	    }
    }

    public function getSalesWithName(){
	    try{
		    $stmt = $this->db->prepare("
    		    SELECT `cr`.`make`,`cr`.`model`,`sl`.`time_sales`,`sl`.`amount`,`sl`.`customer_id`
				FROM `cars` as `cr`
				INNER JOIN `sales` as `sl` USING (`car_id`)
    		");
		    $stmt->execute();
		    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		    foreach ($result as $row){
			    $fullName = $this->getFullName($row['customer_id']);
			    echo "{$fullName},{$row['make']},{$row['model']},{$row['time_sales']},{$row['amount']} \n";
		    }
		    echo '--------------------'.PHP_EOL;
		    $this->getTotalSales();
	    }  catch (PDOException $e) {
		    print "Error!: " . $e->getMessage() . PHP_EOL;
	    }
    }

    private function getFullName($id){
	    $stmt = $this->db->prepare("
						SELECT get_full_name(first_name,last_name) AS fullname 
						FROM `customers` WHERE `id`=?
						LIMIT 0,1
				");
	    if ($stmt->execute(array($id))) {
		    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
		        return $row['fullname'];
		    }
	    }
    }

    private function getTotalSales(){
        /* using select query
    	$stmt =	$this->db->prepare("
    	    SELECT SUM(SUBSTRING_INDEX(`amount`,' ',-1))as sum FROM `sales` 
    	");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row){
        	echo "Total: {$row['sum']}";
        }  */
        
	    // ---- using procedure ----- //
	    $result = $this->db->query('CALL total_sum', PDO::FETCH_ASSOC);
	    foreach ($result as $row) {
		    echo "Total: {$row['sum']}";
	    }
    }
}

