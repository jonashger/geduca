package br.net.fireup.geduca.bo;


import java.util.List;

import br.net.fireup.geduca.model.Member;

public interface UsuarioBO {
	
	public abstract Member adquirirUsuario();

	public abstract void enviar(List<Member> lista);

}
