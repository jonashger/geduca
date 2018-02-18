package br.net.fireup.geduca.startup.impl;

import javax.annotation.PostConstruct;
import javax.ejb.Startup;

import br.net.fireup.geduca.startup.Start;

@Startup
public class StartImpl implements Start {


	@PostConstruct
	public void init() {
		// AQUI FAZ AS REQUISIÇÕES AO INICIAR O SERVIDOR CASO SEJA NECESSARIO
		// EX: LIMPAR TICKETS DE ACESSO
	}
}
