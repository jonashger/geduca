package br.net.fireup.geduca.bo.impl;

import java.lang.reflect.Method;
import java.util.List;
import java.util.logging.Logger;

import javax.annotation.security.DenyAll;
import javax.annotation.security.PermitAll;
import javax.ejb.Stateless;
import javax.inject.Inject;
import javax.ws.rs.container.ContainerRequestContext;
import javax.ws.rs.core.MultivaluedMap;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.InterceptadorBO;
import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.constantes.MensagemService;
import br.net.fireup.geduca.interceptador.Resource;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.util.ListUtil;

@Stateless
public class InterceptadorBOImpl implements InterceptadorBO {

	@Inject
	private TicketAcessoBO ticketAcessoBO;

	@Inject
	@LoggerUtil
	private Logger logger;

	@Override
	public Boolean requerAutentificacao(Method method) throws ServerException {
		logger.info("==> Executando o método requerAutentificacao");

		if (!method.isAnnotationPresent(PermitAll.class)) {

			if (method.isAnnotationPresent(DenyAll.class)) {
				throw Resource.getServerException(MensagemService.TICKET_ACESSO_INVALIDO);
			}

			return Boolean.TRUE;
		}
		return Boolean.FALSE;
	}

	@Override
	public String obterTicketAcessoHeader(ContainerRequestContext containerRequestContext) throws ServerException {

		final MultivaluedMap<String, String> headers = containerRequestContext.getHeaders();
		final List<String> lista = headers.get("ticketAcesso");

		if (ListUtil.isNullOrEmpty(lista)) {
			throw Resource.getServerException(MensagemService.TICKET_ACESSO_INVALIDO);
		}

		return lista.get(0);

	}

	@Override
	public void validarTicketAcesso(String ticketAcesso) throws ServerException {

		ticketAcessoBO.validarTicketAcesso(ticketAcesso);

	}

}
