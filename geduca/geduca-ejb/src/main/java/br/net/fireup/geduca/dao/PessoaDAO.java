package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.model.Pessoa;

public interface PessoaDAO extends GenericDAO<Pessoa> {

	public abstract Pessoa validarUsuario(String email, String senha);

}
