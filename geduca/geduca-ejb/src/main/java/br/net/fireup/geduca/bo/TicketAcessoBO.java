package br.net.fireup.geduca.bo;

import br.net.fireup.geduca.interceptador.ServerException;

public interface TicketAcessoBO {

	public abstract String gerarTicket(Long codigoUsuario) throws ServerException;

	public abstract void validarTicketAcesso(String ticketAcesso) throws ServerException;

	public abstract void limparTicketsAcesso() throws ServerException;

}
