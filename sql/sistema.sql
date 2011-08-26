CREATE TABLE adm_links_menu (
  id_adm_links_menu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  adm_menu_id_adm_menu INTEGER UNSIGNED NOT NULL,
  label VARCHAR(50) NULL,
  anchor VARCHAR(255) NULL,
  image VARCHAR(255) NULL,
  PRIMARY KEY(id_adm_links_menu),
  INDEX adm_links_menu_FKIndex1(adm_menu_id_adm_menu)
)
;

CREATE TABLE adm_menu (
  id_adm_menu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(id_adm_menu)
)
;

CREATE TABLE adm_sublink_menu (
  id_sublink_menu INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  adm_links_menu_id_adm_links_menu INTEGER UNSIGNED NOT NULL,
  label VARCHAR(255) NULL,
  anchor VARCHAR(255) NULL,
  image VARCHAR(255) NULL,
  PRIMARY KEY(id_sublink_menu),
  INDEX adm_sublink_menu_FKIndex1(adm_links_menu_id_adm_links_menu)
)
;

CREATE TABLE adm_tipo_usuario (
  id_tipo_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  tipo VARCHAR(50) NULL,
  PRIMARY KEY(id_tipo_usuario)
)
;

CREATE TABLE adm_usuario (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  adm_tipo_usuario_id_tipo_usuario INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(50) NULL,
  login VARCHAR(50) NULL,
  senha VARCHAR(50) NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(id_usuario),
  INDEX adm_usuario_FKIndex1(adm_tipo_usuario_id_tipo_usuario)
)
;

CREATE TABLE cli_contato (
  id_contato INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  valor VARCHAR(255) NULL,
  tipo ENUM ('endereco', 'telefone', 'email','descricao'),
  PRIMARY KEY(id_contato)
)
;

CREATE TABLE cli_message (
  idi_message INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cli_visitor_id_visitor INTEGER UNSIGNED NOT NULL,
  mensagem TEXT NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(idi_message),
  INDEX cli_message_FKIndex1(cli_visitor_id_visitor)
)
;

CREATE TABLE cli_visitor (
  id_visitor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NULL,
  email VARCHAR(100) NULL,
  telefone VARCHAR(50) NULL,
  created_at TIMESTAMP NULL,
  ip VARCHAR(255) NULL,
  PRIMARY KEY(id_visitor)
)
;

CREATE TABLE sys_media (
  id_media INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  sys_secao_id_sys_secao INTEGER UNSIGNED NOT NULL,
  sys_subsecao_id_sys_subsecao INTEGER UNSIGNED NULL,
  sys_media_type_id_media_type INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(50) NULL,
  path VARCHAR(255) NULL,
  media BLOB NULL,
  hash VARCHAR(255) NULL,
  obs TEXT NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(id_media),
  INDEX sys_media_FKIndex1(sys_media_type_id_media_type),
  INDEX sys_media_FKIndex2(sys_secao_id_sys_secao),
  INDEX sys_media_FKIndex3(sys_subsecao_id_sys_subsecao)
)
;

CREATE TABLE sys_media_type (
  id_media_type INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  mediatype VARCHAR(50) NULL,
  PRIMARY KEY(id_media_type)
)
;

CREATE TABLE sys_secao (
  id_sys_secao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(id_sys_secao)
)
;

CREATE TABLE secao_has_menu (
  sys_secao_id_sys_secao INTEGER UNSIGNED NOT NULL,
  adm_menu_id_adm_menu INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(sys_secao_id_sys_secao, adm_menu_id_adm_menu),
  INDEX sys_secao_has_adm_menu_FKIndex1(sys_secao_id_sys_secao),
  INDEX sys_secao_has_adm_menu_FKIndex2(adm_menu_id_adm_menu)
);

CREATE TABLE sys_subsecao (
  id_sys_subsecao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  sys_secao_id_sys_secao INTEGER UNSIGNED NOT NULL,
  nome VARCHAR(50) NULL,
  created_at TIMESTAMP NULL,
  PRIMARY KEY(id_sys_subsecao),
  INDEX sys_subsecao_FKIndex1(sys_secao_id_sys_secao)
)
;

INSERT INTO adm_tipo_usuario (tipo) VALUES ('dev'),('custumer');

INSERT INTO adm_usuario (adm_tipo_usuario_id_tipo_usuario,nome,login,senha) VALUES(1,'ADMINISTRADOR','admin','21232f297a57a5a743894a0e4a801fc3');


ALTER TABLE `adm_usuario` ADD `email` VARCHAR( 100 ) NOT NULL AFTER `senha` 

ALTER TABLE  `sys_secao` ADD  `qnt_sub` INT NOT NULL AFTER  `nome`
