<?php if(isset($params['alert'])): ?>
    <p class="alert"><?=$params['alert']; ?></p>
<?php endif; ?>
<table>
    <thead>
    <tr>
        <th>Employee Names</th>
        <th>Employee Address</th>
        <th>Town</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($params['result'] as $row): ?>
            <tr>
                <td><?= $row['names']; ?></td>
                <td><?= $row['address_text']; ?></td>
                <td><?= $row['town_name']; ?></td>
                <td>
                    <button>
                        <a href="?controller=EmployeeController&action=updateAddresses&employee_id=<?=$_GET['employee_id'] ?>">
                            Edit Address
                        </a>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>