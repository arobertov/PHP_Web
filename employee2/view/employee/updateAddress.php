<?php foreach ($params['employee'] as $empl): ?>
<h2>Update <?=$empl['first_name'].' '.$empl['last_name']; ?> address </h2>
<?php endforeach; ?>
<form method="post" action="?controller=EmployeeController&action=updateAddresses&employee_id=<?php echo $_GET['employee_id'] ?>">
    Employee Address:
    <select name="address_id" id="1">
        <?php foreach ($params['address'] as $address): ?>
            <option value="<?=$address['address_id'] ?>"><?=$address['address_text'];?></option>
        <?php endforeach; ?>
    </select>
    <br/>
    <input type="submit" value=" Save " name="save">
    <button><a href="?controller=EmployeeController&action=main">Cancel</a></button>
</form>