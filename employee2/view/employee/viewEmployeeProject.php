<?php  foreach($params['result'] as $iv) {
    $name = $iv['first_name'].' '.$iv['last_name'];
    break;
}
?>
<table>
    <thead>
    <tr>
        <th colspan="4">Employee <strong class="empl-name"> <?=$name ?></strong>  projects</th>
    </tr>
    <tr>
        <th>Project Name</th>
        <th>Description</th>
        <th>Star Date</th>
        <th>End Date</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($params['result'] as $row): ?>
        <tr>
            <td><?=$row['name']; ?></td>
            <td>
                <?php
                if(strlen($row['description'])<30)
                 echo $row['description'];
                else echo substr($row['description'],0,30)."....";
                ?>
            </td>
            <td><?=$row['start_date']; ?></td>
            <td><?=$row['end_date']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
