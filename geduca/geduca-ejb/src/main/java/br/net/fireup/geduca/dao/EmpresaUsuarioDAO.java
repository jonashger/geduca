package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.EmpresaUsuario;

public interface EmpresaUsuarioDAO extends GenericDAO<EmpresaUsuario> {

	public abstract Long adquirirEmpresaUsuario(Long codigoUsuario) throws ServerException;
}
