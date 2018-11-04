package br.net.fireup.geduca.bo.impl;

import java.util.logging.Logger;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.PessoaBO;
import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.PessoaDAO;
import br.net.fireup.geduca.dto.LoginDTO;
import br.net.fireup.geduca.dto.RetornoLoginDTO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.util.StringUtil;

@Stateless
public class PessoaBOImpl implements PessoaBO {

	@Inject
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
	public RetornoLoginDTO realizarLogin(LoginDTO loginDTO) throws ServerException {
		logger.info("==Executando o método realizarLogin.");

		if (StringUtil.isNullOrEmpty(loginDTO.getEmail()) || StringUtil.isNullOrEmpty(loginDTO.getSenha())) {
			throw Resource.getServerException(MensagemService.CAMPOS_NAO_INFORMADOS_LOGIN_SENHA);

		}
		// Adquire o modelo do usuario caso encontre o email e a senha na base
		Pessoa pessoa = pessoaDAO.validarUsuario(loginDTO.getEmail(), loginDTO.getSenha());

		// Caso não encontro, lançara uma execao e o usuario nao ira receber o ticket de
		// acesso
		if (pessoa == null) {
			throw Resource.getServerException(MensagemService.USUARIO_NAO_CADASTRADO);
		}

		RetornoLoginDTO retorno = new RetornoLoginDTO();
		if (pessoa != null) {
			retorno.setId(pessoa.getId());
			retorno.setTicketAcesso(ticketAcessoBO.gerarTicket(pessoa.getId()));
			retorno.setNome(pessoa.getName());
			// retorno.setEmpresa(empresaUsuarioDAO.adquirirEmpresaUsuario(pessoa.getId()));
		}
		return retorno;
	}

}
