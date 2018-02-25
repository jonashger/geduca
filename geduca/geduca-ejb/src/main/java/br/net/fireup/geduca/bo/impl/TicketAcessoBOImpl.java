package br.net.fireup.geduca.bo.impl;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.Date;
import java.util.logging.Logger;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.dao.TicketAcessoDAO;
import br.net.fireup.geduca.model.TicketAcesso;

@Stateless
public class TicketAcessoBOImpl implements TicketAcessoBO {

	@LoggerUtil
	private Logger logger;

	@Inject
	private TicketAcessoDAO ticketAcessoDAO;

	@Override
	public String gerarTicket(Long codigoUsuario) {
		logger.info("==> Executando o método gerarTicket.");

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
		TicketAcesso ticket = new TicketAcesso();
		ticket.setCodigoPessoa(codigoUsuario);
		ticket.setTicket(ticketAcesso);

		ticketAcessoDAO.salvar(ticket);

		return ticketAcesso;
	}

	@Override
	public void validarTicketAcesso(String ticket) {

		TicketAcesso ticketAcesso = ticketAcessoDAO.adquirirTicket(ticket);
		if (ticketAcesso == null) {

		}
	}

}
