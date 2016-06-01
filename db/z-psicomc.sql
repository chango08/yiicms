-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2015 a las 23:41:51
-- Versión del servidor: 5.5.25a
-- Versión de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `z-psicomc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `color` varchar(7) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `id_categoria_UNIQUE` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `alias`, `descripcion`, `color`, `estado`) VALUES
(2, 'Maternidad', 'materinidad', 'Sobre Maternidad', '#6fa8dc', 0),
(3, 'Crianza', 'crianza', 'SObre  la crianza', '#f1c232', 0),
(4, 'Familia', 'familia', 'Sobre la Familia', '#c27ba0', 0),
(5, 'Pareja', 'pareja', 'Sobre la Pareja', '#e94a3a', 0),
(6, 'Orientacion Vocacional', 'orientacion_vocacional', 'Sobre Orientacion Vocacional', '#f2cb00', 0),
(8, 'Noticias', 'noticias', '', '#78d252', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frases`
--

CREATE TABLE IF NOT EXISTS `frases` (
  `id_frase` int(11) NOT NULL AUTO_INCREMENT,
  `frase` text NOT NULL,
  `autor` varchar(255) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id_frase`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `frases`
--

INSERT INTO `frases` (`id_frase`, `frase`, `autor`, `estado`) VALUES
(1, '<p>&ldquo;Me gusta que el saber haga vivir, que cultive, me gusta convertirlo en carne y en hogar, que ayude a beber y a comer, a caminar lentamente, a amar, a morir, a veces a renacer, me gusta dormir entre sus sabanas, que no sea exterior a m&iacute;.&rdquo;</p>\r\n', 'Michel Serres, Les Cinq Sens', 0),
(2, '<p>&quot;Despu&eacute;s de todo tu eres la &uacute;nica muralla si no te saltas nunca dar&aacute;s un solo paso&quot;</p>\r\n', 'Luis Alberto Spinetta', 0),
(3, '<p>&quot;No se donde est&aacute; el l&iacute;mite pero si se donde no est&aacute;&quot;.</p>\r\n', 'José Ajram', 0),
(4, '<p>&quot;Todo aquello que el hombre ignora no existe para &eacute;l. Por eso el universo de cada uno se reduce al tama&ntilde;o de su saber&quot;.</p>\r\n', 'Albert Einstein', 0),
(5, '<p>&quot;He sido un hombre afortunado en la vida: nada me fue f&aacute;cil.&quot;</p>\r\n', 'Sigmund Freud', 0),
(6, '<p>&quot;S&oacute;lo la propia y personal experiencia hace al hombre sabio&quot;.</p>\r\n', 'Sigmund Freud', 0),
(7, '<p>&quot;Ser completamente honrados consigo mismo es un buen ejercicio&quot;.</p>\r\n', 'Sigmund Freud', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1423841119),
('m130524_201442_init', 1423841123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `texto` text,
  `fecha` date DEFAULT NULL,
  `visitas` int(11) DEFAULT '0',
  `me_gusta` int(11) DEFAULT '0',
  `adjuntos` varchar(255) DEFAULT NULL,
  `destacado` int(1) DEFAULT NULL,
  `remarcado` int(1) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `categorias_id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`),
  UNIQUE KEY `id_nota_UNIQUE` (`id_nota`),
  KEY `fk_nota_usuario1_idx` (`user_id`),
  KEY `fk_notas_categorias1_idx` (`categorias_id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `titulo`, `texto`, `fecha`, `visitas`, `me_gusta`, `adjuntos`, `destacado`, `remarcado`, `videos`, `imagen`, `estado`, `user_id`, `categorias_id_categoria`) VALUES
(13, 'Los tipos de amigos que una mujer necesita', '<p>Un interesante estudio realizado en Austria durante 10 a&ntilde;os en un grupo de mujeres maduras, descubri&oacute; que la amistad causas efectos positivos en las personas, inclusive previene males card&iacute;acos, previene el estr&eacute;s y la depresi&oacute;n. No es necesario tener mil amigos en Facebook, si se tiene una buena calidad de amigos no hay necesidad de m&aacute;s. Acomp&aacute;&ntilde;enos a descubrir que tipos de amigas que una mujer necesita una mujer.</p>\r\n\r\n<h2 class="rankn">1</h2>\r\n\r\n<h2>Un amigo de la infancia</h2>\r\n\r\n<p>Una amig@ de la infancia te conoce m&aacute;s que nadie, sabe tu historia, tienen infinidad de recuerdos y an&eacute;cdotas, sabe de tus secretos y sin duda son c&oacute;mplices. Inclusive si est&aacute; lejos la conexi&oacute;n no se rompe y al volverse a ver parece que nunca se separaron.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/70748-amigas.jpg', 0, 1, 3),
(14, 'Buenas costumbres que fortalecen tu inteligencia ', '<p>odos sabemos que podemos ejercitar el cuerpo, pero cuando se trata de la la inteligencia, &iquest;c&oacute;mo ejercitarla?. As&iacute; como el cuerpo, la inteligencia tambi&eacute;n se puede potenciar, ejercitar y estimular. A continuaci&oacute;n 5 buenos h&aacute;bitos que ayudan a potenciar tu inteligencia.</p>\r\n\r\n<p>Una investigaci&oacute;n realizada en el Hospital General de Massachusetts (Estados Unidos) determin&oacute; que meditar reduce considerablemente los niveles de estr&eacute;s y ayuda a aumentar la concentraci&oacute;n. Un tiempo para meditar todos los d&iacute;as nos dar&aacute; una mejor perspectiva de las cosas que est&aacute;n ocurriendo en nuestra vida y nos permitir&aacute; a ver los detalles importantes que siempre pasan desapercibidos.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71085-cerebros.jpg', 0, 1, 4),
(15, 'Señales de la depresión', '<p>La <a href="http://www.sanar.org/depresion/sabes-lo-que-es-realmente-la-depresion"><strong>depresi&oacute;n</strong></a> es un mal que ataca sin discriminaci&oacute;n, y mucha veces nos cuesta reconocer las depresi&oacute;n, o la confundimos con la tristeza o desesperanza, inclusive podemos estar deprimidos y no lo sabemos. A continuaci&oacute;n las se&ntilde;ales m&aacute;s comunes de la depresi&oacute;n.</p>\r\n\r\n<h2>Es parte del dolor</h2>\r\n\r\n<p>El 75% de las personas con depresi&oacute;n sufren de dolor recurrente o cr&oacute;nico, un estudio publicado en la revista Pain, determin&oacute; que las personas que sufren depresi&oacute;n suelen sentir dolores f&iacute;sicos, sobre todo en el cuello, espalda, est&oacute;mago y dolores de cabeza. Cuando se est&aacute; deprimido se experimenta una mayor sensibilidad al dolor en general.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71168-depresion_2.jpg', 0, 1, 8),
(16, 'Quítate el estrés cada día de la semana', '<p>Sin duda el estr&eacute;s es un mal que no discrimina y tarde o temprano nos alcanza. Pero hay muchas formas de mantener al estr&eacute;s a raya y tener un buen d&iacute;a. A continuaci&oacute;n les brindaremos 7 formas de empezar el d&iacute;a sin estr&eacute;s y con buen pie, formas sencillas que las puede realizar cualquiera y sin duda cambiar&aacute;n su vida y la mantendr&aacute; sin estr&eacute;s o por lo menos lo reducir&aacute;.</p>\r\n\r\n<div class="rankn">1</div>\r\n\r\n<h2>Oler caf&eacute;</h2>\r\n\r\n<p>(Lunes)<br />\r\nAspirar profundamente la fragancia de caf&eacute; es delicioso y reconfortante, pero tambi&eacute;n desestresante. En el 2008 un estudio publicado en Washington Post determin&oacute; que el aroma de los granos de caf&eacute; ser&iacute;a la nueva medicina anti-estr&eacute;s, debido a los antioxidantes que producen estas semillas.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71282-cafe_0.jpg', 0, 1, 2),
(17, 'Consejos para salir de vacaciones y olvidarse del trabajo', '<p>Llega la mitad del a&ntilde;o y en gran parte del mundo llegan las vacaciones, pero no siempre podemos disfrutarlas plenamente y uno de los principales impedimentos para que esto suceda es el trabajo y la rutina. Es por eso que hemos realizado un listado con 5 consejos que te ayudar&aacute;n a salir salir de vacaciones y olvidarte del trabajo.</p>\r\n\r\n<p>No nos referimos a dejar cerrada la casa, aunque no es una mala idea hacerlo. Nos referimos a dejar todo listo en el trabajo, no dejar pendientes ni cabos sueltos que nos pueden estropear las vacaciones o nos tendr&aacute;n pensando todo el tiempo en ello. Cierra todos tus temas laborales y olv&iacute;date del trabajo por un tiempo. La experta en TICs de la Universidad a Distancia de Madrid, Silvia Prieto, recomienda designar a una persona de confianza (solo una) para que nos avise por tel&eacute;fono en caso de una urgencia importante.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71324-vacaciones.jpg', 0, 1, 8),
(18, 'Formas de combatir la ansiedad', '<p>La <a href="http://www.sanar.org/estres/ansiedad-panico">ansiedad</a> es, al igual que el estr&eacute;s, un mal muy com&uacute;n por estos d&iacute;as y especialmente en los hombres. El correr de un lado a otro sin tiempo para nada, las obligaciones laborales, las preocupaciones, el temor por un futuro incierto en el que nada est&aacute; garantizado, etc., atentan contra la estabilidad emocional y tambi&eacute;n la f&iacute;sica.</p>\r\n\r\n<p>Por ello es importante encontrar formas de combatir la ansiedad de manera natural con algunas modificaciones en el estilo de vida, sin tener que recurrir a medicaci&oacute;n.</p>\r\n', '2015-04-21', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71349-formas-de-combatir-la-ansiedad.jpg', 0, 1, 6),
(19, 'Obsesión deportiva, un problema que afecta a muchos', '<p>Psic&oacute;logos expertos analizan la forma en que interfiere el fanatismo deportivo a las relaciones interpersonales de estas personas, quienes suelen estar particularmente contentas cuando se inicia una temporada, pero afectan el &aacute;nimo de terceros ligados a &eacute;l por lazos sentimentales.</p>\r\n\r\n<p>El problema que se ha observado es peligroso no s&oacute;lo por afectar a terceros, sino tambi&eacute;n porque la calidad de vida de los mismos fan&aacute;ticos del deporte se ve mermada, asegura Josh Klapow, sic&oacute;logo de la Facultad de Salud P&uacute;blica de la Universidad de Birmingham.</p>\r\n', '2015-04-24', 0, 0, '', 0, 0, '', '/images/2015/04-April/21/71378-nfl.jpg', 0, 1, 5),
(24, 'La historia del gran manager de boxeo que se convirtió en mujer', '<p><strong>Frank Maloney</strong> era un tipo de barrio de origen irland&eacute;s, bajo y recio, que <strong>hizo una fortuna representando a Lennox Lewis</strong>, el mejor boxeador brit&aacute;nico de su &eacute;poca. Pero hace menos de un a&ntilde;o, sorpresivamente, <strong>decidi&oacute; hacerse mujer</strong> y su nombre ahora es <a class="agrupador" href="http://infobae.com/kellie-maloney-a9895" id="Kellie Maloney_agrupador" rel="9895">Kellie Maloney</a>.</p>\r\n\r\n<p>Maloney naci&oacute; en <strong>1953</strong> en el<strong> barrio obrero de Peckham</strong>, en el sudeste de Londres, de padres irlandeses, y <strong>empez&oacute; a boxear en la escuela</strong>, embarc&aacute;ndose pronto en la organizaci&oacute;n de campeonatos de aficionados.</p>\r\n\r\n<p>Su gran salto lo dio con <a class="agrupador" href="http://infobae.com/lennox-lewis-a9896" id="Lennox Lewis_agrupador" rel="9896">Lennox Lewis</a>, al que <strong>convirti&oacute; en el primer campe&oacute;n del mundo brit&aacute;nico invicto en m&aacute;s de un siglo</strong>, al ubicarlo en la &eacute;lite de los pesos pesados en <strong>1990</strong>, que comparti&oacute; con p&uacute;giles de la talla de <strong>Mike Tyson</strong> y <strong>Evander Holyfield</strong>, protagonistas de grandes veladas millonarias en <strong>Las Vegas</strong>.</p>\r\n', '2015-04-15', 0, 0, '', 0, 0, '', '/images/2015/04-April/24/08667-0012530521.jpg', 0, 2, 8),
(25, 'Usaba un sex shop como pantalla para vender cocaína', '<p>La Polic&iacute;a allan&oacute; en las &uacute;ltimas horas un <strong>sex shop</strong> ubicado en la localidad de Pilar, en el Gran Buenos Aires, donde detuvo a un joven de 26 a&ntilde;os que usaba el negocio como pantalla para comercializar <strong>coca&iacute;na</strong>.</p>\r\n\r\n<p>El procedimiento tuvo lugar en el local ubicado en la calle Nazarre al 1000 de esa ciudad tras una investigaci&oacute;n de la Delegaci&oacute;n Distrital Antinarc&oacute;ticos, perteneciente a la Superintendencia de Investigaciones del Tr&aacute;fico de <a class="agrupador" href="http://www.infobae.com/drogas-a6821" rel="6821">Drogas</a> Il&iacute;citas.</p>\r\n\r\n<p>All&iacute; los efectivos secuestraron varias dosis de clorhidrato de coca&iacute;na, distribuidos en bochas y piedras, una <strong>balanza de precisi&oacute;n, dinero en efectivo, telefon&iacute;a celular, anotaciones y elementos para el fraccionamiento </strong>de la droga.</p>\r\n\r\n<p>Adem&aacute;s del comercio, tambi&eacute;n se allan&oacute; la casa del imputado, ubicada muy cerca del local.</p>\r\n\r\n<p>&quot;Llamaba mucho la atenci&oacute;n la gran cantidad de gente que a plena luz del d&iacute;a entraba y sal&iacute;a del local&quot;, dijo uno de los investigadores, quien confi&oacute; que desde hace tiempo se sospechaba de una posible comercializaci&oacute;n de estupefacientes y finalmente se pudo comprobar.</p>\r\n', '2015-04-08', 0, 0, '', 0, 0, '', '/images/2015/04-April/24/08902-0010365875.jpg', 0, 2, 6),
(27, 'Manu: "Fue bueno ver al equipo reaccionar y hacer un buen juego"', '<p>Gin&oacute;bili analiz&oacute; el triunfo de los Spurs ante los Clippers de este mi&eacute;rcoles y resalt&oacute; la capacidad de recuperarse tras la derrota del primer choque de la serie. Valor&oacute; la tarea de Mills y elogi&oacute; el fant&aacute;stico partido que tuvo Tim Duncan. Adem&aacute;s, habl&oacute; sobre su salida prematura del juego por acumulaci&oacute;n de faltas y dijo que fue &quot;duro&quot; verlo desde afuera. VIDEO: Gentileza <a href="http://www.espn.com.ar/news/story/_/id/2354768/ginobili-contentos-por-el-triunfo" target="_blank"><strong>ESPN</strong></a>.</p>\r\n', '2015-04-22', 0, 0, '', 0, 0, '', '/images/2015/04-April/24/09722-ginobili.jpg', 0, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) DEFAULT NULL,
  `notas_id_nota` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`),
  UNIQUE KEY `id_tag_UNIQUE` (`id_tag`),
  KEY `fk_tags_notas1_idx` (`notas_id_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id_tag`, `tag`, `notas_id_nota`) VALUES
(1, 'Casa', 18),
(2, ' chicos', 14),
(3, ' perros', 13),
(4, ' Orientacion Vocacional', 17),
(5, ' Videos', 19),
(6, 'deporte', 24),
(7, ' trasnformismo', 24),
(8, ' psicologia cognitiva', 24),
(9, ' freud sigmund ', 24),
(10, ' Videos ', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apellido_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `apellido_nombre`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Téc. Car', 'hola', 'ssDJ_YBcNKPTL0ALNBk5iRNDRXHVwuZu', '$2y$13$qosgJs4vdO7D1hDbwOuz8.gazrpG6kXlEIVBs7LPZLLELH2mjxBjC', NULL, 'sd@mail.com', 10, 1423841195, 1423841195),
(2, 'Lic. Ver', 'hola', 'bXM2-mHKt55p67eKgnz_44LXWKHuB_m1', '$2y$13$54sIXemOBywaVcZboYdonOcqaTQQRl69Z5M/soORTCRZ6igsPTSZK', NULL, 'sd@gmail.com', 10, 1424384666, 1424384666);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_notas_categorias1` FOREIGN KEY (`categorias_id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nota_users` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `fk_tags_notas1` FOREIGN KEY (`notas_id_nota`) REFERENCES `notas` (`id_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
