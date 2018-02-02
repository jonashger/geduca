package br.net.fireup.geduca.bo;

public interface TicketAcessoBO {

	public abstract String gerarTicket(Long codigoUsuario);

	public abstract void validarTicketAcesso(String ticketAcesso);

}
