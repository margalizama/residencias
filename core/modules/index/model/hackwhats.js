document.getElementsByClassName("input")[1].innerHTML="habia una vez "; // Fills the text box message
var input = document.getElementsByClassName("icon btn-icon icon-send");//Grabs the send button
input[0].click();// Clicks the send 

//Librerias standar en el SDK de Android:
    //Necesario para usar Toolbar y configurar el Tema Material en V14+
    compile 'com.android.support:appcompat-v7:21.0.2'

    //Libreria para usar un RecyclerView
    compile 'com.android.support:recyclerview-v7:21.0.0'

    //Librerias de terceros :

    //Libreria para agregar un Floating Action Button
    compile 'com.getbase:floatingactionbutton:1.2.1'

    //Libreria para volver circular una Imagen
    compile 'de.hdodenhof:circleimageview:1.2.1'

    <?php
$directorio = opendir("oficios"); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
    }
}
?>