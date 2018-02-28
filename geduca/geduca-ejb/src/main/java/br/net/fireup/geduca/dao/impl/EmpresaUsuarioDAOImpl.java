package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QEmpresaUsuario.empresaUsuario;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.EmpresaUsuarioDAO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.EmpresaUsuario;
import br.net.fireup.geduca.model.pk.QEmpresaUsuarioPK;

public class EmpresaUsuarioDAOImpl extends GenericDAOImpl<EmpresaUsuario> implements EmpresaUsuarioDAO {

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
	public Long adquirirEmpresaUsuario(Long codigoUsuario) throws ServerException {

		QEmpresaUsuarioPK pk = new QEmpresaUsuarioPK(empresaUsuario.getMetadata().getName());

		JPASQLQuery query = sqlQuery().from(empresaUsuario);

		query.where(pk.codigoPessoa.eq(codigoUsuario));

		return query.singleResult(pk.codigoEmpresa);

	}

}
