## 

## Desafio Para Programador Full-Stack KUAU 

​	Esse projeto full-stack foi desenvolvido por José Dagmar Florentino da Silva Sobrinho para o Desafio da KUAU. O projeto consiste em duas etapas: sendo a primeira etapa é a parte de back-end envolve na criação de um banco de dados MySQL e uma API **REST** em PHP na utilização de dados de turmas e de alunos de uma escola, e já a segunda etapa é a parte de front-end envolve na criação de um sistema de gerenciamento da escola feita em Angular.

### Etapa 1: Back-End

### Tecnologias Utilizadas

- PHP
- API REST
- Banco de Dados MySQL

### Entidades

Esse projeto consiste em duas entidades que serão usadas: Turma e Aluno.

#### Turma

Atributos:

- ID (INT) --> Chave Primaria 
- Nome (STRING)
- Serie (STRING)

#### Aluno

Atributos:

- ID (INT) --> Chave Primaria 
- Nome (STRING)
- Email (STRING)
- Data de Nascimento (DATE)
- Turma ID --> Chave Estrangeira para Entidade Turma

### Requisitosde API

Os requisitos de API deste projeto foram criados baseado nas instruções SQL e utilizando o sistema CRUD na criação dos requisitos. Os requisitos foram testados no programa de API Client chamado Postman.

 #### Requisitos de Turma

##### Cadastro de turmas

Função: Sua API deve permitir cadastrar turmas.

Instrução SQL: INSERT INTO Turma SET nome = :nome, serie = :serie;

URL do Requisito: http://localhost:8000/api/createTurma.php

##### Atualização de turmas

Função: Sua API deve permitir atualizar o nome das turmas.

Instrução SQL:  UPDATE Turma SET nome = :nome WHERE id = :id;

URL do Requisito: http://localhost:8000/api/updateTurma.php

##### Listagem de turmas

Função: Sua API deve permitir listar as turmas da escola. 

Instrução SQL: SELECT id, nome, serie FROM Turma;

URL do Requisito: http://localhost:8000/api/readTurma.php

##### Exclusão de turmas

Função: Sua API deve permitir excluir turmas.

Instrução SQL: DELETE FROM Turma WHERE id = :id;

URL do Requisito: http://localhost:8000/api/deleteTurma.php

 #### Requisitos de Aluno

##### Cadastro de alunos

Função: Sua API deve permitir cadastrar alunos.

Instrução SQL: INSERT INTO Aluno SET nome = :nome, email = :email, dataDeNascimento = :dataDeNascimento, turmaID = :turmaID;  

URL do Requisito: http://localhost:8000/api/createAluno.php

##### Atualização de alunos

Função: Sua API deve permitir atualizar o nome, email e data de nascimento dos alunos.

Instrução SQL:  UPDATE Aluno SET nome = :nome, email = :email, dataDeNascimento = :dataDeNascimento WHERE id = :id";

URL do Requisito: http://localhost:8000/api/updateAluno.php

##### Exclusão de alunos

Função: Sua API deve permitir excluir alunos.

Instrução SQL: DELETE FROM Turma WHERE id = :id;

URL do Requisito: http://localhost:8000/api/deleteAluno.php

##### Listagem de alunos da turma

Função: Sua API deve permitir listar os alunos de uma turma específica. 

Instrução SQL: SELECT nome, email, dataDeNascimento, turmaID FROM Aluno WHERE turmaID = :turmaID;

URL do Requisito: http://localhost:8000/api/readAlunoByTurma.php

##### Listagem de alunos da escola

Função: Permitir listar todos os alunos da escola. 

Instrução SQL: SELECT id, nome, email, dataDeNascimento, turmaID FROM Aluno;

URL do Requisito: http://localhost:8000/api/readAluno.php

### Instruções de Acesso

#### Acesso e criação do Banco de Dados MySQL

- mysql -u root -p

- CREATE DATABASE escoladb;

- use escoladb;

- Criação das duas entidades no banco de dados:

  CREATE TABLE IF NOT EXISTS `Turma` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(256) NOT NULL,
    `serie` varchar(50),  
    UNIQUE (`nome`),
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

  CREATE TABLE IF NOT EXISTS `Aluno` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nome` varchar(256) NOT NULL,
    `email` varchar(50),
    `dataDeNascimento` datetime NOT NULL,
    `turmaID` int(11) NOT NULL,  
    UNIQUE (`email`),
    PRIMARY KEY (`id`),
    CONSTRAINT `FK_TurmaAluno` FOREIGN KEY (`turmaID`)
    REFERENCES `Turma`(`id`)
  ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;

#### Acesso para rodar o projeto PHP:

- cd escola-php-rest-mysql
- php -S localhost:8000



​		















