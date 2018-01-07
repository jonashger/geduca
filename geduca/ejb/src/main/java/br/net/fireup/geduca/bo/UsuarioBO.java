package br.net.fireup.geduca.bo;


import java.util.List;

import br.net.fireup.geduca.model.Pessoa;

public interface UsuarioBO {
	
	public abstract Pessoa adquirirUsuario();

	public abstract void enviar(List<Pessoa> lista);

}
