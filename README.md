<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Cuatro en linea
Este proyecto, basado en PHP y utilizando el framework de laravel, se trata de una página web en la que se puede jugar al cuatro en línea. En caso de no saber de qué se trata, puedes leer las <a href="https://www.casualarena.com/es/conecta-4/reglas#:~:text=Se%20juega%20siempre%20entre%202,horizontal%2C%20vertical%20u%20oblicuo%20gana."  target="_blank">reglas del juego.</a> Basado en PHP y utilizando el framework de laravel.

## Requisitos
- DDEV
- Docker Desktop
- Composer

A continuación se detalla la instalación de los primeros 2 requisitos. En cuanto a **Composer**, en caso de no contar con el mismo, su instalación será explicada más adelante.
### Instalación de DDEV
#### Chocolatey
La forma más rapida de instalar DDEV es primero instalando **chocolatey**.
Para hacerlo, en la terminal con permisos administrativos ejecutamos
```Get-ExecutionPolicy```
En caso de que la respuesta haya sido ```Restricted```, ejecutar:
```Set-ExecutionPolicy AllSigned``` o ```Set-ExecutionPolicy Bypass -Scope Process```
Luego para finalmente instalar **chocolatey**, ejecutamos la siguiente línea de comando
```Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))```

#### DDEV
Con **chocolatey** ya instalado, todo lo que necesitamos para instalar **DDEV** es ejecutar la siguiente línea de comando en la terminal:
```choco install ddev```

### Instalación de Docker Desktop
Para instalar **Docker** en nuestro sistema, nos dirigimos al siguiente [enlace](https://www.docker.com/get-started/). Luego, seleccionamos nuestro sistema operativo y seguimos los pasos indicados por el programa. 

