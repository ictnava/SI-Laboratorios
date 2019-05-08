<?php
    include("validacionUsuario.php");
    include("baseDatos.php");

    # Cargamos la librería dompdf.
    require_once 'dompdf\autoload.inc.php';

    use Dompdf\Dompdf;
    if(isset($_REQUEST['hidden_html']))
    {
        $html='
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Ejemplo de Documento en PDF.</title>';

        $html.= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
        
        $html.='</head>
        <body>';
        $html.='<h1>Intento</h1>';
        $html.=$_REQUEST['hidden_html'];

        $html.='</body>
        </html>';
    }
    else
    {
        echo "Algo salió mal :(";
    }

    # Contenido HTML del documento que queremos generar en PDF.
    

    

    # Instanciamos un objeto de la clase DOMPDF.
    $mipdf = new Dompdf();

    # Definimos el tamaño y orientación del papel que queremos.
    # O por defecto cogerá el que está en el fichero de configuración.
    $mipdf ->set_paper("A4", "portrait");

    # Cargamos el contenido HTML.
    $mipdf ->load_html(utf8_decode($html));

    # Renderizamos el documento PDF.
    $mipdf ->render();

    # Enviamos el fichero PDF al navegador.
    $mipdf ->stream('pdfs/FicheroEjemplo.pdf', array('Attachment'=>0));
?>