package br.net.fireup.geduca.startup.impl;

import java.io.File;

import javax.annotation.PostConstruct;
import javax.ejb.Singleton;
import javax.ejb.Startup;
import javax.inject.Inject;

import br.net.fireup.geduca.bo.MailBO;
import br.net.fireup.geduca.startup.Start;

@Singleton
@Startup
public class StartImpl implements Start {

	@Inject 
	private MailBO mail;
	
	@PostConstruct
	public void init() {
		mail.enviarEmail("jonashalmenschlager@sysmo.com.br", "ESSA É UM EMAIL TESTE PARA VC COM A ESTRUTURA EM JAVA EE 7 ", "EMAIL TESTE COM JAVA", new File("c:/manuel.txt"));
		// AQUI FAZ AS REQUISIÇÕES AO INICIAR O SERVIDOR CASO SEJA NECESSARIO
		// EX: LIMPAR TICKETS DE ACESSO
	}
}
