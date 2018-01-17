package br.net.fireup.geduca.bo.impl;

import java.io.File;
import java.util.logging.Logger;

import javax.ejb.Stateless;

import org.apache.commons.mail.EmailAttachment;
import org.apache.commons.mail.EmailException;
import org.apache.commons.mail.MultiPartEmail;

import br.net.fireup.geduca.annotation.LoggerUtil;
import br.net.fireup.geduca.bo.MailBO;
import br.net.fireup.geduca.dto.ValorBooleanoDTO;
import br.net.fireup.geduca.model.MailServer;

@Stateless
public class MailBOImpl implements MailBO {

	@LoggerUtil
	private Logger logger;

	@Override
	public ValorBooleanoDTO enviarEmail(String destinatarios, String corpoMensagem, String titulo, File arquivo) {
		MultiPartEmail email = new MultiPartEmail();

		MailServer config = new MailServer();
		config.setFlagSsl(Boolean.FALSE);
		config.setHost("mail.downet.com.br");
		config.setNomeRemetente("Contato - Fireup");
		config.setSenha("senhateste");
		config.setRemetente("jonas@fireup.net.br");
		config.setSsl("587");
		config.setNoSsl("587");

		EmailAttachment attachment = new EmailAttachment();
		if (arquivo != null) {

			attachment.setPath(arquivo.getPath()); // Obtem o caminho do arquivo
			attachment.setDisposition(EmailAttachment.ATTACHMENT);
			attachment.setDescription(arquivo.getName());
			attachment.setName(arquivo.getName()); // Obtem o nome do arquivo

		}
		try {
			email.setHostName(config.getHost());
			email.setAuthentication(config.getRemetente(), config.getSenha());

			if (config.getFlagSsl())

				email.setSslSmtpPort(config.getSsl());

			else
				email.setSslSmtpPort(config.getNoSsl());

			email.addTo(destinatarios); // pode ser qualquer email
			email.setFrom(config.getRemetente()); // será passado o email que você fará a autenticação
			email.setSubject(titulo);
			email.setMsg(corpoMensagem);

			if (attachment != null) {
				email.attach(attachment);
			}
			email.send();

		} catch (EmailException e) {

			System.out.println(e.getMessage());

		}
		return ValorBooleanoDTO.TRUE;
	}

}
