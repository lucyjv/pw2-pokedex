    CREATE DATABASE pokedex;
    USE pokedex;
            CREATE TABLE pokemon(
                id_incremental INT(11) PRIMARY KEY AUTO_INCREMENT,
                numero INT(30),
                nombre varchar(50),
                tipo1 varchar(50),
                tipo2 varchar(50),
                descripcion varchar(500),
                imagen varchar(100)
            );
    INSERT INTO pokemon(numero, nombre, tipo1, tipo2, descripcion, imagen)
    VALUES (1,'Bulbasaur','img/tipos/planta.png', 'img/tipos/veneno.png','Este Pokémon nace con una semilla en el lomo, que brota con el paso del tiempo.', 'img/pokemones/1.png'),
           (2,'Ivysaur','img/tipos/planta.png','img/tipos/veneno.png','Cuando la flor de su lomo empieza a abrirse, desprende un agradable aroma.','img/pokemones/2.png'),
           (3, 'Venusaur', 'img/tipos/planta.png', 'img/tipos/veneno.png', 'La flor del lomo libera un aroma que calma a quien lo huele.', 'img/pokemones/3.png'),
           (4, 'Charmander', 'img/tipos/fuego.png', NULL, 'La llama de su cola indica su salud. Si está débil, la llama se apaga.', 'img/pokemones/4.png'),
           (5, 'Charmeleon', 'img/tipos/fuego.png', NULL, 'Ataca con su cola encendida. Es muy agresivo en combate.', 'img/pokemones/5.png'),
           (6, 'Charizard', 'img/tipos/fuego.png', 'img/tipos/volador.png', 'Escupe fuego que puede derretir cualquier cosa. Es conocido por causar incendios forestales sin querer.', 'img/pokemones/6.png'),
           (7, 'Squirtle', 'img/tipos/agua.png', NULL, 'Cuando retrae su largo cuello en su caparazón, dispara agua a una presión increíble.', 'img/pokemones/7.png'),
           (8, 'Wartortle', 'img/tipos/agua.png', NULL, 'Es reconocido por su cola peluda, que simboliza longevidad.', 'img/pokemones/8.png'),
           (9, 'Blastoise', 'img/tipos/agua.png', NULL, 'Dispara chorros de agua por los cañones de su caparazón con una precisión increíble.', 'img/pokemones/9.png'),
           (10, 'Caterpie', 'img/tipos/bicho.png', NULL, 'Para protegerse, emite un hedor terrible por sus antenas.', 'img/pokemones/10.png'),
           (11, 'Metapod', 'img/tipos/bicho.png', NULL, 'Como es vulnerable en esta etapa, se endurece para protegerse.', 'img/pokemones/11.png'),
           (12, 'Butterfree', 'img/tipos/bicho.png', 'img/tipos/volador.png', 'Sus alas están cubiertas de escamas que liberan polen tóxico.', 'img/pokemones/12.png'),
           (13, 'Weedle', 'img/tipos/bicho.png', 'img/tipos/veneno.png', 'Tiene un aguijón venenoso en la cabeza. Es muy común en bosques.', 'img/pokemones/13.png'),
           (14, 'Kakuna', 'img/tipos/bicho.png', 'img/tipos/veneno.png', 'Permanece inmóvil mientras se prepara para evolucionar.', 'img/pokemones/14.png'),
           (15, 'Beedrill', 'img/tipos/bicho.png', 'img/tipos/veneno.png', 'Ataca en enjambres y utiliza sus aguijones para defender su territorio.', 'img/pokemones/15.png'),
           (16, 'Pidgey', 'img/tipos/normal.png', 'img/tipos/volador.png', 'Prefiere evitar el combate y se defiende lanzando arena.', 'img/pokemones/16.png'),
           (17, 'Pidgeotto', 'img/tipos/normal.png', 'img/tipos/volador.png', 'Tiene una vista aguda y caza presas pequeñas mientras vuela.', 'img/pokemones/17.png'),
           (18, 'Pidgeot', 'img/tipos/normal.png', 'img/tipos/volador.png', 'Puede volar a velocidades de 2 Mach para atrapar a su presa.', 'img/pokemones/18.png'),
           (19, 'Rattata', 'img/tipos/normal.png', NULL, 'Roedor muy común que muerde cualquier cosa con sus colmillos afilados.', 'img/pokemones/19.png'),
           (20, 'Raticate', 'img/tipos/normal.png', NULL, 'Sus colmillos crecen constantemente, por lo que los roe para mantenerlos cortos.', 'img/pokemones/20.png'),
           (21, 'Spearow', 'img/tipos/normal.png', 'img/tipos/volador.png', 'Pese a su pequeño tamaño, es muy territorial y no dudará en atacar a cualquiera que se acerque.', 'img/pokemones/21.png'),
           (22, 'Fearow', 'img/tipos/normal.png', 'img/tipos/volador.png', 'Tiene un cuello largo y un pico grande. Caza presas pequeñas volando alto en el cielo.', 'img/pokemones/22.png'),
           (23, 'Ekans', 'img/tipos/veneno.png', NULL, 'Se enrosca para descansar. Su cuerpo largo y flexible le permite deslizarse silenciosamente.', 'img/pokemones/23.png'),
           (24, 'Arbok', 'img/tipos/veneno.png', NULL, 'El patrón de su panza intimida a sus enemigos. Puede apretar a su presa hasta asfixiarla.', 'img/pokemones/24.png'),
           (25, 'Pikachu', 'img/tipos/electrico.png', NULL, 'Cuando acumula demasiada electricidad, la libera de una vez, causando descargas potentes.', 'img/pokemones/25.png');
