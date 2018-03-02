package br.net.fireup.geduca.startup.impl;

import java.util.logging.Logger;

import javax.annotation.PostConstruct;
import javax.ejb.Singleton;
import javax.ejb.Startup;
import javax.inject.Inject;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.TicketAcessoBO;
import br.net.fireup.geduca.interceptador.ServerException;
import br.net.fireup.geduca.startup.Start;

@Startup
@Singleton
public class StartImpl implements Start {

	@Inject
	@LoggerUtil
	private Logger logger;

	@Inject
	private TicketAcessoBO ticketAcessoBO;

	@PostConstruct
	public void startup() {

		logger.info("*********** INICIANDO O SISTEMA ***********");
		logger.info("******** LIMPANDO TIKETS DE ACESSO ********");

		this.limparTicketsAcesso();

		logger.info("******* SISTEMA INICIADO COM SUCESSO ******");
	}

	private void limparTicketsAcesso() {
		try {
			ticketAcessoBO.limparTicketsAcesso();

		} catch (ServerException e) {
			logger.severe("Não foi possivel excluir os tickets de Acesso");
		}

	}
}
