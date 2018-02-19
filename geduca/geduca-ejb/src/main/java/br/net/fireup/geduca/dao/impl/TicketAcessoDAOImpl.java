package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QTicketAcesso.ticketAcesso;

import javax.ejb.Stateful;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.impl.JPADeleteClause;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.TicketAcessoDAO;
import br.net.fireup.geduca.model.TicketAcesso;

@Stateful
public class TicketAcessoDAOImpl extends GenericDAOImpl<TicketAcesso> implements TicketAcessoDAO {

	@Geduca
	private EntityManager entity;

	@Override
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public void removerTodos() {

		JPADeleteClause query = new JPADeleteClause(entity, ticketAcesso);
		query.execute();

	}

	@Override
	public TicketAcesso adquirirTicket(String ticket) {

		return sqlQuery().from(ticketAcesso).where(ticketAcesso.ticket.eq(ticket)).singleResult(ticketAcesso);
	}

}
