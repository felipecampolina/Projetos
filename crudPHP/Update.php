<?php
include "config.php";
$sql = "SELECT *FROM users";
$result = $conn->query($sql);
?>



<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { // retorna matriz com conjunto de dados
?>
        <tr>
            <td><?php echo $row['id']; ?> </td>
            <td><?php echo $row['firstname']; ?> </td>
            <td><?php echo $row['lastname']; ?> </td>
            <td><?php echo $row['email']; ?> </td>
            <td><?php echo $row['gender']; ?> </td>
            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">
                    Edit</a>&nbsp; <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">
                    Delete</a></td>
        </tr>
<?php }
}
