package br.net.fireup.geduca.dao.impl;

import java.util.Date;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.BancoDeDadosUtilDAO;
import br.net.fireup.geduca.model.TicketAcesso;

public class BancoDeDadosUtilDAOImpl extends GenericDAOImpl<TicketAcesso> implements BancoDeDadosUtilDAO {

	private static final long serialVersionUID = 1L;

	@Inject
	@Geduca
	private EntityManager entity;

	@PostConstruct
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
