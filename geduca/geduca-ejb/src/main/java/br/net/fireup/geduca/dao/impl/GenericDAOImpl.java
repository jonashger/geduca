package br.net.fireup.geduca.dao.impl;

import java.io.Serializable;
import java.lang.reflect.ParameterizedType;
import java.lang.reflect.Type;
import java.sql.Connection;
import java.util.ArrayList;
import java.util.List;

import javax.enterprise.inject.spi.CDI;
import javax.enterprise.util.AnnotationLiteral;
import javax.persistence.EntityManager;

import org.hibernate.Session;

import com.mysema.query.jpa.JPASubQuery;
import com.mysema.query.jpa.impl.JPADeleteClause;
import com.mysema.query.jpa.impl.JPAQuery;
import com.mysema.query.jpa.impl.JPAUpdateClause;
import com.mysema.query.jpa.sql.JPASQLQuery;
import com.mysema.query.sql.PostgresTemplates;
import com.mysema.query.sql.SQLSubQuery;
import com.mysema.query.types.path.PathBuilder;

import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.GenericDAO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.util.StringUtil;

/**
 * Classe abstrata responsável por fornecer encapsulamento no acesso aos dados.
 * 
 * @author Gert
 * @param <T>
 *            Classe Persistente
 * @version v1.23
 */
public abstract class GenericDAOImpl<T> implements Serializable, GenericDAO<T> {

	/**
	 * 
	 */

	protected static final String ID = "id";

	private static final long serialVersionUID = 1L;

	protected transient EntityManager entityManager;

	private Session session;

	private Class<T> persistedClass;

	private PathBuilder<T> pathBuilder;

	@SuppressWarnings("unchecked")
	public GenericDAOImpl() {
		Type t = getClass().getGenericSuperclass();
		ParameterizedType pt = (ParameterizedType) t;
		persistedClass = (Class<T>) pt.getActualTypeArguments()[0];
	}

	public void setPersistClass(Class<T> pc) {
		this.persistedClass = pc;
	}

	public void setEntityManager(EntityManager em) {
		this.entityManager = em;
	}

	public EntityManager getEntityManager() {
		return this.entityManager;
	}

	protected GenericDAOImpl(Class<T> persistedClass) {
		this();
		this.persistedClass = persistedClass;
	}

	@Override
	public T salvar(T entity) throws ServerException {
		T t = null;
		try {
			t = getEntityManager().merge(entity);
		} catch (Exception e) {
			throw Resource.getServerException(MensagemService.FALHA_AO_GRAVAR_DADOS);
		}
		return t;
	}

	@Override
	public List<T> salvar(List<T> entity) throws ServerException {
		List<T> retorno = new ArrayList<T>();
		for (T t : entity) {
			this.salvar(t);
			retorno.add(t);
		}

		return retorno;
	}

	@Override
	public void detach(Object entity) {
		getEntityManager().detach(entity);
	}

	@Override
	public JPASQLQuery sqlQuery() {
		return new JPASQLQuery(this.getEntityManager(), PostgresTemplates.DEFAULT);
	}

	@Override
	public JPASQLQuery sqlQuery(Class<? extends AnnotationLiteral<?>> annotationLiteral) {

		try {
			return new JPASQLQuery(CDI.current().select(EntityManager.class, annotationLiteral.newInstance()).get(),
					PostgresTemplates.DEFAULT);
		} catch (Exception e) {
			return null;
		}
	}

	@Override
	public JPASQLQuery sqlFrom() {
		return sqlQuery().from(this.getPathBuilder());
	}

	@Override
	public JPAQuery query() {
		return new JPAQuery(this.getEntityManager());
	}

	@Override
	public JPAQuery from() {
		return query().from(this.getPathBuilder());
	}

	@Override
	public void excluirTodos() {

		this.deleteClause().execute();
	}

	@Override
	public T excluir(T entity) {
		T t = entity;
		if (!getEntityManager().contains(entity)) {
			t = getEntityManager().merge(entity);
		}
		getEntityManager().remove(t);
		getEntityManager().flush();

		return t;
	}

	@Override
	public SQLSubQuery sqlSubQuery() {
		return new SQLSubQuery();
	}

	@Override
	public JPASubQuery subQuery() {
		return new JPASubQuery();
	}

	@Override
	public JPADeleteClause deleteClause() {
		return new JPADeleteClause(this.getEntityManager(), this.getPathBuilder());
	}

	@Override
	public JPAUpdateClause updateClause() {
		return new JPAUpdateClause(this.getEntityManager(), this.getPathBuilder());
	}

	@Override
	public List<T> excluir(List<T> entities) {
		List<T> retorno = new ArrayList<T>();
		for (T t : entities) {
			retorno.add(this.excluir(t));
		}
		return retorno;
	}

	@Override
	public String getEntityPathName() {
		return StringUtil.primeiraMinuscula(getPersistentClass().getSimpleName());
	}


    @Override
    public Class<T> getPersistentClass() {
        return persistedClass;
    }
	
	@Override
	public List<T> buscarTodos() {
		return from().list(this.getPathBuilder());

	}

	@Override
	public Session getSession() {
		if (session != null) {
			return session;
		}
		return getEntityManager().unwrap(Session.class);
	}

	@Override
	public Connection getConnection() {
		return getEntityManager().unwrap(Connection.class);
	}

	@Override
	public void setSession(Session session) {
		this.session = session;
	}

	@Override
	public Integer executeUpdate(String query) {
		return getEntityManager().createNativeQuery(query).executeUpdate();
	}

	@Override
	public T excluirPorId(Long id) {
		T t = from().where(this.getPathBuilder().get(ID).eq(id)).uniqueResult(this.getPathBuilder());

		if (deleteClause().where(this.getPathBuilder().get(ID).eq(id)).execute() > 0) {
			return t;
		} else {
			t = null;
		}

		return t;

	}

	@Override
	public T buscarPorId(Long id) {
		return from().where(this.getPathBuilder().get(ID).eq(id)).uniqueResult(this.getPathBuilder());
	}

	public PathBuilder<T> getPathBuilder() {
		return pathBuilder;
	}

	public void setPathBuilder(PathBuilder<T> pathBuilder) {
		this.pathBuilder = pathBuilder;
	}

}