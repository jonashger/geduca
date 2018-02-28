package br.net.fireup.geduca.bo;

import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Empresa;

public interface EmpresaBO {

	public abstract ValorBooleanoDTO salvar(Empresa pessoa) throws ServerException;

}
