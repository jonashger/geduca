<?php
  function RunFirstSQL()
  {
    require('admin/conexao.php');
    $sql="DROP DATABASE IF EXISTS geduca;
CREATE DATABASE geduca;
USE geduca;

/*
	Tabela Estado
*/
DROP TABLE IF EXISTS uf;
CREATE TABLE uf (
  id   int(10) NOT NULL AUTO_INCREMENT comment 'PK da tabela',
  nome varchar(40) NOT NULL comment 'Nome do Estado para ser usado nas localizações',
  CONSTRAINT FKuf
    PRIMARY KEY (id),
  INDEX (id)) comment='Tabela com a lista de estados' engine=InnoDB;

/*
	Tabela estado
*/
DROP TABLE IF EXISTS cidade;
CREATE TABLE cidade (
  id     int(6) NOT NULL AUTO_INCREMENT,
  id_uf  int(10) NOT NULL comment 'id do estado que essa cidade se encontra',
  nome   varchar(40) NOT NULL comment 'Nome da cidade',
  ufnome varchar(40) comment 'Nome do estado',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_uf)) comment='tabela com a lista de todas as cidade ligadas aos seus estados' engine=InnoDB;
ALTER TABLE cidade ADD INDEX FKcidade_id_uf (id_uf), ADD CONSTRAINT FKcidade_uf FOREIGN KEY (id_uf) REFERENCES uf (id);


/*
	Tabela Prefeitura
*/
DROP TABLE IF EXISTS prefeitura;
CREATE TABLE prefeitura (
  cnpj               int(14) NOT NULL AUTO_INCREMENT,
  nome               varchar(120) NOT NULL,
  id_uf              int(10) NOT NULL,
  id_cidade          int(6) NOT NULL,
  cidade             varchar(120),
  uf                 varchar(40),
  tipo_loclalizacao  varchar(20) comment 'tipo_localizacao refere-se a uma rua, linha, comunidade.....provável que seja sempre rua, mas podem existir exceções.',
  numero_localizacao int(10),
  nome_localizacao   varchar(90),
  bairro             varchar(60),
  CEP                int(10) NOT NULL,
  serial             varchar(18) NOT NULL,
  logo               varchar(150),
  PRIMARY KEY (cnpj)) comment='tabela da prefeitura vai armazenar algumas informações básicas sobre a prefeitura' engine=InnoDB;
ALTER TABLE prefeitura ADD INDEX FKprefeitura_cidade (id_cidade), ADD CONSTRAINT FKprefeitura_cidade FOREIGN KEY (id_cidade) REFERENCES cidade (id);
ALTER TABLE prefeitura ADD INDEX FKprefeitura_uf (id_uf), ADD CONSTRAINT FKprefeitura_uf FOREIGN KEY (id_uf) REFERENCES uf (id);

/*
	Tabela Email da prefeitura
*/
DROP TABLE IF EXISTS email_prefeitura;
CREATE TABLE email_prefeitura (
  id        int(6) NOT NULL AUTO_INCREMENT,
  pref_cnpj int(14) NOT NULL comment 'cnpj da prefeitura',
  email     varchar(90) NOT NULL,
  PRIMARY KEY (id)) comment='tabela com os emails da prefeitura' engine=InnoDB;
ALTER TABLE email_prefeitura ADD INDEX FKemail_pref_cnpj (pref_cnpj), ADD CONSTRAINT FKemail_pref_cnpj FOREIGN KEY (pref_cnpj) REFERENCES prefeitura (cnpj);


/*
	Telefone Prefeitura
*/
DROP TABLE IF EXISTS telefone_prefeitura;
CREATE TABLE telefone_prefeitura (
  id        int(6) NOT NULL AUTO_INCREMENT,
  pref_cnpj int(14) NOT NULL,
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'Número do telefone/celular',
  PRIMARY KEY (id),
  CONSTRAINT ck_telefone_prefeitura_tipo
    CHECK (tipo IN ('F','C','A'))) comment='Tabelas com os telefone da prefeitura' engine=InnoDB;
ALTER TABLE telefone_prefeitura ADD INDEX FKtelefone_pref_cnpj (pref_cnpj), ADD CONSTRAINT FKtelefone_pref_cnpj FOREIGN KEY (pref_cnpj) REFERENCES prefeitura (cnpj);

/*
	Tabela Escola
*/
DROP TABLE IF EXISTS escola;
CREATE TABLE escola (
  id                 int(6) NOT NULL AUTO_INCREMENT,
  cnpj_prefeitura    int(14) NOT NULL comment 'CNPJ da prefeitura a qual a escola pertence',
  nome               varchar(150) NOT NULL comment 'Nome da escola',
  tipo_localizacao   varchar(20) NOT NULL comment 'Se é rua/avenida/localidade',
  numero_localizacao int(10) comment 'Número da edificação',
  nome_localizacao   varchar(60) NOT NULL comment 'Nome da rua por exemplo',
  bairro             varchar(40) comment 'Bairro que se encontra',
  logo               varchar(150) comment 'Logo se tiver',
  PRIMARY KEY (id)) comment='Tabela que vai armazenar as informações de cada escola do município' engine=InnoDB;
ALTER TABLE escola ADD INDEX FKescola_cnpjPrefeitura (cnpj_prefeitura), ADD CONSTRAINT FKescola_cnpjPrefeitura FOREIGN KEY (cnpj_prefeitura) REFERENCES prefeitura (cnpj);

/*
	Telefone escola
*/
DROP TABLE IF EXISTS telefone_escola;
CREATE TABLE telefone_escola (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_escola int(6) NOT NULL,
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'Número do telefone/celular',
  PRIMARY KEY (id),
  CONSTRAINT ck_telefone_escola_tipo
    CHECK (tipo IN ('F','C','A'))) comment='Telefones das escolas.....cada escola pode ter mais que um.' engine=InnoDB;
ALTER TABLE telefone_escola ADD INDEX FKtelefone_escola (id_escola), ADD CONSTRAINT FKtelefone_escola FOREIGN KEY (id_escola) REFERENCES escola (id);

/*
	Email escola
*/
DROP TABLE IF EXISTS email_escola;
CREATE TABLE email_escola (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_escola int(6) NOT NULL,
  email     varchar(90) NOT NULL comment 'email da escola',
  PRIMARY KEY (id)) comment='emails das escolas.....cada escola pode ter vários emails' engine=InnoDB;
ALTER TABLE email_escola ADD INDEX FKemail_escola (id_escola), ADD CONSTRAINT FKemail_escola FOREIGN KEY (id_escola) REFERENCES escola (id);


/*
	Tabela funcao
*/
DROP TABLE IF EXISTS funcao;
CREATE TABLE funcao (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(60) NOT NULL comment 'Nome da função',
  PRIMARY KEY (id)) comment='professor/diretor/vice-diretor.....' engine=InnoDB;

/* Tabela tipo_funcao*/
DROP TABLE IF EXISTS tipo_funcao;
CREATE TABLE tipo_funcao (
  id        int(6) NOT NULL AUTO_INCREMENT,
  nome      varchar(90) NOT NULL comment 'Nome do tipo da função',
  id_funcao int(6) NOT NULL comment 'Id função, util princípalmente para os professores',
  PRIMARY KEY (id)) comment='tipo_funcao =
professor --> professor matematica, portugues....' engine=InnoDB;
ALTER TABLE tipo_funcao ADD INDEX FKtipo_funcao_id_funcao (id_funcao), ADD CONSTRAINT FKtipo_funcao_id_funcao FOREIGN KEY (id_funcao) REFERENCES funcao (id);

/*Tipo_ano*/
DROP TABLE IF EXISTS tipo_ano;
CREATE TABLE tipo_ano (
  id   int(6) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL comment 'Nome do tipo do ano, exemplos, bimestre, semestre......',
  PRIMARY KEY (id)) comment='vai armazenar os tipos de anos letivos.....bimestre, trimestre, semestre....' engine=InnoDB;

/* tabela ano_letivo*/
DROP TABLE IF EXISTS ano_letivo;
CREATE TABLE ano_letivo (
  id          int(6) NOT NULL AUTO_INCREMENT,
  ano         int(10) NOT NULL,
  id_tipo_ano int(6) NOT NULL,
  PRIMARY KEY (id)) comment='Essa tabela vai conter os anos....2017/2018/2019....' engine=InnoDB;
ALTER TABLE ano_letivo ADD INDEX FKano_letivo_tipo_ano (id_tipo_ano), ADD CONSTRAINT FKano_letivo_tipo_ano FOREIGN KEY (id_tipo_ano) REFERENCES tipo_ano (id);

/*Tabela turno*/
DROP TABLE IF EXISTS turno;
CREATE TABLE turno (
  id          int(6) NOT NULL AUTO_INCREMENT,
  nome        varchar(14) NOT NULL,
  hora_inicio time NOT NULL,
  hora_final  time NOT NULL,
  tempo_aula  time,
  PRIMARY KEY (id)) comment='Vai conter os turnos.....cada turma estará em um turno' engine=InnoDB;

/* Tabela tempo intervalo turno*/
DROP TABLE IF EXISTS tempo_intervalo_turno;
CREATE TABLE tempo_intervalo_turno (
  id              int(6) NOT NULL AUTO_INCREMENT,
  id_turno        int(6) NOT NULL,
  tempo_intervalo time NOT NULL comment 'tempo do intervalo',
  PRIMARY KEY (id)) comment='Vai armazenar os intervalos que cada turno tem.....um turno integral pode ter mais que um intervalo' engine=InnoDB;
ALTER TABLE tempo_intervalo_turno ADD INDEX FKtempo_intervalo_turno_idTurno (id_turno), ADD CONSTRAINT FKtempo_intervalo_turno_idTurno FOREIGN KEY (id_turno) REFERENCES turno (id);

/*Tabela turma_ano*/
DROP TABLE IF EXISTS turma_ano;
CREATE TABLE turma_ano (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(20) NOT NULL comment 'Nome da turma/série....exemplo, 1 Série, 2 Série',
  PRIMARY KEY (id)) comment='turma_ano: 1 série/2 série/3 serie' engine=InnoDB;

/*Tabela turma_ano_turma*/
DROP TABLE IF EXISTS turma_ano_turma;
CREATE TABLE turma_ano_turma (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_turma_ano int(6) NOT NULL,
  nome         varchar(20) NOT NULL comment 'Nome da turma, exemplo 1A, 2A',
  PRIMARY KEY (id)) comment='turma_ano_turma:
1 série -> 1A - 2A - A3' engine=InnoDB;
ALTER TABLE turma_ano_turma ADD INDEX FKturma_ano_turma_idTurmaAno (id_turma_ano), ADD CONSTRAINT FKturma_ano_turma_idTurmaAno FOREIGN KEY (id_turma_ano) REFERENCES turma_ano (id);

/*Tabela turma*/
DROP TABLE IF EXISTS turma;
CREATE TABLE turma (
  id                 int(6) NOT NULL AUTO_INCREMENT,
  nome               varchar(90) NOT NULL comment 'Nome da turma que podera ser Turma 11, 12',
  id_escola          int(6) NOT NULL comment 'id da escola onde a turma se encontra',
  id_turno           int(6) NOT NULL comment 'Turno que a turma está',
  id_ano_letivo      int(6) NOT NULL comment 'Vai conter o ano dessa turma',
  id_turma_ano       int(6) NOT NULL comment 'Vai conter o ano/série que essa turma está',
  id_turma_ano_turma int(6) NOT NULL comment 'Vai conter em específico qual é a turma',
  CONSTRAINT FKTurma
    PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_escola),
  INDEX (id_turno),
  INDEX (id_ano_letivo),
  INDEX (id_turma_ano),
  INDEX (id_turma_ano_turma)) comment='Vai armazenar algumas informações das turmas....todo ano o sistema vai recriar as turmas, jogando os alunos nas suas devidas turmas se aprovados....e as antigas ficarão salvas para fins de relatórios.' engine=InnoDB;
ALTER TABLE turma ADD INDEX FKturma_escola (id_escola), ADD CONSTRAINT FKturma_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE turma ADD INDEX FKturma_turno (id_turno), ADD CONSTRAINT FKturma_turno FOREIGN KEY (id_turno) REFERENCES turno (id);
ALTER TABLE turma ADD INDEX FKturma_ano_letivo (id_ano_letivo), ADD CONSTRAINT FKturma_ano_letivo FOREIGN KEY (id_ano_letivo) REFERENCES ano_letivo (id);
ALTER TABLE turma ADD INDEX FKturma_turmaAno (id_turma_ano), ADD CONSTRAINT FKturma_turmaAno FOREIGN KEY (id_turma_ano) REFERENCES turma_ano (id);
ALTER TABLE turma ADD INDEX FKturma_TurmaAnoTurma (id_turma_ano_turma), ADD CONSTRAINT FKturma_TurmaAnoTurma FOREIGN KEY (id_turma_ano_turma) REFERENCES turma_ano_turma (id);

/* tabela tipo_pessoa*/
DROP TABLE IF EXISTS tipo_pessoa;
CREATE TABLE tipo_pessoa (
  id   int(6) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL comment 'Nome do tipo, exemplo
Mãe, Pai, Professor, Aluno',
  PRIMARY KEY (id)) comment='Tipo de pessoa, se for pai, aluno, professor, funcionário.......' engine=InnoDB;

/*Tabela paiz*/
DROP TABLE IF EXISTS paiz;
CREATE TABLE paiz (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(90) NOT NULL comment 'Nome do país',
  PRIMARY KEY (id)) comment='contem a lista de países para o cadastro dos alunos e pais' engine=InnoDB;

/*Tabela pessoa*/
DROP TABLE IF EXISTS pessoa;
CREATE TABLE pessoa (
  id                int(6) NOT NULL AUTO_INCREMENT,
  nivel_permissao   int(1) NOT NULL comment 'É o nível de permissão que cada pessoa vai ter
0 = Total
1 = Direção da escola
2 = Secretários
3 = professores
4 = Pais
5 = Alunos',
  id_tipo_pessoa    int(6) NOT NULL comment 'Se for professor, pai, aluno......',
  id_funcao         int(6) comment 'Se for funcionário, vai obrigar a selecionar qual função exerce na escola',
  id_turma_atual    int(6) comment 'Se for aluno, vai ficar salvo qual a turma atual do aluno',
  email             varchar(90) comment 'Para todos os usuários exceto os alunos, vão ser obrigatório um email para logar no sistema, tal email não pode repetir',
  password          varchar(128) comment 'Para usuários com acesso ao sistema, uma senha encriptada',
  nome              varchar(90) comment 'Nome da pessoa',
  numero_certidao   int(32) comment 'Vai armazenar os números das certidões de nascimento dos alunos, não será obrigado dos pais e funcionários',
  cpf               int(11) comment 'CPF para pais e professores obrigatório, alunos opcional',
  rg                varchar(26) comment 'RG para pais e professores obrigatório, alunos opcional',
  data_nascimento   date NOT NULL comment 'Data de nascimento da pessoa',
  data_cadastro     timestamp NOT NULL comment 'Data em que a pessoa foi cadastrada',
  data_alteracao    timestamp NOT NULL comment 'Data de alteração do cadastro da pessoa',
  id_paiz_natural   int(6) NOT NULL comment 'País onde a pessoa nasceu' 	,
  id_uf_natural     int(10) NOT NULL comment 'Estado que a pessoa nasceu',
  id_cidade_natural int(6) NOT NULL comment 'Cidade em que a pessoa nasceu',
  id_uf_atual       int(10) NOT NULL comment 'Estado atual que a pessoa vive',
  id_cidade_atual   int(6) NOT NULL comment 'Cidade atual que a pessoa vive',
  sexo              char(1) comment 'Sexo da pessoa
M -> Masculino
F -> Femenino' 	,
  id_pai            int(6) NOT NULL comment 'Pai do aluno, só será obrigatório os pais dos alunos',
  id_mae            int(6) NOT NULL comment 'Mãe do aluno, só será obrigatório para alunos',
  tipo_responsavel  int(10) comment 'Se tiver outra pessoa responsável pelo aluno que não sejam os pais',
  concluiu          tinyint comment 'Se for aluno e concluiu o ensino fundamental vai ficar com 1, senão com 0',
  logado            tinyint,
  PRIMARY KEY (id),
  INDEX (id),
  UNIQUE INDEX (email),
  CONSTRAINT ck_pessoa_sexo
    CHECK (sexo IN ('F','M')),
  CONSTRAINT ck_pessoa_concluiu
    CHECK (concluiu IN ('1','0'))) comment='Armazena todas as pessoas cadastradas no sistema, isso incluí, pessoas que trabalham nas escolas, pais dos aluno e os alunos....
O que os diferencia é o tipo_pessoa
Por isso campos como email e senha podem ser nulos, já que os alunos não terão uma conta a princípio para acessar o sistema.' ENGINE=InnoDB;
ALTER TABLE pessoa ADD INDEX FKpessoa_tipo_pessoa (id_tipo_pessoa), ADD CONSTRAINT FKpessoa_tipo_pessoa FOREIGN KEY (id_tipo_pessoa) REFERENCES tipo_pessoa (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_turma_atual (id_turma_atual), ADD CONSTRAINT FKpessoa_turma_atual FOREIGN KEY (id_turma_atual) REFERENCES turma (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_paiz_natural (id_paiz_natural), ADD CONSTRAINT FKpessoa_paiz_natural FOREIGN KEY (id_paiz_natural) REFERENCES paiz (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_cidade_natural (id_cidade_natural), ADD CONSTRAINT FKpessoa_cidade_natural FOREIGN KEY (id_cidade_natural) REFERENCES cidade (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_cidade_atual (id_cidade_atual), ADD CONSTRAINT FKpessoa_cidade_atual FOREIGN KEY (id_cidade_atual) REFERENCES cidade (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_uf_natural (id_uf_natural), ADD CONSTRAINT FKpessoa_uf_natural FOREIGN KEY (id_uf_natural) REFERENCES uf (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_uf_atual (id_uf_atual), ADD CONSTRAINT FKpessoa_uf_atual FOREIGN KEY (id_uf_atual) REFERENCES uf (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_funcao (id_funcao), ADD CONSTRAINT FKpessoa_funcao FOREIGN KEY (id_funcao) REFERENCES funcao (id);

/*Tabela pessoa_email*/
DROP TABLE IF EXISTS pessoa_email;
CREATE TABLE pessoa_email (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL comment 'ID da pessoa cadastrada',
  email     varchar(90) NOT NULL comment 'Email alternativo da pessoa cadastrada',
  PRIMARY KEY (id)) comment='Caso a pessoa tenha mais um email alternativo' engine=InnoDB;
ALTER TABLE pessoa_email ADD INDEX FKpessoa_email_idPessoa (id_pessoa), ADD CONSTRAINT FKpessoa_email_idPessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela pessoa_telefone*/
DROP TABLE IF EXISTS pessoa_telefone;
CREATE TABLE pessoa_telefone (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL comment 'ID da pessoa',
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'número do telefone da pessoa',
  PRIMARY KEY (id),
  CONSTRAINT ck_pessoa_telefone_tipo
    CHECK (tipo IN ('F','C','A'))) comment='telefone da pessoa, caso tenha mais de um' engine=InnoDB;
ALTER TABLE pessoa_telefone ADD INDEX FKpessoa_telefone_idPessoa (id_pessoa), ADD CONSTRAINT FKpessoa_telefone_idPessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela recupera_senha*/
DROP TABLE IF EXISTS recupera_senha;
CREATE TABLE recupera_senha (
  id        int(5) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL,
  token     int(6) NOT NULL comment 'número de 6 digitos, que vai permitir a pessoa definir uma nova senha, esse token será enviado ao email da pessoa',
  data      date NOT NULL comment 'Data da solicitacao do token',
  ativo     tinyint NOT NULL comment 'Se esse token já foi usado.',
  PRIMARY KEY (id),
  INDEX (id_pessoa),
  CONSTRAINT ck_recupera_senha_ativo
    CHECK (ativo IN (1,0))) comment='Se a pessoa esquecer a senha, vai ir na parte de recuperar a senha....inserir seu email e vai gerar um token de recuperação de 6 digitos, esse será enviado ao seu email, e só assim vai conseguir recuperar seu email.' engine=InnoDB;
ALTER TABLE recupera_senha ADD INDEX FKrecupera_senha_pessoa (id_pessoa), ADD CONSTRAINT FKrecupera_senha_pessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela materia_padrao*/
DROP TABLE IF EXISTS materia_padrao;
CREATE TABLE materia_padrao (
  id      int(3) NOT NULL AUTO_INCREMENT,
  nome    varchar(40) NOT NULL comment 'nome da matéria',
  aspecto tinyint(1) NOT NULL comment '1 se tiver aspecto
0 Se não tiver aspecto',
  PRIMARY KEY (id),
  CONSTRAINT ck_materia_aspecto
    CHECK (aspecto IN ('1','0'))) comment='Vai armazenar os nomes das matérias padrão....poderão ser cadastradas uma vez, utilizadas ao criar as novas matérias...' engine=InnoDB;

/*Tabela materia_padrao_aspecto*/
DROP TABLE IF EXISTS materia_aspecto_padrao;
CREATE TABLE materia_aspecto_padrao (
  id                int(3) NOT NULL AUTO_INCREMENT,
  id_materia_padrao int(3) NOT NULL comment 'Id da matéria padrão',
  nome              varchar(90) NOT NULL comment 'nome do aspecto',
  PRIMARY KEY (id)) comment='Vai armazenar os nomes dos aspectos das matérias, as que tiverem aspecto......vai servir para gerar os novas matérias' engine=InnoDB;
ALTER TABLE materia_aspecto_padrao ADD INDEX FKmateria_aspecto_idMateriaPadrao (id_materia_padrao), ADD CONSTRAINT FKmateria_aspecto_idMateriaPadrao FOREIGN KEY (id_materia_padrao) REFERENCES materia_padrao (id);


/*tabela materia*/
DROP TABLE IF EXISTS materia;
CREATE TABLE materia (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_turma     int(6) NOT NULL,
  id_professor int(6) NOT NULL,
  nome         varchar(40) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_turma),
  INDEX (id_professor)) comment='Vai armazenar as matérias.....está relacionada a turma e seu respectivo professor.
Cada ano vai gerar matérias novas......' engine=InnoDB;
ALTER TABLE materia ADD INDEX FKmateria_turma (id_turma), ADD CONSTRAINT FKmateria_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE materia ADD INDEX FKmateria_professor (id_professor), ADD CONSTRAINT FKmateria_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);


/*Tabela aluno_turma*/
DROP TABLE IF EXISTS aluno_turma;
CREATE TABLE aluno_turma (
  id         int(6) NOT NULL AUTO_INCREMENT,
  id_aluno   int(6) NOT NULL,
  id_turma   int(6) NOT NULL,
  id_materia int(6) NOT NULL,
  id_escola  int(6) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_turma),
  INDEX (id_materia),
  INDEX (id_escola)) comment='Vai relacionar cada aluno a sua respectivas turmas, matérias e a sua escola.....
Vai gerar registros de cada aluno a sua turma e todas as matérias' engine=InnoDB;
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_turma (id_turma), ADD CONSTRAINT FKaluno_turma_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_materia (id_materia), ADD CONSTRAINT FKaluno_turma_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_escola (id_escola), ADD CONSTRAINT FKaluno_turma_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_aluno (id_aluno), ADD CONSTRAINT FKaluno_turma_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);


/*tabela materia_aspecto*/
DROP TABLE IF EXISTS materia_aspecto;
CREATE TABLE materia_aspecto (
  id         int(10) NOT NULL AUTO_INCREMENT,
  id_materia int(6) NOT NULL,
  aspecto    varchar(255) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_materia)) comment='Como no ensino infantil de SJO cada matéria tem aspectos, essa tabela vai conter esses aspectos, já relacionados a matéria' engine=InnoDB;
ALTER TABLE materia_aspecto ADD INDEX FKmateria_aspecto_materia (id_materia), ADD CONSTRAINT FKmateria_aspecto_materia FOREIGN KEY (id_materia) REFERENCES materia (id);

/*tabela professor_materia*/
DROP TABLE IF EXISTS professor_materia;
CREATE TABLE professor_materia (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_materia   int(6) NOT NULL,
  id_professor int(6) NOT NULL,
  id_turma     int(6) NOT NULL,
  PRIMARY KEY (id)) comment='Por padrão cada matéria deve ter um professor....caso tenha um ou mais professor(es) auxiliar(es)....ficarão salvos aqui.' engine=InnoDB;
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_idMateria (id_materia), ADD CONSTRAINT FKprofessor_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_professor (id_professor), ADD CONSTRAINT FKprofessor_materia_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_turma (id_turma), ADD CONSTRAINT FKprofessor_materia_turma FOREIGN KEY (id_turma) REFERENCES turma (id);

/*tabela tipo_ano_letivo*/
DROP TABLE IF EXISTS tipo_ano_letivo;
CREATE TABLE tipo_ano_letivo (
  id                      int(6) NOT NULL AUTO_INCREMENT,
  id_ano_letivo           int(6) NOT NULL comment 'vai armazenar o id do ano letivo, para saber qual o tipo',
  nome_tipo               varchar(15) NOT NULL comment 'Nome do ano/período letivo',
  periodo_inicio          date NOT NULL comment 'Data de inicio das aulas' 		,
  periodo_fim             date NOT NULL comment 'Data do fim das aulas',
  total_periodo_dias_aula int(10) comment 'quantidade de dias de aula, excluí dias que não tem aula, esse período é do bimestre/semestre.....',
  PRIMARY KEY (id)) comment='para cada novo ano letivo, vai criar um ou mais novo(s) registro(s) nessa tabela, para futuros relatórios.... se baseando no tipo do ano letivo, se for semestre cria dois, se for bimestre cria quatro......' engine=InnoDB;
ALTER TABLE tipo_ano_letivo ADD INDEX FKtipo_ano_letivo_idAnoLetivo (id_ano_letivo), ADD CONSTRAINT FKtipo_ano_letivo_idAnoLetivo FOREIGN KEY (id_ano_letivo) REFERENCES ano_letivo (id);

/*Tabela nota_aluno_aspecto*/
DROP TABLE IF EXISTS nota_aluno_aspecto;
CREATE TABLE nota_aluno_aspecto (
  id                    int(6) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria',
  id_aspecto            int(10) NOT NULL comment 'id do aspecto',
  id_turma              int(6) NOT NULL comment 'id da turma a que esse aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo, pode ser primeiro bimestre por exemplo',
  id_professor          int(6) NOT NULL comment 'id do professor dessa matéria que vai dar  a nota ao aluno',
  nota                  numeric(2, 2) NOT NULL comment 'Nota do aluno',
  obs                   varchar(255) comment 'Observação do desempenho do aluno nesse aspecto',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_aspecto),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_professor)) comment='Se baseando no boletim da escola de SJO, as notas são dadas por aspectos....mas isso é opcional, pois pode ser só por matéria.' engine=InnoDB;
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_materia (id_materia), ADD CONSTRAINT FKnota_aluno_aspecto_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_idAspecto (id_aspecto), ADD CONSTRAINT FKnota_aluno_aspecto_idAspecto FOREIGN KEY (id_aspecto) REFERENCES materia_aspecto (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_turma (id_turma), ADD CONSTRAINT FKnota_aluno_aspecto_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKnota_aluno_aspecto_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_professor (id_professor), ADD CONSTRAINT FKnota_aluno_aspecto_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_aluno (id_aluno), ADD CONSTRAINT FKnota_aluno_aspecto_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*Tabela nota_aluno_materia*/
DROP TABLE IF EXISTS nota_aluno_materia;
CREATE TABLE nota_aluno_materia (
  id                    int(6) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria que o aluno frequenta',
  id_turma              int(6) NOT NULL comment 'id da turma que o aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo...pode ser o primeiro bimestre de um ano por exemplo',
  id_professor          int(6) NOT NULL comment 'id do professor da matéria que lançou a nota',
  nota                  numeric(2, 2) NOT NULL comment 'nota que o aluno recebeu, essa seria a nota final que apareceria no relatório',
  obs                   varchar(255) comment 'Uma breve observação em relação ao desempenho do aluno na matéria',
  PRIMARY KEY (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_professor)) comment='Se a escola/turma dá nota só por matéria vai aqui.....se faz o uso de aspectos, ele faz uma média das notas por aspecto e salva aqui.' engine=InnoDB;
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_idMateria (id_materia), ADD CONSTRAINT FKnota_aluno_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_turma (id_turma), ADD CONSTRAINT FKnota_aluno_materia_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKnota_aluno_materia_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_professor (id_professor), ADD CONSTRAINT FKnota_aluno_materia_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_aluno (id_aluno), ADD CONSTRAINT FKnota_aluno_materia_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*tabela turma_aula*/
DROP TABLE IF EXISTS turma_aula;
CREATE TABLE turma_aula (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_turma              int(6) NOT NULL comment 'id da turma',
  id_escola             int(6) NOT NULL comment 'id da escola a qual a turma pertence',
  id_materia            int(6) NOT NULL comment 'id da matéria que é cursada pelos alunos da turma',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo',
  id_professor          int(6) NOT NULL comment 'id do professor que leciona a aula',
  data                  date NOT NULL comment 'data da aula',
  observacao            varchar(600) comment 'Observação geral da aula',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_turma),
  INDEX (id_escola),
  INDEX (id_materia),
  INDEX (id_ano_letivo_periodo)) comment='Essa tabela vai servir para o professor fazer observações da aula....na mesma tela terá a lista dos alunos que vai lhe permitir salvar se o aluno faltou a aula ou não.' engine=InnoDB;
ALTER TABLE turma_aula ADD INDEX FKturma_aula_turma (id_turma), ADD CONSTRAINT FKturma_aula_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_escola (id_escola), ADD CONSTRAINT FKturma_aula_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_materia (id_materia), ADD CONSTRAINT FKturma_aula_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKturma_aula_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_professor (id_professor), ADD CONSTRAINT FKturma_aula_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);

/*Tabela aluno_presenca*/
DROP TABLE IF EXISTS aluno_presenca;
CREATE TABLE aluno_presenca (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria que o aluno cursa',
  id_turma              int(6) NOT NULL comment 'id da turma ao qual o aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'qual período do ano letivo foi',
  id_professor          int(6) NOT NULL comment 'id do professor que leciona a matéria',
  id_turma_aula         int(10) NOT NULL comment 'id da aula do dia X',
  presente              tinyint NOT NULL comment 'Se o aluno estava presente
1 = Faltante
0 = Presente',
  observao_aula         varchar(300) comment 'Observação referente ao aluno nessa aula',
  data                  date NOT NULL comment 'data da aula',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_turma_aula),
  INDEX (presente),
  CONSTRAINT `ck-aluno_presenca_presente`
    CHECK (presente IN (1,0))) comment='Só vai salvar as faltas e vai cálcular a porcentagem de presença a partir da quantidade total de dias de aula por perído.' engine=InnoDB;
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_materia (id_materia), ADD CONSTRAINT FKaluno_presenca_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_turma (id_turma), ADD CONSTRAINT FKaluno_presenca_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKaluno_presenca_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_professor (id_professor), ADD CONSTRAINT FKaluno_presenca_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_aluno (id_aluno), ADD CONSTRAINT FKaluno_presenca_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_turmaAula (id_turma_aula), ADD CONSTRAINT FKaluno_presenca_turmaAula FOREIGN KEY (id_turma_aula) REFERENCES turma_aula (id);

/*tabela avaliacao_materia*/
DROP TABLE IF EXISTS avaliacao_materia;
CREATE TABLE avaliacao_materia (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_materia            int(6) NOT NULL comment 'id da matéria que foi realizada a avaliação',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo',
  nome                  varchar(30) NOT NULL comment 'Nome da avaliação',
  data                  date NOT NULL comment 'dia da avaliação',
  observacao            varchar(300) comment 'Observação relacionada a avaliação',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_materia),
  INDEX (id_ano_letivo_periodo),
  INDEX (data)) comment='Vai armazenar as avaliações realizadas em cada matéria.' engine=InnoDB;
ALTER TABLE avaliacao_materia ADD INDEX FKavaliacao_materia_idMateria (id_materia), ADD CONSTRAINT FKavaliacao_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE avaliacao_materia ADD INDEX FKavaliacao_materia_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKavaliacao_materia_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);

/*tabela nota_avaliacao*/
DROP TABLE IF EXISTS nota_avaliacao;
CREATE TABLE nota_avaliacao (
  id                   int(10) NOT NULL AUTO_INCREMENT,
  id_avaliacao_materia int(10) NOT NULL comment 'id da avaliação',
  id_aluno             int(6) NOT NULL comment 'id do aluno',
  nota                 numeric(2, 2) NOT NULL comment 'nota do aluno',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_avaliacao_materia),
  INDEX (id_aluno)) comment='Vai armazenar as notas dos alunos obtidas na avaliação.' engine=InnoDB;
ALTER TABLE nota_avaliacao ADD INDEX FKnota_avaliacao_avaliacaoMateria (id_avaliacao_materia), ADD CONSTRAINT FKnota_avaliacao_avaliacaoMateria FOREIGN KEY (id_avaliacao_materia) REFERENCES avaliacao_materia (id);
ALTER TABLE nota_avaliacao ADD INDEX FKnota_avaliacao_aluno (id_aluno), ADD CONSTRAINT FKnota_avaliacao_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*Tabela transportadora*/
DROP TABLE IF EXISTS transportadora;
CREATE TABLE transportadora (
  cnpj               int(14) NOT NULL AUTO_INCREMENT comment 'CNPJ da empresa que faz o transporte dos alunos',
  razao_social       int(10) comment 'Razão social da empresa',
  nome_fantasia      varchar(90) NOT NULL comment 'Nome fantasia da empresa',
  id_cidade          int(6) NOT NULL comment 'cidade onde a transportadora está sediada',
  id_uf              int(10) NOT NULL comment 'Estado onde a transportadora está sediada',
  tipo_localizacao   varchar(20) comment 'Se é rua, avenida, linha, comunidade',
  nome_localizacao   varchar(60) comment 'Nome da rua se tiver por exemplo',
  numero_localizacao int(10) comment 'Número da casa que se encontra localizado se existir',
  ativa              tinyint comment 'Se a transportadora estiver ativa = 1, senão = 0',
  PRIMARY KEY (cnpj),
  CONSTRAINT ck_transportadora_ativa
    CHECK (ativa IN (1,0))) comment='Vai armazenar as empresas que disponibilizam veículos e fazem o transporte dos alunos' engine=InnoDB;
ALTER TABLE transportadora ADD INDEX FKtransporta_cidade (id_cidade), ADD CONSTRAINT FKtransporta_cidade FOREIGN KEY (id_cidade) REFERENCES cidade (id);
ALTER TABLE transportadora ADD INDEX FKtransporta_uf (id_uf), ADD CONSTRAINT FKtransporta_uf FOREIGN KEY (id_uf) REFERENCES uf (id);

/*tabela rota*/
DROP TABLE IF EXISTS rota;
CREATE TABLE rota (
  id          int(5) NOT NULL AUTO_INCREMENT,
  nome        varchar(90) NOT NULL comment 'Nome da rota, pode ser de uma comunidade que percorre.',
  descricao   varchar(255) NOT NULL comment 'Descrição das rotas....se for necessário',
  km_percorre float NOT NULL comment 'Km que são percorridos por dia ao percorrer essa rota.',
  ativa       tinyint comment 'Se essa rota ainda existe, se sim 1 se não 0',
  PRIMARY KEY (id),
  CONSTRAINT ck_rota_ativa
    CHECK (ativa IN (1,0))) comment='Vai armazenar as rotas percorridas pelos veículos' engine=InnoDB;

/*tabela veiculo*/
DROP TABLE IF EXISTS veiculo;
CREATE TABLE veiculo (
  id                    int(5) NOT NULL AUTO_INCREMENT,
  cnpj_transportadora   int(14) NOT NULL comment 'CNPJ da empresa que disponibiliza o veículo para transporte',
  id_rota               int(5) NOT NULL comment 'Rota que esse veículo percorre',
  nome                  varchar(90) NOT NULL,
  placa                 varchar(8) NOT NULL comment 'Placa do veículo',
  lotacao_maxima        int(2) NOT NULL comment 'Lotação máxima permitida ao veículo para transportar pessoas.',
  qtd_alunos_transporta int(2) NOT NULL comment 'Quantidade atual de alunos que transporta',
  ativo                 tinyint NOT NULL comment 'Se esse veículo ainda transporta alunos.
Se sim =1, senão =0',
  PRIMARY KEY (id),
  CONSTRAINT ck_veiculo_ativo
    CHECK (ativo IN (1,0))) comment='Tabela que armazena as informações dos veículos que transportam os aunos' engine=InnoDB;
ALTER TABLE veiculo ADD INDEX FKveiculo_rota (id_rota), ADD CONSTRAINT FKveiculo_rota FOREIGN KEY (id_rota) REFERENCES rota (id);
ALTER TABLE veiculo ADD INDEX FKveiculo_cnpjTransportadora (cnpj_transportadora), ADD CONSTRAINT FKveiculo_cnpjTransportadora FOREIGN KEY (cnpj_transportadora) REFERENCES transportadora (cnpj);

/*tabela aluno_rota*/
DROP TABLE IF EXISTS aluno_rota;
CREATE TABLE aluno_rota (
  id                int(5) NOT NULL AUTO_INCREMENT,
  id_rota           int(5) NOT NULL comment 'ID da rota ao qual o aluno percorre' 								,
  id_aluno          int(6) NOT NULL comment 'id do aluno',
  id_escola         int(6) NOT NULL comment 'Escola ao qual o aluno estuda',
  id_veiculo        int(5) NOT NULL comment 'Veículo que faz o transporte dos alunos',
  km_aluno_percorre float NOT NULL comment 'Quilometragem que o aluno percorre.',
  ano               date NOT NULL comment 'Ano desse registro, para fins de relatórios',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_rota),
  INDEX (id_aluno),
  INDEX (id_escola),
  INDEX (ano)) comment='Tabela que associa o aluno a rota' engine=InnoDB;
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_idRota (id_rota), ADD CONSTRAINT FKaluno_rota_idRota FOREIGN KEY (id_rota) REFERENCES rota (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_escola (id_escola), ADD CONSTRAINT FKaluno_rota_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_aluno (id_aluno), ADD CONSTRAINT FKaluno_rota_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_veiculo (id_veiculo), ADD CONSTRAINT FKaluno_rota_veiculo FOREIGN KEY (id_veiculo) REFERENCES veiculo (id);
";
$run = mysqli_query($conn,$sql);
  }

   function RunSecondSQL()
  {
    require('admin/conexao.php');
    $sql="DROP DATABASE IF EXISTS geduca;
CREATE DATABASE geduca;
USE geduca;

/*
	Tabela Estado
*/
DROP TABLE IF EXISTS uf;
CREATE TABLE uf (
  id   int(10) NOT NULL AUTO_INCREMENT comment 'PK da tabela',
  nome varchar(40) NOT NULL comment 'Nome do Estado para ser usado nas localizações',
  CONSTRAINT FKuf
    PRIMARY KEY (id),
  INDEX (id)) comment='Tabela com a lista de estados' engine=InnoDB;

/*
	Tabela estado
*/
ALTER TABLE cidade DROP FOREIGN KEY FKcidade_uf;
DROP TABLE IF EXISTS cidade;
CREATE TABLE cidade (
  id     int(6) NOT NULL AUTO_INCREMENT,
  id_uf  int(10) NOT NULL comment 'id do estado que essa cidade se encontra',
  nome   varchar(40) NOT NULL comment 'Nome da cidade',
  ufnome varchar(40) comment 'Nome do estado',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_uf)) comment='tabela com a lista de todas as cidade ligadas aos seus estados' engine=InnoDB;
ALTER TABLE cidade ADD INDEX FKcidade_id_uf (id_uf), ADD CONSTRAINT FKcidade_uf FOREIGN KEY (id_uf) REFERENCES uf (id);


/*
	Tabela Prefeitura
*/
ALTER TABLE prefeitura DROP FOREIGN KEY FKprefeitura_cidade;
ALTER TABLE prefeitura DROP FOREIGN KEY FKprefeitura_uf;
DROP TABLE IF EXISTS prefeitura;
CREATE TABLE prefeitura (
  cnpj               int(14) NOT NULL AUTO_INCREMENT,
  nome               varchar(120) NOT NULL,
  id_uf              int(10) NOT NULL,
  id_cidade          int(6) NOT NULL,
  cidade             varchar(120),
  uf                 varchar(40),
  tipo_loclalizacao  varchar(20) comment 'tipo_localizacao refere-se a uma rua, linha, comunidade.....provável que seja sempre rua, mas podem existir exceções.',
  numero_localizacao int(10),
  nome_localizacao   varchar(90),
  bairro             varchar(60),
  CEP                int(10) NOT NULL,
  serial             varchar(18) NOT NULL,
  logo               varchar(150),
  PRIMARY KEY (cnpj)) comment='tabela da prefeitura vai armazenar algumas informações básicas sobre a prefeitura' engine=InnoDB;
ALTER TABLE prefeitura ADD INDEX FKprefeitura_cidade (id_cidade), ADD CONSTRAINT FKprefeitura_cidade FOREIGN KEY (id_cidade) REFERENCES cidade (id);
ALTER TABLE prefeitura ADD INDEX FKprefeitura_uf (id_uf), ADD CONSTRAINT FKprefeitura_uf FOREIGN KEY (id_uf) REFERENCES uf (id);

/*
	Tabela Email da prefeitura
*/
ALTER TABLE email_prefeitura DROP FOREIGN KEY FKemail_pref_cnpj;
DROP TABLE IF EXISTS email_prefeitura;
CREATE TABLE email_prefeitura (
  id        int(6) NOT NULL AUTO_INCREMENT,
  pref_cnpj int(14) NOT NULL comment 'cnpj da prefeitura',
  email     varchar(90) NOT NULL,
  PRIMARY KEY (id)) comment='tabela com os emails da prefeitura' engine=InnoDB;
ALTER TABLE email_prefeitura ADD INDEX FKemail_pref_cnpj (pref_cnpj), ADD CONSTRAINT FKemail_pref_cnpj FOREIGN KEY (pref_cnpj) REFERENCES prefeitura (cnpj);


/*
	Telefone Prefeitura
*/
ALTER TABLE telefone_prefeitura DROP FOREIGN KEY FKtelefone_pref_cnpj;
DROP TABLE IF EXISTS telefone_prefeitura;
CREATE TABLE telefone_prefeitura (
  id        int(6) NOT NULL AUTO_INCREMENT,
  pref_cnpj int(14) NOT NULL,
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'Número do telefone/celular',
  PRIMARY KEY (id),
  CONSTRAINT ck_telefone_prefeitura_tipo
    CHECK (tipo IN ('F','C','A'))) comment='Tabelas com os telefone da prefeitura' engine=InnoDB;
ALTER TABLE telefone_prefeitura ADD INDEX FKtelefone_pref_cnpj (pref_cnpj), ADD CONSTRAINT FKtelefone_pref_cnpj FOREIGN KEY (pref_cnpj) REFERENCES prefeitura (cnpj);

/*
	Tabela Escola
*/
ALTER TABLE escola DROP FOREIGN KEY FKescola_cnpjPrefeitura;
DROP TABLE IF EXISTS escola;
CREATE TABLE escola (
  id                 int(6) NOT NULL AUTO_INCREMENT,
  cnpj_prefeitura    int(14) NOT NULL comment 'CNPJ da prefeitura a qual a escola pertence',
  nome               varchar(150) NOT NULL comment 'Nome da escola',
  tipo_localizacao   varchar(20) NOT NULL comment 'Se é rua/avenida/localidade',
  numero_localizacao int(10) comment 'Número da edificação',
  nome_localizacao   varchar(60) NOT NULL comment 'Nome da rua por exemplo',
  bairro             varchar(40) comment 'Bairro que se encontra',
  logo               varchar(150) comment 'Logo se tiver',
  PRIMARY KEY (id)) comment='Tabela que vai armazenar as informações de cada escola do município' engine=InnoDB;
ALTER TABLE escola ADD INDEX FKescola_cnpjPrefeitura (cnpj_prefeitura), ADD CONSTRAINT FKescola_cnpjPrefeitura FOREIGN KEY (cnpj_prefeitura) REFERENCES prefeitura (cnpj);

/*
	Telefone escola
*/
ALTER TABLE telefone_escola DROP FOREIGN KEY FKtelefone_escola;
DROP TABLE IF EXISTS telefone_escola;
CREATE TABLE telefone_escola (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_escola int(6) NOT NULL,
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'Número do telefone/celular',
  PRIMARY KEY (id),
  CONSTRAINT ck_telefone_escola_tipo
    CHECK (tipo IN ('F','C','A'))) comment='Telefones das escolas.....cada escola pode ter mais que um.' engine=InnoDB;
ALTER TABLE telefone_escola ADD INDEX FKtelefone_escola (id_escola), ADD CONSTRAINT FKtelefone_escola FOREIGN KEY (id_escola) REFERENCES escola (id);

/*
	Email escola
*/
ALTER TABLE email_escola DROP FOREIGN KEY FKemail_escola;
DROP TABLE IF EXISTS email_escola;
CREATE TABLE email_escola (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_escola int(6) NOT NULL,
  email     varchar(90) NOT NULL comment 'email da escola',
  PRIMARY KEY (id)) comment='emails das escolas.....cada escola pode ter vários emails' engine=InnoDB;
ALTER TABLE email_escola ADD INDEX FKemail_escola (id_escola), ADD CONSTRAINT FKemail_escola FOREIGN KEY (id_escola) REFERENCES escola (id);


/*
	Tabela funcao
*/
DROP TABLE IF EXISTS funcao;
CREATE TABLE funcao (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(60) NOT NULL comment 'Nome da função',
  PRIMARY KEY (id)) comment='professor/diretor/vice-diretor.....' engine=InnoDB;

/* Tabela tipo_funcao*/
ALTER TABLE tipo_funcao DROP FOREIGN KEY FKtipo_funcao_id_funcao;
DROP TABLE IF EXISTS tipo_funcao;
CREATE TABLE tipo_funcao (
  id        int(6) NOT NULL AUTO_INCREMENT,
  nome      varchar(90) NOT NULL comment 'Nome do tipo da função',
  id_funcao int(6) NOT NULL comment 'Id função, util princípalmente para os professores',
  PRIMARY KEY (id)) comment='tipo_funcao =
professor --> professor matematica, portugues....' engine=InnoDB;
ALTER TABLE tipo_funcao ADD INDEX FKtipo_funcao_id_funcao (id_funcao), ADD CONSTRAINT FKtipo_funcao_id_funcao FOREIGN KEY (id_funcao) REFERENCES funcao (id);

/*Tipo_ano*/
DROP TABLE IF EXISTS tipo_ano;
CREATE TABLE tipo_ano (
  id   int(6) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL comment 'Nome do tipo do ano, exemplos, bimestre, semestre......',
  PRIMARY KEY (id)) comment='vai armazenar os tipos de anos letivos.....bimestre, trimestre, semestre....' engine=InnoDB;

/* tabela ano_letivo*/
ALTER TABLE ano_letivo DROP FOREIGN KEY FKano_letivo_tipo_ano;
DROP TABLE IF EXISTS ano_letivo;
CREATE TABLE ano_letivo (
  id          int(6) NOT NULL AUTO_INCREMENT,
  ano         int(10) NOT NULL,
  id_tipo_ano int(6) NOT NULL,
  PRIMARY KEY (id)) comment='Essa tabela vai conter os anos....2017/2018/2019....' engine=InnoDB;
ALTER TABLE ano_letivo ADD INDEX FKano_letivo_tipo_ano (id_tipo_ano), ADD CONSTRAINT FKano_letivo_tipo_ano FOREIGN KEY (id_tipo_ano) REFERENCES tipo_ano (id);

/*Tabela turno*/
DROP TABLE IF EXISTS turno;
CREATE TABLE turno (
  id          int(6) NOT NULL AUTO_INCREMENT,
  nome        varchar(14) NOT NULL,
  hora_inicio time NOT NULL,
  hora_final  time NOT NULL,
  tempo_aula  time,
  PRIMARY KEY (id)) comment='Vai conter os turnos.....cada turma estará em um turno' engine=InnoDB;

/* Tabela tempo intervalo turno*/
ALTER TABLE tempo_intervalo_turno DROP FOREIGN KEY FKtempo_intervalo_turno_idTurno;
DROP TABLE IF EXISTS tempo_intervalo_turno;
CREATE TABLE tempo_intervalo_turno (
  id              int(6) NOT NULL AUTO_INCREMENT,
  id_turno        int(6) NOT NULL,
  tempo_intervalo time NOT NULL comment 'tempo do intervalo',
  PRIMARY KEY (id)) comment='Vai armazenar os intervalos que cada turno tem.....um turno integral pode ter mais que um intervalo' engine=InnoDB;
ALTER TABLE tempo_intervalo_turno ADD INDEX FKtempo_intervalo_turno_idTurno (id_turno), ADD CONSTRAINT FKtempo_intervalo_turno_idTurno FOREIGN KEY (id_turno) REFERENCES turno (id);

/*Tabela turma_ano*/
DROP TABLE IF EXISTS turma_ano;
CREATE TABLE turma_ano (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(20) NOT NULL comment 'Nome da turma/série....exemplo, 1 Série, 2 Série',
  PRIMARY KEY (id)) comment='turma_ano: 1 série/2 série/3 serie' engine=InnoDB;

/*Tabela turma_ano_turma*/
ALTER TABLE turma_ano_turma DROP FOREIGN KEY FKturma_ano_turma_idTurmaAno;
DROP TABLE IF EXISTS turma_ano_turma;
CREATE TABLE turma_ano_turma (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_turma_ano int(6) NOT NULL,
  nome         varchar(20) NOT NULL comment 'Nome da turma, exemplo 1A, 2A',
  PRIMARY KEY (id)) comment='turma_ano_turma:
1 série -> 1A - 2A - A3' engine=InnoDB;
ALTER TABLE turma_ano_turma ADD INDEX FKturma_ano_turma_idTurmaAno (id_turma_ano), ADD CONSTRAINT FKturma_ano_turma_idTurmaAno FOREIGN KEY (id_turma_ano) REFERENCES turma_ano (id);

/*Tabela turma*/
ALTER TABLE turma DROP FOREIGN KEY FKturma_escola;
ALTER TABLE turma DROP FOREIGN KEY FKturma_turno;
ALTER TABLE turma DROP FOREIGN KEY FKturma_ano_letivo;
ALTER TABLE turma DROP FOREIGN KEY FKturma_turmaAno;
ALTER TABLE turma DROP FOREIGN KEY FKturma_TurmaAnoTurma;
DROP TABLE IF EXISTS turma;
CREATE TABLE turma (
  id                 int(6) NOT NULL AUTO_INCREMENT,
  nome               varchar(90) NOT NULL comment 'Nome da turma que podera ser Turma 11, 12',
  id_escola          int(6) NOT NULL comment 'id da escola onde a turma se encontra',
  id_turno           int(6) NOT NULL comment 'Turno que a turma está',
  id_ano_letivo      int(6) NOT NULL comment 'Vai conter o ano dessa turma',
  id_turma_ano       int(6) NOT NULL comment 'Vai conter o ano/série que essa turma está',
  id_turma_ano_turma int(6) NOT NULL comment 'Vai conter em específico qual é a turma',
  CONSTRAINT FKTurma
    PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_escola),
  INDEX (id_turno),
  INDEX (id_ano_letivo),
  INDEX (id_turma_ano),
  INDEX (id_turma_ano_turma)) comment='Vai armazenar algumas informações das turmas....todo ano o sistema vai recriar as turmas, jogando os alunos nas suas devidas turmas se aprovados....e as antigas ficarão salvas para fins de relatórios.' engine=InnoDB;
ALTER TABLE turma ADD INDEX FKturma_escola (id_escola), ADD CONSTRAINT FKturma_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE turma ADD INDEX FKturma_turno (id_turno), ADD CONSTRAINT FKturma_turno FOREIGN KEY (id_turno) REFERENCES turno (id);
ALTER TABLE turma ADD INDEX FKturma_ano_letivo (id_ano_letivo), ADD CONSTRAINT FKturma_ano_letivo FOREIGN KEY (id_ano_letivo) REFERENCES ano_letivo (id);
ALTER TABLE turma ADD INDEX FKturma_turmaAno (id_turma_ano), ADD CONSTRAINT FKturma_turmaAno FOREIGN KEY (id_turma_ano) REFERENCES turma_ano (id);
ALTER TABLE turma ADD INDEX FKturma_TurmaAnoTurma (id_turma_ano_turma), ADD CONSTRAINT FKturma_TurmaAnoTurma FOREIGN KEY (id_turma_ano_turma) REFERENCES turma_ano_turma (id);

/* tabela tipo_pessoa*/
DROP TABLE IF EXISTS tipo_pessoa;
CREATE TABLE tipo_pessoa (
  id   int(6) NOT NULL AUTO_INCREMENT,
  tipo varchar(20) NOT NULL comment 'Nome do tipo, exemplo
Mãe, Pai, Professor, Aluno',
  PRIMARY KEY (id)) comment='Tipo de pessoa, se for pai, aluno, professor, funcionário.......' engine=InnoDB;

INSERT INTO geduca.tipo_pessoa AS tp (tp.tipo) VALUES ('Administrador');

/*Tabela paiz*/
DROP TABLE IF EXISTS paiz;
CREATE TABLE paiz (
  id   int(6) NOT NULL AUTO_INCREMENT,
  nome varchar(90) NOT NULL comment 'Nome do país',
  PRIMARY KEY (id)) comment='contem a lista de países para o cadastro dos alunos e pais' engine=InnoDB;

/*Tabela pessoa*/
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_pai;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_mae;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_tipo_pessoa;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_turma_atual;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_paiz_natural;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_cidade_natural;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_cidade_atual;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_uf_natural;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_uf_atual;
ALTER TABLE pessoa DROP FOREIGN KEY FKpessoa_funcao;
DROP TABLE IF EXISTS pessoa;
CREATE TABLE pessoa (
  id                int(6) NOT NULL AUTO_INCREMENT,
  nivel_permissao   int(1) NOT NULL comment 'É o nível de permissão que cada pessoa vai ter
0 = Total
1 = Direção da escola
2 = Secretários
3 = professores
4 = Pais
5 = Alunos',
  id_tipo_pessoa    int(6) NOT NULL comment 'Se for professor, pai, aluno......',
  id_funcao         int(6) NOT NULL comment 'Se for funcionário, vai obrigar a selecionar qual função exerce na escola',
  id_turma_atual    int(6) NOT NULL comment 'Se for aluno, vai ficar salvo qual a turma atual do aluno',
  email             varchar(90) comment 'Para todos os usuários exceto os alunos, vão ser obrigatório um email para logar no sistema, tal email não pode repetir',
  password          varchar(128) comment 'Para usuários com acesso ao sistema, uma senha encriptada',
  nome              varchar(90) comment 'Nome da pessoa',
  numero_certidao   int(32) comment 'Vai armazenar os números das certidões de nascimento dos alunos, não será obrigado dos pais e funcionários',
  cpf               int(11) comment 'CPF para pais e professores obrigatório, alunos opcional',
  rg                varchar(26) comment 'RG para pais e professores obrigatório, alunos opcional',
  data_nascimento   date NOT NULL comment 'Data de nascimento da pessoa',
  data_cadastro     timestamp NOT NULL comment 'Data em que a pessoa foi cadastrada',
  data_alteracao    timestamp NOT NULL comment 'Data de alteração do cadastro da pessoa',
  id_paiz_natural   int(6) NOT NULL comment 'País onde a pessoa nasceu' 	,
  id_uf_natural     int(10) NOT NULL comment 'Estado que a pessoa nasceu',
  id_cidade_natural int(6) NOT NULL comment 'Cidade em que a pessoa nasceu',
  id_uf_atual       int(10) NOT NULL comment 'Estado atual que a pessoa vive',
  id_cidade_atual   int(6) NOT NULL comment 'Cidade atual que a pessoa vive',
  sexo              char(1) comment 'Sexo da pessoa
M -> Masculino
F -> Femenino' 	,
  id_pai            int(6) NOT NULL comment 'Pai do aluno, só será obrigatório os pais dos alunos',
  id_mae            int(6) NOT NULL comment 'Mãe do aluno, só será obrigatório para alunos',
  tipo_responsavel  int(10) comment 'Se tiver outra pessoa responsável pelo aluno que não sejam os pais',
  concluiu          tinyint comment 'Se for aluno e concluiu o ensino fundamental vai ficar com 1, senão com 0',
  logado            tinyint,
  PRIMARY KEY (id),
  INDEX (id),
  UNIQUE INDEX (email),
  CONSTRAINT ck_pessoa_sexo
    CHECK (sexo IN ('F','M')),
  CONSTRAINT ck_pessoa_concluiu
    CHECK (concluiu IN ('1','0'))) comment='Armazena todas as pessoas cadastradas no sistema, isso incluí, pessoas que trabalham nas escolas, pais dos aluno e os alunos....
O que os diferencia é o tipo_pessoa
Por isso campos como email e senha podem ser nulos, já que os alunos não terão uma conta a princípio para acessar o sistema.' engine=InnoDB;
ALTER TABLE pessoa ADD INDEX FKpessoa_pai (id_pai), ADD CONSTRAINT FKpessoa_pai FOREIGN KEY (id_pai) REFERENCES pessoa (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_mae (id_mae), ADD CONSTRAINT FKpessoa_mae FOREIGN KEY (id_mae) REFERENCES pessoa (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_tipo_pessoa (id_tipo_pessoa), ADD CONSTRAINT FKpessoa_tipo_pessoa FOREIGN KEY (id_tipo_pessoa) REFERENCES tipo_pessoa (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_turma_atual (id_turma_atual), ADD CONSTRAINT FKpessoa_turma_atual FOREIGN KEY (id_turma_atual) REFERENCES turma (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_paiz_natural (id_paiz_natural), ADD CONSTRAINT FKpessoa_paiz_natural FOREIGN KEY (id_paiz_natural) REFERENCES paiz (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_cidade_natural (id_cidade_natural), ADD CONSTRAINT FKpessoa_cidade_natural FOREIGN KEY (id_cidade_natural) REFERENCES cidade (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_cidade_atual (id_cidade_atual), ADD CONSTRAINT FKpessoa_cidade_atual FOREIGN KEY (id_cidade_atual) REFERENCES cidade (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_uf_natural (id_uf_natural), ADD CONSTRAINT FKpessoa_uf_natural FOREIGN KEY (id_uf_natural) REFERENCES uf (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_uf_atual (id_uf_atual), ADD CONSTRAINT FKpessoa_uf_atual FOREIGN KEY (id_uf_atual) REFERENCES uf (id);
ALTER TABLE pessoa ADD INDEX FKpessoa_funcao (id_funcao), ADD CONSTRAINT FKpessoa_funcao FOREIGN KEY (id_funcao) REFERENCES funcao (id);

/*Tabela pessoa_email*/
ALTER TABLE pessoa_email DROP FOREIGN KEY FKpessoa_email_idPessoa;
DROP TABLE IF EXISTS pessoa_email;
CREATE TABLE pessoa_email (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL comment 'ID da pessoa cadastrada',
  email     varchar(90) NOT NULL comment 'Email alternativo da pessoa cadastrada',
  PRIMARY KEY (id)) comment='Caso a pessoa tenha mais um email alternativo' engine=InnoDB;
ALTER TABLE pessoa_email ADD INDEX FKpessoa_email_idPessoa (id_pessoa), ADD CONSTRAINT FKpessoa_email_idPessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela pessoa_telefone*/
ALTER TABLE pessoa_telefone DROP FOREIGN KEY FKpessoa_telefone_idPessoa;
DROP TABLE IF EXISTS pessoa_telefone;
CREATE TABLE pessoa_telefone (
  id        int(6) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL comment 'ID da pessoa',
  tipo      char(1) NOT NULL comment 'Tipo de telefone, se é celular, fixo, fax.....
Para fixo = F
Celular =   C
Fax =          A',
  numero    varchar(16) NOT NULL comment 'número do telefone da pessoa',
  PRIMARY KEY (id),
  CONSTRAINT ck_pessoa_telefone_tipo
    CHECK (tipo IN ('F','C','A'))) comment='telefone da pessoa, caso tenha mais de um' engine=InnoDB;
ALTER TABLE pessoa_telefone ADD INDEX FKpessoa_telefone_idPessoa (id_pessoa), ADD CONSTRAINT FKpessoa_telefone_idPessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela recupera_senha*/
ALTER TABLE recupera_senha DROP FOREIGN KEY FKrecupera_senha_pessoa;
DROP TABLE IF EXISTS recupera_senha;
CREATE TABLE recupera_senha (
  id        int(5) NOT NULL AUTO_INCREMENT,
  id_pessoa int(6) NOT NULL,
  token     int(6) NOT NULL comment 'número de 6 digitos, que vai permitir a pessoa definir uma nova senha, esse token será enviado ao email da pessoa',
  data      date NOT NULL comment 'Data da solicitacao do token',
  ativo     tinyint NOT NULL comment 'Se esse token já foi usado.',
  PRIMARY KEY (id),
  INDEX (id_pessoa),
  CONSTRAINT ck_recupera_senha_ativo
    CHECK (ativo IN (1,0))) comment='Se a pessoa esquecer a senha, vai ir na parte de recuperar a senha....inserir seu email e vai gerar um token de recuperação de 6 digitos, esse será enviado ao seu email, e só assim vai conseguir recuperar seu email.' engine=InnoDB;
ALTER TABLE recupera_senha ADD INDEX FKrecupera_senha_pessoa (id_pessoa), ADD CONSTRAINT FKrecupera_senha_pessoa FOREIGN KEY (id_pessoa) REFERENCES pessoa (id);

/*Tabela materia_padrao*/
DROP TABLE IF EXISTS materia_padrao;
CREATE TABLE materia_padrao (
  id      int(3) NOT NULL AUTO_INCREMENT,
  nome    varchar(40) NOT NULL comment 'nome da matéria',
  aspecto tinyint(1) NOT NULL comment '1 se tiver aspecto
0 Se não tiver aspecto',
  PRIMARY KEY (id),
  CONSTRAINT ck_materia_aspecto
    CHECK (aspecto IN ('1','0'))) comment='Vai armazenar os nomes das matérias padrão....poderão ser cadastradas uma vez, utilizadas ao criar as novas matérias...' engine=InnoDB;

/*Tabela materia_padrao_aspecto*/
ALTER TABLE materia_aspecto_padrao DROP FOREIGN KEY FKmateria_aspecto_idMateriaPadrao;
DROP TABLE IF EXISTS materia_aspecto_padrao;
CREATE TABLE materia_aspecto_padrao (
  id                int(3) NOT NULL AUTO_INCREMENT,
  id_materia_padrao int(3) NOT NULL comment 'Id da matéria padrão',
  nome              varchar(90) NOT NULL comment 'nome do aspecto',
  PRIMARY KEY (id)) comment='Vai armazenar os nomes dos aspectos das matérias, as que tiverem aspecto......vai servir para gerar os novas matérias' engine=InnoDB;
ALTER TABLE materia_aspecto_padrao ADD INDEX FKmateria_aspecto_idMateriaPadrao (id_materia_padrao), ADD CONSTRAINT FKmateria_aspecto_idMateriaPadrao FOREIGN KEY (id_materia_padrao) REFERENCES materia_padrao (id);


/*tabela materia*/
ALTER TABLE materia DROP FOREIGN KEY FKmateria_turma;
ALTER TABLE materia DROP FOREIGN KEY FKmateria_professor;
DROP TABLE IF EXISTS materia;
CREATE TABLE materia (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_turma     int(6) NOT NULL,
  id_professor int(6) NOT NULL,
  nome         varchar(40) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_turma),
  INDEX (id_professor)) comment='Vai armazenar as matérias.....está relacionada a turma e seu respectivo professor.
Cada ano vai gerar matérias novas......' engine=InnoDB;
ALTER TABLE materia ADD INDEX FKmateria_turma (id_turma), ADD CONSTRAINT FKmateria_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE materia ADD INDEX FKmateria_professor (id_professor), ADD CONSTRAINT FKmateria_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);


/*Tabela aluno_turma*/
ALTER TABLE aluno_turma DROP FOREIGN KEY FKaluno_turma_turma;
ALTER TABLE aluno_turma DROP FOREIGN KEY FKaluno_turma_materia;
ALTER TABLE aluno_turma DROP FOREIGN KEY FKaluno_turma_escola;
ALTER TABLE aluno_turma DROP FOREIGN KEY FKaluno_turma_aluno;
DROP TABLE IF EXISTS aluno_turma;
CREATE TABLE aluno_turma (
  id         int(6) NOT NULL AUTO_INCREMENT,
  id_aluno   int(6) NOT NULL,
  id_turma   int(6) NOT NULL,
  id_materia int(6) NOT NULL,
  id_escola  int(6) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_turma),
  INDEX (id_materia),
  INDEX (id_escola)) comment='Vai relacionar cada aluno a sua respectivas turmas, matérias e a sua escola.....
Vai gerar registros de cada aluno a sua turma e todas as matérias' engine=InnoDB;
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_turma (id_turma), ADD CONSTRAINT FKaluno_turma_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_materia (id_materia), ADD CONSTRAINT FKaluno_turma_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_escola (id_escola), ADD CONSTRAINT FKaluno_turma_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE aluno_turma ADD INDEX FKaluno_turma_aluno (id_aluno), ADD CONSTRAINT FKaluno_turma_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);


/*tabela materia_aspecto*/
ALTER TABLE materia_aspecto DROP FOREIGN KEY FKmateria_aspecto_materia;
DROP TABLE IF EXISTS materia_aspecto;
CREATE TABLE materia_aspecto (
  id         int(10) NOT NULL AUTO_INCREMENT,
  id_materia int(6) NOT NULL,
  aspecto    varchar(255) NOT NULL,
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_materia)) comment='Como no ensino infantil de SJO cada matéria tem aspectos, essa tabela vai conter esses aspectos, já relacionados a matéria' engine=InnoDB;
ALTER TABLE materia_aspecto ADD INDEX FKmateria_aspecto_materia (id_materia), ADD CONSTRAINT FKmateria_aspecto_materia FOREIGN KEY (id_materia) REFERENCES materia (id);

/*tabela professor_materia*/
ALTER TABLE professor_materia DROP FOREIGN KEY FKprofessor_materia_idMateria;
ALTER TABLE professor_materia DROP FOREIGN KEY FKprofessor_materia_professor;
ALTER TABLE professor_materia DROP FOREIGN KEY FKprofessor_materia_turma;
DROP TABLE IF EXISTS professor_materia;
CREATE TABLE professor_materia (
  id           int(6) NOT NULL AUTO_INCREMENT,
  id_materia   int(6) NOT NULL,
  id_professor int(6) NOT NULL,
  id_turma     int(6) NOT NULL,
  PRIMARY KEY (id)) comment='Por padrão cada matéria deve ter um professor....caso tenha um ou mais professor(es) auxiliar(es)....ficarão salvos aqui.' engine=InnoDB;
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_idMateria (id_materia), ADD CONSTRAINT FKprofessor_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_professor (id_professor), ADD CONSTRAINT FKprofessor_materia_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE professor_materia ADD INDEX FKprofessor_materia_turma (id_turma), ADD CONSTRAINT FKprofessor_materia_turma FOREIGN KEY (id_turma) REFERENCES turma (id);

/*tabela tipo_ano_letivo*/
ALTER TABLE tipo_ano_letivo DROP FOREIGN KEY FKtipo_ano_letivo_idAnoLetivo;
DROP TABLE IF EXISTS tipo_ano_letivo;
CREATE TABLE tipo_ano_letivo (
  id                      int(6) NOT NULL AUTO_INCREMENT,
  id_ano_letivo           int(6) NOT NULL comment 'vai armazenar o id do ano letivo, para saber qual o tipo',
  nome_tipo               varchar(15) NOT NULL comment 'Nome do ano/período letivo',
  periodo_inicio          date NOT NULL comment 'Data de inicio das aulas' 		,
  periodo_fim             date NOT NULL comment 'Data do fim das aulas',
  total_periodo_dias_aula int(10) comment 'quantidade de dias de aula, excluí dias que não tem aula, esse período é do bimestre/semestre.....',
  PRIMARY KEY (id)) comment='para cada novo ano letivo, vai criar um ou mais novo(s) registro(s) nessa tabela, para futuros relatórios.... se baseando no tipo do ano letivo, se for semestre cria dois, se for bimestre cria quatro......' engine=InnoDB;
ALTER TABLE tipo_ano_letivo ADD INDEX FKtipo_ano_letivo_idAnoLetivo (id_ano_letivo), ADD CONSTRAINT FKtipo_ano_letivo_idAnoLetivo FOREIGN KEY (id_ano_letivo) REFERENCES ano_letivo (id);

/*Tabela nota_aluno_aspecto*/
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_materia;
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_idAspecto;
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_turma;
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_anoLetivoPeriodo;
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_professor;
ALTER TABLE nota_aluno_aspecto DROP FOREIGN KEY FKnota_aluno_aspecto_aluno;
DROP TABLE IF EXISTS nota_aluno_aspecto;
CREATE TABLE nota_aluno_aspecto (
  id                    int(6) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria',
  id_aspecto            int(10) NOT NULL comment 'id do aspecto',
  id_turma              int(6) NOT NULL comment 'id da turma a que esse aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo, pode ser primeiro bimestre por exemplo',
  id_professor          int(6) NOT NULL comment 'id do professor dessa matéria que vai dar  a nota ao aluno',
  nota                  numeric(2, 2) NOT NULL comment 'Nota do aluno',
  obs                   varchar(255) comment 'Observação do desempenho do aluno nesse aspecto',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_aspecto),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_professor)) comment='Se baseando no boletim da escola de SJO, as notas são dadas por aspectos....mas isso é opcional, pois pode ser só por matéria.' engine=InnoDB;
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_materia (id_materia), ADD CONSTRAINT FKnota_aluno_aspecto_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_idAspecto (id_aspecto), ADD CONSTRAINT FKnota_aluno_aspecto_idAspecto FOREIGN KEY (id_aspecto) REFERENCES materia_aspecto (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_turma (id_turma), ADD CONSTRAINT FKnota_aluno_aspecto_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKnota_aluno_aspecto_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_professor (id_professor), ADD CONSTRAINT FKnota_aluno_aspecto_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE nota_aluno_aspecto ADD INDEX FKnota_aluno_aspecto_aluno (id_aluno), ADD CONSTRAINT FKnota_aluno_aspecto_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*Tabela nota_aluno_materia*/
ALTER TABLE nota_aluno_materia DROP FOREIGN KEY FKnota_aluno_materia_idMateria;
ALTER TABLE nota_aluno_materia DROP FOREIGN KEY FKnota_aluno_materia_turma;
ALTER TABLE nota_aluno_materia DROP FOREIGN KEY FKnota_aluno_materia_anoLetivoPeriodo;
ALTER TABLE nota_aluno_materia DROP FOREIGN KEY FKnota_aluno_materia_professor;
ALTER TABLE nota_aluno_materia DROP FOREIGN KEY FKnota_aluno_materia_aluno;
DROP TABLE IF EXISTS nota_aluno_materia;
CREATE TABLE nota_aluno_materia (
  id                    int(6) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria que o aluno frequenta',
  id_turma              int(6) NOT NULL comment 'id da turma que o aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo...pode ser o primeiro bimestre de um ano por exemplo',
  id_professor          int(6) NOT NULL comment 'id do professor da matéria que lançou a nota',
  nota                  numeric(2, 2) NOT NULL comment 'nota que o aluno recebeu, essa seria a nota final que apareceria no relatório',
  obs                   varchar(255) comment 'Uma breve observação em relação ao desempenho do aluno na matéria',
  PRIMARY KEY (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_professor)) comment='Se a escola/turma dá nota só por matéria vai aqui.....se faz o uso de aspectos, ele faz uma média das notas por aspecto e salva aqui.' engine=InnoDB;
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_idMateria (id_materia), ADD CONSTRAINT FKnota_aluno_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_turma (id_turma), ADD CONSTRAINT FKnota_aluno_materia_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKnota_aluno_materia_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_professor (id_professor), ADD CONSTRAINT FKnota_aluno_materia_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE nota_aluno_materia ADD INDEX FKnota_aluno_materia_aluno (id_aluno), ADD CONSTRAINT FKnota_aluno_materia_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*tabela turma_aula*/
ALTER TABLE turma_aula DROP FOREIGN KEY FKturma_aula_turma;
ALTER TABLE turma_aula DROP FOREIGN KEY FKturma_aula_escola;
ALTER TABLE turma_aula DROP FOREIGN KEY FKturma_aula_materia;
ALTER TABLE turma_aula DROP FOREIGN KEY FKturma_aula_anoLetivoPeriodo;
ALTER TABLE turma_aula DROP FOREIGN KEY FKturma_aula_professor;
DROP TABLE IF EXISTS turma_aula;
CREATE TABLE turma_aula (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_turma              int(6) NOT NULL comment 'id da turma',
  id_escola             int(6) NOT NULL comment 'id da escola a qual a turma pertence',
  id_materia            int(6) NOT NULL comment 'id da matéria que é cursada pelos alunos da turma',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo',
  id_professor          int(6) NOT NULL comment 'id do professor que leciona a aula',
  data                  date NOT NULL comment 'data da aula',
  observacao            varchar(600) comment 'Observação geral da aula',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_turma),
  INDEX (id_escola),
  INDEX (id_materia),
  INDEX (id_ano_letivo_periodo)) comment='Essa tabela vai servir para o professor fazer observações da aula....na mesma tela terá a lista dos alunos que vai lhe permitir salvar se o aluno faltou a aula ou não.' engine=InnoDB;
ALTER TABLE turma_aula ADD INDEX FKturma_aula_turma (id_turma), ADD CONSTRAINT FKturma_aula_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_escola (id_escola), ADD CONSTRAINT FKturma_aula_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_materia (id_materia), ADD CONSTRAINT FKturma_aula_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKturma_aula_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE turma_aula ADD INDEX FKturma_aula_professor (id_professor), ADD CONSTRAINT FKturma_aula_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);

/*Tabela aluno_presenca*/
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_materia;
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_turma;
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_anoLetivoPeriodo;
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_professor;
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_aluno;
ALTER TABLE aluno_presenca DROP FOREIGN KEY FKaluno_presenca_turmaAula;
DROP TABLE IF EXISTS aluno_presenca;
CREATE TABLE aluno_presenca (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_aluno              int(6) NOT NULL comment 'id do aluno',
  id_materia            int(6) NOT NULL comment 'id da matéria que o aluno cursa',
  id_turma              int(6) NOT NULL comment 'id da turma ao qual o aluno pertence',
  id_ano_letivo_periodo int(6) NOT NULL comment 'qual período do ano letivo foi',
  id_professor          int(6) NOT NULL comment 'id do professor que leciona a matéria',
  id_turma_aula         int(10) NOT NULL comment 'id da aula do dia X',
  presente              tinyint NOT NULL comment 'Se o aluno estava presente
1 = Faltante
0 = Presente',
  observao_aula         varchar(300) comment 'Observação referente ao aluno nessa aula',
  data                  date NOT NULL comment 'data da aula',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_aluno),
  INDEX (id_materia),
  INDEX (id_turma),
  INDEX (id_ano_letivo_periodo),
  INDEX (id_turma_aula),
  INDEX (presente),
  CONSTRAINT `ck-aluno_presenca_presente`
    CHECK (presente IN (1,0))) comment='Só vai salvar as faltas e vai cálcular a porcentagem de presença a partir da quantidade total de dias de aula por perído.' engine=InnoDB;
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_materia (id_materia), ADD CONSTRAINT FKaluno_presenca_materia FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_turma (id_turma), ADD CONSTRAINT FKaluno_presenca_turma FOREIGN KEY (id_turma) REFERENCES turma (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKaluno_presenca_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_professor (id_professor), ADD CONSTRAINT FKaluno_presenca_professor FOREIGN KEY (id_professor) REFERENCES pessoa (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_aluno (id_aluno), ADD CONSTRAINT FKaluno_presenca_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);
ALTER TABLE aluno_presenca ADD INDEX FKaluno_presenca_turmaAula (id_turma_aula), ADD CONSTRAINT FKaluno_presenca_turmaAula FOREIGN KEY (id_turma_aula) REFERENCES turma_aula (id);

/*tabela avaliacao_materia*/
ALTER TABLE avaliacao_materia DROP FOREIGN KEY FKavaliacao_materia_idMateria;
ALTER TABLE avaliacao_materia DROP FOREIGN KEY FKavaliacao_materia_anoLetivoPeriodo;
DROP TABLE IF EXISTS avaliacao_materia;
CREATE TABLE avaliacao_materia (
  id                    int(10) NOT NULL AUTO_INCREMENT,
  id_materia            int(6) NOT NULL comment 'id da matéria que foi realizada a avaliação',
  id_ano_letivo_periodo int(6) NOT NULL comment 'id do período do ano letivo',
  nome                  varchar(30) NOT NULL comment 'Nome da avaliação',
  data                  date NOT NULL comment 'dia da avaliação',
  observacao            varchar(300) comment 'Observação relacionada a avaliação',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_materia),
  INDEX (id_ano_letivo_periodo),
  INDEX (data)) comment='Vai armazenar as avaliações realizadas em cada matéria.' engine=InnoDB;
ALTER TABLE avaliacao_materia ADD INDEX FKavaliacao_materia_idMateria (id_materia), ADD CONSTRAINT FKavaliacao_materia_idMateria FOREIGN KEY (id_materia) REFERENCES materia (id);
ALTER TABLE avaliacao_materia ADD INDEX FKavaliacao_materia_anoLetivoPeriodo (id_ano_letivo_periodo), ADD CONSTRAINT FKavaliacao_materia_anoLetivoPeriodo FOREIGN KEY (id_ano_letivo_periodo) REFERENCES tipo_ano_letivo (id);

/*tabela nota_avaliacao*/
ALTER TABLE nota_avaliacao DROP FOREIGN KEY FKnota_avaliacao_avaliacaoMateria;
ALTER TABLE nota_avaliacao DROP FOREIGN KEY FKnota_avaliacao_aluno;
DROP TABLE IF EXISTS nota_avaliacao;
CREATE TABLE nota_avaliacao (
  id                   int(10) NOT NULL AUTO_INCREMENT,
  id_avaliacao_materia int(10) NOT NULL comment 'id da avaliação',
  id_aluno             int(6) NOT NULL comment 'id do aluno',
  nota                 numeric(2, 2) NOT NULL comment 'nota do aluno',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_avaliacao_materia),
  INDEX (id_aluno)) comment='Vai armazenar as notas dos alunos obtidas na avaliação.' engine=InnoDB;
ALTER TABLE nota_avaliacao ADD INDEX FKnota_avaliacao_avaliacaoMateria (id_avaliacao_materia), ADD CONSTRAINT FKnota_avaliacao_avaliacaoMateria FOREIGN KEY (id_avaliacao_materia) REFERENCES avaliacao_materia (id);
ALTER TABLE nota_avaliacao ADD INDEX FKnota_avaliacao_aluno (id_aluno), ADD CONSTRAINT FKnota_avaliacao_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);

/*Tabela transportadora*/
ALTER TABLE transportadora DROP FOREIGN KEY FKtransporta_cidade;
ALTER TABLE transportadora DROP FOREIGN KEY FKtransporta_uf;
DROP TABLE IF EXISTS transportadora;
CREATE TABLE transportadora (
  cnpj               int(14) NOT NULL AUTO_INCREMENT comment 'CNPJ da empresa que faz o transporte dos alunos',
  razao_social       int(10) comment 'Razão social da empresa',
  nome_fantasia      varchar(90) NOT NULL comment 'Nome fantasia da empresa',
  id_cidade          int(6) NOT NULL comment 'cidade onde a transportadora está sediada',
  id_uf              int(10) NOT NULL comment 'Estado onde a transportadora está sediada',
  tipo_localizacao   varchar(20) comment 'Se é rua, avenida, linha, comunidade',
  nome_localizacao   varchar(60) comment 'Nome da rua se tiver por exemplo',
  numero_localizacao int(10) comment 'Número da casa que se encontra localizado se existir',
  ativa              tinyint comment 'Se a transportadora estiver ativa = 1, senão = 0',
  PRIMARY KEY (cnpj),
  CONSTRAINT ck_transportadora_ativa
    CHECK (ativa IN (1,0))) comment='Vai armazenar as empresas que disponibilizam veículos e fazem o transporte dos alunos' engine=InnoDB;
ALTER TABLE transportadora ADD INDEX FKtransporta_cidade (id_cidade), ADD CONSTRAINT FKtransporta_cidade FOREIGN KEY (id_cidade) REFERENCES cidade (id);
ALTER TABLE transportadora ADD INDEX FKtransporta_uf (id_uf), ADD CONSTRAINT FKtransporta_uf FOREIGN KEY (id_uf) REFERENCES uf (id);

/*tabela rota*/
DROP TABLE IF EXISTS rota;
CREATE TABLE rota (
  id          int(5) NOT NULL AUTO_INCREMENT,
  nome        varchar(90) NOT NULL comment 'Nome da rota, pode ser de uma comunidade que percorre.',
  descricao   varchar(255) NOT NULL comment 'Descrição das rotas....se for necessário',
  km_percorre float NOT NULL comment 'Km que são percorridos por dia ao percorrer essa rota.',
  ativa       tinyint comment 'Se essa rota ainda existe, se sim 1 se não 0',
  PRIMARY KEY (id),
  CONSTRAINT ck_rota_ativa
    CHECK (ativa IN (1,0))) comment='Vai armazenar as rotas percorridas pelos veículos' engine=InnoDB;

/*tabela veiculo*/
ALTER TABLE veiculo DROP FOREIGN KEY FKveiculo_rota;
ALTER TABLE veiculo DROP FOREIGN KEY FKveiculo_cnpjTransportadora;
DROP TABLE IF EXISTS veiculo;
CREATE TABLE veiculo (
  id                    int(5) NOT NULL AUTO_INCREMENT,
  cnpj_transportadora   int(14) NOT NULL comment 'CNPJ da empresa que disponibiliza o veículo para transporte',
  id_rota               int(5) NOT NULL comment 'Rota que esse veículo percorre',
  nome                  varchar(90) NOT NULL,
  placa                 varchar(8) NOT NULL comment 'Placa do veículo',
  lotacao_maxima        int(2) NOT NULL comment 'Lotação máxima permitida ao veículo para transportar pessoas.',
  qtd_alunos_transporta int(2) NOT NULL comment 'Quantidade atual de alunos que transporta',
  ativo                 tinyint NOT NULL comment 'Se esse veículo ainda transporta alunos.
Se sim =1, senão =0',
  PRIMARY KEY (id),
  CONSTRAINT ck_veiculo_ativo
    CHECK (ativo IN (1,0))) comment='Tabela que armazena as informações dos veículos que transportam os aunos' engine=InnoDB;
ALTER TABLE veiculo ADD INDEX FKveiculo_rota (id_rota), ADD CONSTRAINT FKveiculo_rota FOREIGN KEY (id_rota) REFERENCES rota (id);
ALTER TABLE veiculo ADD INDEX FKveiculo_cnpjTransportadora (cnpj_transportadora), ADD CONSTRAINT FKveiculo_cnpjTransportadora FOREIGN KEY (cnpj_transportadora) REFERENCES transportadora (cnpj);

/*tabela aluno_rota*/
ALTER TABLE aluno_rota DROP FOREIGN KEY FKaluno_rota_idRota;
ALTER TABLE aluno_rota DROP FOREIGN KEY FKaluno_rota_escola;
ALTER TABLE aluno_rota DROP FOREIGN KEY FKaluno_rota_aluno;
ALTER TABLE aluno_rota DROP FOREIGN KEY FKaluno_rota_veiculo;
DROP TABLE IF EXISTS aluno_rota;
CREATE TABLE aluno_rota (
  id                int(5) NOT NULL AUTO_INCREMENT,
  id_rota           int(5) NOT NULL comment 'ID da rota ao qual o aluno percorre' 								,
  id_aluno          int(6) NOT NULL comment 'id do aluno',
  id_escola         int(6) NOT NULL comment 'Escola ao qual o aluno estuda',
  id_veiculo        int(5) NOT NULL comment 'Veículo que faz o transporte dos alunos',
  km_aluno_percorre float NOT NULL comment 'Quilometragem que o aluno percorre.',
  ano               date NOT NULL comment 'Ano desse registro, para fins de relatórios',
  PRIMARY KEY (id),
  INDEX (id),
  INDEX (id_rota),
  INDEX (id_aluno),
  INDEX (id_escola),
  INDEX (ano)) comment='Tabela que associa o aluno a rota' engine=InnoDB;
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_idRota (id_rota), ADD CONSTRAINT FKaluno_rota_idRota FOREIGN KEY (id_rota) REFERENCES rota (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_escola (id_escola), ADD CONSTRAINT FKaluno_rota_escola FOREIGN KEY (id_escola) REFERENCES escola (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_aluno (id_aluno), ADD CONSTRAINT FKaluno_rota_aluno FOREIGN KEY (id_aluno) REFERENCES pessoa (id);
ALTER TABLE aluno_rota ADD INDEX FKaluno_rota_veiculo (id_veiculo), ADD CONSTRAINT FKaluno_rota_veiculo FOREIGN KEY (id_veiculo) REFERENCES veiculo (id);

";
  $run = mysqli_query($conn,$sql);

  }
 ?>
