<style>
.alta{
    background-color: chartreuse;
    margin: 1em;
    padding: .5em;
}
.baixa{
    background-color: crimson;
    margin: 1em;
    padding: .5em;
}


</style>




<?php


echo "<form>";
echo "<input name='afegir'>";
echo "<select name='clase'>";
echo "<option value='alta'>Alta</option>";
echo "<option value='baixa'>Baixa</option>";
echo "</select>";
echo "<input type='submit' value='afegir'>";
echo "</form>";
 


$db = new mysqli("localhost", "MarioB", "1234", "WebTask");

if (!empty($_GET['afegir'])) {
$stmt = $db->prepare("INSERT INTO TaulaWeb VALUES(?,?)");
$stmt->bind_param("ss", $_GET['afegir'], $_GET['clase']);
$stmt->execute();
}

if (!empty($_GET['eliminar'])) {
$stmt = $db->prepare("DELETE FROM TaulaWeb WHERE Desripcio= ?");
$stmt->bind_param("s", $_GET['eliminar']);
$stmt->execute();
}

foreach ($db->query("SELECT * FROM TaulaWeb") as $fila) {
   


        echo "<li> 
        <p class='${fila['Prioritat']}'>
            ${fila['Desripcio']}
            <a href='?eliminar=${fila['Desripcio']}'>
                <img src='basura.jpg' style='width:22px;height:22px;'>
            </a>
        </p>
    </li>";

}

?>