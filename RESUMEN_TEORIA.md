# SIBW 20/21 - Resumen diapositivas

> Tema 1: Introducción a los sistemas de información basados en web
>
> Tema 2: Tecnologías de desarrollo web
>
> Tema 3: Análisis y diseño de aplicaciones web
>
> Tema 4: Gestión de la información
>
> Tema 5: Estándares y normativas legales aplicables a los entornos web



## TEMA 1: Introducción a los Sistemas de Información Basados en Web

**Internet:** conjunto descentralizado de redes de comunicación interconectadas que utilizan la familia de protocolos TCP/IP, lo cual garantiza que las redes físicas heterogéneas que la componen formen una red lógica única de alcance mundial. 

Sus orígenes se remontan a 1969, cuando se estableció la primera conexión de computadoras, conocida como ARPANET, entre tres universidades en California (Estados Unidos).

#### 1. Modelo de red de Internet

4 capas:

- Capa de aplicación - DNS y HHTP
- Capa de transporte
- Capa de internet - IP
- Capa de acceso a la red

##### PROTOCOLO IP

Asigna una dirección unívoca a cada elemento conectado a la red.

- **IPv4:**
  - Direcciones de 32 bits (4 números entre 0 y 225, separados por puntos)
  - Fijas o dinámicas
  - Se están quedando cortas
  - Algunas direcciones están reservadas a subredes privadas
- **IPv6:**
  - Direcciones de 128 bits, se expresan en hexadecimal separado por :
  - Retrocompatibles

##### SERVICIO DNS

Es una "agenda" que asocia nombres human-readable con direcciones IP

- Servicios estructurados en árbol (varios niveles, mínimo 2)
  - Primer nivel (dcha): .com, .es, .org, .net .
    - Primer nivel de dos letras para paises o regiones (existen excepciones)
    - Priver nivel de tres o más letras para otros usos.
      - Excepciones para paises regiones (.cat, .eus para cataluña y pais vasco).
      - .com, .org ... libres para cualquiera, aunque en teoría representan servicios específicos no existe obligación.
      - .gov, .edu ... restringidos a entidades específicas.
  - Siguientes niveles: divisiones o subdominios.
    - El último (a la izda) suele corresponder a una máquina concreta.

##### FUNCIONAMIENTO HTTP

1. Cliente quiere un recurso, introduce URL en navegador
2. Navegador crea petición http y la envía al servidor web y puerto correspondientes
3. El servidor analiza la petición y obtiene el recurso solicitado
4. El servidor web construye una respuesta http con el recurso
5. El servidor web envía la respuesta al cliente
6. El cliente recibe y procesa la respuesta

##### MENSAJES HTTP

Existen dos tipos:

- **Peticiones**: usan un verbo y especifican el recurso

  - **GET**: para obtener un recurso
    - Se almacenan en historial y caché
    - Se pueden marcar como favoritos
    - Toda la información de la petición se ve en la URL
    - Tiene restricción de longitud
  - **POST**: envía información (puede provocar cambios en el servidor)
    - NO se almacenan en historial o caché
    - NO se pueden marcar como favoritos
    - NO tienen restricción de longitud
  - **PUT**: para añadir recursos
  - **DELETE**: para borrar recursos
  - **HEAD**: igual que GET, pero obtiene solo la cabecera

  Entonces, ¿cuál es más seguro? ¿GET o POST? Ninguno de los dos, son igual de inseguros. Aunque POST no refleje la información en la URL, a nivel de redes se transmite la información exactamente igual.

- **Respuestas**: incluye un código + el recurso solicitado

  - **1xxx - Enunciativo**: la petición se ha recibido y está siendo procesada
  - **2xxx - Éxito**: la acción se ha recibido, procesado y aceptado con éxito
  - **3xxx - Redirección**: se requieren acciones adicionales para continuar con la petición
  - **4xxx - Error en el cliente**: la petición no puede completarse o tiene errores sintácticos
  - **5xxx - Error en el servidor**: el servidor ha fallado a la hora de procesar una petición aparentemente válida

##### URL - UNIFORM RESOURCE LOCATOR

Secuencia de caracteres que permite nombrar recursos de internet.

**Sintaxis**: `scheme://[user[:pass]@]host[:port][/directory[/.../]]/file` , donde los elementos entre corchetes [] son opcionales.

#### 2. Servidores web

Un servidor web o servidor HTTP es un programa informático que procesa una aplicación del lado del servidor, realizando conexiones bidireccionales o unidireccionales y síncronas o asíncronas con el cliente y generando o cediendo una respuesta en cualquier lenguaje o aplicación del lado del cliente.

Ejemplos: Apache, node.js...

------

------

## TEMA 2: Tecnologías de desarrollo web

#### 0. Introducción a tu espacio web

A la hora de elegir un dominio deberíamos tener algunas pautas en mente:

1. Facilidad de lectura y escritura
2. ¿Caracteres ajenos al inglés? (cirílico, caracteres chinos, hindi...)
3. Evitar caracteres no alfabéticos (* ! ?)
4. Evitar palabras que puedan ser confundidas fácilmente 
5. Escoger un top level domain adecuado al contenido de la aplicación

Cuando registramos un dominio es importante asegurarnos que aparecemos como propietarios del dominio (ojo con los dominios regalados, te lo pueden quitar en cualquier momento si les conviene porque técnicamente no eres el propietario). Algunos datos a tener en cuenta:

- Propietario - Registrant
- Contacto administrativo - Administrative contact
- Contacto de pago - Billing contact
- Contacto técnico - Technical contact (es quien mantiene el DNS)

Algunas cosas que necesitaremos para nuestro alojamiento web:

- Espacio de alojamiento
- Base de datos
- E-mail
- Ancho de banda

Y algunas posibilidades a la hora de la gestión de estos elementos:

- Contratar un alojamiento compartido
- Contratar un servidor dedicado (virtual o no)
- Usar un servidor propio y alojarlo en un centro de datos (housing)
- Usar un servidor propio y alojarlo en nuestras infraestructuras
- Usar un servidor gratuito (ojo también, normalmente no tienen escalabilidad incluida, así que si de la noche a la mañana te haces viral te va a salir por un ojo de la cara)

#### 1. Tecnologías web del lado del cliente

Algunas de las tecnologías más utilizadas son HTML, CSS y JS. Es importante mantener separados estos tres componentes.

- **HTML**: HyperText Markup Language. Estructura y contenido a mostrar.
- **CSS**: Cascade Style Sheets. Estética y formato, independiente del contenido.
- **Javascript**: código dinámico del lado del cliente.

##### JAVASCRIPT

Permite ejecutar código en el lado del cliente. Algunas funciones:

- Insertar o modificar contenido y estilos en la página web
- Recoger información del navegador y equipo del cliente
- Reaccionar a eventos generados en el navegador. Eventos comunes:
  - onClick
  - onMouseOver
  - onMouseOut
  - onKeyUp (elementos formulario, <a\>)
  - onChange (elementos seleccionables, cuadros de texto)
  - onFocus (elementos formulario, <a\>)
  - onLoad (<body\>, imágenes)
- Comunicación con el servidor sin recargar la página (Ajax)

###### Ejemplos

> Ejemplos básicos:
> ```html
> <!DOCTYPE html> 
> 	<html> 
> 		<head> 
> 			<title>Ejemplo</title> 
> 		</head> 
> 	<body> 
> 		<h1>Ejemplo de Javascript </h1> 
> 		<script type=”text/javascript”> 
> 		
> 			//EJEMPLO 1 - ALERTA
> 			alert(”Esto es una ventana emergente con mensaje”);
> 			
> 			//EJEMPLO 2 - FECHA
> 			var fechaActual = new Date ( ); 
> 			var mensaje = ”Hoy es ”; 
> 			document.write (mensaje + fechaActual.toDateString());
> 			
> 		</script> 
> 	</body> 
> </html>
> ```
>
> Funciones:
>
> ```html
> <!DOCTYPE html> 
> 	<html> 
> 		<head> 
> 			<title>Ejemplo</title> 
>             <script> 
> 				function getMensajeConFecha(mensaje){
>                     var fechaActual = new Date ( ); 
> 					return mensaje + fechaActual.toDateString();
>                 }			
> 			</script> 
> 		</head> 
> 	<body> 
> 		<h1>Ejemplo de Javascript </h1> 
>         <p>
>             <script type="text/javascript">
>             	document.write(getMensajeFecha("Hoy es"))
>             </script>
>         </p>
> 	</body> 
> </html>
> ```
>
> Referenciar js en fichero aparte:
>
> ```html
> <head> 
>     <script src="funciones.js"></script> 
> </head> 
> ```
>
> Usando el DOM (Document Object Model)
>
> ```html
> <html>
> 	<body> 
> 		<h1 id="encabezado1">Ejemplo de Javascript </h1> 
> 	</body> 
> </html>
> ```
>
> ```javascript
> var objetoTitulo = document.getElementById(”encabezado1”); 
> objetoTitulo.innerHTML = ”Bienvenidos” ;
> 
> //Desde objetoTitulo podemos acceder a parámetros de encabezado1
> console.log( objetoTitulo.className ) ; 
> console.log( objetoTitulo.parentElement ) ; 
> console.log( objetoTitulo.style ) ; 
> console.log( objetoTitulo.tagName ) ; 
> console.log( objetoTitulo.parentElement.children ) ;
> ```
>
> Eventos:
>
> ```html
> <p> link <a href=”#” onmouseover=”alert( ’Yipi Kai Yei Mf’ )”>molesto</a></p>
> ```
>
> Asignación dinámica de manejadores de eventos:
>
> ```html
> <!DOCTYPE html> 
> 	<html> 
> 		<head> 
> 			<title>Ejemplo</title> 
> 		</head> 
> 	<body> 
> 		<h1><a href="web.com" id="miEnlace"></a></h1> 
> 		
>         <script>
>             document.getElementById("miEnlace").onclick = function(event){
>                 alert('foo');
>                 return false;
>             };
> 
>             alert("LALA")
>         </script>
> 	</body> 
> </html>
> ```
>
> 

##### JQUERY

Biblioteca de JS que simplifica la programación e interoperabilidad entre navegadores. Facilita:

- Seleccionar elementos del DOM
- Gestionar eventos
- Manipular el DOM
- Manipular el CSS
- Hacer llamadas AJAX

##### AJAX

Asynchronous Javascript and XML. Técnica de desarrollo web para crear Rich Internet Applications. Una parte importante de la aplicación se ejecuta en el cliente. 

- Asíncrono
- Intercambio de información: XML o JSON
- Interfaz de petición: XMLHttpRequest
- Recomendación: usarlo junto con la biblioteca jQuery

###### Ejemplo

> pruebaAjax.html
>
> ![image-20210620182357649](/home/clara/.config/Typora/typora-user-images/image-20210620182357649.png)
>
> css/estiloEjemploAjax.css
>
> ![image-20210620182419976](/home/clara/.config/Typora/typora-user-images/image-20210620182419976.png)
>
> obtieneDatosAjax.php
>
> ![image-20210620182533206](/home/clara/.config/Typora/typora-user-images/image-20210620182533206.png)
>
> ejemploAjax.js
>
> ![image-20210620182603140](/home/clara/.config/Typora/typora-user-images/image-20210620182603140.png)
>
> ![image-20210620182615574](/home/clara/.config/Typora/typora-user-images/image-20210620182615574.png)

#### 2. Tecnologías web del lado del servidor

La web ha pasado de ser páginas estáticas a dinámicas, ¿cómo generamos el contenido dinámicamente? Podemos usar programas ejecutables en el lado del servidor, o lenguajes de scripting

La idea es componer (controlador) las páginas web (vista) dinámicamente extrayendo información de una fuente de datos (modelo).

##### EJECUCIÓN DE PROGRAMAS EN EL SERVIDOR

CGI, Common Gateway Interface. Para ponerlo en funcionamiento se configura el servidor web para que ante una petición se lance un ejecutable, la salida del ejecutable se manda como respuesta a la petición.

Ventajas e inconvenientes:

- Los ejecutables pueden ser dependientes de la máquina
- Eficiencia si hay que hacer cálculos intensivos
- Dificultad de la programación (es relativamente bajo nivel)

Posibilidades:

- **Python**: cada vez se usa más para el desarrollo web, normalmente usando algún framework como Django o Flask
- **Java Servlets**: programas de java que se ejecutan en el servidor y atienden peticiones HTTP. 
  - Heredan la clase HttpServlet e implementan doGet y doPost
  - Devuelven como respuesta lo que se envie a un Writer (out.println)
  - Normalmente se emplean con el servidor Tomcat

##### LENGUAJES DE SCRIPTING

PHP, ASP, Perl, JSP...

- Son de código interpretado
- Se pueden intercalar con el HTML
- Por defecto, el servidor tiene los scripts en su directorio de páginas web, pero si los identifica como scripts (por su extensión) ejecuta el intérprete

Ventajas e inconvenientes:

- Más alto nivel
- Desarrollo "rápido"
- Pueden complicar la implementación del MVC

###### PHP

Nace en 1994 como un preprocesador de páginas web para darles algo de contenido dinámico

Se ha convertido en uno de los estándares de facto para la web. Existen cantidad de módulos que le dan funcionalidad (por ejemplo, enlaces a casi todas las bases de datos habituales). Es bastante criticado por inconsistencias y malas decisiones de diseño (en principio era sólo una herramienta, su desarrollador nunca planeó que se convirtiera en un lenguaje).

El código PHP se puede embeber en el HTML, pero se ejecutará en el lado del servidor mientras el HTML y JS corre en el cliente.

![image-20210621090657012](/home/clara/.config/Typora/typora-user-images/image-20210621090657012.png)

Características de PHP:

- Siempre incrustado con la etiqueta <?php --- ?\>.
- Variables precedidas de $.
- Variables sin tipo establecido (lenguaje no tipado).
- Sensibilidad a mayúsculas en variables y constantes, no en funciones, clases...
- Existen variables globales importantes aplicadas sobre el entorno o petición HHTP: $_GET, $\_POST, $\_SESSION, $\_ENV...
- `include( )` y `require( )`
- Matrices: son en realidad un mapa ordenado que se puede usar como matriz, lista (vector), pila, cola, diccionario...

Al ser un lenguaje que se puede intercalar con HTML puede ser difícil implementar el MVC. Algunas buenas prácticas:

- Separar totalmente vista de controlador: los ficheros vista (HTML) deben contener el mínimo PHP posible. Los ficheros del controlador **no deben tener** nada de HTML.
- Separar totalmente el modelo del controlador: el modelo encapsula toda la interacción con la bd. Así que en el controlador no debería haber ni una llamada directa a la bd.
  - Una buena posibilidad puede ser usar un ORM (o al menos un acceso a bd orientado a objetos)

###### USO DE UN MOTOR DE PLANTILLAS

Para una mejor separación de la vista y el controlador, es muy recomendable usar un motor de plantillas como Twig.

Twig es un lenguaje libre de plantillas reducido y simple, apto para diseñadores y de fácil aprendizaje. Previene malas prácticas al implementar el MVC.

Tiene herencia, que nos permite reutilizar templates y partes de templates. Creamos una estructura con bloques que podemos redefinir en los hijos. Con la función `parent( )` podemos renderizar el bloque padre.

> Ejemplo básico:
>
> ![image-20210621091725370](/home/clara/.config/Typora/typora-user-images/image-20210621091725370.png)
>
> ------
>
> ![image-20210621091751210](/home/clara/.config/Typora/typora-user-images/image-20210621091751210.png)
>
> Filtros:
>
> ![image-20210621092405583](/home/clara/.config/Typora/typora-user-images/image-20210621092405583.png)
>
> Herencia: templatePadre.html
>
> ![image-20210621092429999](/home/clara/.config/Typora/typora-user-images/image-20210621092429999.png)
>
> Herencia: templateHijo.html
>
> ![image-20210621092602503](/home/clara/.config/Typora/typora-user-images/image-20210621092602503.png)

###### JUGANDO CON EL SERVIDOR

Por defecto Apache estará sirviendo todos los ficheros y directorios en nuestra carpeta base. Por ej. si queremos evitar servir la carpeta templates, añadimos a /etc/apache2/sites-available/000-default.conf:

```php+HTML
<Directory /vagrant/html> AllowOverride all </Directory>
```

y reiniciamos el servidor apache:

> \> sudo service apache2 restart

Ya podemos crear ficheros de configuración en cada carpeta de nuestro sitio web. Por ejemplo, vagrant/html/.htaccess:

```php
RedirectMatch 404 /templates
```

Redirige cualquier acceso a la carpeta /templates a un error 404 - Not found.

También podemos cambiar el sistema de gestión de URLs. Activamos el módulo Rewrite:

> \> sudo a2enmod rewrite
>
> \> sudo service apache2 restart

y en el .htaccess:

![image-20210621094526924](/home/clara/.config/Typora/typora-user-images/image-20210621094526924.png)

Con esto, cualquier URL que no sea un fichero en el servidor se redirige a index.php. Allí:

![image-20210621094558952](/home/clara/.config/Typora/typora-user-images/image-20210621094558952.png)

###### OTROS LENGUAJES DE SCRIPTING

- **ASP**: Active Server Pages. Tecnología propietaria de Microsoft, pensado originalmente para correr sobre IIS y basado en Visual Basic. Actualmente sirve para cualquier lenguaje .NET.
  - Se compila el lenguaje a un lenguaje intermedio (IL, Intermediate Language). De ahí se compila a código máquina con un compilador JIT.
  - El código intermedio impone una serie de restricciones a los lenguajes .NET que lo usen.
- **JSP**: Java Server Pages. Permite insertar código Java en el HTML usando la etiqueta <%---%\>.
  - Internamente emplea servlets
  - El servidor Tomcat transforma la página JSP a un servlet y lo ejecuta. El servlet compilado se cachea.

#### 3. Tecnologías orientadas a servicios

Service Oriented Architecture (SOA). Es el estándar para publicar y usar servicios.

- Los servicios intercambian mensajes XML sobre HTTP.
- Busca el acoplamiento mínimo.
- SOAP: Simple Object Access Protocol. 3 roles: proveedor, consumidor y publicador.

##### REST

Representation State Transfer, un tipo de arquitectura software. 

- Protocolo cliente-servidor sin estado
- Sus operaciones están bien definidas: CRUD sobre POST, GET, PUT, DELETE explícitamente
- Sintaxis universal a través de la URI
- La información se suele enviar en XML o JSON

------

------

## TEMA 3: Análisis y diseño de sistemas web

#### 1. Ingeniería de requisitos

Actividades que llevan a la especificación de las necesidades de usuarios y departamentos interesados, así como las restricciones que recaen sobre dicho sistema. Ojo: normalmente el sistema web tendrá que intractuar con otros sistemas software, o influirá en la manera que trabajan empleados, departamentos... es importante saber delimitar al cliente las cosas que son necesarias por sistema.

Algunas leyes no escritas (pero reales) de la IR:

- La especificación de requisitos es un problema de comunicación
- Los interesados y el equipo de desarrollo no escriben correctamente lo que entienden como requisitos
- La validación de los requisitos se produce tarde
- El usuario ve el producto final tarde
- Los requisitos suelen ser inestables y variables (muy malo para el desarrollador)

##### REQUISITOS FUNCIONALES

Aquellos que determinan qué debe hacer el software, los servicios que debe prestar y a qué datos reaccionar. Por ejemplo:

- Elementos de entrada que tendrá la interfaz web
- Qué funcionalidades tendrá
- Cómo se vinculan las páginas de información entre sí

Se pueden referir a:

- **Requisitos de la organización**: diferentes puntos de vista de la organización o entorno donde se implantará la solución.
- **Requisitos del dominio de la aplicación**: funcionalidad en sí de la aplicación. Contenido de la información, flujo de la información, estructura de la información...
- **Requisitos de navegación**: cómo se pasa entre distintos elementos de información.
- **Requisitos de interacción**: lo referente a la interfaz de usuario.

##### REQUISITOS NO FUNCIONALES

Restricciones o condiciones que se imponen al sistema que no tiene que ver con la funcionalidad (también se los conoce como atributos de calidad). Por ejemplo:

- **Requisitos sobre el producto**: memoria que se puede usar, plataforma sobre la que puede correr, navegadores soportados, resoluciones de pantalla...
- **Requisitos organizacionales**: impuestos por el desarrollador, por ejemplo: qué lenguaje usar, estándares de desarrollo, metodologías...
- **Requisitos externos**: normativas legales aplicables, interacción con sistemas externos...

| Requisito                                                    | Tipo                                   |
| ------------------------------------------------------------ | -------------------------------------- |
| “En las oficinas tenemos W7, W8 y W10 y los usuarios usan tanto Firefox como Chrome” | RNF, plataformas                       |
| “La gestión de pagos con tarjeta se hace con varios bancos distintos” | RNF, interacción con sistemas externos |
| “En 4 meses empieza la temporada fuerte. Necesitamos el producto para ayer” | RNF                                    |
| “Esta es una muestra de los listados que tiene que ofrecer la aplicación” | RF, dominio de la aplicación           |
| “Debe funcionar bien en móviles, ordenadores y tabletas”     | RNF, plataformas                       |
| “Cuando el cliente hace un pedido debe llegar un mensaje al departamento de pedidos y otro al de cobros” | RF, requisito de la organización       |
| “Los productos deben poder clasificarse en familias y sub-familias” | RF, dominio de la aplicación           |

##### EXTRACCIÓN DE REQUISITOS

- **Estudio de viabilidad**: indicado para sistemas novedosos (porque hay más probabilidad de fracaso). Imprescindible tener un experto que conozca el negocio (clientes, distribución, flujo de la información, interacción de los clientes...).
- **Entrevistas**: fundamentales, no solo con el dueño o jefe, sino con el personal de todos los estamentos e incluso clientes (top-down). Hay que tenerlas preparadas, las preguntas abiertas funcionan mejor.
- **Desarrollo conjunto de aplicaciones**: sesiones conjuntas entre usuarios y analistas, se aprovechan dinámicas de grupo para la obtención conjunta de requisitos.
- **Observación directa -  etnografía**: si ya hay un sistema funcionando, observar directamente su funcionamiento para entender cómo se están llevando a cabo actualmente las tareas. Se analiza no sólo el sistema, sino la interacción con los usuarios y la interacción entre estos. Importante aclarar a los usuarios que no es una evaluación personal de cómo trabajan, para que el trabajo se desarrolle normalmente.

##### ELABORACIÓN DEL DOCUMENTO DE REQUISITOS

Una vez obtenida la información hay que clasificar, ordenar, priorizar, documentar y especificar los requisitos. Es tedioso, pero no es trivial. El documento debería incluir una aproximación de estos campos:

- Resumen, Autor 
- Descripción de escenarios comunes 
- Especificaciones detalladas pantalla a pantalla 
- Requisitos no incluidos y cuestiones por resolver 
- Ideas para el diseño 
- Trabajos futuros 
- Requisitos funcionales del usuario 
- Requisitos funcionales del dominio del problema 
- Requisitos no funcionales 

##### NEGOCIACIÓN Y VALIDACIÓN DE LOS REQUISITOS

Es fundamental negociar y validar los requisitos con el cliente. Normalmente querrá que se satisfagan todos, pero a un coste limitado. Puede ser necesaria la firma de un contrato con los mismos: se resalta la importancia de los mismos y se concreta exactamente el alcance del proyecto. Se evitan malentendidos por ambas partes.

Puede ser interesante ofrecer información (desglose) sobre precio y obligatoriedad o no de cada requisito.

##### DIFICULTADES DE EXTRACCIÓN

- **Diferenciar políticas de empresa con requisitos**

  > “Los préstamos se conceden a periodos entre 6 meses y 30 años”
  >
  > Quiere decir...
  >
  > “El sistema debe permitir el periodo de amortización de préstamo, que será de duración finita pero variable”

- **Diferenciar entre requisito y opciones de implementación**

  > “Los tipos de vehículo aparecerán en un desplegable” 
  >
  > Quiere decir...
  >
  > “Se podrá seleccionar el tipo de vehículo”

- **Límites difusos del sistema**: el cliente irá añadiendo requisitos según describe el problema

- **Diferencias del dominio entre cliente y desarrollador**: cada uno es experto en su ámbito, lo que dificulta la comprensión

- **Volatilidad**: los requisitos cambian, nos tenemos que adaptar y gestionar los cambios

- **Problemas no tecnológicos**: cambio de interlocutor, políticas de empresa, prioridades...

#### 2. Diseño de aplicaciones web

Una vez realizada una especificación de requisitos hay que refinar las abstracciones identificadas en la fase previa para organizar los datos, la navegación, la presentación y la arquitectura de la aplicación. Algunas peculiaridades de las aplicaciones web:

- Mayor accesibilidad de la información y servicios (+usuarios simultáneos)
- Interfaz orientada al documento
- Variedad de tecnologías de gestión acceso y procesamiento de datos
- Variedad de tecnologías y motores de visualización
- Arquitectura compleja (sistema distribuido, balanceo de carga...)

##### DISEÑO DE FLUJO DE TRABAJO

Empleamos herramientas conocidas en la ingeniería del software: UML (Lenguaje Unificado de Modelado):

- Diagramas de flujo
- Diagramas de secuencia

##### DISEÑO DE DATOS

En el caso de bd relacional, la conversión de un diagrama E/R a UML es directa. En otros tipos de bd hay que trabajar la conversión.

##### DISEÑO DE LA NAVEGACIÓN

Estructurar las rutas de navegación a través de la información y servicios ofrecidos por nuestro sistema de información web. Aspectos fundamentales:

- Estructura del sitio
- Comportamiento del usuario al navegar (acciones del usuario y eventos que desencadena)

##### DISEÑO DE LA ESTRUCTURA DEL SITIO - IFML

Componentes de cualquier lenguaje de modelado del sitio:

- **Ítems atómicos**: elementos de información con instancias de entidades de datos
-  **Ítems compuestos**: estructuras compuestas de varios ítems atómicos
- **Estructuras contextuales**: estructuras de navegación para acceder a los ítems (menús, índices, metaetiquetas)

IFML, Interaction Flow Modeling Language es un estándar para llevar a cabo el diseño estructural de aplicaciones (no necesariamente web).

Si seguimos el MVC fundamentalmente se encarga de la vista, pero está claro que depende y referencia al modelo y al controlador.

Para el modelado IFML abordamos las siguientes perspectivas:

- Especificación de la estructura de la vista (contenedores, relaciones entre ellos...)
- Especificación del contenido de la vista
- Especificación de eventos (que pueden afectar al estado de la interfaz)
- Especificación de transición de eventos (efectos sobre los eventos de la interfaz)
- Especificación de los parámetros de conexión (dependencias de E/S entre los componentes de la vista y las acciones)

Los diagramas IFML...

- Consisten en uno o más contenedores de vista de alto nivel
- Internamente pueden estructurarse como una jerarquía de sub-contenedores
- Los contenedores pueden contener componentes de la vista (contenido o elementos de entrada de información)
- Los componentes tienen parámetros de entrada y salida. Por ejemplo:
  - Un componente que muestra las propiedades de un objeto tiene como entrada el ID de ese objeto
  - Un formulario tiene como parámetros de salida los valores introducidos
- Los contenedores y componentes se pueden asociar con eventos (indica la interacción con el usuario)

##### DISEÑO DE LA ADAPTACIÓN

Las aplicaciones web serán usadas probablemente desde diversas partes del mundo y bajo muy distintos dispositivos. La adaptabilidad de las mismas es, por tanto, fundamental. La adaptabilidad se refiere a tres cosas:

- **Localización e internacionalización**: idioma, moneda, fecha y hora, aspectos culturales...

  - Locale: localización geográfica en la que sus habitantes comparten idioma y valores comunes
  - Internacionalización i18n: identificación y separación de todos los elementos específicos que componen los locale
  - Localización l10n: adaptación concreta de los elementos identificados en i18n para un locale concreto
    - Idioma (incluye dialectos)
    - Unidades de medida
    - Moneda
    - Fechas
    - Cantidades
    - Direcciones
    - Metáforas
    - Colores
    - Referencias históricas
    - Gestos

  Opciones para la localización e internacionalización en PHP:

  - Crear varias versiones de la web en varios idiomas (nidecoña)
  - Usar ficheros de texto en varios idiomas y cargar el adecuado
  - Utilizar gettext
  - No complicarnos y usar un motor de plantillas con soporte i18n como Twig

- **Personalización y adaptación**: ajustes para cada uno de los usuarios

  - Adaptación de contenidos
  - Acciones de navegación automática
  - Adaptación de la estructura de navegación
  - Adaptación del layout

- **Accesibilidad**: ajustes para personas con discapacidades

  - Desarrollado en el Tema 5

------

-------

## TEMA 4: Gestión de la información

Tipos de información en la WWW:

- **Datos desestructurados**: archivos de texto, vídeo, audio, imágenes, presentaciones... difícil tratamiento y almacenaje en BD
- **Datos semiestructurados**: con cierta estructura, pero no muy rígida. Ej. Currículum Vitae.
- **Datos estructurados**: todos los registros tienen una estructura fija y fuertemente tipada.

#### 1. Gestión de datos estructurados

La opción típica es el modelo relacional. Los SGDB relacionales suelen implementar la mayoría de las funcionalidades necesarias. Algunas opciones son MySQL, PostgreSQL, SQLite, Oracle...

Mucho ojo con la seguridad en PHP, hay que sanear las entradas para evitar inyecciones de código en la base de datos.

#### 2. Gestión de datos semiestructurados

Más complicada que la de datos estructurados. Las opciones son JSON y XML. Los SGDB para estos datos tienen que ser noSQL. Para JSON tenemos MongoDB (modelo de documentos) y para tipos clave-valor existen Cassandra, BigTable...

##### XML

Metalenguaje de marcas para definir lenguajes de marcas, simplificación de SGML. Algunos lenguajes derivados de XML son:

- XHTML
- Google Site Map
- NewsML: News Markup Language
- OOXML: Office Open XML (muy criticado)

###### SINTAXIS XML

Se forma como una jerarquía de contenidos, un árbol etiquetado, ilimitado y ordenado.

- **Elementos**: etiqueta de apertura, contenido textual, etiqueta de fin

  > ![image-20210621172414445](/home/clara/.config/Typora/typora-user-images/image-20210621172414445.png)

- **Atributos**: en la etiqueta de apertura pueden aparecer pares clave-valor

  > ![image-20210621172436873](/home/clara/.config/Typora/typora-user-images/image-20210621172436873.png)

  - Importante: los atributos no están ordenados, el contenido sí. El contenido pueden ser sub-árboles. Los atributos pueden ser complejos

- **Prólogo**: versión de XML, codificación, localización de recursos externos

  > ![image-20210621172634363](/home/clara/.config/Typora/typora-user-images/image-20210621172634363.png)

- **Entidades**: referencias o contenidos asignados a constantes

  > ![image-20210621172659874](/home/clara/.config/Typora/typora-user-images/image-20210621172659874.png)

- **DTD**: Document Type Definition. Mecanismo simple de definición de documentos XML.

  > ![image-20210621173023770](/home/clara/.config/Typora/typora-user-images/image-20210621173023770.png)

- **XML-Schema**: lenguaje de descripción de tipos XML propuesto por W3C. Muy versátil, pero bastante más complicado que los DTDs

  > ![image-20210621173343537](/home/clara/.config/Typora/typora-user-images/image-20210621173343537.png)

  - Permite definición de tipos y de atributos:

    > ![image-20210621173545884](/home/clara/.config/Typora/typora-user-images/image-20210621173545884.png)
    >
    > ![image-20210621173552436](/home/clara/.config/Typora/typora-user-images/image-20210621173552436.png)

###### MATHML

Lenguaje XML para describir fórmulas matemáticas.

![image-20210621174054187](/home/clara/.config/Typora/typora-user-images/image-20210621174054187.png)

###### XSL

Para darle estilo a los documentos XML. Partes de las que consta:

- XSLT: lenguaje para transformar XML
- Xpath: para navegar documentos XML
- XSL-FO: para formatear documentos XML

##### JSON

Formato de texto sencillo para el intercambio de información (subconjunto de la notación literal de objetos de JS). Sintaxis/Tipos de datos disponibles:

- Números
- Cadenas, con comillas dobles, se permiten cadenas de escape
- Booleano
- Valor nulo
- Array, los valores separados por comas y el vector entre corchetes
- Objetos, colecciones no ordenadas de nombre-valor separados por compas y puestos entre llaves. El nombre entre comillas dobles, el valor puede ser cualquier tipo de dato

![image-20210621174655855](/home/clara/.config/Typora/typora-user-images/image-20210621174655855.png)

##### LA WEB SEMÁNTICA

La web semántica es un conjunto de actividades desarrolladas en el seno de W3C con tendencia a la creación de tecnologías para publicar datos legibles por aplicaciones informáticas. 

Se basa en la idea de añadir metadatos semánticos y ontológicos a la WWW. Esas informaciones adicionales -que describen el contenido, el significado y la relación de los datos- se deben proporcionar de manera formal, para que así sea posible evaluarlas automáticamente por máquinas de procesamiento.

###### ONTOLOGÍAS

Una ontología es una descripción formal que proporciona a los usuarios humanos un conocimiento compartido sobre un dominio concreto. Es una definición formal de tipos, propiedades, y relaciones entre entidades que realmente o fundamentalmente existen para un dominio de discurso en particular.

Son útiles para organizar datos, mejorar las búsquedas e integrar información. A continuación, como ejemplo, ontología "universidad":

- **Clases**: profesor, alumno, asignatura, departamento
- **Instancias de clases**: Zerjillo es instancia de profesor, SIBW es instancia de asignatura
- **Relaciones**: imparte(Zerjillo, SIBW)
- **Herencia**: profesor es subclase de personal
- **Restricciones**: !imparte(alumno, asignatura)
- **Restricciones de cardinalidad**: departamento solo tiene un director

###### LENGUAJES PARA LA WEB SEMÁNTICA

- **RDF**: Resource Description Framework. Familia de especificaciones de la W·C originalmente diseñado como un modelo de datos para metadatos. Permite escribir anotaciones sobre un recurso web asociado a una URI.
  - **RDF Schema**: extensión semántica de RDF. Un lenguaje primitivo de ontologías que proporciona los elementos básicos para la descripción de vocabularios.
- **OWL**: Web Ontology Language. Lenguaje marcado para publicar y compartir datos usando ontologísa en la WWW. OWL tiene como objetivo facilitar un modelo de marcado construido sobre RDF y codificado en XML.

#### 3. Gestión de datos desestructurados: búsqueda de información

Es difícil gestionar fuentes de información tan variada como la que hay en la web. ¿Cómo lo hacen los buscadores?

#### RASTREADORES (Crawlers o Spiders)

Son robots que navegan por la web indexando y clasificando el contenido de las mismas. En el fondo es una búsqueda en un grafo (por anchura, profundida o esquemas mixtos).

Un mapa del sitio o sitemap es un archivo XML que describe de forma jerárquica la estructura del sitio. Facilitan la vida a los buscadores.

Para limitar a los buscadores existe el archivo robots.txt: se puede pedir al buscador que parte (o todo) de nuestro sitio no sea indexado.

#### BUSCADORES Y PROCESAMIENTO DE TEXTO

Algunos términos útiles:

- **Tokenización**: extraer palabras
- **Limpieza**: eliminar tokens no útiles
- **Análisis semántico**: se relacionan términos similares
- **Indexación**: asociar términos de búsqueda y términos en el artículo
- Evaluar la relevancia del artículo frente a las palabras de búsqueda

Las técnicas SEO (Search Engine Optimization) son el conjunto de acciones orientadas a mejorar el posicionamiento de un sitio web en la lista de resultados de los buscadores de internet. Trabaja aspectos técnicos como la optimización de la estructura y los metadatos de una web, pero también se aplica a nivel de contenidos, con el objetivo de volverlos más útiles y relevantes para los usuarios

-----

----

## TEMA 5: Estándares y normativas legales aplicables a entornos web

#### 1. Normativas de accesibilidad web (WCAG)

**Accesibilidad web**: conseguir que todo tipo de usuarios (incluyendo los que tengan alguna discapacidad) puedan percibir, entender, navegar e interactuar con el sistema web.

En España existen...

- El Real Decreto 1494/2007: reglamento sobre las condiciones básicas para el acceso a las personas con discapacidad a las tecnologías, productos, y servicios relacionados con la sociedad de la información y medios de comunicación social
- Ley 56/2007: medidas de impulso de la sociedad de la información

##### PAUTAS DE ACCESIBILIDAD PARA EL CONTENIDO WEB WCAG 2.0

Las promueve un subgrupo del W3C. Evolucionan desde la versión 1.0, donde la principal diferencia es la "norma" de neutralidad tecnológica, es decir, que estas pautas se puedan (y deban) aplicar a cualquier tecnología, incluyendo a aquellas ajenas a W3C.

Los criterios que se presentan son verificables, bien manualmente, bien automáticamente.

##### PRINCIPIOS DE ACCESIBILIDAD

Cualquier usuario debe obtener un contenido:

1. **Perceptible** por al menos un sentido
   1. Alternativas textuales para cualquier contenido no textual
   2. Alternativas para multimedia tempo-dependiente
   3. Adaptable, pero sin perder información o estructura
   4. Distinguible a vista y oído, incluyendo distinción entre lo más y menos importante
2. **Operable**: que se pueda interactuar con el contenido
   1. Acceso mediante teclado
   2. Suficiente tiempo
   3. No destellos (para personas fotosensibles)
   4. Navegable, medios que ayuden a navegar, localizar el contenido, y determinar la posición en la que nos encontramos
3. **Comprensible**: legible, entendible, predecible
   1. Legible e inteligible
   2. Predecir
   3. Ayuda a la entrada de datos
4. **Robusto**: contenido lo suficientemente descrito para poder ser leído por lectores y otras tecnologías de asistencia
   1. Compatible, la compatibilidad con los agentes de usuario debe ser máxima (tanto actuales como futuros)

##### NIVELES WCAG 2.0

Se han definido 60 criterios de éxito o puntos de comprobación y verificación:

- **Nivel de conformidad A**: se cumplen los puntos de verificación de la prioridad 1.
  - No especifican cómo se representa la información.
  - Son razonablemente aplicables a cualquier web.
  - Son comprobables de forma automática. Algunos requieren revisión manual.
    - Los criterios de cumplimiento que requieren comprobación manual producen resultados consistentes bajo múltiples verificaciones por personas distintas.
- **Nivel de conformidad AA**: se cumplen los puntos de verificación de la prioridad 1 y 2.
  - Pueden requerir que se presente el contenido de una cierta manera.
  - Son razonablemente aplicables a cualquier web.
  - Son comprobables de forma automática. Algunos requieren revisión manual.
    - Los criterios de cumplimiento que requieren comprobación manual producen resultados consistentes bajo múltiples verificaciones por personas distintas.
- **Nivel de conformidad AAA**: se cumplen los puntos de verificación de la prioridad 1, 2, 3.
  - Son criterios que van más allá de los niveles 1 y 2 y pueden aplicarse para hacer el sitio accesible a más personas, con cualquier discapacidad o un tipo concreto de discapacidad.

Si cumplimos algún nivel WCAG 2.0 incluiremos una declaración al respecto, incluyendo el logotipo. También debemos incluir:

- Fecha en la que se revisó el cumplimiento
- Título, versión y URI de las pautas WCAG 2.0
- Nivel de conformidad alcanzado
- Alcance (número de páginas que lo cumplen)
- Listado de las tecnologías de las que depende el contenido

##### EVALUACIÓN DE LA ACCESIBILIDAD

1. Determinar el alcance de la evaluación
2. Establecer la muestra representativa de las páginas que se van a analizar
3. Evaluación automática
4. Evaluación manual
   - Aplicar listado de puntos de comprobación de pautas
   - Probar múltiples configuraciones de distintos navegadores
   - Técnicas de filtrado:
     - Desactivar imágenes y comprobar texto alterno
     - Desactivar sonido y comprobar texto equivalente (subtítulos, transcripción)
     - Aumentar el tamaño de fuente: ¿el diseño sigue preciso y usable?
     - No es necesario el desplazamiento horizontal en distintas resoluciones y tamaños de ventana
     - Visualizar en escala de grises para comprobar el contraste
     - Acceso en la navegación y funcionalidad con solo teclado
     - Navegar enlaces y controles de formulario, comprobar que los vínculos indican claramente su destino
     - Acceso a navegación y funcionalidad desactivando plugins, scripts...
   - Acceder y examinar páginas con un lector de pantalla y navegadores especiales (ej. solo texto). Toda la información debería estar disponible y con un orden lógico significativo
   - Leer y evaluar contenidos: texto claro, sencillo y adecuado
5. Resumir los problemas y realizar informe

#### 2. Protección de datos

##### LA AGENCIA DE PROTECCIÓN DE DATOS

Es un ente de Derecho Público, con personalidad jurídica propia y plena capacidad pública y privada. Su finalidad principal es velar por el cumplimiento de la legislación sobre protección de datos personales y controlar su aplicación, en especial en lo relativo a los derechos de información, acceso, rectificación y cancelación de datos. 

Sus funciones son:

- Atender las peticiones y reclamaciones de los afectados
- Proporcionar información acerca de sus derechos
- Ejercer potestad sancionadora
- Ordenar el cese o inmovilización de los ficheros que corresponda
- Inspeccionar los ficheros
- Ejercer control y adoptar las autorizaciones que procedan para movimientos internacionales de datos

##### LEY ORGÁNICA 15/1999 DE PROTECCIÓN DE DATOS DE CARACTER PERSONAL

La LOPD pretende garantizar y proteger, en lo que concierne al tratamiento de los datos personales, las libertades públicas y los derechos fundamentales de las personas físicas, y especialmente de su honor e intimidad personal y familiar.

Definiciones:

- Datos de caracter personal
- Tratamiento de datos
- Fichero
- Responsable del fichero
- Afectado o interesado
- Consentimiento del interesado
- Cancelación
- Cesión o comunicación de datos
- Procedimiento de disociación
- Fuentes accesibles al público
- Responsable de seguridad

##### CLASIFICACIÓN DE DATOS PERSONALES

- **Públicos**: conocidos por mucha gente y de fuente o difusión no reconocible.
  - Nombre, apellidos, edad, profesión...
- **Privados**: los que en ocasiones concretas estamos obligados a proporcionar.
  - **Íntimos**: el individuo puede proteger su difusión frente a cualquiera que, de acuerdo con un fin determinado, esté obligado (legalmente) a dar periódica o regularmente en cumplimiento de sus obligaciones cívicas.
  - **Secretos (sensibles, sensibilísimos y sensibilidad especial)**: datos que el individuo no estará obligado a dar a nadie excepto bajo casos excepcionales, expresamente regulados con leyes.
    - **Reservados**: bajo ningún concepto, por ningún motivo, está obligado el titular a darlos a conocer a terceros si no es esa su voluntad.
    - **Profundos**: como los reservados, pero con excepciones.

##### MEDIDAS DE SEGURIDAD EN FUNCIÓN AL TIPO DE DATO

- **Nivel alto**:
  - Ideología, afiliación sindical, religión, creencias, origen racial, salud o vida sexual
  - Datos recabados para fines policiales sin el consentimiento de las personas afectadas
  - Derivados de actos de violencia de género
- **Nivel medio**:
  - Relativos a la comisión de infracciones administrativas o penales
  - Regulados art. 29 de Ley Orgánica 15/1999, solvencia patrimonial y crédito
  - Aquellos de los que sean responsables las administraciones tributarias y se relacionen con el ejercicio de sus potestades tributarias
  - Aquellos de los que sean responsables las entidades financieras y para finalidades relacionadas con la prestación de servicios financieros
  - Aquellos de los que sean responsables las entidades gestoras y servicios comunes de la seguridad social y mutuas
  - Aquellos de los que sean responsables los operadores que presten servicios de comunicaciones electrónicas disponibles al público o exploten redes públicas de comunicaciones electrónicas respecto a los datos de tráfico y localización
  - Aquellos que contengan un conjunto de datos de caracter personal que ofrezcan una definición de las características o de la personalidad de los ciudadanos y que permitan evaluar determinados aspectos de la personalidad o del comportamiento de los mismos
- **Nivel bajo**: cualquier otro
- **Excepciones**: nivel básico para ficheros o tratamientos que requieran datos relativos a la saludo, referentes exclusivamente al grado de discapacidad o la mera declaración de discapacidad del afectado, con motivo de cumplimiento de deberes públicos

#### 3. Textos legales en la web

##### DOCUMENTO DE SEGURIDAD

El “documento de seguridad” es un documento de carácter interno que debe reflejar por escrito todo lo relacionado con las medidas, normas, procedimientos de actuación, reglas y estándares encaminados a garantizar la seguridad de los datos en una organización determinada. 

Dicho documento debe ser elaborado por el responsable del fichero y, en su caso, por el encargado del tratamiento, y es de obligado cumplimiento para todo el personal que tenga acceso a los sistemas de información.

##### INSCRIPCIÓN DE FICHEROS

Siempre que se proceda al tratamiento de datos personales, definidos en el art. 3,a) de la Ley Orgánica 15/1999, como “cualquier información concerniente a personas físicas identificadas o identificables,” que suponga la inclusión de dichos datos en un fichero, considerado por la propia norma (artículo 3.b).), como “conjunto organizado de datos de carácter personal, cualquiera que fuere la forma o modalidad de su creación, almacenamiento, organización y acceso,” el fichero se encontrará sometido a la Ley, siendo obligatoria su inscripción en el Registro General de Protección de Datos, conforme dispone el artículo 26.

##### AVISO LEGAL

Documento que recoge las cuestiones que la Ley de Servicios de la Información (LSSI) obliga a incluir prácticamente en todas las webs, concretamente en aquellos “prestadores de servicios de la sociedad de la información”, es decir personas físicas o jurídicas, que realicen actividades económicas por internet u otros medios telemáticos siempre que la dirección y gestión de su negocio esté centralizada en España o posea una sucursal, oficina o cualquier otro tipo de establecimiento permanente situado en España. Por ejemplo:

- Web corporativa de una empresa.
- Tienda ecommerce.
- Autónomo con una web corporativa (página informativa sobre sus negocios o como tienda online).
- Blog particular si incluye publicidad.

##### POLÍTICA DE PRIVACIDAD

Hay que informar a los usuarios del procedimiento llevado a cabo por la Web para recoger los datos personales, permitiendo ver a los usuario el uso que se les da. Esta Política de Privacidad será aceptada por los usuarios de manera previa en los formularios de recogida de datos, y deberán de ser informados de manera inequívoca, según el artículo 5 de la LOPD:

- De la existencia de un dichero o tratamiento de datos de caracter personal, la finalidad de la recogida de datos y los destinatarios de éstos.
- Del caracter obligatorio o facultativo de su respuesta a las preguntas que les sean planteadas.
- De las consecuencias de la obtención de datos o de la negativa a suministrarlos.
- De la posibilidad de ejercitar los derechos de acceso, rectificación, cancelación y oposición.
- De la identidad y dirección del responsable del tratamiento.

##### CONDICIONES GENERALES DE CONTRATACIÓN Y/O USO

Si tenemos algún tipo de herramienta, asesoramiento online o comercio electrónico, debemos mostrar este texto legal que el usuario deberá aceptar previo a la formalización de la compra, donde se indique:

- Información clara y detallada de los precios, con mención expresa de si se incluyen impuestos o gastos de envío, y su importe.
- Descripción del proceso de compra.
- Obligaciones del comprador y del vendedor.
- Condiciones de la compra, plazos, forma de entrega, forma de pago...
- Soluciones en caso de pedido defectuoso.
- Idioma en el que se va a celebrar el contrato.

Además, la LSSICE obliga a confirmar al comprador la realización de la operación, puede ser expuesta por dos vías:

- E-mail, en un máximo de 24h tras la compra
- Mediante una pantalla de confirmación al finalizar la compra

##### POLÍTICA DE COOKIES

Extracto del apartado 2 del artículo 22 de la LSSI:

> Los prestadores de servicios podrán utilizar dispositivos de almacenamiento y recuperación de datos en equipos terminales de los destinatarios, a condición de que los mismos hayan dado su consentimiento después de que se les haya facilitado información clara y completa sobre su utilización... 
>
> Cuando sea técnicamente posible y eficaz, el consentimiento del destinatario para aceptar el tratamiento de los datos podrá facilitarse mediante el uso de los parámetros adecuados del navegador o de otras aplicaciones, siempre que aquél deba proceder a su configuración durante su instalación o actualización mediante una acción expresa a tal efecto. 
>
> Lo anterior no impedirá el posible almacenamiento o acceso de índole técnica al solo fin de efectuar la transmisión de una comunicación por una red de comunicaciones electrónicas o, en la medida que resulte estrictamente necesario, para la prestación de un servicio de la sociedad de la información expresamente solicitado por el destinatario.

- **Cookies exentas**: 

  - Aquellas estrictamente necesarias para prestar un servicio que el usuario ha solicitado expresamente
    - De entrada del usuario
    - De autenticación del usuario
    - De personalización de la interfaz
    - De cesta de la compra

  - Aquellas necesarias únicamente para permitir la comunicación entre el equipo del usuario y la red
    - De seguridad del usuario
    - De sesión de repr. multimedia
    - De carga
    - Para rellenar un formulario
  - Cuidado con publicidad de terceros y servicios externos (análiticas, contadores de visitas, mapas...)
