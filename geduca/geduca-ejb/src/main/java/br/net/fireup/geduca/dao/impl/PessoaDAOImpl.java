package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QPessoa.pessoa;

import javax.annotation.PostConstruct;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.PessoaDAO;
import br.net.fireup.geduca.model.Pessoa;

public class PessoaDAOImpl extends GenericDAOImpl<Pessoa> implements PessoaDAO {

	private static final long serialVersionUID = 1L;

	@Geduca
	@Inject
	private EntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public Pessoa validarUsuario(String email, String senha) {
		JPASQLQuery query = sqlQuery().from(pessoa).where(pessoa.email.eq(email).and(pessoa.senha.eq(senha)));
		return query.uniqueResult(pessoa);
	}

}
