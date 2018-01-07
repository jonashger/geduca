package br.net.fireup.geduca.bo.impl;

import java.util.List;

import javax.ejb.Stateless;
import javax.inject.Inject;

import br.net.fireup.geduca.bo.UsuarioBO;
import br.net.fireup.geduca.dao.UsuarioDAO;
import br.net.fireup.geduca.model.Pessoa;
import br.net.fireup.geduca.util.LongUtil;

@Stateless
public class UsuarioBOImpl implements UsuarioBO {
	@Inject
	private UsuarioDAO usuarioDAO;
	
	
	@Override
	public Pessoa adquirirUsuario() {
		
		return usuarioDAO.adquirirUsuario();
	}


	@Override
	public void enviar(List<Pessoa> lista) {
		usuarioDAO.salvar(lista);
	
	}

}
