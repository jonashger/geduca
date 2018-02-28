package br.net.fireup.geduca.dao;

import java.util.Date;

import br.net.fireup.geduca.model.TicketAcesso;

public interface BancoDeDadosUtilDAO extends GenericDAO<TicketAcesso> {

	public abstract Date adquirirDataHoraAtual();

}
