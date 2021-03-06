package br.net.fireup.geduca.dao;

import java.util.List;
import java.util.Set;

import com.mysema.query.jpa.sql.JPASQLQuery;

import br.net.fireup.geduca.interceptador.ServerException;

public interface GenericDAO<T> {

	public abstract T salvar(T entity) throws ServerException;

	public abstract Set<T> salvar(Set<T> entity);

	public abstract T atualizar(T entity);

	public abstract Set<T> atualizar(Set<T> entity);

	public abstract Boolean remover(Set<T> list);

	public abstract List<T> buscarTodos();

	public abstract void remover(T id);

	public abstract T buscarPorID(Long id);

	public abstract void inicializar();

	public abstract void detach(Object entity);

	public abstract List<T> salvar(List<T> entity) throws ServerException;

	public abstract JPASQLQuery sqlQuery();

}