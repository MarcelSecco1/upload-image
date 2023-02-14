CREATE TABLE imagens
(
   id                   serial          NOT NULL,      
   nome                 varchar(300)    NOT NULL,
   tipo                 varchar(100)    NOT NULL,
   tamanho              varchar(100)    NOT NULL,
   imagem        bytea           NOT NULL, 
   CONSTRAINT pk_id_arquivo PRIMARY KEY (id)	
);
