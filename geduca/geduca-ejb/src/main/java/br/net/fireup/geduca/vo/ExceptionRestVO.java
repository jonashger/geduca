package br.net.fireup.geduca.vo;

public class ExceptionRestVO {
	private String codigo;
	private String mensagem;
	private String mensagemTecnica;

	public String getCodigo() {
		return codigo;
	}

	public void setCodigo(String codigo) {
		this.codigo = codigo;
	}

	public String getMensagem() {
		return mensagem;
	}

	public void setMensagem(String mensagem) {
		this.mensagem = mensagem;
	}

	public String getMensagemTecnica() {
		return mensagemTecnica;
	}

	public void setMensagemTecnica(String mensagemTecnica) {
		this.mensagemTecnica = mensagemTecnica;
	}

	public ExceptionRestVO(String codigo, String mensagem, String mensagemTecnica) {
		this.codigo = codigo;
		this.mensagem = mensagem;
		this.mensagemTecnica = mensagemTecnica;
	}

}
