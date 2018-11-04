package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.model.Empresa;

public interface EmpresaDAO extends GenericDAO<Empresa> {

	public abstract String adquirirNomeEmpresa();

}
