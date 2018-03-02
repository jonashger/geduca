package br.net.fireup.geduca.bo.impl;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Date;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.TicketAcessoDAO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.model.TicketAcesso;

@Stateless
public class TicketAcessoBOImpl implements TicketAcessoBO {

	@Inject
	private TicketAcessoDAO ticketAcessoDAO;

	@Override
	public String gerarTicket(Long codigoUsuario) throws ServerException {
		Date date = new Date();
		String data = String.valueOf(date.getTime()) + codigoUsuario.toString();

		MessageDigest m = null;
		try {
			m = MessageDigest.getInstance("MD5");
			m.update(data.getBytes(), 0, data.length());

		} catch (NoSuchAlgorithmException e) {
			System.out.println("Erro ao gerar MD5");
		}

		String ticketAcesso = new BigInteger(1, m.digest()).toString(16);
		TicketAcesso ticket = ticketAcessoDAO.adquirirTicketPorUsuario(codigoUsuario);

		if (ticket == null) {
			ticket = new TicketAcesso();
			ticket.setDataCadastro(new Date());
		}
		ticket.setCodigoPessoa(codigoUsuario);
		ticket.setTicket(ticketAcesso);
		ticket.setDataManutencao(new Date());

		ticketAcessoDAO.salvar(ticket);

		return ticketAcesso;
	}

	@Override
	public void validarTicketAcesso(String ticket) throws ServerException {

		TicketAcesso ticketAcesso = ticketAcessoDAO.adquirirTicket(ticket);
		if (ticketAcesso == null) {
			throw Resource.getServerException(MensagemService.TICKET_ACESSO_INVALIDO);
		}
	}

	@Override
	public void limparTicketsAcesso() throws ServerException {

		ticketAcessoDAO.removerTodos();

	}

}
