## Electónica Retro.cl
### Sistema de catálogo online con carrito de compras realizado en CodeIgniter
Tienda [Electrónica Retro (Demo)](https://www.electronicaretro.cl)

**Tareas**:
* [x] Cambios visuales (CSS)
* [x] Ajustar decimales en precios
* [x] Agregar productos
* [x] Eliminar productos
* [x] Fijar proporciones de imágenes para mantener cuadrícula
* [x] Crear sitio de administrador
* [ ] Organizar botones del carrito en vista móvil
* [ ] Eliminar entradas de la tabla *shop_session* sin ingresar manualmente a MySQL
* [ ] Eliminar imágenes de artículos eliminados automáticamente
* [ ] Implementar sistema de login
* [ ] Implementar sistema para realizar compra de artículos en carrito.

**Manual de instalación**

#### I.  INTRODUCCION
El siguiente manual le permitirá instalar el sistema de catálogo on-line con carrito de compras. 
El sitio corre sobre el sistema operativo *Mac OS X 10.10.5 versión OS X Server 5.0.15*, que incorpora *MySQL versión 14.14 (distrib. 5.6.35)* y *PHP versión 5.5.38*.
El sitio corre en una máquina configurada como servidor web, con su IP pública la cual es apuntada por el dominio del sitio (www.electronicaretro.cl) a través de un servidor DNS (Se utiliza afraid.org aunque también se puede utilizar otro equivalente como Cloudflare), 
Adicionalmente, posee un certificado SSL gratuito de Let’s Encrypt, este último no es excluyente para realizar la instalación sin embargo es altamente recomendable su uso, de este modo se puede acceder al sitio mediante:
```
https://www.electronicaretro.cl
```

#### II. NOTAS PREVIAS A LA INSTALACION

Se asume que Ud. posee una máquina compatible y conocimientos básicos para montar un servidor web, de lo contrario debe consultar la documentación de su sistema operativo y hardware de red para poder agregar excepciones en firewall, configurar el servidor DNS e instalar el software antes mencionado. 
Además se espera que Ud. pueda realizar instalaciones de software, para lo que debe contar con privilegios de administrador en su sistema.
Las instrucciones pueden variar según su sistema operativo o versión de las herramientas de software utilizadas, 
se recomienda además revisar la documentación de cada herramienta de software.

A pesar de que los componentes de software utilizados son en su mayoría de código abierto y compatibles con diversos entornos y sistemas operativos, 
no se garantiza su funcionamiento en versiones distintas a las mencionadas anteriormente.


#### III. DESCARGAS

Para instalar el sistema de catálogo online con carrito de compra debe descargar los siguientes archivos:

Desde el repositorio: 
* **Código fuente de la página** *(modelos, vistas, controladores, configuraciones, estructura de carpetas de CodeIgniter)* 
* **Dump de base de datos MySQL** *(Incluye estructura, tablas e inserciones de prueba, las que pueden ser posteriormente eliminadas desde el mismo sitio)*

MySQL versión 5.6.35
* Disponible para Windows desde https://downloads.mysql.com/archives/installer/?version=5.6.35 (otras versiones disponibles desde el sitio oficial).

PHP versión 5.5.38 
* Incorporado con OS X Server y otros sistemas operativos, sin embargo se puede descargar desde su sitio web oficial: https://www.php.net/releases/index.php

Adicionalmente, para realizar pruebas en una instalación local, se puede instalar XAMPP, que provee todos los componentes antes mencionados en un entorno local, fácil de instalar, el que puede ser obtenido desde Apache Friends.
* Disponible en https://www.apachefriends.org/download.html

Se recomienda finalmente, contar con algunas herramientas que harán el trabajo con los archivos más amigable, como el editor de texto Sublime Text (https://www.sublimetext.com/) y  el descompresor 7zip (https://www.7-zip.org/)

#### IV. INSTALACIÓN

* Instalación de MySQL. 
Ejecute el instalador obtenido en la sección III, siga los recuadros de instalación, para este sistema, la clave de administrador se debe fijar en *12345678*, si se utiliza otra contraseña, ésta deberá ser especificada en el paso 4.

* Importar base de datos
Abra una instancia de la terminal de su sistema, ejecute mysql -v para verificar que la instalación fue exitosa.
Ubique el archivo electronicaretro.sql obtenido en el paso anterior y navegue hasta la carpeta que lo contiene usando la terminal.
Finalmente ingrese el siguiente comando para importar la base de datos:
```
 mysql -u root -p shoppingcart < electronicaretro.sql
```
Alternativamente, puede acceder manualmente a mysql ejecutando:
```
mysql -u root -p, posteriormente se le solicitará su contraseña (12345678), luego ejecute los siguientes comandos:
CREATE DATABASE shoppingcart;
USE shoppingcart;
```
* Luego abra el archivo electronicaretro.sql con un editor de texto, seleccione todo el contenido y cópielo en la terminal, esto creará una base de datos completa, idéntica y lista para usar con el sitio.

* Descomprima el archivo .ZIP utilizando 7zip o el descompresor nativo de su sistema operativo.

* Copie las carpetas a la raíz del servidor Web
  * Si utiliza XAMPP, copie toda la carpeta descomprimida a la carpeta htdocs, no olvide darle un nuevo nombre a la carpeta, que al descomprimirla se llamará backup.
  * Si utiliza un servidor web, simplemente copie el contenido del .zip a la raíz del servidor web.
  * Si utiliza otra contraseña o usuario para MySQL, debe introducirla en el archivo de configuración, para ello navegue hacia la carpeta application > config y edite el archivo database.php utilizando su editor de texto preferido. En la línea 69 encontrará el campo password que debe ser actualizado con su contraseña de MySQL. ('password' => '12345678')

* (Opcional) Reinicie el equipo y asegúrese que los servicios de MySQL y PHP se están ejecutando.

* Acceda al controlador principal mediante su navegador web, mediante la URL de su dominio o mediante localhost/backup (si utiliza XAMPP, y no cambió el nombre en el paso 4a).

* Puede agregar o eliminar artículos utilizando el enlace de “Administración” en la barra superior del sitio web. 

#### V. NOTAS POSTERIORES A LA INSTALACION

Las secciones del sitio directamente accesibles mediante URL son las siguientes:
* Página de inicio, catálogo.
  * www.electronicaretro.cl/home
* Carro de compras
  * www.electronicaretro.cl/cart
* Panel de administración
  * www.electronicaretro.cl/admin
* Agregar producto
  * www.electronicaretro.cl/add
* Eliminar producto
  * www.electronicaretro.cl/delete
> Nota: Reemplace www.electronicaretro.cl por la URL de su dominio o por localhost si está accediendo de manera local.

* Puede eliminar todos los artículos de muestra accediendo a la consola de MySQL, para lo cual debe ingresar a la terminal de su sistema y ejecutar:
```
mysql -u root -p (ingrese su contraseña)
USE shoppingcart;
DELETE FROM tblproduct;
```
**Este paso no se puede deshacer** , el sistema informará la cantidad de entradas eliminadas.
Similarmente, puede eliminar todos los carritos de compra almacenados ejecutando en la consola de MySQL: 
```
DELETE FROM shop_session;
```

3. Las imágenes subidas al servidor utilizando la sección de administración del sitio, se almacenan en la carpeta *productimg* en la raíz de los archivos, se debe eliminar manualmente las imágenes pertenecientes a productos eliminados del catálogo.


**Puede obtener más información y soporte técnico mediante correo electrónico a admin@electronicaretro.cl**




