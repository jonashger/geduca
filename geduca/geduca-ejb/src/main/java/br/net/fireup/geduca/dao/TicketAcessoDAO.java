package br.net.fireup.geduca.dao;

import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.Pessoa;

public interface TicketAcessoDAO extends GenericDAO<Pessoa> {
	public abstract ValorBooleanoDTO removerTodos();
}
