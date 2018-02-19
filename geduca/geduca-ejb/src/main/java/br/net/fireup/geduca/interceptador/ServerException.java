package br.net.fireup.geduca.interceptador;

import javax.ejb.ApplicationException;

@ApplicationException(rollback = true)
public class ServerException extends Exception {

	private static final long serialVersionUID = 1L;

	private final String codigo;

	private final String mensagem;

	public ServerException(String codigo, String mensagem) {
		super(mensagem);
		this.codigo = codigo;
		this.mensagem = mensagem;

	}

	public ServerException(String codigo, String mensagem, Throwable throwable) {
		super(mensagem, throwable);
		this.codigo = codigo;
		this.mensagem = mensagem;

	}

	public String getCodigo() {
		return codigo;
	}

	public String getMensagem() {
		return mensagem;
	}

	public String getMensagemTecnica() {
		return super.getMessage();
	}

}
