package br.net.fireup.geduca.dao.impl;

import java.util.ArrayList;
import java.util.List;
import java.util.Set;

import javax.inject.Inject;
import javax.persistence.EntityManager;
import javax.persistence.EntityManagerFactory;
import javax.persistence.EntityTransaction;
import javax.persistence.Persistence;

import br.net.fireup.geduca.dao.GenericDAO;

/**
 * Classe abstrata responsável por fornecer encapsulamento no acesso aos dados.
 * 
 * @author Gert
 * @param <T>
 *            Classe Persistente
 * @version v1.23
 */

public abstract class GenericDAOImpl<T> implements GenericDAO<T> {

	@Inject
	protected EntityManager entityManager;

	private Class<T> persistedClass;

	protected GenericDAOImpl() {
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
	public T salvar(T entity) {
		EntityManagerFactory factory = Persistence.createEntityManagerFactory("primary");
		EntityTransaction t = getEntityManager().getTransaction();
		t.begin();
		getEntityManager().merge(entity);
		getEntityManager().flush();
		t.commit();
		return entity;
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
	public List<T> salvar(List<T> entity) {
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

}