package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.model.Pessoa;

public interface UsuarioDAO extends GenericDAO<Pessoa>{
	
	public abstract Pessoa adquirirUsuario();

}
