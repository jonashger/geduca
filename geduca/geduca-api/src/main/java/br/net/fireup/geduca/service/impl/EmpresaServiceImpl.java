package br.net.fireup.geduca.service.impl;

import javax.enterprise.inject.Default;
import javax.faces.bean.ManagedBean;
import javax.inject.Inject;

import br.net.fireup.geduca.bo.EmpresaBO;
import br.net.fireup.geduca.dto.EmpresaDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.service.EmpresaService;

@ManagedBean
@Default
public class EmpresaServiceImpl implements EmpresaService {

	@Inject
	private EmpresaBO empresaBO;

	@Override
	public ValorBooleanoDTO salvar(EmpresaDTO pessoa) throws ServerException {
		return empresaBO.salvar(pessoa);
	}

}
