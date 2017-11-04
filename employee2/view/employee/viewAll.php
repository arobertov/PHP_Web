<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Job Title</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['result'] as $row): ?>
        <tr>
            <td><?=$row['first_name']; ?></td>
            <td><?=$row['last_name']; ?></td>
            <td><?=$row['job_title']; ?></td>
            <td><?=$row['salary']; ?></td>
            <td>
                <button>
                    <a href="?controller=EmployeeController&action=addProject&employee_id=<?=$row['employee_id']; ?>">
                        Add Project
                    </a>
                </button>
                <button>
                    <a href="?controller=EmployeeController&action=viewProjects&employee_id=<?=$row['employee_id']; ?>">
                        View Project
                    </a>
                </button>
                <button>
                    <a target="_blank" href="?controller=EmployeeController&action=viewAddresses&employee_id=<?=$row['employee_id']; ?>">
                        View Address
                    </a>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
