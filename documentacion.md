# Análisis de Vulnerabilidades en Aplicaciones Web - Práctica No 2

---

En este archivo .md está el análisis o documentación teórico de la Práctica No 2 (INF 633). 

---
## Investigación de casos reales.

### Vulnerabilidades Seleccionadas:
para este punto he seleccionado dos de las vulnerabilidades del listado de Instrucciones de la Práctica:
- Inyección SQL
- Cross-Site Scripting (XSS)
---

#### 1. Inyección SQL en SonyPictures
    - Aplicación o sitio web afectado: SonyPictures.com
    - Vulnerabilidad explotada: Inyección SQL
    - Consecuencias del ataque: Acceso no autorizado a datos como informacion personal incluidas contraseñas no cifradas, direcciones de correos electrónicos, direcciones particulares, fechas de nacimiento de más de 1.000.000 de usuarios, comprometiendo su privacidad.
    - Medidas correctivas que se implementaron posteriormente: Implementación de consultas preparadas, cifrado de datos semsibles, auditorias de seguridad frecuentes y validación estricta de entradas para evitar inyecciones SQL.

**Breve descripción del ataque:** En 2011, Sony Pictures fue víctima de un ataque de inyección SQL realizado por un grupo de hackers conocido como LulzSec. En este caso, LulzSec pudo insertar código SQL en los campos de entrada de la página web de Sony para acceder a las bases de datos. Además este grupo declaro que:
-  "SonyPictures.com quedo a nuestra merced por una simple inyeccion de codigo SQL, una de las vulnerabilidades mas primitivas y comunes, que todos deberıamos conocer a estas alturas."
 
#### 2. Cross-Site Scripting (XSS) en eBay
    - Aplicación o sitio web afectado: eBay
    - Vulnerabilidad explotada: La vulnerabilidad Cross-Site Scripting(XSS) permitió a los atacantes incrustar scripts en los anuncios de productos. Cuando otros usuarios visitaban la página del producto afectado, el script se ejecutaba en sus navegadores.
    - Consecuencias del ataque: Robar las cookies de sesión de los usuarios, redirigir a los usuarios a sitios malicioso y realizar acciones no autorizadas en nombre de los usuarios.
    - Medidas correctivas que se implementaron posteriormente: eBay implementó filtros de entrada y escapado de caracteres en formularios de usuario para prevenir XSS.

**Breve descripción del ataque:** En 2014, se descubrió que el sitio de subastas eBay tenía una vulnerabilidad de Cross-Site Scripting (XSS) que permitía a los atacantes inyectar código JavaScript malicioso en las páginas de productos. Los atacantes lograron incrustar scripts en los anuncios de productos mediante descripciones, aprovechando que el sistema de eBay no validaba ni escapaba adecuadamente el contenido ingresado por los usuarios.

---

## Análisis Crítico

- ***Explica por qué crees que estas vulnerabilidades siguen siendo comunes en las aplicaciones web.***

    Las vulnerabilidades de inyección SQL y Cross-Site Scripting (XSS) en aplicaciones web de empresas muy grandes ya no suelen ser tan comunes, pero en aplicaciones web umpoco mas pequeñas o de microempresas, negocios,etc. aun suelen ser comunes. Porque la seguridad a menudo se implementa en fases tardías del desarrollo, y no desde el principio, lo cual genera brechas que pueden ser explotadas. Tambien porque algunos no suelen darle mucha importancia a este punto con tal que el sistema web pueda funcionar, o la gran cantidad de entradas de usuario no controladas como se debe en plataformas interactivas, que hacen que los sistemas sean más propensos a errores de seguridad como estos dos ambos mencionados anteriormente.

- ***Proporciona un análisis de los métodos de prevención que podrías implementar en el desarrollo de una aplicación web para evitar cada una de las dos vulnerabilidades que seleccionaste en el punto anterior.***

    - Prevencion de Inyección SQL:
        
        - Consultas preparadas o usos de PDO(PHP Data Objects) en PHP: Estas son muy efectivas en el caso de inyecciones SQL ya que separan la estructura de la consulta de los datos ingresados, evitando que el contenido del usuario sea interpretado como código SQL.en PHP se utiliza PDO, una extensión que permite realizar conexiones seguras a bases de datos lo mismo que copnsultas preparadas.
        - Validación y sanitización de entradas: Estas también ayudan a que un atacante no pueda ingresar codigo o consultas SQL ya que validan las entradas con solo caracteres,numeros o textos permitidos en las entradas, donde se puede negar el uso de comillas, barras y demas que podria usar un atacante.
        - Cifrado de datos en la BD: Esto ayuda en caso de que se logre acceder a la base de datos ya que esto hace que se cifren los datos importantes para que el atacante tenga los datos cifrados y no asi en texto plano. Aunque estos se podrían descifrar con el mismo algoritmo de cifrado pero quita más tiempo en caso de ser muchos datos, pero se recomienda usar un cifrado con codigo propio y no uno conocido.
    - Prevención de Cross-Site Scripting (XSS)

        - Escapar y sanitizar todas las entradas: Este metodo es una defensa la cual consiste en procesar las entradas del usuario para eliminar o transformar caracteres que podrían ser interpretados como código (por ejemplo, <, >, &). Este metodo es de mucha ayuda ya que no permite que las entradas puedan usarse como ebtradas de codigo ya que no permitiria caracteres en un lenguaje de programación.
        - Uso de Content Security Policy (CSP): Este metodo tambien podria ser muy efectivo ya que no permite ejecutar un script desde cualquier lugar, este permite al servidor especificar los origenes validos desde donde se pueden cargar scripts, imagenes u otros recursos.

### Conclusión

Este análisis demuestra que muchas vulnerabilidades comunes en aplicaciones web pueden prevenirse mediante prácticas de desarrollo seguro, como la validación y sanitización de datos. Estas técnicas son fundamentales para mejorar la seguridad y proteger los datos del usuario en aplicaciones web.