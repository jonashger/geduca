package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QPessoa.pessoa;

import javax.ejb.Stateful;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.PessoaDAO;
import br.net.fireup.geduca.model.Pessoa;

@Stateful
public class PessoaDAOImpl extends GenericDAOImpl<Pessoa> implements PessoaDAO {

	@Geduca
	private EntityManager entity;

	@Override
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public Pessoa validarUsuario(String email, String senha) {
		JPASQLQuery query = sqlQuery().from(pessoa).where(pessoa.email.eq(email).and(pessoa.senha.eq(senha)));
		return query.uniqueResult(pessoa);
	}

}
