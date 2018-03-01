package br.net.fireup.geduca.bo;

import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.ServerException;

public interface EmpresaBO {

	public abstract ValorBooleanoDTO salvar(EmpresaDTO pessoa) throws ServerException;

}
