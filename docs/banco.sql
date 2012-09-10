/*
  ######### RG - Quality #########
  
  Data 07/09/2012

  - Script para criação das tabelas do Banco de dados e inserção de alguns dados default do sistema. -

*/


CREATE SCHEMA IF NOT EXISTS rg_quality DEFAULT CHARACTER SET utf8;

 USE rg_quality;


-- -----------------------------------------------------
-- Table rg_quality.Unidade
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Unidade (
  
  unidadeID INT NOT NULL AUTO_INCREMENT ,
  unidadeNome VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (unidadeID) 

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Departamento
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Departamento (
 
  departamentoID INT NOT NULL AUTO_INCREMENT ,
  departamentoNome VARCHAR(45) NOT NULL ,
  unidadeID INT NOT NULL ,
  
  PRIMARY KEY (departamentoID) ,
  FOREIGN KEY (unidadeID) REFERENCES rg_quality.Unidade(unidadeID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Tipo
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Tipo (
  
  tipoID INT NOT NULL AUTO_INCREMENT ,
  tipoNome VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (tipoID) 

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Cargo
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Cargo (
  
  cargoID INT NOT NULL AUTO_INCREMENT ,
  cargoNome VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (cargoID) 

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Usuario
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Usuario (
  
  usuarioID INT NOT NULL AUTO_INCREMENT ,
  usuarioNome VARCHAR(45) NOT NULL ,
  usuarioMatricula INT NOT NULL ,
  usuarioLogin VARCHAR(10) NOT NULL ,
  usuarioPassword VARCHAR(10) NOT NULL ,
  usuarioEmail VARCHAR(45) NOT NULL ,
  cargoID INT NOT NULL ,
  departamentoID INT NOT NULL ,
  tipoID INT NOT NULL ,
  
  PRIMARY KEY (usuarioID) ,

  FOREIGN KEY (cargoID) REFERENCES rg_quality.Cargo (cargoID) ,
  FOREIGN KEY (departamentoID) REFERENCES rg_quality.Departamento (departamentoID) ,
  FOREIGN KEY (tipoID) REFERENCES rg_quality.Tipo (tipoID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Escalonamento
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Escalonamento (
  
  escalonamentoID INT NOT NULL AUTO_INCREMENT ,
  escalonamentoData DATE NOT NULL ,
  
  PRIMARY KEY (escalonamentoID) 

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Artefato
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Artefato (
  
  artefatoID INT NOT NULL AUTO_INCREMENT ,
  artefatoNome VARCHAR(45) NOT NULL ,
  artefatoDescricao TEXT NULL ,
  
  PRIMARY KEY (artefatoID) 

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Projeto
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Projeto (
  
  projetoID INT NOT NULL AUTO_INCREMENT ,
  projetoNome VARCHAR(45) NOT NULL ,
  departamentoID INT NOT NULL ,
  
  PRIMARY KEY (projetoID) ,
  
  FOREIGN KEY (departamentoID) REFERENCES rg_quality.Departamento (departamentoID)
  
  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Auditoria
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Auditoria (
  
  auditoriaID INT NOT NULL AUTO_INCREMENT ,
  auditorID INT NOT NULL ,
  projetoID INT NOT NULL ,
  auditoriaDataInicio DATE NOT NULL ,
  auditoriaDataFinal DATE NULL ,
  
  PRIMARY KEY (auditoriaID) ,
  
  FOREIGN KEY (projetoID) REFERENCES rg_quality.Projeto (projetoID) ,
  FOREIGN KEY (auditorID) REFERENCES rg_quality.Usuario (usuarioID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.AC
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.AC (
 
  acID INT NOT NULL AUTO_INCREMENT ,
  acDataFinal DATE NULL ,
  acDescricao TEXT NOT NULL ,
  
  PRIMARY KEY (acID) 
  
  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.NC
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.NC (
  
  ncID INT NOT NULL AUTO_INCREMENT ,
  ncDescricao VARCHAR(45) NOT NULL ,
  ncStatus VARCHAR(45) NOT NULL ,
  ncDataFinalprev DATE NOT NULL ,
  ncDataFinal DATE NULL ,
  ncComentario VARCHAR(45) NULL ,

  escalonamentoID INT NOT NULL ,
  acID INT NOT NULL ,
  auditoriaID INT NOT NULL ,
  
  PRIMARY KEY (ncID) ,

  FOREIGN KEY (escalonamentoID) REFERENCES rg_quality.Escalonamento (escalonamentoID) ,
  FOREIGN KEY (acID) REFERENCES rg_quality.AC (acID) ,
  FOREIGN KEY (auditoriaID) REFERENCES rg_quality.Auditoria (auditoriaID) 


  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Projeto_Artefato
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Projeto_Artefato (
  
  projetoID INT NOT NULL ,
  artefatoID INT NOT NULL ,
  
  PRIMARY KEY (projetoID, artefatoID) ,
  
  FOREIGN KEY (projetoID) REFERENCES rg_quality.Projeto (projetoID) ,
  FOREIGN KEY (artefatoID) REFERENCES rg_quality.Artefato (artefatoID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Auditoria_Usuario
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS rg_quality.Auditoria_Usuario (
  
  auditoriaID INT NOT NULL ,
  acompanhanteID INT NOT NULL ,
  
  PRIMARY KEY (auditoriaID,acompanhanteID) ,

  FOREIGN KEY (auditoriaID) REFERENCES rg_quality.Auditoria (auditoriaID) , 
  FOREIGN KEY (acompanhanteID) REFERENCES rg_quality.Usuario (usuarioID)

  )ENGINE = InnoDB;


/* 
  #####  Abaixo script adicional para fazer a inserção dos dados default no sistema #####
*/


-- Inserindo Unidades de negocio -- 
INSERT INTO rg_quality.Unidade  VALUES (null, 'ISOL');
INSERT INTO rg_quality.Unidade  VALUES (null, 'INET');
INSERT INTO rg_quality.Unidade  VALUES (null, 'ISEC');


-- Inserindo departamentos  -- 
INSERT INTO rg_quality.Departamento  VALUES (null, 'SIP e Rede', 1);
INSERT INTO rg_quality.Departamento  VALUES (null, 'UC', 1);
INSERT INTO rg_quality.Departamento  VALUES (null, 'Grandes Sistemas', 1);
INSERT INTO rg_quality.Departamento  VALUES (null, 'BroadBand', 2);
INSERT INTO rg_quality.Departamento  VALUES (null, 'Cameras IP', 3);


-- Inserindo tipos de usuario -- 
INSERT INTO rg_quality.Tipo  VALUES (null, 'Admin');
INSERT INTO rg_quality.Tipo  VALUES (null, 'Auditor');
INSERT INTO rg_quality.Tipo  VALUES (null, 'Supervisor');


-- Inserindo Cargo -- 
INSERT INTO rg_quality.Cargo  VALUES (null, 'Técnico');
INSERT INTO rg_quality.Cargo  VALUES (null, 'Analista');
INSERT INTO rg_quality.Cargo  VALUES (null, 'Engenheiro');


-- Inserindo Usuario -- 
INSERT INTO rg_quality.Usuario  VALUES (null, 'Administrador',000001, 'admin','admin','admin@localhost.com', 2, 1, 1);


-- Inserindo Projeto -- 
INSERT INTO rg_quality.Projeto  VALUES (null, 'Gateway Cisco', 1);
INSERT INTO rg_quality.Projeto  VALUES (null, 'Modem ADSL', 4);









