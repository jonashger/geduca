package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QPessoa.pessoa;

import java.util.Date;

import javax.enterprise.context.RequestScoped;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.sql.JPASQLQuery;
import com.mysema.query.sql.Configuration;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.BancoDeDadosUtilDAO;
import br.net.fireup.geduca.dao.PessoaDAO;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.model.TicketAcesso;

@RequestScoped
public class BancoDeDadosUtilDAOImpl extends GenericDAOImpl<TicketAcesso> implements BancoDeDadosUtilDAO {

	@Inject
	@Geduca
	private EntityManager entity;

	@Override
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public Date adquirirDataHoraAtual() {
		// TODO Auto-generated method stub
		return null;
	}

}
