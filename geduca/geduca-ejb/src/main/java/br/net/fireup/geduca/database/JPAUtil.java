package br.net.fireup.geduca.database;

import java.io.Serializable;

import javax.enterprise.inject.Produces;
import javax.naming.InitialContext;
import javax.naming.NamingException;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;

import br.net.fireup.geduca.annotation.Geduca;

public class JPAUtil implements Serializable {

	private static final long serialVersionUID = -8214225310132830333L;

	private static final String geduca = "geduca";

	@PersistenceContext(unitName = geduca)
	private transient EntityManager entityGeduca;

	@Produces
	@Geduca
	public EntityManager createEntityManager() {
		return entityGeduca;
	}

	public static UserTransaction getUserTransaction() throws NamingException {
		return (UserTransaction) new InitialContext().lookup("java:comp/UserTransaction");
	}
}
