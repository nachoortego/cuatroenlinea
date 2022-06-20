<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Cuatro en linea


## Resumen
Este proyecto, basado en PHP y utilizando el framework de laravel, se trata de una página web en la que se puede jugar al cuatro en línea. En caso de no saber de qué se trata, puedes leer las <a href="https://www.casualarena.com/es/conecta-4/reglas#:~:text=Se%20juega%20siempre%20entre%202,horizontal%2C%20vertical%20u%20oblicuo%20gana."  target="_blank">reglas del juego.</a> Basado en PHP y utilizando el framework de laravel.


## Requisitos
- DDEV
- Docker Desktop
- Composer

A continuación se detalla la instalación de los primeros 2 requisitos. En cuanto a **Composer**, en caso de no contar con el mismo, su instalación será explicada más adelante.

### Instalación de DDEV
#### Chocolatey
La forma más rapida de instalar DDEV es primero instalando **chocolatey**.
Para hacerlo, en la terminal con permisos administrativos ejecutamos:
```
Get-ExecutionPolicy
```
En caso de que la respuesta haya sido ```Restricted```, ejecutar:
```
Set-ExecutionPolicy AllSigned``` o ```Set-ExecutionPolicy Bypass -Scope Process
```
Luego para finalmente instalar **chocolatey**, ejecutamos la siguiente línea de comando:
```
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))
```

#### DDEV
Con **chocolatey** ya instalado, todo lo que necesitamos para instalar **DDEV** es ejecutar la siguiente línea de comando en la terminal:
```
choco install ddev
```

### Instalación de Docker Desktop
Para instalar **Docker** en nuestro sistema, nos dirigimos al siguiente [enlace](https://www.docker.com/get-started/). Luego, seleccionamos nuestro sistema operativo y seguimos los pasos indicados por el programa. 


## Setup y configuración de DDEV

Lo primero que necesitamos para correr la aplicación es clonar este repositorio, por lo que contando con [git](https://git-scm.com/downloads) instalado, situamos nuestra terminal en el directorio deseado y ejecutamos la siguiente línea:
```
git clone https://github.com/nachoortego/cuatroenlinea.git
```
Para ubicarnos en el directorio de la aplicación, ejecutamos ```cd cuatroenlinea```, y para empezar con la configuración del entorno ejecutamos ```ddev config```. Se nos presentarán tres apartados en los que tenemos que colocar la siguiente información:
```
"Proyect Name: " nombre deseado para el proyecto. Tecla Enter para continuar.

"Docroot Location: " no completar. Tecla Enter para continuar.

"Proyect Type: " colocar 'laravel'. Tecla Enter para terminar.
```
Luego, en caso de no contar con **Composer** en el sistema, ejecutamos:
```
ddev composer install
```
Con esto terminado, ya estamos listos para probar la aplicación.


## Ejecutar Cuatro en línea
Para iniciar el servidor local, ejecutamos:
```
ddev start
```
En caso de obtener algún error relacionado al uso de los puertos, por ejemplo *Unable to listen on required ports, port 433 is already in use*, hay dos posibles soluciones.
- 'Matar' al proceso utilizando el puerto correspondiente.
- Editar el archivo ```ddev/config.yaml``` y cambiar donde dice 443 y 80 por otros numeros, como 4430 y 8000.

Por último, con **DDEV** iniciado correctamente, veremos algo como esto (donde *projectname* se refiere al nombre indicado al configurar **DDEV**):
```
Successfully started projectname
Project can be reached at http://projectname.ddev.site:800 http://127.0.0.1:50536
```
Con ello, nos dirijimos a dicho link, y si vemos una pantalla como la siguiente significa que lo hemos logrado.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://cdn.discordapp.com/attachments/740983198636441710/988505028014800956/unknown.png" width="700"></a></p>

Una vez situados en esta página, para jugar agregamos ```/jugar/1``` a la dirección anteriormente mencionada para poder ver el juego.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://cdn.discordapp.com/attachments/740983198636441710/988505223746183228/unknown.png" width="700"></a></p>

Con esto, la guía está completa. Antes de cerrar la aplicación y para que todo termine correctamente, no olvide de ejecutar:
```
ddev stop
```
Muchas gracias por su atención.
