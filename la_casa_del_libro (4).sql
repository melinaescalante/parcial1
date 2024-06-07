-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2024 a las 12:52:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `la_casa_del_libro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `autor_nombre` varchar(256) NOT NULL,
  `autor_biografia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id`, `autor_nombre`, `autor_biografia`) VALUES
(3, 'Louisa May Alcott', 'Louisa May Alcott fue una escritora estadounidense, reconocida por su novela Mujercitas. Comprometida con el movimiento abolicionista y con el sufragismo, escribió bajo el seudónimo de A. M. Barnard una colección de novelas y relatos en los que se tratan temas tabúes para la época como el adulterio y el incesto.​'),
(4, 'Elizabeth Benavent', 'Elísabet Benavent (Gandía, Valencia, 3 de julio de 1984), conocida como Beta Coqueta, es una escritora española de novelas de comedia romántica.\r\nEs la autora de varias novelas en los que destaca la saga En los zapatos de Valeria. Entre todas sus novelas ha vendido más de 5 millones de ejemplares y se posiciona como una de las escritoras más vendidas de la literatura contemporánea española.'),
(5, 'Taylor Jenkins Reid', 'Taylor Jenkins Reid es una escritora, productora de televisión y guionista estadounidense. Escribe principalmente romance y sus obras más destacadas son Los siete maridos de Evelyn Hugo y Todos quieren a Daisy Jones.'),
(6, 'Hanya Yanagihara', 'Hanya Yanagihara es una autora y editora estadounidense, conocida por sus novelas \"A Little Life\" (en español, \"Tan poca vida\") y \"The People in the Trees\" (en español, \"La gente en los árboles\"). Nacida el 20 de septiembre de 1974 en Los Ángeles, California, Yanagihara ha ganado reconocimiento por su estilo literario y su capacidad para abordar temas complejos y emocionales en sus obras.'),
(7, 'Anna Huang', 'Anna Huang es autora de la serie más vendida según USA Today, Publishers Weekly, Globe and Mail y Amazon. Escribe novelas contemporáneas de temática romántica y erótica. Sus historias pueden ser tremendamente optimistas o muy oscuras, pero siempre tienen un final feliz acompañado de cotilleos y buenos repasos a chicos guapos. Además de leer y escribir, Anna adora viajar, está obsesionada con el chocolate caliente y mantiene varias relaciones simultáneas con novios imaginarios.'),
(8, 'Joël Dicker', 'Joël Dicker es un autor suizo conocido por sus novelas de misterio y suspenso. Nació el 16 de junio de 1985 en Ginebra, Suiza. Dicker ha ganado reconocimiento internacional por su narrativa intrigante y su habilidad para construir tramas complejas que mantienen a los lectores al borde de sus asientos.'),
(9, 'Sarah J Maas', 'Sarah J Maas es una autora estadounidense de novelas de fantasía, conocida por sus series populares \"Throne of Glass\" (en español, \"Trono de Cristal\") y \"A Court of Thorns and Roses\" (en español, \"Una corte de rosas y espinas\"). Nació el 5 de marzo de 1986 en Nueva York y ha ganado reconocimiento por sus mundos de fantasía complejos y sus personajes bien desarrollados.'),
(10, 'John Boyne', 'John Boyne es un autor irlandés conocido por sus novelas tanto para adultos como para jóvenes. Nació el 30 de abril de 1971 en Dublín, Irlanda. Boyne ha ganado reconocimiento internacional, especialmente por su novela \"The Boy in the Striped Pyjamas\" (en español, \"El niño con el pijama de rayas\"), que ha sido adaptada a una película y traducida a numerosos idiomas.'),
(11, 'Jessa Hastings', 'Jessa Hastings es una autora contemporánea conocida por sus novelas de romance y ficción contemporánea. Ha ganado popularidad, especialmente en las plataformas de redes sociales y entre los lectores jóvenes. Aunque no tiene una larga trayectoria literaria como algunos autores mencionados anteriormente, su estilo fresco y emotivo ha resonado con un amplio público.'),
(12, 'Chloe Walsh', 'Chloe Walsh es la autora bestseller de Los chicos de Tommen, que ha sido un boom en TikTok, Goodreads y Amazon. Lleva una década escribiendo romance contemporáneo, tanto juvenil como new adult, y sus libros se han traducido a múltiples idiomas. Es una gran amante de los animales, la música y las series de televisión, pero lo que más le gusta es pasar tiempo con su familia. Es una gran defensora de la salud mental. Vive en Cork (Irlanda) con su familia.'),
(13, 'Rebecca Yarros', 'Rebecca Yarros es autora bestseller de The New York Times y de USA Today. Sus más de quince novelas han sido aclamadas tanto por medios como Publishers Weekly y Kirkus Reviews como por los lectores. Su familia ha servido en el ejército durante dos generaciones, por lo que Rebecca admira a los héroes militares y tiene la fortuna de estar casada con uno desde hace más de veinte años. Es madre de seis niños y vive en Colorado en compañía de su terco bulldog inglés, sus dos feroces chinchillas y su gata Artemis, que reina sobre toda la familia. En 2019 Yarros fundó, junto con su marido, la organización sin ánimo de lucro One October, dedicada a una de sus pasiones: ayudar a niños y niñas del sistema de acogida y adopciones familiares de Estados Unidos.'),
(14, 'Freida McFadden', 'Freida McFadden es médica en ejercicio y está especializada en lesiones cerebrales. Ha escrito varios thrillers psicológicos best sellers que han llegado al número uno de Amazon. Vive con su familia y su gato negro en una casa centenaria de tres pisos que mira hacia el océano con escaleras que crujen y gimen a cada paso y donde nadie podría oírte gritar. A menos que grites muy fuerte..., tal vez'),
(15, 'Colleen Hoover', 'Colleen Hoover es una autora estadounidense muy conocida por sus novelas de romance contemporáneo y ficción para jóvenes adultos. Nació el 11 de diciembre de 1979 en Sulphur Springs, Texas. Hoover ha ganado una gran cantidad de seguidores y ha logrado numerosos bestsellers del New York Times desde el inicio de su carrera literaria.'),
(16, 'Juan Gómez Jurado', 'Juan Gómez Jurado es un autor y periodista español conocido por sus novelas de thriller y suspense. Nació el 16 de diciembre de 1977 en Madrid, España. Sus obras han sido traducidas a numerosos idiomas y han alcanzado gran éxito tanto en España como internacionalmente.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `editorial_nombre` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `editorial_nombre`) VALUES
(1, 'Planeta'),
(2, 'Montena'),
(3, 'Molino'),
(4, 'Alianza'),
(5, 'Suma'),
(6, 'Ediciones B'),
(7, 'Urano'),
(8, 'Lumen'),
(9, 'Crossbooks'),
(10, 'DelBolsillo'),
(11, 'Salamandra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genero_tipo` enum('Romance','Drama','Fantasia','Thriller') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero_tipo`) VALUES
(1, 'Romance'),
(2, 'Drama'),
(3, 'Fantasia'),
(4, 'Thriller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `autor_id` bigint(20) UNSIGNED NOT NULL,
  `sinopsis` mediumtext NOT NULL,
  `portada` varchar(256) NOT NULL,
  `pages` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `editorial_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `autor_id`, `sinopsis`, `portada`, `pages`, `price`, `editorial_id`) VALUES
(1, 'Una Corte de Rosas y Espinas', 9, 'Feyre Archeron, una cazadora de diecinueve años, mata a un lobo en el bosque solo para descubrir que era una criatura fae disfrazada. Como castigo por su acto, es llevada al reino de Prythian por Tamlin, un poderoso High Fae y Señor de la Corte Primavera. A medida que Feyre se adapta a su nueva vida, comienza a desentrañar los secretos del mundo fae, descubriendo que no todo es lo que parece.', 'acotar.jpg', 480, 25000, 1),
(2, 'Mujercitas ', 3, 'Amy, Jo, Beth y Meg son cuatro hermanas que atraviesan Massachussets con su madre durante la Guerra Civil\r\n, unas vacaciones que realizan sin su padre evangelista itinerante. Durante estas vacaciones las adolescentes descubren el amor y la importancia de los lazos familiares.', 'mujercitas.webp', 500, 15000, 4),
(3, 'Un Cuento Perfecto', 4, 'Margot y David provienen de mundos diferentes. Ella es heredera de un imperio hotelero.\r\nÉl debe desempeñar tres trabajos para llegar a fin de mes. Pero cuando sus caminos se unen, se dan cuenta de que solo entre ellos pueden ayudarse a recuperar el amor de sus vidas.', 'cuentoperfecto.webp', 850, 28000, 5),
(4, 'Los siete maridos de Evelyn Hugo', 5, 'En una esperada entrevista con un joven periodista, Evelyn Hugo, una envejecida estrella de Hollywood, descorre el telón de sus siete matrimonios\r\n, y mientras cuenta historias de escándalos, traiciones y desgracias de Hollywood, desvela verdades impactantes sobre su propia vida y la de todos los que la rodean.', 'evelyn.jpg', 370, 20000, 7),
(5, 'Reina Roja', 16, 'Antonia Scott tiene un don que es al mismo tiempo una maldición: una extraordinaria inteligencia. Gracias a ella ha salvado decenas de vidas, pero también lo ha perdido todo.\r\nHoy se parapeta contra el mundo en su piso casi vacío de Lavapiés, del que no piensa volver a salir. Ya no queda nada ahí fuera que le interese lo más mínimo.El inspector Jon Gutiérrez está acusado de corrupción, suspendido de empleo y sueldo. Es un buen policía metido en un asunto muy feo, y ya no tiene mucho que perder. Por eso acepta la propuesta de un misterioso desconocido: ir a buscar a Antonia y sacarla de su encierro, conseguir que vuelva a hacer lo que fuera que hiciera antes, y el desconocido le ayudará a limpiar su nombre. Un encargo extraño aunque aparentemente fácil.', 'reina-roja.jpg', 550, 19000, 6),
(6, 'Tan Poca Vida', 6, 'Tan poca vida,\r\nuna historia que recorre más de tres decadas de amistad en la vida de cuatro hombres que crecen juntos en Manhattan.\r\nCuatro hombres que tienen que sobrevivir al fracaso y al exito y que, a lo largo de los años, aprenden a sobreponerse a las crisis económicas, sociales y emocionales. Cuatro hombres que comparten una idea muy peculiar de la intimidad, una manera de estar juntos hecha de pocas palabras y muchos gestos. Cuatro hombres cuya relación la autora.', 'pocavida.webp', 1000, 45000, 8),
(7, 'Twisted Love', 7, 'Alex Volkov vive asediado por una tragedia que lo ha perseguido toda su vida. Una vida sin tiempo para el amor. Pero el día que se ve obligado a cuidar de la hermana de su mejor amigo\r\n, empieza a sentir algo. ', 'twistedlove.jpg', 450, 24000, 9),
(8, 'La verdad sobre el caso Harry Quebert', 8, 'En esta novela,\r\nel joven escritor Marcus Goldman investiga el asesinato de Nola Kellergan, una joven de 15 años asesinada en 1975 en Aurora, New Hampshire. En 2008, el cadáver de Nola es encontrado en el jardín de Harry Quebert\r\n, mentor de Marcus y autor de una novela aclamada. Harry es arrestado, y Marcus decide escribir un libro sobre el caso mientras busca demostrar la inocencia de Harry. Su investigación revela una trama de secretos, y la verdad se desvela solo al final de un recorrido intrincado y apasionante.', 'la-verdad-sobre-el-caso-Harry-Quebert.jpg', 1080, 31000, 10),
(9, 'Una Corte de Llamas Plateadas', 9, 'Nesta Archeron, forzada a convertirse en alta fae, lucha por encontrar su lugar en un mundo peligroso. Marcada por su temperamento y los horrores de la guerra con Hybern\r\n, Nesta enfrenta un desafío aún mayor cuando Cassian, miembro de la Corte Noche, es asignado para entrenarla. Entre ellos surge una intensa pasión mientras las reinas humanas traidoras forman una nueva alianza que amenaza la frágil paz. Nesta y Cassian deberán superar sus pasados para enfrentarse a los monstruos interiores y exteriores, buscando aceptación y curación juntos.', 'corte-de-llamas-plateada-sarah-j-maas.jpg', 1030, 37000, 1),
(10, 'El Niño con el Pijama de Rayas', 10, 'Un niño alemán de nueve años que se muda con su familia cerca de un campo de concentración durante la Segunda Guerra Mundial. Desde su nueva casa, Bruno se siente solo hasta que un día conoce a un niño llamado Shmuel que vive al otro lado de una cerca y viste un pijama de rayas\r\n. Los dos niños desarrollan una amistad a pesar de la valla que los separa. A medida que Bruno descubre la verdad sobre el mundo en el que vive y el destino de su amigo, la historia culmina en un final impactante que revela las realidades de la guerra y el Holocausto desde la perspectiva de un niño.', 'el-nino-con-el-pijama-de-rayas.jpg', 475, 8000, 11),
(11, 'Magnolia Parks', 11, 'Bienvenido a la alta sociedad Londinense, donde la mesa está servida y los corazones arden... ¡Llega el fenómeno romántico de TikTok! ¿Cuántos amores te tocan en una vida?\r\nElla es una preciosa, rica, egoísta y un poco caprichosa socialité londinense.Él es el chico malo más fotografiado de Inglaterra, y su rompecorazones particular.\r\nTodo el mundo sabe que Magnolia Parks y BJ Ballentine están hechos el uno para el otro. Pero el destino no parece estar de su parte. Por mucho que Magnolia intente poner distancia saliendo con otra gente y BJ se acueste con otras chicas para vengarse, siempre acaban volviendo a los brazos del otro.Entre las cicatrices de un viejo amor y los secretos que por ellas asoman, Magnolia y BJ se verán obligados a encararse para responder a la pregunta que llevan toda la vida evitando: ¿Cuántos amores tienes realmente en una vida?', 'magnolia-parks.jpg', 600, 21000, 3),
(12, 'Binding 13', 12, 'La vida nunca ha sido fácil para Shannon Lynch. Atrapada en un torbellino de sentimientos hacia él y desesperada por pasar desapercibida\r\n, Shannon se convierte una vez más en el blanco del acoso, pero la flamante estrella del rugby irlandés resulta ser un aliado de lo más inesperado.', 'binding-13.jpg', 655, 40000, 2),
(13, 'Alas de Hierro', 13, 'Violet Sorrengail enfrenta su primer año en el Colegio de Guerra de Basgiath, donde la Trilla fue solo el comienzo de pruebas diseñadas para eliminar a los no aptos.\r\nAhora debe soportar un entrenamiento brutal bajo la mirada del nuevo vicecomandante, que busca exponer su debilidad a menos que traicione a su amado. Aunque su cuerpo es más frágil, Violet cuenta con su ingenio y determinación. Enfrenta líderes que olvidan la lección principal de Basgiath: los jinetes de dragones establecen sus propias reglas. Su voluntad de sobrevivir no bastará, ya que conoce un secreto oculto en el colegio que amenaza con consumirlos a todos.', 'alas-de-hierro-empireo-2_rebecca-yarros.jpg', 1100, 30000, 1),
(14, 'La Asistenta', 14, 'Todos los días limpio la preciosa casa de los Winchester de arriba abajo. Busco a su hija del colegio y preparo deliciosas comidas para toda la familia antes de subir a cenar sola en mi minúscula habitación del piso superior. A las extrañas mentiras que cuenta sobre su propia hija. A su marido, que cada día parece más abatido. Pero cuando miro a Andrew a los ojos, castaños, encantadores y llenos de dolor, no me resulta difícil imaginar cómo sería vivir en la piel de Nina. El gran vestidor, el auto de lujo, el esposo perfecto. Hasta que un día no me resisto a probarme uno de sus maravillosos vestidos blancos.\r\nSolo quiero saber qué se siente. Pero ella pronto lo descubre, y cuando me doy cuenta de que la puerta de mi habitación solo se cierra por fuera ya es demasiado tarde. Algo me reconforta: los Winchester no saben quién soy en realidad. no saben de lo que soy capaz.', 'la-asistenta.jpg', 592, 10000, 5),
(15, '9 de Noviembre', 15, 'Una historia tragica y romantica, Nunca podrás encontrarte a ti misma si estás perdida en alguien más Fallon conoce a Ben, un aspirante a novelista, el día antes de su mudanza al otro lado del país.\r\nSu atracción inmediata los lleva a pasar juntos el último día de Fallon en Los Ángeles, y su azarosa vida se convierte en la inspiración creativa que Ben siempre ha buscado para su novela. A pesar del tiempo, y en medio de las diversas relaciones y tribulaciones de sus propias vidas, ellos se siguen encontrando en la misma fecha cada año. Hasta que un día, Fallon comienza a dudar si Ben ha sido realmente honesto con ella o si sólo está fabricando una realidad perfecta en busca del último giro de su trama.', '9-november-coolen-hoover.webp', 600, 26000, 1),
(26, 'qqqq', 13, 'qqqqqq89', '665a5c01d6179-qvzq3azb.png', 11, 11, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pivot-genero-libro`
--

CREATE TABLE `pivot-genero-libro` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genero_id` bigint(20) UNSIGNED NOT NULL,
  `libro_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pivot-genero-libro`
--

INSERT INTO `pivot-genero-libro` (`id`, `genero_id`, `libro_id`) VALUES
(1, 1, 1),
(2, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor_id` (`autor_id`),
  ADD KEY `editorial_id` (`editorial_id`);

--
-- Indices de la tabla `pivot-genero-libro`
--
ALTER TABLE `pivot-genero-libro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pivot-genero-libro`
--
ALTER TABLE `pivot-genero-libro`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `autor` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_ibfk_2` FOREIGN KEY (`editorial_id`) REFERENCES `editorial` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pivot-genero-libro`
--
ALTER TABLE `pivot-genero-libro`
  ADD CONSTRAINT `pivot-genero-libro_ibfk_1` FOREIGN KEY (`libro_id`) REFERENCES `libro` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pivot-genero-libro_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
