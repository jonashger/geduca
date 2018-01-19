package br.net.fireup.geduca.service.impl;

import javax.inject.Inject;

import br.net.fireup.geduca.bo.PessoaBO;
import br.net.fireup.geduca.dto.LoginDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.service.PessoaService;

public class PessoaServiceImpl implements PessoaService {

	@Inject
	private PessoaBO pessoaBO;

	@Override
	public ValorBooleanoDTO registrarPessoa(Pessoa pessoa) {
		return pessoaBO.registrarPessoa(pessoa);
	}

	@Override
	public ValorBooleanoDTO realizarLogin(LoginDTO login) {

		return pessoaBO.realizarLogin(login);
	}

}
