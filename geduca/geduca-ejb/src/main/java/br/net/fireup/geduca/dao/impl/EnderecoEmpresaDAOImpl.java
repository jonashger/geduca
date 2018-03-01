package br.net.fireup.geduca.dao.impl;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.EnderecoEmpresaDAO;
import br.net.fireup.geduca.model.EnderecoEmpresa;

public class EnderecoEmpresaDAOImpl extends GenericDAOImpl<EnderecoEmpresa> implements EnderecoEmpresaDAO {

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
