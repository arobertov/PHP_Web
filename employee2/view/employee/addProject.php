<?php if(isset($params['alert'])): ?>
    <p class="alert"><?=$params['alert']; ?></p>
<?php endif; ?>
<form method="post" action="<?=$params['action']; ?>">
    Project Name:  <input type="text" name="name"/> <br/>
    Project description: <input type="text" name="description"/> <br/>
    End Data: <input type="date" name="end_date"> <br/>
    <input type="submit" name="save" value=" Save ">
    <button><a href="?controller=EmployeeController&action=main">Cancel</a></button>
</form>