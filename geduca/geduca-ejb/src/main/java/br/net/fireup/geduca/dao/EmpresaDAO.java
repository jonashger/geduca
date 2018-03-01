package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Empresa;
import br.net.fireup.geduca.model.EnderecoEmpresa;

public interface EmpresaDAO extends GenericDAO<Empresa> {

	public abstract Empresa buscarPorCnpj(String cnpj) throws ServerException;

	public abstract EnderecoEmpresa adquirirEndereco(Long id) throws ServerException;

}
