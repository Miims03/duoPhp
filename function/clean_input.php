<?php 
function clean_input($input){
    $input=trim($input);// Eliminar espacios en blanco
    $input=stripslashes($input); // Elimina las barras en un string con comillas escapadas
    $input = str_ireplace("<script>","",$input); //Lo que haces primero es poner lo que quieres buscar en el input , puego lo con lo que vas a reemplazarlo y al final donde se va a ponera buscar
    $input = str_ireplace("</script>","",$input);
    $input = str_ireplace("<script src","",$input);
    $input = str_ireplace("<script type=","",$input);
    $input = str_ireplace("SELECT * FROM","",$input);
    $input = str_ireplace("DELETE FROM","",$input);
    $input = str_ireplace("INSERT INTO","",$input);
    $input = str_ireplace("TRUCANTE TABLE","",$input);
    $input = str_ireplace("DROP TABLE","",$input);
    $input = str_ireplace("DROP DATABASE","",$input);
    $input = str_ireplace("SHOW TABLES","",$input);
    $input = str_ireplace("SHOW DATABASES","",$input);
    $input = str_ireplace("<?php","",$input);
    $input = str_ireplace("?>","",$input);
    $input = str_ireplace("--","",$input);
    $input = str_ireplace("^","",$input);
    $input = str_ireplace("<","",$input);
    $input = str_ireplace("[","",$input);
    $input = str_ireplace("[","",$input);
    $input = str_ireplace("]","",$input);
    $input = str_ireplace("==","",$input);
    $input = str_ireplace(";","",$input);
    $input = str_ireplace("::","",$input);
    $input = strip_tags($input, '<a><b><i><strong><em><p><br><span><img><input><button><select><option>');
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $input=trim($input);
    $input=stripslashes($input);
    return $input;

};