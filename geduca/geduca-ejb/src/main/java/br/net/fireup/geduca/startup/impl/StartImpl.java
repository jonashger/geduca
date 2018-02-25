package br.net.fireup.geduca.startup.impl;

import java.util.logging.Logger;

import javax.annotation.PostConstruct;
import javax.ejb.Startup;
import javax.inject.Inject;
import javax.inject.Singleton;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.startup.Start;

@Startup
@Singleton
public class StartImpl implements Start {

	@Inject
	@LoggerUtil
	private Logger logger;

	@PostConstruct
	public void init() {
		logger.info("==> Executando o método StartImpl");
	}
}
