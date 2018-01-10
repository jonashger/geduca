package br.net.fireup.geduca.bo.impl;

import java.util.logging.Logger;

import javax.ejb.Stateless;

import br.net.fireup.geduca.bo.PessoaBO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;

@Stateless
public class PessoaBOImpl implements PessoaBO {

	private Logger logger;

	@Override
	public ValorBooleanoDTO registrarPessoa(Pessoa pessoa) {
		logger.info("==> Executando o método registrarPessoa");
		// TODO Auto-generated method stub
		return null;
	}

}
