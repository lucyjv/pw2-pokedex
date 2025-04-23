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
    VALUES (1,'Bulbasaur','planta.png', 'veneno.png','Este Pokémon nace con una semilla en el lomo, que brota con el paso del tiempo.', '1.png')
