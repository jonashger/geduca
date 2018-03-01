package br.net.fireup.geduca.dao.impl;

import java.io.Serializable;
import java.lang.reflect.ParameterizedType;
import java.lang.reflect.Type;
import java.util.ArrayList;
import java.util.List;
import java.util.Set;

import javax.persistence.EntityManager;
import javax.persistence.EntityTransaction;

import org.hibernate.Session;

import com.mysema.query.jpa.impl.JPADeleteClause;
import com.mysema.query.jpa.sql.JPASQLQuery;
import com.mysema.query.sql.Configuration;
import com.mysema.query.types.EntityPath;

import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.dao.GenericDAO;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;

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
	private static final long serialVersionUID = 1L;

	protected transient EntityManager entityManager;

	private Session session;

	private Class<T> persistedClass;

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
	public T atualizar(T entity) {
		EntityTransaction t = getEntityManager().getTransaction();
		t.begin();
		getEntityManager().merge(entity);
		getEntityManager().flush();
		t.commit();
		return entity;
	}

	@Override
	public void remover(T entity) {
		EntityTransaction tx = getEntityManager().getTransaction();
		tx.begin();
		T mergedEntity = getEntityManager().merge(entity);
		getEntityManager().remove(mergedEntity);
		getEntityManager().flush();
		tx.commit();
	}

	@Override
	public T buscarPorID(Long l) {
		return getEntityManager().find(persistedClass, l);
	}

	@Override
	public Set<T> salvar(Set<T> entity) {
		// TODO Auto-generated method stub
		return null;
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
	public Set<T> atualizar(Set<T> entity) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public Boolean remover(Set<T> list) {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public List<T> buscarTodos() {
		// TODO Auto-generated method stub
		return null;
	}

	@Override
	public void detach(Object entity) {
		getEntityManager().detach(entity);
	}

	@Override
	public JPASQLQuery sqlQuery() {
		return new JPASQLQuery(entityManager, Configuration.DEFAULT);
	}

	@Override
	public JPADeleteClause deleteClause(EntityPath<?> t) {
		return new JPADeleteClause(entityManager, t);
	}
}