function culqi() {
   if (Culqi.token) {
      // Imprimir Token
      console.log(Culqi.token.id);
    }

    if(Culqi.error){
       // Mostramos JSON de objeto error en consola
       console.log(Culqi.error);

       alert(Culqi.error.mensaje);
    }
    else{
       // Ruta hacia donde enviaremos el token vía POST
       $.post("culqi-php-develop/examples/02-create-charge.php",
        {token: Culqi.token.id, },
        function(data, status){
            console.log(data);
            if (data=='ok') {
                alert('El Token se creo con exito');
            } else {
                alert('Error');
            }
        });
       }
};