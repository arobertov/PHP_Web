<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 20.10.2017 г.
 * Time: 21:30
 */

class Employee
{
    private $inst;

    public function __construct($db)
    {
        $this->inst = $db;
    }

	public function getPhone($firstName,$lastName){
    	try {
		$db_stm = $this->inst->prepare("SELECT `empl`.id,`empl`.first_name,`empl`.middle_name,
                                                    `empl`.last_name,`empl`.department,`empl`.`position`,
                                                    `ph`.`work_phone`,`ph`.`personal_phone`
                                            FROM `employee` as `empl`
                                            INNER JOIN `employee_phones` as `ph` 
                 
                                            ON `empl`.first_name = ? 
                                            AND `empl`.last_name = ?  
                                            AND `ph`.`employee_id` = `empl`.`id`");
		$db_stm->execute(array($firstName,$lastName));
		return $result = $db_stm->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
print "PDO Error: " . $e->getMessage() .PHP_EOL;
}
return false;
	}

    public function getEmail($firstName,$lastName){
        try{
            $db_stm = $this->inst->prepare("SELECT `empl`.id,`empl`.first_name,`empl`.middle_name,
                                                    `empl`.last_name,`empl`.department,`empl`.`position`,`empl`.`country`,
                                                    `em`.`work_email`,`em`.personal_email
                                            FROM `employee` as `empl`
                                            INNER JOIN `employee_emails` as `em` 
                 
                                            ON `empl`.first_name = ? 
                                            AND `empl`.last_name = ?  
                                            AND `em`.`employee_id` = `empl`.`id`");
            $db_stm->execute(array($firstName,$lastName));
            return $result = $db_stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "PDO Error: " . $e->getMessage() .PHP_EOL;
        }
        return false;
    }

    public function getEmailUseWildcard($firstName){
	    try{
		    $name = str_replace('*','%',$firstName);
		    $db_stm = $this->inst->prepare("SELECT `empl`.id,`empl`.first_name,`empl`.middle_name,
                                                    `empl`.last_name,`empl`.department,`empl`.`position`,`empl`.`country`,
                                                    `em`.`work_email`,`em`.personal_email
                                            FROM `employee` as `empl`
                                            INNER JOIN `employee_emails` as `em` 
                 
                                            ON `empl`.first_name LIKE ?   
                                            AND `em`.`employee_id` = `empl`.`id`");
		    $db_stm->execute(array($name));
		    return $result = $db_stm->fetchAll(PDO::FETCH_ASSOC);
	    } catch (PDOException $e) {
		    print "PDO Error: " . $e->getMessage() .PHP_EOL;
	    }
	    return false;
    }

    // ---------------------- insert employee data ------------------------------------------------------- //
    public function insertEmployee($firstName, $middleName, $lastName, $department, $position, $passportId,$countryName)
    {
        try {
	        $res = $this->getCountryCode(trim($countryName));
        	if(count($res)>0){
	            $country = '';
	            foreach ($res as $row){
	                $country = $row['country_code'];
		        }
        	}else {
        		echo "No find this country with name $countryName \n";
        		return false;
	        }
            $db_stm = $this->inst->prepare("
                            INSERT INTO `employee`(`first_name`,`middle_name`,`last_name`,`department`,`position`,`passport_id`,`country`)
                            VALUES (:firstName,:middleName,:lastName,:department,:pos,:passportId,:country)
                            ");
            $db_stm->bindParam('firstName', $firstName);
            $db_stm->bindParam('middleName', $middleName);
            $db_stm->bindParam('lastName', $lastName);
            $db_stm->bindParam('department', $department);
            $db_stm->bindParam('pos',$position);
            $db_stm->bindParam('passportId', $passportId);
            $db_stm->bindParam ('country',$country);

            if ($db_stm -> execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            print "PDO Error: " . $e->getMessage() .PHP_EOL;
        }
        return false;
    }

    private function getCountryCode($countryName) {
    	try {
		    $db_stm = $this->inst->prepare( "SELECT `countries`.country_code 
										FROM `countries`
										WHERE `countries`.`country_name` = ? OR `countries`.`iso_code` = ?
										LIMIT 0,1
										" );
		    $db_stm->execute( array( $countryName,$countryName ) );

		    return $result = $db_stm->fetchAll( PDO::FETCH_ASSOC );
	    } catch (PDOException $e){
    		echo 'Error1: '. $e->getMessage().PHP_EOL;
	    }
    }
    //-----------------  insert phones ---------------------------- //
    public function insertPhones($firstName,$middleName,$lastName,$phones){
        $result = $this->checkUnique(trim($firstName),trim($middleName),trim($lastName));
        if($result == 1){
            $this->setPhones($phones,$result[0]);
            echo "Phones of $firstName $middleName $lastName saved \n";
        } else {
            echo "Employees with this name: \n";
            if(count($result) < 1){
	            echo "No person this names $firstName $middleName $lastName saved in database! \n";
            	return false;
            }
            foreach ($result as $id) {
                echo $id;
                echo ',';
            }
            echo "\n";
            $input = explode(',',trim(fgets(STDIN)));
            $id = $input[0];
            $this->setPhones($phones,$id);
            echo "Phones of $firstName $middleName $lastName saved \n";
        }
        return false;
    }
	// -------------------- insert email method ---------------------- //
    public function insertEmail($firstName,$middleName,$lastName,$emails){
        $result = $this->checkUnique(trim($firstName),trim($middleName),trim($lastName));
          if(count($result)==1){
          $this->setEmails($emails,$result[0]);
          echo "Emails of $firstName $middleName $lastName saved. \n";
          } else {
	          if(count($result)<1){
	          	echo "No person this names $firstName $middleName $lastName saved in database! \n";
	          	return false;
	          }
              echo "Employees with this name: \n";
              foreach ($result as $id) {
                  echo $id;
                  echo ',';
              }
              echo "\n";
              $input = explode(',',trim(fgets(STDIN)));
              $id = $input[0];
              $this->setEmails($emails,$id);
              echo "Emails of $firstName $middleName $lastName saved. \n";
          }
    }


    private function setEmails($emails,$id){
        $rawEmails = explode(',',trim($emails));
        $db_stm =  $this->inst->prepare("INSERT INTO `geography`.`employee_emails` (`work_email`, `personal_email`, `employee_id`) 
                                          VALUES (?,?,?);");

       $this->saveDataDB($rawEmails,$db_stm,$id,$check='checkEmail');

    }

    private function setPhones($phones,$id){
        $rawPhones = explode(',',trim($phones));
        $db_stm = $this->inst-> prepare("INSERT INTO `geography`.`employee_phones` (`work_phone`, `personal_phone`, `employee_id`) 
                                          VALUES (?,?,?);");

        $this->saveDataDB($rawPhones,$db_stm,$id,$check='checkPhone');
    }
    // ----------------- validate phone in format +000000000 ------------- //
    private function checkPhone($phone){
        $result = preg_match('/(\+)([0-9])\w+/',$phone);
        if($result > 0){
            return $phone;
        } else {
            die("Error: Please,$phone check your input phone number syntax.");

        }
    }
    //-------------- validate email ------------------------------ //
    private function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        } else {
            die("Error, |$email is not a valid email address");
        }
    }

    private function saveDataDB($rawData,$db_stm,$id,$check){
        $work =array();
        $personal=array();
        for($i=0;$i<count($rawData);$i++){
            $arr = explode(':',trim($rawData[$i]));
            if($arr[0]=='personal'){
                $personal[] = trim($arr[1]);
            }else {
                $work[] = trim($arr[1]);
            }
        }
        if(count($personal)>count($work)){
            for($i=0;$i<count($personal);$i++){
                if($i<count($work)){
                    $db_stm->execute(array($this->$check($work[$i]),$this->$check($personal[$i]),$id));
                }else {
                    $db_stm->execute(array(null,$this->$check($personal[$i]),$id));
                }
            }
        }else {
            for($i=0;$i<count($work);$i++)
                if($i<count($personal)){
                    $db_stm->execute(array($this->$check($work[$i]),$this->$check($personal[$i]),$id));
                }else {
                    $db_stm->execute(array($this->$check($work[$i]),null,$id));
                }
        }
    }

    private function checkUnique($firstName,$middleName,$lastName){
        try {
            $db_stm = $this->inst->prepare("
                                        SELECT `id`FROM `employee` 
                                        WHERE `first_name`=:firstName 
                                        AND `middle_name`=:middleName
                                        AND `last_name`=:lastName
                                        ");
            $db_stm->bindParam('firstName', $firstName);
            $db_stm->bindParam('middleName', $middleName);
            $db_stm->bindParam('lastName', $lastName);
            $unique = [];
            $db_stm->execute();
            foreach ($db_stm as $row) {
                $unique[] = $row['id'];
            }
            return $unique;
        } catch (PDOException $e) {
            print "PDO Error: " . $e->getMessage() .PHP_EOL;
        }
       return false;
    }
	  // --------------- Delete Methods ------------------ //
	public function deleteEmail ($id){
    	$db_stm = $this->inst->prepare("DELETE FROM `geography`.`employee_emails` WHERE  `employee_id`=?;");
    	$db_stm->execute(array($id));
	}
}