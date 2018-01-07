package br.net.fireup.geduca.dao.impl;

import java.util.logging.Logger;

import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.dao.UsuarioDAO;
import br.net.fireup.geduca.model.Pessoa;

public class UsuarioDAOImpl extends GenericDAOImpl<Pessoa> implements UsuarioDAO {

	@Inject
	private transient Logger logger;

	@Inject
	private EntityManager entityManager;

	@Override
	public Pessoa adquirirUsuario() {
		logger.info("==> Executando o método adquirirUsuario");

		return buscarPorID(1L);

	}

	@Override
	public void inicializar() {
		entityManager = getEntityManager();
	}

}
