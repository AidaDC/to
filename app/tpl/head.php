<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="utf-8">
       <?php  header("Content-Type: text/html;charset=utf-8"); ?>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $titol;?></title>
        <meta name="description" content="Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  type="text/css" href="<?= APP_W.'pub/theme/k/css/app.css'; ?>">
    <link href='http://fonts.googleapis.com/css?family=Roboto:100|Open+Sans' rel='stylesheet' type='text/css'>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<!-- autocomplete -->



 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="pub/theme/k/js/jquery.validate.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript">

    jQuery.validator.addMethod("pattern", function(value, element, param) {
          if (this.optional(element)) {
            return true;
          }
          if (typeof param === 'string') {
            param = new RegExp('^(?:' + param + ')$');
          }
          return param.test(value);
        }, "Formato no válido.");


    $(document).ready(function(){
                
         $("#login").click(function(){
        
        $("#logs").toggle();
        })  

        $("#masdet").click(function(){
        
        $("#detalles").toggle();
        })

          $("#titulos").click(function(){
        
        $("#menu").toggle();
        })  



          $("#princip").click(function(){
        
        $("#menu2").toggle();
        })  


        var url="sys/conexion.php";         
        var localizaciones = new Array();
        var cont=0;      
        $.getJSON(url,function(msg){
            $.each(msg, function(i,lista){
                var name= JSON.stringify(lista.nombre);
                var name = name.replace('"', '');
                var name = name.replace('"', '');
                localizaciones[cont]=name;
                cont++;             
            });
        
            $( "#poblacion" ).autocomplete({
                source: localizaciones
          
            });

        });
        
        
        
        
   
       $("#formregister").validate({
            rules: {
                nombre: "required",
                apellidos: "required",
                email: {
                required:true,
                pattern:/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/
                },
                telefono:"required",
                dni:{
                required:true,
                pattern: /^((\d{8}([A-Z]|[a-z])))$/
                },
                poblacion: "required",
                direccion:"required",
                nusuario:"required",
                password: {
                required: true,
                minlength: 5
                },
                rpassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                cpostal:{
                    required:true,
                    number:true,
                    minlength:5,
                    maxlength:5
                }
            },
            messages: {
                nombre: "Debes introducir un nombre",
                apellidos: "Debes introducir un apellido",
                poblacion:" Debes introducir una poblacion",
                direccion:"Debes introducir la direccion",
                email: {
                required: "Debes introducir el email",
                pattern: "El email es incorrecto"
                },
                telefono:{
                    required: "Debes introducir el telefono",
                    },
                dni:{
                required:"Debes introducir un DNI",
                pattern:"El dni debe estar formado por 8 numeros y 1 letra"    
                },
                cpostal: {
                    required: "Debes introducir el código postal",
                    minlength: "Mínimo 5 carácteres",
                    maxlength: "Máximo 5 carácteres"
                },
                password: {
                    required: "Debes introducir la contraseña",
                    minlength: "Mínimo de 5 carácteres"
                },
                rpassword: {
                    required: "Debes introducir la contraseña",
                    minlength: "Mínimo de 5 carácteres",
                    equalTo: "Las contraseñas tienen que ser identicas"
                },
                nusuario:"Debes introducir un nombre de usuario"
               

            }
        });

        $("#dni").keyup(function(){
         pdni= $('#dni').val();
        
         if(pdni!=""){
                    $.ajax({
                        type:  'POST',
                        url:   'sys/validardni.php', //validación con mysql
                        data:  { dni: pdni}
                    }).done(function( msg ) {
                        if(msg=="DNI disponible"){
                             $("#dni").css("background-color","green"); 
                             $("#dni").css("opacity", 0.6); 
                             $("#dni").css("border",'2px solid green');  
                        }else{
                            $("#dni").css("background-color","red");
                            $("#dni").css("opacity", 0.6); 
                             $("#dni").css("border",'2px solid red');
                        }
                        $("#ldni").html(msg);
                    })

                    }else{
            $("#ldni").html('');
         }
        
        })

         $("#email").keyup(function(){
         pemail= $('#email').val();
        
         if(pemail!=""){
                    $.ajax({
                        type:  'POST',
                        url:   'sys/validaremail.php', //validación con mysql
                        data:  { email: pemail}
                    }).done(function( msg ) {
                        if(msg=="Email disponible"){
                             $("#email").css("background-color","green"); 
                             $("#email").css("opacity", 0.6); 
                             $("#email").css("border",'2px solid green');  
                        }else{
                            $("#email").css("background-color","red");
                            $("#email").css("opacity", 0.6); 
                             $("#email").css("border",'2px solid red');
                        }
                        $("#lem").html(msg);
                        // $("#nusuario").css("background-color","green");
                        elemento.attr("border","1px solid red");
                    })

                    }else{
            $("#lem").html('');
         }
        
        })


         $("#nusuario").keyup(function(){
         pusuario= $('#nusuario').val();
         
       
         if(pusuario!=""){
                        $.ajax({
                        type:  'POST',
                        url:   'sys/validarusuario.php', //validación con mysql
                        data:  { nusuario: pusuario}
                    }).done(function( msg ) {
                        if(msg=="Nombre de usuario disponible"){
                             $("#nusuario").css("background-color","green"); 
                             $("#nusuario").css("opacity", 0.6); 
                             $("#nusuario").css("border",'2px solid green');  
                        }else{
                            $("#nusuario").css("background-color","red");
                            $("#nusuario").css("opacity", 0.6); 
                             $("#nusuario").css("border",'2px solid red');
                        }
                        $("#lnu").html(msg);
                        // $("#nusuario").css("background-color","green");
                        elemento.attr("border","1px solid red");
                    })
         }else{
            $("#lnu").html('');
         }
         
        })

    
        $("#mod").click(function (){
        $("#nif").attr("disabled",false);
        })

        $("#mod").click(function (){
        $("#isbn").attr("disabled",false);
        })

         $("#mods").click(function (){
        $("#imagen").attr("disabled",false);
        })

     




    });
 



</script>
    </head>