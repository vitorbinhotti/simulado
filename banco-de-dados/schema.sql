create database crud_SAEP;
use crud_SAEP;

create table turmas (
    id_turma int not null auto_increment primary key,
    nome varchar(45) not null,
    serie varchar(45) not null,
    quantidade_aluno int not null default (0)
)

create table professores (
    id_professor int not null auto_increment primary key,
    nome varchar(45) not null,
    email varchar(85) not null,
    materia varchar(45) not null,
    fk_turma int not null,
    FOREIGN KEY (fk_turma) references turmas(id_turma)
)

create table alunos (
    id_aluno int not null auto_increment primary key,
    nome varchar(45) not null,
    fk_turma int not null,
    FOREIGN KEY (fk_turma) references turmas(id_turma)
)

create table atividades (
    id_atividade int not null auto_increment primary key,
    descricao varchar(45) not null,
    fk_turma int not null,
    FOREIGN KEY (fk_turma) references turmas(id_turma),
    fk_professor int not null,
    FOREIGN key (fk_professor) references professores(id_professor)
);
