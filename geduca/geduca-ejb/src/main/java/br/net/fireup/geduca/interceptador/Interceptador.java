package br.net.fireup.geduca.interceptador;

import java.io.IOException;
import java.lang.reflect.Method;

import javax.inject.Inject;
import javax.ws.rs.container.ContainerRequestContext;
import javax.ws.rs.container.ContainerRequestFilter;
import javax.ws.rs.core.Response;
import javax.ws.rs.ext.Provider;

import org.jboss.resteasy.core.ResourceMethodInvoker;

import br.net.fireup.geduca.bo.InterceptadorBO;
import br.net.fireup.geduca.vo.ExceptionRestVO;

@Provider
public class Interceptador implements ContainerRequestFilter {

	@Inject
	private InterceptadorBO interceptadorBO;

	@Override
	public void filter(ContainerRequestContext request) throws IOException {
		ResourceMethodInvoker methodInvoker = (ResourceMethodInvoker) request
				.getProperty("org.jboss.resteasy.core.ResourceMethodInvoker");

		Method method = methodInvoker.getMethod();
		
		try {
			
			if (!interceptadorBO.requerAutentificacao(method)) {
				String ticketAcesso = interceptadorBO.obterTicketAcessoHeader(request);
				interceptadorBO.validarTicketAcesso(ticketAcesso);
			}
			
		} catch (ServerException e) {
			request.abortWith(Response.status(Response.Status.UNAUTHORIZED).entity(new ExceptionRestVO(e.getCodigo(),e.getMensagem(),e.getMensagemTecnica())).build());
		}
	}

}