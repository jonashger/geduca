package br.net.fireup.geduca.dto;

import java.io.Serializable;

public class RetornoLoginDTO implements Serializable {

	private static final long serialVersionUID = 1L;

	private String nome;
	private String ticketAcesso;
	private Long id;
	private Long empresa;
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public String getTicketAcesso() {
		return ticketAcesso;
	}
	public void setTicketAcesso(String ticketAcesso) {
		this.ticketAcesso = ticketAcesso;
	}
	public Long getId() {
		return id;
	}
	public void setId(Long id) {
		this.id = id;
	}
	public Long getEmpresa() {
		return empresa;
	}
	public void setEmpresa(Long empresa) {
		this.empresa = empresa;
	}

}
