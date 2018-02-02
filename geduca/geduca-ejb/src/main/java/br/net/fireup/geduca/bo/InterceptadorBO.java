package br.net.fireup.geduca.bo;

import java.lang.reflect.Method;

import javax.ws.rs.container.ContainerRequestContext;

import br.net.fireup.geduca.interceptador.ServerException;

public interface InterceptadorBO {

	public abstract Boolean requerAutentificacao(Method method) throws ServerException;

	public abstract String obterTicketAcessoHeader(ContainerRequestContext containerRequestContext)throws ServerException;

	public abstract void validarTicketAcesso(String ticketAcesso)throws ServerException;
	
	
}
