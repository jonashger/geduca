<?php
$mod = isset( $_GET[ 'mod' ] ) ? $_GET[ 'mod' ] : null ;

	switch($mod){
		case 'cadSeries'			:
			include "mod/cadSeries.php";
		break;
		case 'perfil' :
			include 'editar/minhaConta.php';
		break;
		case 'editar-alunos' :
			include 'list/listAlunos.php';
		break;
		case 'cadAluno'	:
			include "mod/cadAluno.php";
		break;
		case 'cadastro-de-horario'	:
			include "mod/cadHorario.php";
		break;
		case 'em-breve'	:
			include "mod/em-breve.php";
		break;
		case 'cadFuncao'	:
			include "mod/cadFuncao.php";
		break;
		case 'cadEscola'	:
			include "mod/cadEscola.php";
		break;
		case 'cadastro-de-pessoa'	:
			include "mod/cadPessoa.php";
		break;
		case 'editEscola'	:
			include "list/listEscola.php";
		break;
		case 'cadPrefeitura'	:
			include "mod/cadPrefeitura.php";
		break;
		case 'editPrefeitura'	:
			include "list/listPrefeitura.php";
		break;
 		case 'listEmailEscola':
 			include "list/popUp/listEmailEscola.php";
 			break;
		case 'escolas':
			include "escolas.php";
		break;

		case 'privacity':
			include "mod/privacity.html";
		break;

		/*Alunoss*/
		case 'nota-de-aluno-aluno':
			include "mod/aluno/nota-de-aluno.php";
		break;
		case 'faltas-de-aluno-aluno':
			include "mod/aluno/faltas-de-aluno.php";
		break;
		case 'horario-de-aluno-aluno':
			include "mod/aluno/horario-de-aluno.php";
		break;
		case 'cronograma-de-aluno-aluno':
			include "mod/aluno/cronograma-de-aluno.php";
		break;
		/*Professores*/


		/*Direcao*/
		case 'configurar-horario-direcao':
			include "mod/direcao/config-horario-direcao.php";
		break;
		case 'consulta-faltas-direcao':
			include "mod/direcao/consulta-faltas-direcao.php";
		break;
		case 'consulta-notas-direcao':
			include "mod/direcao/consulta-notas-direcao.php";
		break;
		case 'criar-turma-direcao':
			include "mod/direcao/criar-turma-direcao.php";
		break;
		case 'cronograma-escolar-direcao':
			include "mod/direcao/cronograma-escolar-direcao.php";
		break;
		case 'listar-horarios-direcao':
			include "mod/direcao/listar-horarios-direcao.php";
		break;
		case 'registro-ocorencias-direcao':
			include "mod/direcao/registro-ocorencias-direcao.php";
		break;
		case 'transporte-escolar-direcao':
			include "mod/direcao/transporte-escolar-direcao.php";
		break;
		case 'consulta-turmas-direcao':
			include "mod/direcao/consulta-turmas-direcao.php";
		break;


		/*Pais*/
		case 'area-dos-pais':
			include "mod/area-dos-pais.php";
		break;
		case 'area-da-direcao':
			include "mod/area-da-direcao.php";
		break;
		case 'area-do-aluno':
			include "mod/area-do-aluno.php";
		break;

		case 'area-do-professor':
			include "mod/area-do-professor.php";
		break;

		default:
			include "home.php";
		break;


		/*Relattórios para atividades do trabalho*/
		case 'relatorio-1':
			include "relatorio/r1.php";
		break;
		case 'relatorio-2':
			include "relatorio/r2.php";
		break;
		case 'relatorio-3':
			include "relatorio/r3.php";
		break;
		case 'relatorio-4':
			include "relatorio/r4.php";
		break;
	}


?>
