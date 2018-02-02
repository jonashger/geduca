package br.net.fireup.geduca.bo.impl;

import java.util.logging.Logger;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.PessoaBO;
import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.dao.PessoaDAO;
import br.net.fireup.geduca.dto.LoginDTO;
import br.net.fireup.geduca.dto.RetornoLoginDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.util.StringUtil;

@Stateless
public class PessoaBOImpl implements PessoaBO {

	@LoggerUtil
	private Logger logger;

	@Inject
	private PessoaDAO pessoaDAO;

	@Inject
	private TicketAcessoBO ticketAcessoBO;

	@Override
	public ValorBooleanoDTO registrarPessoa(Pessoa pessoa) {
		// logger.info("==> Executando o método registrarPessoa");
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public RetornoLoginDTO realizarLogin(LoginDTO loginDTO) {
		if (StringUtil.isNullOrEmpty(loginDTO.getEmail()) || !StringUtil.isNullOrEmpty(loginDTO.getSenha())) {
		}
		Pessoa pessoa = pessoaDAO.validarUsuario(loginDTO.getEmail(), loginDTO.getSenha());
		RetornoLoginDTO retorno = new RetornoLoginDTO();
		if (pessoa != null) {
			retorno.setId(pessoa.getId());
			retorno.setTicketAcesso(ticketAcessoBO.gerarTicket(pessoa.getId()));
			retorno.setNome(pessoa.getName());

		}
		return null;
	}

}
