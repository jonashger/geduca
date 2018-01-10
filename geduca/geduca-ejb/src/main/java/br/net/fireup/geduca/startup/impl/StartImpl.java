package br.net.fireup.geduca.startup.impl;

import java.util.logging.Logger;

import javax.annotation.PostConstruct;
import javax.ejb.Singleton;
import javax.ejb.Startup;

import br.net.fireup.geduca.startup.Start;

@Singleton
@Startup
public class StartImpl implements Start {

	private Logger logger;

	@PostConstruct
	public void init() {
		logger.info("Iniciando o Servidor");
		// AQUI FAZ AS REQUISIÇÕES AO INICIAR O SERVIDOR CASO SEJA NECESSARIO
		// EX: LIMPAR TICKETS DE ACESSO
	}
}
