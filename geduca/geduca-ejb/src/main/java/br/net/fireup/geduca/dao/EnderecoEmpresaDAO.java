package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.model.EnderecoEmpresa;

public interface EnderecoEmpresaDAO extends GenericDAO<EnderecoEmpresa> {

	public Boolean validarEndereco(EmpresaDTO empresaDTO);

}
