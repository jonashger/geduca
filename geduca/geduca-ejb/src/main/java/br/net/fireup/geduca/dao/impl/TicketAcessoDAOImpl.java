package br.net.fireup.geduca.dao.impl;

import static br.net.fireup.geduca.model.QTicketAcesso.ticketAcesso;

import javax.annotation.PostConstruct;
import javax.ejb.TransactionManagement;
import javax.ejb.TransactionManagementType;
import javax.inject.Inject;
import javax.persistence.EntityManager;

import com.mysema.query.jpa.impl.JPADeleteClause;
import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.annotation.Geduca;
import br.net.fireup.geduca.dao.TicketAcessoDAO;
import br.net.fireup.geduca.model.TicketAcesso;

@TransactionManagement(TransactionManagementType.BEAN)
public class TicketAcessoDAOImpl extends GenericDAOImpl<TicketAcesso> implements TicketAcessoDAO {

	private static final long serialVersionUID = 1L;

	@Inject
	@Geduca
	private EntityManager entity;

	@Override
	@PostConstruct
	public void inicializar() {
		setEntityManager(entity);

	}

	@Override
	public void removerTodos() {

		JPADeleteClause query = deleteClause(ticketAcesso);
		query.execute();

	}

	@Override
	public TicketAcesso adquirirTicket(String ticket) {
		JPASQLQuery query = sqlQuery().from(ticketAcesso).where(ticketAcesso.ticket.eq(ticket));
		return query.singleResult(ticketAcesso);
	}

	@Override
	public TicketAcesso adquirirTicketPorUsuario(Long codigoUsuario) {
		return sqlQuery().from(ticketAcesso).where(ticketAcesso.codigoPessoa.eq(codigoUsuario))
				.singleResult(ticketAcesso);
	}

}
