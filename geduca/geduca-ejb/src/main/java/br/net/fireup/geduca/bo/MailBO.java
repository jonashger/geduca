package br.net.fireup.geduca.bo;

import java.io.File;

import br.net.fireup.geduca.dto.ValorBooleanoDTO;

public interface MailBO {

	public abstract ValorBooleanoDTO enviarEmail(String destinatarios, String corpoMensagem, String titulo,
			File arquivo);
}
