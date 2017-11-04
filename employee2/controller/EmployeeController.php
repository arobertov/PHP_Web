<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 1.11.2017 г.
 * Time: 13:01
 */

class EmployeeController extends Controller
{
    public function __construct($db)
    {
        parent::__construct($db);
    }

    public function main()
    {
        $q = new EmployeesModel($this->db);
        $result = $q->readAll();
        $this->loadView('header.php');
        $this->loadView('employee/viewAll.php',array('result'=>$result));
        $this->loadView('footer.php');

    }

    public function viewAddresses() {
        $q = new AddressesModel($this->db);
        $result = $q->read($_GET['employee_id']);
        $this->loadView('header.php');
        $this->loadView('employee/employeeAddress.php',array('result'=>$result));
        $this->loadView('footer.php');
    }

    public function updateAddresses(){
        $adr = new AddressesModel($this->db);
        $em = new EmployeesModel($this->db);
        // ----- update action ------ //
        if(isset($_POST['save'])){
            if(isset($_POST['address_id'])){
                $addressId = $_POST['address_id'];
            } else $alert = 'Please input valid address !';
            if(isset($_GET['employee_id'])){
               $id = $_GET['employee_id'];
            } else $alert = 'Error: invalid ID!';
            $em->updateAddress($addressId,$id);
            $result = $adr->read($id);
            $alert = 'Address successfully updated!';
            $this->loadView('header.php');
            $this->loadView('employee/employeeAddress.php',array('alert'=>$alert,'result'=>$result));
            $this->loadView('footer.php');
            exit;
        }
        //----- render form -------- //
        $address = $adr->readAll();
        $employee = $em->readEmployee($_GET['employee_id']);
        $this->loadView('header.php');
        $this->loadView('employee/updateAddress.php',array('address'=>$address,'employee'=>$employee));
        $this->loadView('footer.php');
    }

    public function viewProjects(){
        $q = new ProjectsModel($this->db);
        $result = $q->read($_GET['employee_id']);
        $this->loadView('header.php');
        $this->loadView('employee/viewEmployeeProject.php',array('result'=>$result));
        $this->loadView('footer.php');
    }

    public function addProject(){
        $action = '?controller=EmployeeController&action=addProject';
        if(isset($_GET['employee_id'])){
            $action = $action."&employee_id={$_GET['employee_id']}";
        }
        if(isset($_POST['save'])) {
            $this->loadView('header.php');
            if (filter_var($_GET['employee_id'], FILTER_VALIDATE_INT)) {
                $employeeId = $_GET['employee_id'];
            } else die ("Error: \"invalid id number\"");
            if (strlen($_POST['name']) > 3 && strlen($_POST['name']) < 30) {
                $name = $_POST['name'];
            } else {
                $alert = 'Project name must be greater than 3 and less than 30 characters!';
                $this->loadView('employee/addProject.php', array('alert' => $alert, 'action' => $action));
            };
            if (filter_var($_POST['description'], FILTER_SANITIZE_STRING)) {
                $description = $_POST['description'];
            } else {
                $alert = 'Description must contain text!Number insert!';
                $this->loadView('employee/addProject.php', array('alert' => $alert, 'action' => $action));
            };
            if ($this->dateValidate($_POST['end_date'])){
                $endDate = $_POST['end_date'];
            } else {
                $alert = $this->dateValidate($_POST['end_date']);
                $this->loadView('employee/addProject.php', array('alert' => $alert, 'action' => $action));
            }
            $this->loadView('footer.php');
            $q = new ProjectsModel($this->db);
            $q->create($employeeId,$name,$description,$endDate);
            header('Location: ?controller=EmployeeController&action=main');
            exit;
        }

        $this->loadView('header.php');
        $this->loadView('employee/addProject.php',array('action'=>$action));
        $this->loadView('footer.php');
    }

    protected function dateValidate($date){
        $date_arr = explode('-',$date);
        if(count($date_arr)==3){
           if(checkdate($date_arr[1],$date_arr[2],$date_arr[0])){
             return true;
           }else return 'problem with date format';
        }
        return 'problem with date input !';
    }

    protected function loadView($filename,$params = array()){
        if(file_exists('view/'.$filename)){
            include 'view/'.$filename;
        } else {
            throw new Exception('View not found: view/'.$filename);
        }
    }

}