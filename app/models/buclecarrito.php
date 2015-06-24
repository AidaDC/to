<?php
foreach($_SESSION['carrito'] as $value)
        {
        $aaa.= ('<td>' . $_SESSION['carrito'][$i][0] . '</td><td>' . $_SESSION['carrito'][$i][1] . '</td>
                 <td>' . $_SESSION['carrito'][$i][2] . ' € </td><td>' . $_SESSION['carrito'][$i][3] . '</td></tr>');
        $p_final = $p_final + $_SESSION['carrito'][$i][2];
        $aaa.= (' <input type="text" style="display:none;" id="lib' . $x . '" name="lib' . $x . '" value="' . $_SESSION['carrito'][$i][0] . '">');
        $x++;
        $i++;
        }

 $aaa.= ('<tr><td colspan="2">Introduce la tarjeta: </td><td colspan="2"><input type="text"  id="tarjetacredito" name="tarjetacredito" value="" minlength="16" maxlength="16" required></td>
          <tr><td colspan="2">Precio Total: </td><td>' . $p_final . ' € </td>
          <td>
          <input type="text" style="display:none;" id="precio" name="precio" value="' . $p_final . '"> 
           <input id="rcompra" type="submit" value="Realizar la compra" name="enviar" > <a id="scomprando" href="'.APP_W.'">Seguir Comprando</a></form></td></tr><br/>');


      $aaa.= '</table>';
      $_SESSION['carrito_final'] = $aaa;

?>