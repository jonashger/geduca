package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.model.Member;

public interface UsuarioDAO extends GenericDAO<Member>{
	
	public abstract Member adquirirUsuario();

}
