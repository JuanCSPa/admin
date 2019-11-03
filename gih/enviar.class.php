<?php
class enviar {
    //email del emisor
    var $de;
    //email del receptor
    var $para;
    //asunto
    var $asunto;
    //archivo
    var $archivo;
    //conjunto de datos a sustituir en el template
    var $valores;
    //nombre del template
    var $template;
    //nombre input file
    var $file;
    //enviar el mensaje
    private $sender;
    //url para redireccionar
    private $url;
    //función constructora
    public function __construct(){
        //cada uno de ellos es el parámetro que enviamos desde el formulario
        $this->de = $de;
        $this->para = $para;
        $this->asunto = $asunto;
        $this->archivo = $archivo;
        $this->valores = $valores;
        $this->template = $template;
        $this->file = $file;
    }
    //método enviar con los parámetros del formulario
    public function enviar($de,$para,$asunto,$archivo,$file,$template,$valores){
            $bool = '';
            //creamos el mensaje
            $contenido = $this->load_page($template);
            $contenido = $this->replace($contenido,$valores);
            //archivo necesario para enviar los archivos adjuntos
            require_once 'adjuntar.class.php';
            //enviamos el mensaje           (emisor,receptor,asunto,mensaje)
            $this->sender = new adjuntar($de, $para, $asunto, $contenido);

            //cantidad de archivos que incorpora el input
            $cantidad = count($_FILES[$file]['tmp_name']);
            //si existe adjunto
            if($cantidad > 0) {
                $i = 0;
                while ($i < $cantidad) {
                    //añadimos texto al nombre original del archivo
                    $dir_subida = 'fichero_';
                    //nombre del fichero creado -> fichero_nombreArchivo.pdf
                    $fichero_ok = $dir_subida . basename($_FILES[$file]['name'][$i]);
                    //y lo subimos a la misma carpeta
                    move_uploaded_file($_FILES[$file]['tmp_name'][$i], $fichero_ok);
                    //agregamos el archivo $i al correo
                    $this->sender->attachFile($fichero_ok);
                    //eliminamos el fichero de la carpeta con unlink()
                    //si queremos que se guarde en nuestra carpeta, lo comentamos o borramos
                    unlink($fichero_ok);
                    //incremente en cada ciclo
                    $i++;
                }
            }

            //enviamos el email con el archivo adjunto
            $bool = $this->sender->send();
            //redireccionamos a la misma url conforme se ha enviado correctamente con la variable si
            $_retur['success'] = $bool;
            $_retur['msg'] = 'Tu solicitud se envio correctamente, a la brevedad nos comunicaremos.';
            return $_retur;
    }

    public function replace($template,$_DICTIONARY){
        foreach ($_DICTIONARY as $clave=>$valor) {
            $template = str_replace(':'.$clave.':', $valor, $template);
        }
        return $template;
    }

    public function load_page($page){
        return file_get_contents($page);
    }

}
?>
