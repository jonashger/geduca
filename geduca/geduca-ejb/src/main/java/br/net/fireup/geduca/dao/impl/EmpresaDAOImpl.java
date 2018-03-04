package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QEmpresa.empresa;
import static br.net.fireup.geduca.model.QEnderecoEmpresa.enderecoEmpresa;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.EmpresaDAO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Empresa;
import br.net.fireup.geduca.model.EnderecoEmpresa;

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

	@Override
	public Empresa buscarPorCnpj(String cnpj) throws ServerException {
		JPASQLQuery query = sqlQuery().from(empresa).where(empresa.cnpj.eq(cnpj));

		return query.singleResult(empresa);
	}

	@Override
	public EnderecoEmpresa adquirirEndereco(Long id) throws ServerException {
		JPASQLQuery query = sqlQuery().from(empresa);

		query.innerJoin(enderecoEmpresa).on(enderecoEmpresa.codigoEmpresa.eq(empresa.id));

		query.where(empresa.id.eq(id));

		return query.singleResult(enderecoEmpresa);

	}

}
