CREATE TABLE administradores(
    id_incremental INT(11) PRIMARY KEY AUTO_INCREMENT,
    usuario varchar(100),
    contrasenia varchar(100)
);

INSERT INTO administradores(usuario, contrasenia) VALUES('admin', '1234');