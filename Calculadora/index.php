<?php
    session_start();  
    
    $resultado = "";
    $valor1 = "";
    $valor2 = "";
    $operador = "";
  

    if(isset($_POST['tela'])){
        $_SESSION['tela'] = $_POST['tela'] . $resultado;
    }
    //Guarda o valor 1
    if(isset($_POST['numero']) && $_SESSION['operador'] == ""){
        $_SESSION['numero'] = $_POST['numero'];
        $_SESSION['tela'] = $_SESSION['tela'] . $_SESSION['numero'];
        $valor1 = $_SESSION['tela'];
        $_SESSION['valor1'] = $valor1;
    } 
    //Guarda o valor 2
    if(isset($_POST['numero']) && $_SESSION['operador'] != ""){
        $_SESSION['numero'] = $_POST['numero'];
        $_SESSION['tela'] = $_SESSION['tela'] . $_SESSION['numero'];
        $valor2 = $valor2 . $_SESSION['numero'];
        $_SESSION['valor2'] = $valor2;
    }else{
        $_SESSION['tela'] = $_SESSION['tela'] . $resultado;
    }
    //Guardar o operador
    if(isset(($_POST['operador']))){
        $operador = "+";
        $_SESSION['operador'] = $_POST['operador'];
        $valor1 = $_SESSION['tela'];
        $_SESSION['tela'] = $_SESSION['tela'] . $_SESSION['operador'];
    }
    //faz as contas
    if (isset($_POST['resultado'])) {
        $_SESSION['resultado'] = $_POST['resultado'];
		$_SESSION['tela'] = $_SESSION['tela'] . $_SESSION['resultado'];
		switch ($_SESSION['operador']) {
			case "+":
				$resultado = (int)$_SESSION['valor1'] + (int)$_SESSION['valor2'];
				break;
			case "/":
				$resultado = (int)$_SESSION['valor1'] / (int)$_SESSION['valor2'];
				break;
			case "-":
				$resultado = (int)$_SESSION['valor1'] - (int)$_SESSION['valor2'];
				break;
			case "x":
				$resultado = (int)$_SESSION['valor1'] * (int)$_SESSION['valor2'];
				break;
		}
        $_SESSION['tela'] = $_SESSION['tela'] . $resultado;
	}
    //Finaliza a sessão e inicia novamente
    if(isset($_POST['fim'])){
        session_destroy();
        session_start();
        $_SESSION['tela'] = "";
        $_SESSION['operador'] = "";
        $operador = "";
    }

?>
<link rel="stylesheet" href="estilo.css">
<div>
        <form method="POST">
        <table>           
            <tbody>
                <tr class="tela">
                    <td colspan="4"><input type="text" name="tela" value="<?php echo $_SESSION['tela'] ?>" readonly></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="CE" name="fim"></td>
                    <td><input type="submit" value="C"  name="fim"></td>
                    <td><input type="submit" value="/"  name="operador"></td>
                <tr>
                <tr>
                    <td><input type="submit" value="7" name="numero"></td>
                    <td><input type="submit" value="8" name="numero"></td>
                    <td><input type="submit" value="9" name="numero"></td>
                    <td><input type="submit" value="x" name="operador"></td>
                <tr>
                <tr>
                    <td><input type="submit" value="4" name="numero"></td>
                    <td><input type="submit" value="5" name="numero"></td>
                    <td><input type="submit" value="6" name="numero"></td>
                    <td><input type="submit" value="-" name="operador"></td>
                <tr>
                <tr>
                    <td><input type="submit" value="1" name="numero"></td>
                    <td><input type="submit" value="2" name="numero"></td>
                    <td><input type="submit" value="3" name="numero"></td>
                    <td><input type="submit" value="+" name="operador"></td>
                <tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="0" name="numero"></td>
                    <td></td>
                    <td><input type="submit" name="resultado" value="="></td>
                <tr>
            </tbody>
        </table>
</form>
</div>