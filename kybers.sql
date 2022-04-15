DROP DATABASE IF EXISTS kybers;
CREATE DATABASE IF NOT EXISTS kybers;
USE kybers;


CREATE TABLE IF NOT EXISTS tipo_usuarios(
    tipo_user_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    tipo    VARCHAR(80) NOT NULL

) ENGINE = innoDB;

INSERT INTO tipo_usuarios 
VALUES (1, 'Administrador'),
       (2, 'Común');


CREATE TABLE IF NOT EXISTS usuarios (
                        usuarios_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                        nombre VARCHAR (20) NOT NULL,
                        apellido VARCHAR (20) NULL,
                        email VARCHAR (120) NOT NULL,
                        fecha_nacimiento DATE NULL,
                        password VARCHAR (255) NOT NULL,
                        img_user VARCHAR(80) NULL,
                        tipo_user_id_fk TINYINT UNSIGNED NOT NULL,

                        FOREIGN KEY (tipo_user_id_fk) REFERENCES tipo_usuarios (tipo_user_id) ON DELETE RESTRICT ON UPDATE CASCADE
 )ENGINE = InnoDB;

INSERT INTO usuarios
VALUES 
    (1,'cristian', 'bösz', 'cristianbosz@davinci.edu.ar', '2000/06/05', '$2y$10$50WxPV0HNkYLaQAnH4ccOuiBjmAjEVoxzJoIt6cNCCjpOK9GHMyPm', 'calkestis.jpg', 1),
    (2,'pame', 'iglesias', 'pame.iglesias@davinci.edu.ar', '1996/10/05', '$2y$10$6EykeulyMIQDyOvTJjeA5OKRRl7gnDG4jt8KLWT0x1SwHt1KmV0PC', 'reyart.jpg', 2),
    (3,'Santi', 'Gallino', 'santiago.gallino@davinci.edu.ar', '1996/10/05', '$2y$10$6EykeulyMIQDyOvTJjeA5OKRRl7gnDG4jt8KLWT0x1SwHt1KmV0PC', 'obiwan.jpg', 1);
    


CREATE TABLE IF NOT EXISTS categorias (
                        categorias_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                        cate_nombre VARCHAR(20) NOT NULL
                                      
 )ENGINE = InnoDB;

INSERT INTO categorias 
VALUES 
    (1, 'Réplicas'),
    (2, 'Neo pixel');


CREATE TABLE IF NOT EXISTS colores (
                        colores_id TINYINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                        color_nombre VARCHAR(20) NOT NULL
                                               
 )ENGINE = InnoDB;

INSERT INTO colores 
VALUES 
    (1, 'carmesí'),
    (2, 'esmeralda'),
    (3, 'amarillo'),
    (4, 'amatista'),
    (5, 'azul eléctrico'),
    (6, 'cian'),
    (7, 'blanco');




CREATE TABLE IF NOT EXISTS productos (
                        productos_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
                        img VARCHAR(45) NOT NULL,
                        nombre VARCHAR (45) NOT NULL,
                        descripcion TEXT (1000) NOT NULL,
                        precio FLOAT (5, 2)  NOT NULL,
                        categorias_id_fk INT UNSIGNED NOT NULL,
                        colores_id_fk TINYINT UNSIGNED NOT NULL,
                        
                        
                        FOREIGN KEY (categorias_id_fk) REFERENCES categorias(categorias_id) ON DELETE CASCADE ON UPDATE CASCADE,
                        FOREIGN KEY (colores_id_fk) REFERENCES colores(colores_id) ON DELETE CASCADE ON UPDATE CASCADE                      
                      
 )ENGINE = InnoDB;


INSERT INTO productos
VALUES 
    (1, 'obiwan.webp', 'Redimido', 'El Redimido ha sido rediseñado con nuestro sistema patentado de hilo en cuchilla un 30% más brillante. El Redimido cuenta con un emisor, una sección de interruptores y un pomo con acabado cromado. El cuello de latón y cobre añaden atractivo y color a este diseño. La caja de activación de latón macizo cuenta con una placa de activación de diseño de circuitos. El Redimido es lo suficientemente resistente para los duelos de contacto completo más fuertes, sin sacrificar la estética. El LED de 12w está alojado dentro de la rosca en la hoja con un disipador de calor de cobre que tiene un 250% más de masa que nuestro disipador de calor anterior. El resultado de la colocación del LED y la regulación térmica mejorada es una hoja que es más brillante que cualquiera de nuestros otros sables. Este sable es de Obi Wan Kenobi.', 199.00, 1, 5),
    (2, 'luke.webp', 'Hijo Pródigo', 'El Prodigal Son Mk2 presenta un acabado cromado pulido y de níquel con una caja de activación, flechas iluminadas en rojo / verde y un greeblie negro. El hijo pródigo también cuenta con un anillo triple unido al pomo. La caja de activación tiene una tarjeta de control magnética que oculta los interruptores y el puerto de recarga (cuando sea necesario). El Hijo Pródigo es lo suficientemente resistente para el duelo de contacto completo más fuerte, sin sacrificar la estética. Este sable es de Luke Skywalker', 199.99, 1, 2),
    (3, 'cultista.webp', 'Cultista', 'The Cultist es nuestro nuevo sable con garras. Cuenta con un pomo acampanado para un agarre de pivote de palma que se usa con espadas largas europeas. La sección del interruptor tiene un avellanado ovalado agregado para bajar la cara del interruptor para protegerlo contra la activación accidental. El emisor tiene ranuras fresadas en el cuello, ranuras profundas entre las garras y paletas que combinan con el pomo. Las garras de bajo perfil completan la estética oscura. Abraza tu destino con el SaberForge Cultist.', 149.00, 2, 1),
    (4, 'templo.webp', 'Viejo Maestro', 'De los santuarios perdidos de la antigua orden proviene el bastón de batalla de la Guardia del Templo. Esta es un arma de la era de los héroes y titanes. Presenta un diseño de personal de batalla ergonómico y de perfil bajo. Cuenta con un conjunto completo de componentes electrónicos y un interruptor adicional que controla el segundo LED de los emisores. Los dispositivos electrónicos también reciben recarga en la empuñadura de forma predeterminada.', 199.00, 2, 6),
    (5, 'ordencaida.webp', 'Orden Caida', 'Bajo la sombra del Imperio emerge una chispa de luz para encender una nueva resistencia, La Orden Caida ha llegado. La Orden Caida es un sable largo y delgado diseñado para un estilo a dos manos. El cuerpo estriado y el estrangulador emisor proporcionan excelentes puntos de agarre. La caja de control es de perfil bajo y muy delgada. Un emisor de doble cubierta crea una hermosa ventana de hoja. Este sable se completa con una sección de pomo muy detallada.', 199.00, 1, 5),
    (6, 'elegido.webp', 'El Elegido', 'Cuenta con un acabado cromado de níquel pulido espejo con empuñaduras en T de polímero negro. Las versiones de sonido utilizan interruptores táctiles ocultos debajo de la tarjeta de activación. El Elegido también cuenta con una función de doble revelación. La parte inferior del cuerpo y el pomo se desenroscan para revelar un chasis electrónico exquisitamente detallado con una ventana que se ilumina para igualar el color de la hoja. Se accede al puerto de recarga a través del chasis inferior y está completamente oculto cuando se ensambla el sable. La parte superior del cuerpo también se desenrosca para revelar una cámara de cristal compleja pero elegante con un cristal de cuarzo genuino. Todos los cables electrónicos están completamente ocultos dentro de varillas de soporte de latón.', 299.00, 1, 5);


CREATE TABLE IF NOT EXISTS comentarios(
    comentarios_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    review TINYTEXT NOT NULL,
    fecha DATE NOT NULL,
    usuarios_id_fk INT UNSIGNED NOT NULL,
    productos_id_fk INT UNSIGNED NOT NULL,

    FOREIGN KEY (usuarios_id_fk) REFERENCES usuarios(usuarios_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (productos_id_fk) REFERENCES productos(productos_id) ON DELETE CASCADE ON UPDATE CASCADE 

) ENGINE = innoDB;

INSERT INTO comentarios 
VALUES (1, 'Gran sable de luz!! Me encantó todo el diseño de la empuñadura y el gran brillo de la hoja. Recomendadisimo.', '2021-06-23', 1, 2),
      (2, 'Me encantaría que pongan el sable de luz de Rey. Es mi favorito, me encanta que sea amarillo.', '2021-06-23', 2, 1);

CREATE TABLE IF NOT EXISTS blog
(
    blog_id     INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fecha         DATE                        NOT NULL,
    autor         VARCHAR(80)                 NOT NULL,
    titulo        VARCHAR(80)                 NOT NULL,
    intro         VARCHAR(200)                NOT NULL,
    descripcion   TEXT                        NOT NULL,
    img_miniatura VARCHAR(80)                 NOT NULL,
    img_principal VARCHAR(80)                 NOT NULL,
    video         VARCHAR(300)                NULL
) ENGINE = innoDB;

INSERT INTO blog
VALUES (1, '2021-09-03', 'Cristian Bösz', '¿Por qué Mace Windu tiene un sable de luz violeta?',
        'Con su presencia estoica y dominante, el Maestro Jedi Mace Windu capturó la atención de admiración de muchos espectadores cuando debutó en el Episodio I, y sigue siendo muy popular en el fandom.', '&lt;p class=&quot;lead&quot;&gt;Aunque ciertamente hay mucho que decir sobre Windu, una figura clave en las Guerras Clon, los comentarios de los fan&aacute;ticos tienden a centrarse no en su personalidad o logros, sino en un accesorio en particular vinculado a &eacute;l: su sable de luz p&uacute;rpura.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;No hay ning&uacute;n misterio por qu&eacute; el sable de luz de Windu atrae tanto inter&eacute;s. Las espadas p&uacute;rpuras son extremadamente raras en el universo de Star Wars; de hecho, Windu es el &uacute;nico Jedi conocido que maneja uno, al menos en el canon actual. Como indudablemente ya sabes, los Jedi casi siempre llevan espadas azules o verdes.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;Entonces,&lt;strong&gt; &iquest;por qu&eacute; el sable de luz de Mace Windu es violeta? &lt;/strong&gt;Esa es una pregunta con dos respuestas muy diferentes: una de ellas basada en deliberaciones de producci&oacute;n de pel&iacute;culas detr&aacute;s de escena que ocurren aqu&iacute; en la Tierra, y la otra basada en la mitolog&iacute;a de Star Wars.&lt;/p&gt;

&lt;h2 class=&quot;my-3&quot;&gt;&iquest;Por qu&eacute; Mace Windu tiene un sable de luz p&uacute;rpura? El origen del mundo real&lt;/h2&gt;

&lt;p class=&quot;lead&quot;&gt;La explicaci&oacute;n m&aacute;s simple y directa del sable de luz de Mace Windu es que el actor Samuel L. Jackson quer&iacute;a que su personaje empu&ntilde;ara una hoja violeta en la pantalla. Jackson sinti&oacute; que un color de sable de luz &uacute;nico permitir&iacute;a a su personaje destacar entre el mar de sables en la pantalla durante la ca&oacute;tica Batalla de Geonosis (del Episodio II). Tambi&eacute;n cre&iacute;a que su personaje, un miembro de alto rango de la Orden Jedi, ten&iacute;a derecho a ese tipo de consideraci&oacute;n especial. Como dijo Jackson en una entrevista televisiva, &quot;Soy como el segundo Jedi m&aacute;s malo del universo despu&eacute;s de Yoda&quot;.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;George Lucas, siempre purista en estos asuntos, se resisti&oacute; a la propuesta de Jackson al principio, pero finalmente decidi&oacute; en la postproducci&oacute;n agregar el p&uacute;rpura al sable de luz de Windu. Si miras la Batalla de Geonosis del Episodio II, puedes ver c&oacute;mo el sable de luz de Mace Windu es f&aacute;cil de detectar en medio del alboroto.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;Esa es la explicaci&oacute;n del mundo real para el sable de luz de Mace Windu. Pero hay otra explicaci&oacute;n, que se puede encontrar en un rinc&oacute;n relativamente oscuro (y no can&oacute;nico) de la mitolog&iacute;a de Star Wars.&lt;/p&gt;

&lt;h2 class=&quot;my-3&quot;&gt;&iquest;Por qu&eacute; el sable de luz de Mace Windu era p&uacute;rpura: el origen del universo de Star Wars?&lt;/h2&gt;


&lt;p class=&quot;lead&quot;&gt;Un posible origen del sable de luz de Mace Windu se relata en el c&oacute;mic &quot;Star Wars Tales # 13&quot;, publicado por Dark Horse Comics en 2002. Una de las historias de ese n&uacute;mero, &quot;Stones&quot;, relata el viaje de un Mace de 14 a&ntilde;os. Windu, entonces un Iniciado Jedi, al planeta Hurikane a instancias de Yoda.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;La misi&oacute;n de Windu es localizar las piezas necesarias para construir su primer sable de luz. Sin embargo, inmediatamente se encuentra con un problema cuando es atacado por los habitantes nativos. Repeliendo f&aacute;cilmente el asalto, Windu accidentalmente hace que uno de los nativos caiga en un desfiladero y sufra heridas graves. El iniciado Jedi cura a su adversario con la ayuda de la Fuerza y, a modo de agradecimiento, recibe un regalo: cristales morados. Utiliza estos cristales para ensamblar su sable de luz, que emite una distintiva hoja p&uacute;rpura.&lt;/p&gt;', 'windu-min.jpg', 'windu.jpg', 'https://www.youtube.com/embed/xwlg7jdNwbY'),



('2', '2021-09-03', 'Cristian Bösz','Forma 7 de combate: el "Vaapad"', 'Mace Windu creó Vaapad, una variación de Juyo que canaliza las tendencias del lado oscuro de la forma en lugar de sucumbir a ellas.','&lt;p class=&quot;lead&quot;&gt;La &lt;strong&gt;Forma VII: Juyo / Vaapad &lt;/strong&gt;es la s&eacute;ptima forma de combate con sable de luz. Es el resultado de integrar todas las dem&aacute;s formas en un &uacute;nico estilo y adoptar un enfoque de combate agresivo y pragm&aacute;tico. Es tambi&eacute;n conocida como el Camino del Vornskr.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;Formidable tanto en ataque como en defensa, esta forma era quiz&aacute; la m&aacute;s peligrosa para el usuario, pues la exigente y constante concentraci&oacute;n que requer&iacute;a y su similitud con el estilo de combate Sith provoc&oacute; que muchos de sus usuarios cayeran al lado oscuro. &lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt;El Vaapad no buscaba herir o impedir al oponente, sino destruirlo. Para ello se val&iacute;a de todo tipo de habilidades: veloces movimientos del sable l&aacute;ser, tajantes y precisos; t&eacute;cnicas de combate cuerpo a cuerpo que combinaban fuerza y velocidad; uso del sable para repeler el fuego de pistolas l&aacute;ser y rayos de Fuerza (absorbi&eacute;ndolo o haci&eacute;ndolo rebotar)... todo para lidiar con cualquier situaci&oacute;n o circunstancia posibles en un combate. Se serv&iacute;a de la Fuerza para potenciar las capacidades f&iacute;sicas del usuario: voltear, saltar, correr, e incluso recubrir el cuerpo a modo de armadura (la cual pod&iacute;a ser usada de forma ofensiva en el combate, con o sin sable l&aacute;ser), lo que permit&iacute;a mantener combates prolongados. Tambi&eacute;n se empleaba para el lanzamiento de objetos -normalmente de tama&ntilde;o medio o comprimidos, aunque tambi&eacute;n pod&iacute;an lanzarse objetos de gran tama&ntilde;o-, o bien su uso como escudo.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;Este estilo de lucha era muy inusual entre los Jedi. Fue utilizada por el maestro Mace Windu, quien fue uno de los grandes maestros que lleg&oacute; a dominarla. A trav&eacute;s de los a&ntilde;os, aprendi&oacute; la forma IV con el maestro Yoda y la forma III con Obi-Wan. Su inter&eacute;s por aprender de otros lo llev&oacute; al dominio de las seis formas, adoptando as&iacute; sin querer la forma VII. A diferencia de las dem&aacute;s, esta forma de combate pod&iacute;a ser empleada sin el uso de un sable l&aacute;ser, empleando &uacute;nicamente las habilidades cuerpo a cuerpo del usuario y el uso de la Fuerza.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;&lt;strong&gt;Solamente dos Jedi llegaron a la maestr&iacute;a total del Vaapad: el ya citado Windu y Depa Billaba&lt;/strong&gt;, entrenada por el primero (aunque finalmente acabar&iacute;a cayendo al lado oscuro). Sora Bulq instruy&oacute; a Quinlan Vos en algunos conocimientos b&aacute;sicos de esta forma, pero nunca lleg&oacute; a alcanzar la maestr&iacute;a. Se cre&iacute;a que Plo Koon tambi&eacute;n controlaba el Vaapad, pero que decidir&iacute;a emplear la forma V en su lugar por considerarlo demasiado peligroso. En KOTOR II se menciona a un Maestro Kavar que ense&ntilde;aba esta t&eacute;cnica. Darth Maul tambi&eacute;n fue entrenado en esta forma de combate, al igual que Galen Marek, aunque este utilizaba un estilo m&aacute;s personalizado: un&iacute;a su sable l&aacute;ser a sus poderes de rayos de la Fuerza, creando as&iacute; un halo electrificado que envolv&iacute;a su sable l&aacute;ser multiplicando el da&ntilde;o que inflig&iacute;a a sus oponentes. Esta habilidad de emplear poderes de la Fuerza por medio del sable l&aacute;ser s&oacute;lo lleg&oacute; a ser dominada por Marek y por Darth Nihilus.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;El t&eacute;rmino &quot;Vaapad&quot; ven&iacute;a de un depredador del planeta Sarapin y sus lunas. Un Vaapad no ten&iacute;a menos de siete tent&aacute;culos, y el esp&eacute;cimen m&aacute;s grande encontrado ten&iacute;a veintitr&eacute;s. Los tent&aacute;culos de la bestia se mov&iacute;an tan extremadamente r&aacute;pido que no hab&iacute;a manera de contarlos, salvo que la criatura estuviese muerta o reposando.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;Con respecto al Juyo regular, no era tan poderoso como el Vaapad pero disminu&iacute;a el riesgo en caer al Lado Oscuro. Compart&iacute;a con &eacute;l t&eacute;cnicas marciales como golpes fuertes y r&aacute;pidos, as&iacute; como el uso de la Fuerza para potenciar al usuario. Pod&iacute;a ser aprendido de manera m&aacute;s f&aacute;cil que el Vaapad, pero a&uacute;n as&iacute; requer&iacute;a entrenamiento en este para poder alcanzar la maestr&iacute;a.&lt;/p&gt;

&lt;p class=&quot;lead&quot;&gt;La caracter&iacute;stica m&aacute;s distintiva del Vaapad, as&iacute; como la causa de su peligrosidad, es que se sirve de las emociones del usuario para potenciar los ataques, al igual que el estilo de combate Sith. Sin embargo, no eran simples emociones desatadas: la f&eacute;rrea disciplina del Vaapad actuaba a modo de catalizador emocional que transformaba la oscuridad interna del usuario en un poder de luz. El estado mental requerido para conseguir esto precisaba que el practicante del Vaapad estuviera dispuesto a experimentar (y controlar) emociones como el disfrute de la pelea, el terror provocado por las masacres de la guerra, y las ansias de victoria. Tambi&eacute;n era un conductor reversible: pod&iacute;a tomar la ira, el odio y la furia del oponente y reflejarlas hacia &eacute;l. &lt;/p&gt;', 'vaapad-min.jpg', 'vaapad.jpg', 'https://www.youtube.com/embed/ZuhjoWS6Abs'),




('3', '2021-09-03', 'Cristian Bösz','¿Qué significa el color de los sables de luz de Star Wars?', 'Esta era el arma formal de un Caballero Jedi. Cualquiera puede usar un bláster o un cortador de fusión—pero usar bien un sable de luz era una marca de alguien extraordinario.» - Obi-Wan Kenobi.','
&lt;p class=&quot;lead&quot;&gt;Ni las fanfarrias de John Williams, ni la Estrella de la Muerte, ni los gritos de Chewbacca, ni siquiera la enrevesada gram&aacute;tica del maestro Yoda. Las espadas l&aacute;ser, o sables de luz, son el s&iacute;mbolo m&aacute;s reconocible de la saga Star Wars. Un arma que distingue a los nobles caballeros jedi, y a sus enemigos los sith, y que apareci&oacute; por primera vez en el Episodio IV, Una nueva esperanza, cautivando a millones de espectadores en todo el mundo.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt; Desde aquella primera aparici&oacute;n, en la que un joven Luke empu&ntilde;aba la hoja de luz ante la venerable mirada del anciano Obi-Wan, muchos son los sables l&aacute;ser que han desfilado en las series, pel&iacute;culas y videojuegos de Star Wars... y muy variopintos.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt;El de doble filo de Darth Maul, la empu&ntilde;adura de cruz estilo medieval de Kylo Ren, el ins&oacute;lito sale de luz negro o los de Ahsoka Tano, m&aacute;s parecidos a unas dagas por su mango con curvatura. En lo que tambi&eacute;n ha habido cada vez m&aacute;s variedad es en los colores, que derivan de los cristales de Kyber con los que han sido fabricados y su &quot;qu&iacute;mica espiritual&quot; con el poseedor del arma.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt; En un principio la cosa era sencilla: rojo para los sith, los malos, y azul o verde para los jedi, los buenos. Pero despu&eacute;s apareci&oacute; Mace Windu con su espada de luz de color morado... y rompi&oacute; la baraja.
   Tambi&eacute;n los hemos visto blancos, naranjas e incluso plateados y dorados. Y es que el color de la hoja tiene m&aacute;s importancia de lo que parece y su elecci&oacute;n va mucho m&aacute;s all&aacute; de meras cuestiones est&eacute;ticas.&lt;/p&gt;
&lt;h2&gt;LOS CRISTALES KYBER Y SU COMUNI&Oacute;N CON LOS JEDI&lt;/h2&gt;
&lt;p class=&quot;lead&quot;&gt; La opini&oacute;n m&aacute;s extendida es que colores de los distintos sables reflejaban la personalidad de los personajes que los empu&ntilde;an ya que, recordemos un jedi debe, como parte de su entrenamiento, hacer su propio sable de luz y seleccionar personalmente el cristal del que va estar formado. Y es que el coraz&oacute;n de las espadas l&aacute;ser es un cristal de Kyber, un tipo de mineral sensible a la Fuerza.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt; La empu&ntilde;adura de sus sables contiene unos mecanismos a trav&eacute;s de los cuales se concentra y proyecta la Fuerza contenida en estos cristales, formando entonces la hoja de luz de un color u otro, dependiendo del cristal elegido. Pero ser&aacute; el cristal, que inicialmente es incoloro, el que revelar&aacute; su verdadera naturaleza tras entrar en sinton&iacute;a con su poseedor. Es decir, que es el contacto, su conexi&oacute;n con el jedi (o sith) lo que torna el mineral de uno u otro color.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt; En cuanto a lo que representan estos colores, varias son las teor&iacute;as sobre cada uno de ellos, pero su significado atendiendo a lo mostrado en las pel&iacute;culas, series, videojuegos y novelas de la saga, podr&iacute;a ser el siguiente:&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;AZUL&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt; Este es uno de los colores m&aacute;s usuales de los caballeros jedi representa rectitud, destreza en la lucha y valent&iacute;a. Es el color usado por los Guardianes Jedi en los d&iacute;as de la Antigua Orden.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;VERDE&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt;Es el otro de los colores m&aacute;s habituales y representa concordia, armon&iacute;a y sabidur&iacute;a. Son com&uacute;nmente utilizado por los Jedi m&aacute;s sabios y de mayor rango como Yoda o Qui-Gon Jinn. Tambi&eacute;n fue tomado como s&iacute;mbolo de paz, lo que hac&iacute;a que los c&oacute;nsules Jedi generalmente usaran este color de sable de luz.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;ROJO&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt;Es el color habitual de los sith que representa su maldad, su ira y, tambi&eacute;n, su tormento. De hecho, mediante su corrompida voluntad los Sith no extablecen conexi&oacute;n con los cristales, sin que los doblegan hasta el punto de hacerlos &quot;sangrar&quot;. De ah&iacute; su color ojo, un color antinatural para los Kyber.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;MORADO&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt; Un color muy raro usado por los Jedi, concretamente por Mace Windu, que encuentra su muy terrenal explicaci&oacute;n en el hecho de que era el color favorito de Samuel L. Jackson, el actor que interpret&oacute; al personaje. Sin embargo, en el Universo Expandido este color indicaba ambig&uuml;edad moral, ya que el p&uacute;rpura es una combinaci&oacute;n de rojo y azul, por lo tanto, representaba que el usuario mostraba cierta afinidad con ambos lados de la Fuerza.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;AMARILLO&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt; Si bien no son tan comunes como los verdes o como los azules, no son tan raros como los morados y ya han aparecido en varias ocasiones en el universo de Star Wars. Es, por ejemplo, el color de las armas de los Guardias del Templo Jedi en Coruscant que llevan lanzas de luz de doble filo con sus hojas amarillas.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt; Pero este color tom&oacute; una nueva dimensi&oacute;n y significado con el final del Episodio IX: El ascenso de Skywalker donde Rey empu&ntilde;a un sable amarillo construido por ella misma tras conocer que era nieta de Palpatine y, despu&eacute;s de matar al malvado lord Sith, declararse Skywalker de adopci&oacute;n. As&iacute;, a pesar de que la joven Jedi tiene en sus venas la sangre de los Palpatine, su formaci&oacute;n corri&oacute; a cargo de los Skywalker, siendo este el apellido que escoge al t&eacute;rmino del fin.
   Por tanto, puede afirmarse que Rey es Sith de nacimiento y Jedi por elecci&oacute;n, una dicotom&iacute;a que cumple con la legendaria profec&iacute;a del universo de Star Wars. Y la uni&oacute;n de los dos lados de la fuerza, la oscuridad de los Palpatine y la luz de los Skywalker, encarnada en Rey no podr&iacute;a haberse representado mejor que a trav&eacute;s de un sable de luz amarilla, color fruto de la combinaci&oacute;n entre el rojo de los Sith y el verde de los Jedi. El amarillo significar&iacute;a, por tanto, ese ansiado equilibrio.&lt;/p&gt;
   &lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;NARANJA&lt;/h3&gt;

&lt;p class=&quot;lead&quot;&gt; En ocasiones este color ha sido usado por jedis con un marcado car&aacute;cter oscuro, recio y de gran poder&iacute;o f&iacute;sico. Pero tambi&eacute;n puede contar con otros significados ya que, por ejemplo, en el planeta Naboo, el color es s&iacute;mbolo de nacimiento y renovaci&oacute;n. Tambi&eacute;n es un color utilizado por los centinelas jedi, poderosos y fuertes en combate y tambi&eacute;n muy h&aacute;biles en las negociaciones.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;DORADO&lt;/h3&gt;

&lt;p class=&quot;lead&quot;&gt;Un color muy poco habitual que indica justicia, compasi&oacute;n y tambi&eacute;n sabidur&iacute;a. Es portado por jedis totalmente entregados al lado luminoso de la Fuerza.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;PLATEADO&lt;/h3&gt;

&lt;p class=&quot;lead&quot;&gt;  La enorme fe, la paciencia, el sosiego y las ganas de rehuir el conflicto marcan por lo general a los jedi que usan este color en sus espadas de luz.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;BLANCO&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt;  Este color en Star Wars tambi&eacute;n simboliza la pueza y es que Ahsoka Tano utiliza despu&eacute;s de desertar de la orden Jedi.&lt;/p&gt;
&lt;h3 class=&quot;text-center font-weight-bold text-uppercase&quot;&gt;NEGRO&lt;/h3&gt;
&lt;p class=&quot;lead&quot;&gt; El sable l&aacute;ser negro (o Darksaber) es una espada &uacute;nica creada por Tarre Vizsla, el primer Mandaloriano que se convirti&oacute; en jedi y apareci&oacute; por primera vez en la serie de animaci&oacute;n The Clone Wars. Su hoja es m&aacute;s corta que la de la mayor&iacute;a de los sables de luz, y con forma de espada tradicional. Despu&eacute;s de la muerte de Vizsla, el sable oscuro estuvo custodiado durante 300 a&ntilde;os en el Templo Jedi hasta que fue robado por miembros de la Casa Vizsla.&lt;/p&gt;
&lt;p class=&quot;lead&quot;&gt;Su color negro representa poder absoluto, supremac&iacute;a y orgullo por lo que esta reliquia se convirti&oacute; en un s&iacute;mbolo de liderazgo entre los mandalorianos y bajo su hoja perecieron numerosos jedi. Seg&uacute;n las costumbres mandalorianas, la &uacute;nica forma de obtenerla es derrotando al due&ntilde;o anterior en combate.&lt;/p&gt;', 'jedis-min.jpg', 'jedis.jpg', 'https://www.youtube.com/embed/4MQCZYw54j8');





