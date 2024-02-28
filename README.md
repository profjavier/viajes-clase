
<h1 align="center" style="color: #ff2e47">
VIAJES-CLASE
</h1>

<p>Esta es una aplicación básica de aprendizaje de laravel. </p>


## Funcionalidades implementadas

A continuación se indican las funcionalidades que utiliza esta aplicación:

<ul>
    <li>Uso de fakers y seeders. ClientesSeeder genera las fotos aleatoriamente tomando las fotos desde el directorio default-fotos</li>
    <li>Uso de migraciones, modelos y controllers</li>
    <li>Autenticación con Laravel Breeze</li>
    <li>Menus</li>
    <li>Funciones CRUD</li>
    <li>Utilizacion de componentes personalizados</li>
    <li>Previsualización de imágenes antes del upload</li>
    <li>Upload de fotos de clientes.
        <ul>
            <li>La subida no se realiza a la zona pública para proteger las fotos</li>
            <li>Se utiliza DownloadController para mostrar las imágenes</li>
            <li>El directorio de subida se establece debajo de storage/app</li>
            <li>Se deben configurar las siguientes constantes en el archivo .env
                <ul>
                    <li>DIR_UPLOAD="upload/"</li>
                    <li>DIR_UPLOAD_CLIENTES="${DIR_UPLOAD}clientes/"</li>
                    <li>DIR_UPLOAD_CLIENTES_FOTOS="${DIR_UPLOAD_CLIENTES}fotos/"</li>
                    <li>DIR_UPLOAD_EMPLEADOS="${DIR_UPLOAD}empleados/"</li>
                    <li>DIR_UPLOAD_VIAJES="${DIR_UPLOAD}viajes/"</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>

<hr>

Clases de Desarrollo en entorno Servidor.<br>
I.E.S. Castelar<br>
Badajoz
