<?php
class MyController extends Controller
{
    public function main()
    {
	    if (isset($_GET['404'])) {
		    include "404.php";
		    exit;
	    }
        include "view/header.php";
        switch($this->input){
            case 'sales':
                $this->viewSales();
                break;
	        case 'added':
	        	include "view/addSale.php";
	        	if(isset($_POST['make']))
	        	$this->addSale();
	        	break;
	        case 'customers':
	        	$this->viewCustomers();
	        	break;
	        case 'cars':
	        	$this->viewCars();
	        	break;
	        case 'search':
	        	$this->searchCarOwner();
	        	break;
	        case 'edit':
	        	$this->editInfo();
	        	break;
            default:
                break;
        }
        include "view/footer.php";
    }

    public function editInfo(){
    	$update = new SalesModel($this->db);
	    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	    	$update->updateInfo(
	    		$_POST['first_name'],$_POST['last_name'],$_POST['make'],$_POST['model'],
			    $_POST['year'],$_POST['amount'],$_GET['id']
			    );
	    	$alert ="Data update successfully ! ";
		    header('Location:?input=customers&alert='.$alert);
	    	die();
	    }else {
		    $result = $update->updateForm( $_GET['id'] );
		    include "view/updateInfo.php";
	    }
    }

    // Todo - change main() according to problem

    public function viewSales()
    {
        $s = new SalesModel($this->db);
        $sales = $s->readAll();
        $sales_total = $s->readTotal();
        include "view/read_sales.php";
    }
	 //$make,$model,$year,$firstName,$secondName,$amount
    // Todo - problem 1
    public  function addSale(){
    	$sl = new SalesModel($this->db);
    	$sl->setMake($_POST['make']);
    	$sl->setModel($_POST['model']);
    	$sl->setYear($_POST['year']);
    	$sl->setFirstName($_POST['first_name']);
    	$sl->setSecondName($_POST['last_name']);
    	$sl->setAmount($_POST['amount']);
	    if ($sl->create()){
		    echo "<p class='alert'>New sale entered {$sl->getDateTime()}</p>";
	    }

    }

    // Todo - problem 2
    public function viewCustomers(){
	   $cm = new SalesModel($this->db);
	   $result = $cm->readAll();
	    if(count($result)<1){
		    include "view/notingFound.php";
	    } else {
		    include "view/view_customers.php";
	    }
    }

    // Todo - problem 3
    public function viewCars() {
    	$cars = new SalesModel($this->db);
    	$result = $cars->readAll();
	    if(count($result)<1){
		    include "view/notingFound.php";
	    } else {
		    include "view/view_cars.php";
	    }
    }

    // Todo - Problem 6
    public function searchCarOwner() {
	    $car = new  SalesModel($this->db);
	    if(isset($_POST['make'])) {
		    $car->setMake($_POST['make']);
		    $result = $car->readCarMake();
		    if(count($result)<1){
		    	include "view/notingFound.php";
		    } else {
			    include "view/viewCarOwner.php";
		    }
	    } else {
	    	include "view/searchCarOwner.php";
	    }
    }
}
