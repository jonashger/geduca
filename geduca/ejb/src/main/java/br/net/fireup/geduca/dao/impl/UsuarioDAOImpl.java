package br.net.fireup.geduca.dao.impl;

import java.util.logging.Logger;

import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.dao.UsuarioDAO;
import br.net.fireup.geduca.model.Member;

public class UsuarioDAOImpl extends GenericDAOImpl<Member> implements UsuarioDAO {

	@Inject
	private transient Logger logger;

	@Inject
	private EntityManager entityManager;

	@Override
	public Member adquirirUsuario() {
		logger.info("==> Executando o método adquirirUsuario");

		return buscarPorID(1L);

	}

	@Override
	public void inicializar() {
		entityManager = getEntityManager();
	}

}
