  CREATE TABLE users (
    id_agente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    username VARCHAR(50) DEFAULT NULL,    
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    link_facebook VARCHAR(150) DEFAULT NULL,
    link_twitter VARCHAR(150) DEFAULT NULL,
    link_google VARCHAR(150) DEFAULT NULL,
    recuerdame VARCHAR(2) DEFAULT NULL,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    fecha_firma_ok_acuerdo DATETIME DEFAULT CURRENT_TIMESTAMP

  );


  
  CREATE TABLE subastas (
    id_subasta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    expediente_subasta VARCHAR(50) NOT NULL,
    lote_subasta VARCHAR(5) NOT NULL,
    ref_catastral VARCHAR(25) NOT NULL,
    descrip_detallada TEXT,
    notas_privadas TEXT,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_agente INT NOT NULL 
  );

  

  CREATE TABLE multimedia (
    id_multimedia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_subasta INT NOT NULL,
    fecha_alta DATETIME DEFAULT CURRENT_TIMESTAMP,
    nombre_fichero VARCHAR(150) NOT NULL,
    tipo_fichero VARCHAR(25) NOT NULL,
    ubicacion_fichero VARCHAR(25) NOT NULL 
  );