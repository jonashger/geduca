package br.net.fireup.geduca.dao.impl;

import javax.annotation.PostConstruct;
import javax.enterprise.context.RequestScoped;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.TicketAcessoDAO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;

@RequestScoped
public class TicketAcessoDAOImpl extends GenericDAOImpl<Pessoa> implements TicketAcessoDAO {

	@Inject
	@Geduca
	private EntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity);
	}

	@Override
	public ValorBooleanoDTO removerTodos() {

		return ValorBooleanoDTO.TRUE;
	}

}
