  CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
  );
  
  CREATE TABLE subastas (
    id_subasta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    expediente_subasta VARCHAR(50) NOT NULL UNIQUE,
    lote_subasta VARCHAR(5) NOT NULL UNIQUE,
    ref_catastral VARCHAR(25) NOT NULL UNIQUE,
    descrip_detallada TEXT,
    notas_privadas TEXT,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_agente INT NOT NULL UNIQUE
  );

  CREATE TABLE agentes (
    id_agente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    link_facebook VARCHAR(150) NOT NULL UNIQUE,
    link_twitter VARCHAR(150) NOT NULL UNIQUE,
    link_google VARCHAR(150) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(50) NOT NULL UNIQUE,
    recuerdame VARCHAR(2) NOT NULL UNIQUE,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_firma_ok_acuerdo DATETIME DEFAULT CURRENT_TIMESTAMP
  );

  CREATE TABLE multimedia (
    id_multimedia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_subasta INT NOT NULL,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    nombre_fichero VARCHAR(150) NOT NULL,
    tipo_fichero VARCHAR(25) NOT NULL,
    ubicacion_fichero VARCHAR(25) NOT NULL 
  );