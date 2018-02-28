package br.net.fireup.geduca.dao.impl;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.EmpresaDAO;
import br.net.fireup.geduca.model.Empresa;

public class EmpresaDAOImpl extends GenericDAOImpl<Empresa> implements EmpresaDAO {

	private static final long serialVersionUID = 1L;

	@Inject
	@Geduca
	private EntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity);

	}

}
