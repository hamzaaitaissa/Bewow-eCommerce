<?php
$conn = mysqli_connect('localhost', 'root', '', 'bewow') or die(mysqli_error($conn));
if ($conn) {
    if (!empty($_POST['idPro']) && !empty($_POST['selectedTable'])) {
        $idPro = $_POST['idPro'];
        $selectedTable = $_POST['selectedTable'];
        if ($selectedTable == 'men') {
            $sql = "SELECT * FROM product_men where idPro=$idPro";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
                $line = mysqli_fetch_assoc($result);
                echo '
                <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Marque</th>
              <th scope="col">Titre</th>
              <th scope="col">Taille</th>
              <th scope="col">Prix</th>


            </tr>
          </thead><tbody><tr>
            
          <td align="center">' . $line['idPro'] . '</td>
          <td align="center"><img src="uploads/' . $line['image'] . '" style="margin:0;width:100px;height:150px" alt=""></td>
          <td align="center">' . $line['marque'] . '</td>
          <td align="center">' . $line['titre'] . '</td>
          <td align="center">' . $line['taille'] . '</td>
          <td align="center">' . $line['prix'] . '.00DH</td>
          <tr>
          <td align="center" colspan=6><a href="updatespecificproduct.php?idProUPWOMEN=' . $line['idPro'] . '&name=product_women">Update</a> <a href="adminupdateproduct.php?idProDELWOMEN=' . $line['idPro'] . '" style="color:red;margin-left:50px">Delete</a></td></tr>
          </tr></tbody>
          </table>
                
                
                ';
            } else {
                echo 1;
            }
        } else {
            $sql = "SELECT * FROM product_women where idPro=$idPro";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
                $line = mysqli_fetch_assoc($result);
                echo '
                <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Marque</th>
              <th scope="col">Titre</th>
              <th scope="col">Taille</th>
              <th scope="col">Prix</th>


            </tr>
          </thead><tbody><tr>
            
          <td align="center">' . $line['idPro'] . '</td>
          <td align="center"><img src="uploads/' . $line['image'] . '" style="margin:0;width:100px;height:150px" alt=""></td>
          <td align="center">' . $line['marque'] . '</td>
          <td align="center">' . $line['titre'] . '</td>
          <td align="center">' . $line['taille'] . '</td>
          <td align="center">' . $line['prix'] . '.00DH</td>
          <tr>
          <td align="center" colspan=6><a href="updatespecificproduct.php?idProUPWOMEN=' . $line['idPro'] . '&name=product_women">Update</a> <a href="adminupdateproduct.php?idProDELWOMEN=' . $line['idPro'] . '" style="color:red;margin-left:50px">Delete</a></td></tr>
          </tr></tbody>
          </table>
                
                
                ';
            } else {
                echo 1;
            }
        }
    }
}
