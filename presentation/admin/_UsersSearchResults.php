<head>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


<style>
#customers {
font-family: Arial, Helvetica, sans-serif;
border-collapse: collapse;
width: 100%;
}

#customers td, #customers th {
border: 1px solid #ddd;
padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
padding-top: 12px;
padding-bottom: 12px;
text-align: left;
background-color: #4CAF50;
color: white;
}
</style>

</head>
<h2>Users Admin Page</h2>

<table id="customers" class="display">
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Role</th>
            <th>Edit User</th>
            <th>Delete</th>
        </tr>
    </thead>
<tbody>
<?php

for($i = 0; $i < count($users); $i++){
    echo "<tr>";
    echo "<td>" . $users[$i]->getId() . "</td>";
    echo "<td>" . $users[$i]->getFirstname() . "</td>";
    echo "<td>" . $users[$i]->getLastname() . "</td>";
    echo "<td>" . $users[$i]->getUsername() . "</td>";
    echo "<td>" . $users[$i]->getRole() . "</td>";
    echo '<td><form action="../admin/EditUser.php" method="post">';
    echo '<input type="hidden" name="userId" value = "' . $users[$i]->getId() . '">';
    echo '<input type="hidden" name="firstName" value = "' . $users[$i]->getFirstname() . '">';
    echo '<input type="hidden" name="lastName" value = "' . $users[$i]->getLastname() . '">';
    echo '<input type="hidden" name="username" value = "' . $users[$i]->getUsername() . '">';
    echo '<input type="hidden" name="userRole" value = "' . $users[$i]->getRole() . '">';
    echo '<input type="submit" value="Edit" >';
    echo '</form></td>';
    echo '<td><form action="../admin/DeleteUser.php" method="post"><input type="hidden" name="userId" value="' . $users[$i]->getId() . '">';
    echo '<input type="hidden" name="username" value="' . $users[$i]->getUsername() . '"><input type="submit" value="Delete"></form></td>';
    echo "</tr>";
}

?>

</tbody>
</table>

<script>
$(document).ready( function () {
    $('#customers').DataTable();
} );
</script>
