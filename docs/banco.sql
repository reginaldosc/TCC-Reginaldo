/*
######### RG - Quality #########
Data 07/09/2012

- Script para criação das tabelas do Banco de dados e inserção de alguns dados default do sistema. -

*/


CREATE SCHEMA IF NOT EXISTS rg_quality DEFAULT CHARACTER SET utf8;

 USE rg_quality;



-- -----------------------------------------------------
-- Table rg_quality.Status
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Status (
  
  statusID 		INT NOT NULL AUTO_INCREMENT ,
  statusNome	VARCHAR(45) NOT NULL ,
  statusCode  VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (statusID)


  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Unidade
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Unidade (
  
  unidadeID INT NOT NULL AUTO_INCREMENT ,
  unidadeNome VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (unidadeID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Departamento
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Departamento (
 
  departamentoID INT NOT NULL AUTO_INCREMENT ,
  departamentoNome VARCHAR(45) NOT NULL ,
  unidadeID INT NOT NULL ,
  
  PRIMARY KEY (departamentoID) ,
  FOREIGN KEY (unidadeID) REFERENCES rg_quality.Unidade(unidadeID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Tipo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Tipo (
  
  tipoID INT NOT NULL AUTO_INCREMENT ,
  tipoNome VARCHAR(45) NOT NULL ,
  
  PRIMARY KEY (tipoID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Cargo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Cargo (
  
  cargoID INT NOT NULL AUTO_INCREMENT ,
  cargoNome VARCHAR(45) NOT NULL ,
  cargoAtivo VARCHAR(3) NOT NULL, 	
  
  PRIMARY KEY (cargoID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Usuario (
  
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
-- Table rg_quality.Mensagem
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Mensagem (
  
  mensagemID 	INT NOT NULL AUTO_INCREMENT ,
  mensagemBody	VARCHAR(45) NOT NULL ,
  mensagemData 	TIMESTAMP NOT NULL ,
  usuarioID 	INT NOT NULL ,
  
  PRIMARY KEY (mensagemID) ,

  FOREIGN KEY (usuarioID) REFERENCES rg_quality.Usuario (usuarioID)

  )ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table rg_quality.Artefato
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Artefato (
  
  artefatoID INT NOT NULL AUTO_INCREMENT ,
  artefatoNome VARCHAR(45) NOT NULL ,
  artefatoDescricao TEXT NOT NULL ,
  
  PRIMARY KEY (artefatoID)

  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Projeto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Projeto (
  
  projetoID INT NOT NULL AUTO_INCREMENT ,
  projetoNome VARCHAR(45) NOT NULL ,
  departamentoID INT NOT NULL ,
  
  PRIMARY KEY (projetoID) ,
  
  FOREIGN KEY (departamentoID) REFERENCES rg_quality.Departamento (departamentoID)
  
  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Auditoria
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Auditoria (
  
  auditoriaID INT NOT NULL AUTO_INCREMENT ,
  auditorID INT NOT NULL ,
  acompanhanteID INT,
  projetoID INT NOT NULL ,
  auditoriaDataInicio DATE NOT NULL ,
  auditoriaDataFinal DATE NULL ,
  statusID INT NOT NULL ,	
  
  PRIMARY KEY (auditoriaID) ,
  
  FOREIGN KEY (projetoID) REFERENCES rg_quality.Projeto (projetoID) ,
  FOREIGN KEY (statusID) REFERENCES rg_quality.Status (statusID) ,
  FOREIGN KEY (auditorID) REFERENCES rg_quality.Usuario (usuarioID),
  FOREIGN KEY (acompanhanteID) REFERENCES rg_quality.Usuario (usuarioID)

  )ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table rg_quality.NC
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.NC (
  
  ncID INT NOT NULL AUTO_INCREMENT ,
  ncDescricao VARCHAR(45) NOT NULL ,
  ncDataFinalprev DATE NOT NULL ,
  ncDataFinal DATE NULL ,
  ncComentario TEXT NOT NULL,

  auditoriaID INT NOT NULL ,
  statusID INT NOT NULL ,
  artefatoID INT NOT NULL ,   

  PRIMARY KEY (ncID),

  FOREIGN KEY (statusID) REFERENCES rg_quality.Status (statusID) ,
  FOREIGN KEY (artefatoID) REFERENCES rg_quality.Artefato (artefatoID) ,
  FOREIGN KEY (auditoriaID) REFERENCES rg_quality.Auditoria (auditoriaID)


  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.AC
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.AC (
 
  acID INT NOT NULL AUTO_INCREMENT ,
  acDescricao TEXT NOT NULL ,
  acDataFinal DATE NULL ,
  acAcao VARCHAR(45) NOT NULL,
  statusID INT NOT NULL ,
  ncID INT NOT NULL ,   
  
  PRIMARY KEY (acID) ,

  FOREIGN KEY (ncID) REFERENCES rg_quality.NC (ncID) ,
  FOREIGN KEY (statusID) REFERENCES rg_quality.Status (statusID)
  
  )ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table rg_quality.Projeto_Artefato
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS rg_quality.Projeto_Artefato (
  
  projetoID INT NOT NULL ,
  artefatoID INT NOT NULL ,
  statusID INT NOT NULL ,
  
  PRIMARY KEY (projetoID, artefatoID,statusID) ,
  
  FOREIGN KEY (projetoID) REFERENCES rg_quality.Projeto (projetoID) ,
  FOREIGN KEY (artefatoID) REFERENCES rg_quality.Artefato (artefatoID),
  FOREIGN KEY (statusID) REFERENCES rg_quality.Status (statusID)

  )ENGINE = InnoDB;


/*
##### Abaixo script adicional para fazer a inserção dos dados default no sistema #####
*/



-- Inserindo Status --
INSERT INTO rg_quality.Status VALUES (null, 'Agendada'      , 'info');
INSERT INTO rg_quality.Status VALUES (null, 'Realizada'     , 'success');
INSERT INTO rg_quality.Status VALUES (null, 'Andamento'     , 'warning');
INSERT INTO rg_quality.Status VALUES (null, 'Não Aplicável' , 'info');
INSERT INTO rg_quality.Status VALUES (null, 'Conforme'      , 'success');
INSERT INTO rg_quality.Status VALUES (null, 'Não Conforme'  , 'important');
INSERT INTO rg_quality.Status VALUES (null, 'Aberta'        , 'important');
INSERT INTO rg_quality.Status VALUES (null, 'Fechada'       , 'success');
INSERT INTO rg_quality.Status VALUES (null, 'Executada'     , 'warning');


-- Inserindo Unidades de negocio --
INSERT INTO rg_quality.Unidade VALUES (null, 'ISOL');
INSERT INTO rg_quality.Unidade VALUES (null, 'INET');
INSERT INTO rg_quality.Unidade VALUES (null, 'ISEC');


-- Inserindo departamentos --
INSERT INTO rg_quality.Departamento VALUES (null, 'SIP e Rede', 1);
INSERT INTO rg_quality.Departamento VALUES (null, 'UC', 1);
INSERT INTO rg_quality.Departamento VALUES (null, 'Grandes Sistemas', 1);
INSERT INTO rg_quality.Departamento VALUES (null, 'BroadBand', 2);
INSERT INTO rg_quality.Departamento VALUES (null, 'Cameras IP', 3);


-- Inserindo tipos de usuario --
INSERT INTO rg_quality.Tipo VALUES (null, 'Admin');
INSERT INTO rg_quality.Tipo VALUES (null, 'Auditor');
INSERT INTO rg_quality.Tipo VALUES (null, 'Supervisor');
INSERT INTO rg_quality.Tipo VALUES (null, 'Usuario');


-- Inserindo Cargo --
INSERT INTO rg_quality.Cargo VALUES (null, 'Técnico', 'SIM');
INSERT INTO rg_quality.Cargo VALUES (null, 'Analista', 'SIM');
INSERT INTO rg_quality.Cargo VALUES (null, 'Engenheiro', 'SIM');


-- Inserindo Usuario --
--									  (ID, Nome, Matricula, Login, Password, Email, cargoID, departamentoID, tipoID) --
INSERT INTO rg_quality.Usuario VALUES (null, 'Administrador',000001, 'admin','admin','admin@localhost.com', 2, 1, 1);
INSERT INTO rg_quality.Usuario VALUES (null, 'Marcello',000002, 'marcelo','marcelo','marcelo@auditor.com', 2, 1, 2);
INSERT INTO rg_quality.Usuario VALUES (null, 'Fabiane',000003, 'fabiane','fabiane','fabiane@supervisor.com', 2, 1, 3);
INSERT INTO rg_quality.Usuario VALUES (null, 'Alessandra',000004, 'alessandra','alessandra','alessandra@usuario.com', 2, 1, 4);


-- Inserindo Projeto --
INSERT INTO rg_quality.Projeto VALUES (null, 'Gateway Cisco', 1);
INSERT INTO rg_quality.Projeto VALUES (null, 'Modem ADSL', 4);


-- Inserindo Artefatos --
INSERT INTO rg_quality.Artefato VALUES (null, 'ATA-Reunião', 'ATA da Reunião de abertura do projeto');
INSERT INTO rg_quality.Artefato VALUES (null, 'Cronograma', 'Cronograma Macro das Atividades do Projeto');
INSERT INTO rg_quality.Artefato VALUES (null, 'Requisitos', 'Documento Detalhado dos Requisitos do Sistema');

