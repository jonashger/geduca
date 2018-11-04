package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QEmpresa.empresa;

import javax.annotation.PostConstruct;
import javax.inject.Inject;

import br.net.fireup.geduca.dao.EmpresaDAO;
import br.net.fireup.geduca.model.Empresa;
import br.net.fireup.geduca.tenancy.ProxyEntityManager;

public class EmpresaDAOImpl extends GenericDAOImpl<Empresa> implements EmpresaDAO {

	private static final long serialVersionUID = 1L;

	@Inject
	private ProxyEntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity.getEntityManager());

	}

	@Override
	public String adquirirNomeEmpresa() {
		return sqlQuery().from(empresa).limit(1L).singleResult(empresa.nomeFantasia);
	}

}
