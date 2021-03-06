package br.net.fireup.geduca.service.impl;

import javax.enterprise.inject.Default;
import javax.faces.bean.ManagedBean;
import javax.inject.Inject;

import br.net.fireup.geduca.bo.PessoaBO;
import br.net.fireup.geduca.dto.LoginDTO;
import br.net.fireup.geduca.dto.RetornoLoginDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.service.PessoaService;

@ManagedBean
@Default
public class PessoaServiceImpl implements PessoaService {

	@Inject
	private PessoaBO pessoaBO;

	@Override
	public ValorBooleanoDTO registrarPessoa(Pessoa pessoa) {
		return pessoaBO.registrarPessoa(pessoa);
	}

	@Override
	public RetornoLoginDTO realizarLogin(LoginDTO login) throws ServerException {

		return pessoaBO.realizarLogin(login);
	}

}
