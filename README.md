### Trabajar laravel con sail
+ Descargar docker desktop y wsl activando la integracion de wsl en docker. Para mac y linux solo se ocupa docker meramente.
+ Crear un proyecto con laravel sail ejecutando curl -s https://laravel.build/mi-proyecto | bash.
+ Cuando se genere abrimos una consola en la raiz y creamos un alias para laravel sail con lo siguiente *alias sail='bash vendor/bin/sail'*
+ Si el alias se pierde hay que agregarlo por default 
```
echo "alias sail='bash vendor/bin/sail'" >> ~/.bashrc
source ~/.bashrc
```
+ Modificamos lo que quieramos y levantamos el proyecto con *sail up* o *sail up -d*.